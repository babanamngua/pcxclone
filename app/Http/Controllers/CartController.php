<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Img;
use App\Models\Color;
use App\Models\Quantity;
use App\Models\Orders;
use App\Models\Order_items;
use App\Models\Category;
use App\Models\Brand;
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
        $category1 = Category::whereNotNull('component_id')->get();
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();
        // Truyền các biến tới view
        return view('clients.cart2', $this->data, compact('cart', 'cartCount','category2','brand1','category1'));
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
        $quantity = Quantity::where('product_id',$request->input('product_id'))->first();

          // Kiểm tra nếu số lượng sản phẩm là 0 hoặc hết hàng
          if (!$quantity || $quantity->quantity_product <= 0) 
          {
            return redirect()->back()->with('error', 'Sản phẩm đã hết hàng!');
            }
        if (Auth::check()) {
            $cartItemQuery = Order_items::where('user_id', Auth::id())
                ->whereNull('order_id')
                ->where('product_id', $product->product_id);
    
            if($color) 
            {
                $cartItemQuery->where('color_id', $color->color_id);
            } else {
                $cartItemQuery->whereNull('color_id');
            }
    
            $cartItem = $cartItemQuery->first();
    
            if ($cartItem)
            {
                $cartItem->quantity++;
                $cartItem->save();
            }else
            {
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
        $category1 = Category::whereNotNull('component_id')->get();
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();
        return view('clients.order', array_merge($this->data, compact('cartItems', 'totalPrice', 'cartCount', 'user','category1','category2','brand1')));
    }
    
    


    public function placeOrder(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $totalPrice = 0;
    
            // Bắt đầu một giao dịch
            DB::beginTransaction();
            try {
                // Tạo đơn hàng mới
                $order = Orders::create([
                    'user_id' => $userId,
                    'total_price' => $totalPrice,
                    // Các trường khác như created_at, updated_at sẽ tự động được điền
                ]);
    
                // Duyệt qua từng sản phẩm trong giỏ hàng
                foreach ($cartItems as $item) {
                    // Tìm số lượng đúng với product_id và color_id từ bảng Quantity
                    $quantity = Quantity::where('product_id', $item->product_id)
                        ->where('color_id', $item->color_id)
                        ->first();
    
                    // Nếu có số lượng trong bảng Quantity, cập nhật số lượng
                    if ($quantity) {
                        // Kiểm tra xem số lượng còn đủ để đặt hàng hay không
                        if ($quantity->quantity_product >= $item->quantity) {
                            $quantity->quantity_product -= $item->quantity;
                            $quantity->save();
                        } else {
                            // Nếu số lượng không đủ, rollback giao dịch và thông báo lỗi
                            DB::rollback();
                            return redirect()->route('order.index')->with('error', 'Sản phẩm ' . $item->product->product_name . ' màu ' . $item->color->color_name . ' hiện tại đã hết hàng!');
                        }
                    } else {
                        // Nếu không tìm thấy số lượng, rollback giao dịch và thông báo lỗi
                        DB::rollback();
                        return redirect()->route('order.index')->with('error', 'Sản phẩm ' . $item->product->product_name . ' màu ' . $item->color->color_name . ' hiện tại đã hết hàng!');
                    }
                    // Cập nhật order_id trong Order_items
                    $item->order_id = $order->order_id;
                    $item->save();
                    
                    // Tính tổng giá của đơn hàng
                    $product = Product::find($item->product_id);
                    $totalPrice += $item->quantity * $product->price;
                }
    
                // Cập nhật tổng giá cho đơn hàng
                $order->total_price = $totalPrice;
                $order->save();
    
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
