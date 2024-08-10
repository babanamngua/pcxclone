<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Transaction;
use Illuminate\Support\Facades\Http;
use App\Models\VNpayment; // Giả sử bạn đã tạo model Payment
use App\Models\Orders;
use App\Models\Order_items;
use App\Models\ShippingMethods;
use App\Models\Shipping;
use App\Models\Product;
use App\Models\Color;
use Stripe\Climate\Order;

use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; // Thêm use statement cho DB facade  

use Illuminate\Support\Facades\Redirect;
class PaymentController extends Controller
{
    public function index($id)
    {
        $order = Orders::findOrFail($id);
        return view('payment', compact('order'));
    }
    
    
    public function paymentInfo()
    {
        return view('paymentinfo');
    }
    public function store(Request $request)
    {
        Stripe::setApiKey('sk_test_51PdSCGRsG8g38Rd2a49CxVNMbYZoZFfN5wObfqPir41rgKyMKrAQUXCc2qE2yWqzSwJAQEfRZX1bwO1jAUKgx5Ow00Iue43epM');

        $token = $request->stripeToken;

        try {
            $charge = Charge::create([
                'amount' => 1000, // số tiền cần thanh toán, tính bằng cent (10.00 USD)
                'currency' => 'usd',
                'description' => 'Example charge',
                'source' => $token,
            ]);
            // Kiểm tra xem người dùng có đăng nhập hay không
            $userId = auth()->check() ? auth()->id() : null;
            // Lưu thông tin giao dịch vào database
            Transaction::create([
                'user_id' => $userId, // có thể null nếu không đăng nhập
                'transaction_id' => $charge->id,
                'amount' => $charge->amount,
                'currency' => $charge->currency,
                'status' => $charge->status,
            ]);

            return redirect()->route('payment.index')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return redirect()->route('payment.index')->with('error', 'Payment failed!');
        }
    }
    public function vnpay(Request $request, $id)
    {
        $order = Orders::findOrFail($id);
    $vnp_TmnCode = "MIMI0897";//Mã website tại VNPAY 
    $vnp_HashSecret = "LE7X3WM3N4SEAS7JAQ7KNEDDOUTL7EMD"; //Chuỗi bí mật
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = url('/handlepayment');
    
    $vnp_TxnRef = $id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = "Thanh toán đơn hàng - #".$id;
    $vnp_OrderType = "BarBer Shop";
    $vnp_Amount = $order->total_price * 100;
    $vnp_Locale = "vn";
    $vnp_BankCode =  $request->input('paymethod');
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    );
    
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }
    
    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array(
        'code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
     // Chuyển hướng đến URL thanh toán
     return redirect()->away($vnp_Url);
    }
    public function handlePayment(Request $request)
    {
        DB::beginTransaction();
    
        try {
            // Lấy dữ liệu từ URL
            $data = $request->all();
            $orderId = $data['vnp_TxnRef'];
            $order = Orders::findOrFail($orderId);
    
            // Kiểm tra trạng thái thanh toán và xử lý dữ liệu nếu thanh toán không thành công
            if ($data['vnp_TransactionStatus'] != '00') {
                // Thanh toán không thành công
                // Cập nhật order_items
                Order_items::where('order_id', $orderId)->update(['order_id' => null]);
    
                if (!Auth::check()) {
                    // Cập nhật giỏ hàng trong session nếu người dùng chưa đăng nhập
                    $cartItems = Order_items::where('order_id', $orderId)->get();
                    foreach ($cartItems as $item) {
                        session()->push('cart.' . $item->product_id, [
                            'quantity' => $item->quantity,
                            'color_id' => $item->color_id,
                            'capacity' => $item->capacity,
                            'size' => $item->size,
                        ]);
                    }
                }
    
                // Xóa đơn hàng và thông tin vận chuyển
                Shipping::where('order_id', $orderId)->delete();
                $order->delete();
                
                DB::commit();
    
                return redirect()->route('home')->with('error', 'Thanh toán không thành công hoặc đã bị hủy!');
            } else {
                // Thanh toán thành công
             
    
               
                    // Lưu thông tin thanh toán vào cơ sở dữ liệu
                    VNpayment::create([
                        'vnp_Amount' => $data['vnp_Amount'],
                        'vnp_BankCode' => $data['vnp_BankCode'],
                        'vnp_BankTranNo' => $data['vnp_BankTranNo'],
                        'vnp_CardType' => $data['vnp_CardType'],
                        'vnp_OrderInfo' => $data['vnp_OrderInfo'],
                        'vnp_PayDate' => $data['vnp_PayDate'],
                        'vnp_ResponseCode' => $data['vnp_ResponseCode'],
                        'vnp_TmnCode' => $data['vnp_TmnCode'],
                        'vnp_TransactionNo' => $data['vnp_TransactionNo'],
                        'vnp_TransactionStatus' => $data['vnp_TransactionStatus'],
                        'vnp_TxnRef' => $data['vnp_TxnRef'],
                        'vnp_SecureHash' => $data['vnp_SecureHash'],
                    ]);
    
                    // Gửi email qua hàng đợi
                    $orderItem = Order_items::where('order_id', $orderId)->get();
                    $shipping = Shipping::where('order_id', $orderId)->get();
                    $orderItemsData = $orderItem->map(function ($item) {
                        $product = Product::find($item->product_id);
                        $color = Color::find($item->color_id);
                        $priceAfterDiscount = $item->price;
    
                        return (object) [
                            'order_id' => $item->order_id,
                            'product_id' => $item->product_id,
                            'product_name' => $product->product_name,
                            'color_id' => $item->color_id,
                            'color_name' => $color ? $color->color_name : null,
                            'capacity' => $item->capacity,
                            'size' => $item->size,
                            'price' => $priceAfterDiscount,
                            'quantity' => $item->quantity,
                        ];
                    });
    
                    $shippingCost = $shipping->sum('shipping_price');
                    Mail::to($order->email)->queue(new OrderPlaced($order, $orderItemsData, $shippingCost));
                
    
                DB::commit();
                if (!Auth::check()) {
                    // Xóa giỏ hàng trong session cho người dùng chưa đăng nhập
                    session()->forget('cart');
                }
                return redirect()->route('home')->with('success', 'Đặt hàng thành công!');
            }
    
        } catch (\Exception $e) {
            DB::rollback();
            // Log lỗi hoặc xử lý lỗi khác
            return redirect()->route('home')->with('error', 'Đã xảy ra lỗi trong quá trình xử lý thanh toán.');
        }
    }
    
    
    // app/Http/Controllers/PaymentController.php
    public function cleanup($id)
    {
        $order = Orders::find($id);
        if ($order) {
            // Xóa các bản ghi liên quan đến đơn hàng
            Shipping::where('order_id', $id)->delete();
            $order->delete();
            Order_items::where('order_id', $id)->update(['order_id' => null]);

            // Cập nhật lại giỏ hàng trong session nếu người dùng chưa đăng nhập
            if (!Auth::check()) {
                $cartItems = Order_items::where('order_id', $id)->get();
                foreach ($cartItems as $item) {
                    session()->push('cart.' . $item->product_id, [
                        'quantity' => $item->quantity,
                        'color_id' => $item->color_id,
                        'capacity' => $item->capacity,
                        'size' => $item->size,
                    ]);
                }
            }
        }

        return redirect()->route('home')->with('error', 'Thanh toán không thành công hoặc đã bị hủy!');
    }
    
    
    
}
