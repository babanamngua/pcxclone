<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Img;
use App\Models\Color;
use App\Models\Orders;
use App\Models\Order_items;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Thêm use statement cho DB facade

class CartController extends Controller
{
    public $data = [];

    public function index()
    {
        $this->data['title'] = 'Trang giỏ hàng';
        $cart = [];
        $cartCount = 0;
    
        if (Auth::check()) {
            // Nếu người dùng đã đăng nhập, lấy dữ liệu từ Order_items
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = $cartItems->count();
            foreach ($cartItems as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $color = Color::find($item->color_id);
                    $cart[] = [
                        "id" => $item->product_id,
                        "name" => $product->product_name,
                        "quantity" => $item->quantity,
                        "price" => $product->price,
                        "image" => $product->url_name,
                        "color_id" => $color ? $color->color_id : null,
                        "color_name" => $color ? $color->color_name : null
                    ];
                }
            }
        } else {
            // Nếu người dùng chưa đăng nhập, sử dụng session để lấy các mục giỏ hàng
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
    
        // Truyền các biến tới view
        return view('clients.cart2', $this->data, compact('cart', 'cartCount'));
    }
    


    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:product,product_id',
            'color_id' => 'nullable|exists:color,color_id' // allow color_id to be nullable
        ]);
    
        $product = Product::find($request->input('product_id'));
        $colorId = $request->input('color_id');
        $color = $colorId ? Color::find($colorId) : null;
    
        if (Auth::check()) {
            $cartItemQuery = Order_items::where('user_id', Auth::id())
                ->whereNull('order_id')
                ->where('product_id', $product->product_id);
    
            if ($color) {
                $cartItemQuery->where('color_id', $color->color_id);
            } else {
                $cartItemQuery->whereNull('color_id');
            }
    
            $cartItem = $cartItemQuery->first();
    
            if ($cartItem) {
                $cartItem->quantity++;
                $cartItem->save();
            } else {
                Order_items::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->product_id,
                    'quantity' => 1,
                    'color_id' => $color ? $color->color_id : null,
                    "price" => $product->price,
                ]);
            }
        } else {
            // Xử lý thêm vào giỏ hàng khi chưa đăng nhập (tạm thời không thay đổi)
            $cart = session()->get('cart', []);
            $cartKey = $product->product_id . ($color ? '_' . $color->color_id : '');
    
            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['quantity']++;
            } else {
                $cart[$cartKey] = [
                    "name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->url_name,
                    "color_id" => $color ? $color->color_id : null,
                    "color_name" => $color ? $color->color_name : null
                ];
            }
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('status', 'Thêm vào giỏ hàng thành công!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:product,product_id',
            'color_id' => 'nullable|exists:color,color_id', // allow color_id to be nullable
            'quantity' => 'required|integer|min:1'
        ]);
    
        if (Auth::check()) {
            $cartItemQuery = Order_items::where('user_id', Auth::id())
                ->whereNull('order_id')
                ->where('product_id', $request->product_id);
    
            if ($request->color_id) {
                $cartItemQuery->where('color_id', $request->color_id);
            } else {
                $cartItemQuery->whereNull('color_id');
            }
    
            $cartItem = $cartItemQuery->first();
            
            if ($cartItem) {
                $cartItem->quantity = $request->quantity;
                // Lấy giá sản phẩm từ cơ sở dữ liệu và cập nhật lại giá trị price
                $product = Product::find($cartItem->product_id);
                $cartItem->price = $product->price;
                $cartItem->save();
                return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công!');
            } else {
                return redirect()->back()->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng!');
            }
        } else {
                        // Xử lý thêm vào giỏ hàng khi chưa đăng nhập (tạm thời không thay đổi)
            $cartKey = $request->product_id . ($request->color_id ? '_' . $request->color_id : '');
            $cart = session()->get('cart', []);
    
            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công!');
            } else {
                return redirect()->back()->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng!');
            }
        }
    }
    
    

    public function remove(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:product,product_id',
        'color_id' => 'nullable|exists:color,color_id' // allow color_id to be nullable
    ]);

    if (Auth::check()) {
        $cartItemQuery = Order_items::where('user_id', Auth::id())
            ->whereNull('order_id')
            ->where('product_id', $request->product_id);

        if ($request->color_id) {
            $cartItemQuery->where('color_id', $request->color_id);
        } else {
            $cartItemQuery->whereNull('color_id');
        }

        $cartItem = $cartItemQuery->first();
    
        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Xóa sản phẩm trong giỏ hàng thành công!');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng!');
        }
    } else {
        $cartKey = $request->product_id . ($request->color_id ? '_' . $request->color_id : '');
        $cart = session()->get('cart', []);

        if (isset($cart[$cartKey])) {
            unset($cart[$cartKey]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Xóa sản phẩm trong giỏ hàng thành công!');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng!');
        }
    }
}


    public function clear()
    {
        if (Auth::check()) {
            Order_items::where('user_id', Auth::id())->delete();
        } else {
            session()->forget('cart');
        }
        return redirect()->route('cart.index')->with('success', 'Xóa tất cả sản phẩm trong giỏ hàng thành công!');
    }
    public function order()
    {
        $this->data['title'] = 'Thanh toán';
        $cartItems = [];
        $totalPrice = 0;
        $cartCount = 0;
        $user = null;
    
        if (Auth::check()) {
            $user = Auth::user(); // Get authenticated user
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = $cartItems->count();  // Correctly set cart count
    
            foreach ($cartItems as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $totalPrice += $item->quantity * $product->price;
                    $item->product = $product; // Attach product to item
                    // Tìm màu tương ứng
                    $color = Color::find($item->color_id);
                    $item->color_name = $color ? $color->color_name : null;
                }
            }
        } else {
            // Xử lý giỏ hàng cho người dùng chưa đăng nhập
            $cart = session()->get('cart', []);
    
            foreach ($cart as $cartKey => $item) {
                $productId = explode('_', $cartKey)[0];
                $product = Product::find($productId);
                if ($product) {
                    $totalPrice += $item['quantity'] * $product->price;
                    // Tìm màu tương ứng
                    $color = Color::find($item['color_id']);
                    $cartItems[] = (object)[
                        'product' => $product,
                        'quantity' => $item['quantity'],
                        'price' => $product->price,
                        "color_id" => $item['color_id'] ?? null,
                        'color_name' => $color ? $color->color_name : null // Attach color name if available
                    ];
                }
            }
            $cartCount = count($cart);  // Set cart count for guest users
        }
    
        return view('clients.order', array_merge($this->data, compact('cartItems', 'totalPrice', 'cartCount', 'user')));
    }
    
    


public function placeOrder(Request $request)
{
    if (Auth::check()) {
        $userId = Auth::id();
        $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
        $totalPrice = 0;

        // Tạo một mảng để lưu thông tin chi tiết đơn hàng với màu
        $orderDetails = [];

        foreach ($cartItems as $item) {
            $product = Product::find($item->product_id);
            // Tính tổng giá của đơn hàng
            $totalPrice += $item->quantity * $product->price;
        }

        // Bắt đầu một giao dịch
        DB::beginTransaction();
        try {

            // Tạo đơn hàng mới
            $order = Orders::create([
                'user_id' => $userId,
                'total_price' => $totalPrice,
                // Các trường khác như created_at, updated_at sẽ tự động được điền
            ]);

           // Cập nhật các mục giỏ hàng để thêm order_id
            foreach ($cartItems as $item) {
                $item->order_id = $order->order_id;
                $item->save();

                // Giảm số lượng sản phẩm trong bảng Product
                $product = Product::find($item->product_id);
                $product->quantity -= $item->quantity;
                $product->save();
            }

            // Commit giao dịch
            DB::commit();

            return redirect()->route('order.index')->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, rollback giao dịch
            DB::rollback();
            return redirect()->route('order.index')->with('error', 'Đã xảy ra lỗi, vui lòng thử lại sau.');
        }
    } else {
        // Xử lý khi người dùng chưa đăng nhập
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để đặt hàng.');
    }
}

}
