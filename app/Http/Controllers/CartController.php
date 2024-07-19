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
use App\Models\ShippingMethods;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Thêm use statement cho DB facade

use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Transaction;

class CartController extends Controller
{
    public $data = [];
    public function index()
    {
        $this->data['title'] = 'Trang giỏ hàng';
        $cart = [];
        $cartCount = 0;  
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = $cartItems->count();
            foreach ($cartItems as $item) {
                $product = Product::find($item->product_id);              
                if ($product) {
                    $color = Color::find($item->color_id);
                    $quantity = Quantity::where('product_id', $item->product_id)
                                        ->where('color_id', $item->color_id)
                                        ->where('capacity', $item->capacity)
                                        ->where('size', $item->size)
                                        ->first();
                    $cart[] = [
                        "id" => $item->product_id,
                        "name" => $product->product_name,
                        "quantity" => $item->quantity,                       
                        "image" => $product->url_name,
                        "color_id" => $color ? $color->color_id : null,
                        "color_name" => $color ? $color->color_name : null,
                        "capacity" => $quantity ? $quantity->capacity : null,
                        "size" => $quantity ? $quantity->size : null,
                        "price" => $quantity ? $quantity->price : null,
                    ];
                }
            }
        } else {
            // If the user is not logged in, use the session to get the cart items
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }   
        $category1 = Category::whereNotNull('component_id')->get();
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();   
        return view('clients.cart2', $this->data, compact('cart', 'cartCount', 'category2', 'brand1', 'category1'));
    }
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:product,product_id',
            'color_id' => 'nullable|exists:color,color_id',
            'capacity' => 'nullable',
            'size' => 'nullable'
        ]);
    
        $product = Product::find($request->input('product_id'));
        $colorId = $request->input('color_id') ?? null;
        $capacities = $request->input('capacity') ?? null;
        $size = $request->input('size') ?? null;
        $color = $colorId ? Color::find($colorId) : null;
    
        $quantityQuery = Quantity::where('product_id', $product->product_id);
    
        if ($colorId) {
            $quantityQuery->where('color_id', $colorId);
        } else {
            $quantityQuery->whereNull('color_id');
        }
    
        if ($capacities) {
            $quantityQuery->where('capacity', $capacities);
        } else {
            $quantityQuery->whereNull('capacity');
        }
    
        if ($size) {
            $quantityQuery->where('size', $size);
        } else {
            $quantityQuery->whereNull('size');
        }
    
        $quantity = $quantityQuery->first();
    
        if (!$quantity || $quantity->quantity_product <= 0) {
            return redirect()->back()->with('error', 'Sản phẩm đã hết hàng!');
        }
    
        $alreadyInCart = false;
    
        if (Auth::check()) {
            $cartItemQuery = Order_items::where('user_id', Auth::id())
                ->whereNull('order_id')
                ->where('product_id', $product->product_id);
    
            if ($color) {
                $cartItemQuery->where('color_id', $color->color_id);
            } else {
                $cartItemQuery->whereNull('color_id');
            }
    
            if ($capacities) {
                $cartItemQuery->where('capacity', $capacities);
            } else {
                $cartItemQuery->whereNull('capacity');
            }
    
            if ($size) {
                $cartItemQuery->where('size', $size);
            } else {
                $cartItemQuery->whereNull('size');
            }
    
            $cartItem = $cartItemQuery->first();
    
            if ($cartItem) {
                $cartItem->quantity++;
                $cartItem->save();
                $alreadyInCart = true;
            } else {
                Order_items::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->product_id,
                    'product_name' => $product->product_name,
                    'quantity' => 1,
                    'color_id' => $color ? $color->color_id : null,
                    'color_name' => $color ? $color->color_name : null,
                    'capacity' => $capacities,
                    'size' => $size,
                    'price' => $quantity->price,
                ]);
            }
        } else {
            $cart = session()->get('cart', []);
            $cartKey = $product->product_id 
                    . ($color ? '_' . $color->color_id : '') 
                    . ($capacities ? '_' . $capacities : '') 
                    . ($size ? '_' . $size : '');
    
            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['quantity']++;
                $alreadyInCart = true;
            } else {
                $cart[$cartKey] = [
                    "id" => $product->product_id,
                    "name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $quantity->price,
                    "image" => $product->url_name,
                    "color_id" => $color ? $color->color_id : null,
                    "color_name" => $color ? $color->color_name : null,
                    "capacity" => $capacities,
                    "size" => $size,
                ];
            }
            session()->put('cart', $cart);
        }
    
        return response()->json(['success' => true, 'already_in_cart' => $alreadyInCart]);
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:product,product_id',
            'color_id' => 'nullable|exists:color,color_id',
            'color_name' => 'nullable',
            'capacity' => 'nullable',
            'size' => 'nullable',
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
    
            if ($request->capacity) {
                $cartItemQuery->where('capacity', $request->capacity);
            } else {
                $cartItemQuery->whereNull('capacity');
            }
    
            if ($request->size) {
                $cartItemQuery->where('size', $request->size);
            } else {
                $cartItemQuery->whereNull('size');
            }
    
            $cartItem = $cartItemQuery->first();
    
            if ($cartItem) {
                $quantity = Quantity::where('product_id', $request->input('product_id'))
                    ->where('color_id', $cartItem->color_id)
                    ->where('capacity', $cartItem->capacity)
                    ->where('size', $cartItem->size)
                    ->first();
    
                if (!$quantity) {
                    return response()->json(['success' => false, 'message' => 'Không tìm thấy thông tin sản phẩm trong kho!']);
                }
    
                $cartItem->quantity = $request->quantity;
                $cartItem->price = $quantity->price;
                $cartItem->save();
    
                // Calculate the new subtotal and total
                $itemSubtotal = \App\Helpers\NumberHelper::formatCurrency($cartItem->quantity * $cartItem->price);
                $total = Order_items::where('user_id', Auth::id())->whereNull('order_id')->sum(\DB::raw('quantity * price'));
                $totalFormatted = \App\Helpers\NumberHelper::formatCurrency($total);
    
                return response()->json(['success' => true, 'message' => 'Cập nhật giỏ hàng thành công!', 'itemSubtotal' => $itemSubtotal, 'total' => $totalFormatted]);
            } else {
                return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng!']);
            }
        } else {
            $cart = session()->get('cart', []);
            $cartKey = $request->product_id 
                    . ($request->color_id ? '_' . $request->color_id : '') 
                    . ($request->capacity ? '_' . $request->capacity : '') 
                    . ($request->size ? '_' . $request->size : '');
    
            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
    
                // Calculate the new subtotal and total
                $itemSubtotal = \App\Helpers\NumberHelper::formatCurrency($cart[$cartKey]['quantity'] * $cart[$cartKey]['price']);
                $total = array_reduce($cart, function($carry, $item) {
                    return $carry + ($item['quantity'] * $item['price']);
                }, 0);
                $totalFormatted = \App\Helpers\NumberHelper::formatCurrency($total);
    
                return response()->json(['success' => true, 'message' => 'Cập nhật giỏ hàng thành công!', 'itemSubtotal' => $itemSubtotal, 'total' => $totalFormatted]);
            } else {
                return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng!']);
            }
        }
    }
    
    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:product,product_id',
            'color_id' => 'nullable|exists:color,color_id',
            'capacity' => 'nullable',
            'size' => 'nullable'
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
    
            if ($request->capacity) {
                $cartItemQuery->where('capacity', $request->capacity);
            } else {
                $cartItemQuery->whereNull('capacity');
            }
    
            if ($request->size) {
                $cartItemQuery->where('size', $request->size);
            } else {
                $cartItemQuery->whereNull('size');
            }
    
            $cartItem = $cartItemQuery->first();
    
            if ($cartItem) {
                $cartItem->delete();
    
                // Calculate the new total
                $total = Order_items::where('user_id', Auth::id())->whereNull('order_id')->sum(\DB::raw('quantity * price'));
                $totalFormatted = \App\Helpers\NumberHelper::formatCurrency($total);
    
                return response()->json(['success' => true, 'message' => 'Xóa sản phẩm trong giỏ hàng thành công!', 'total' => $totalFormatted]);
            } else {
                return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng!']);
            }
        } else {
            $cart = session()->get('cart', []);
            $cartKey = $request->product_id
                . ($request->color_id ? '_' . $request->color_id : '')
                . ($request->capacity ? '_' . $request->capacity : '')
                . ($request->size ? '_' . $request->size : '');
    
            if (isset($cart[$cartKey])) {
                unset($cart[$cartKey]);
                session()->put('cart', $cart);
    
                // Calculate the new total
                $total = array_reduce($cart, function($carry, $item) {
                    return $carry + ($item['quantity'] * $item['price']);
                }, 0);
                $totalFormatted = \App\Helpers\NumberHelper::formatCurrency($total);
    
                return response()->json(['success' => true, 'message' => 'Xóa sản phẩm trong giỏ hàng thành công!', 'total' => $totalFormatted]);
            } else {
                return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng!']);
            }
        }
    }
    
    public function clear()
    {
        if (Auth::check()) {
            Order_items::where('user_id', Auth::id())->whereNull('order_id')->delete();
        } else {
            session()->forget('cart');
        }
    
        return response()->json(['success' => true, 'message' => 'Xóa tất cả sản phẩm trong giỏ hàng thành công!', 'total' => \App\Helpers\NumberHelper::formatCurrency(0)]);
    }
    
    public function CartOrder()
{
    $this->data['title'] = 'Đặt hàng';
    $cartItems = [];
    $totalPrice = 0;
    $cartCount = 0;
    $user = null;
    $shippingmethods = ShippingMethods::all();
    if (Auth::check()) {
        $user = Auth::user(); // Get authenticated user
        $userId = Auth::id();
        $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
        $cartCount = $cartItems->count();  // Correctly set cart count
        foreach ($cartItems as $item) {
            $product = Product::find($item->product_id);
            if ($product) {
                // Find the corresponding color
                $color = Color::find($item->color_id);
                $quantity = Quantity::where('product_id', $item->product_id)
                    ->where('color_id', $item->color_id)
                    ->where('capacity', $item->capacity)
                    ->where('size', $item->size)
                    ->first();

                if ($quantity) {
                    $totalPrice += $item->quantity * $quantity->price;
                    $item->product = $product; // Attach product to item
                    $item->price = $quantity->price; // Attach price to item
                    $item->capacity = $quantity->capacity;
                    $item->size = $quantity->size;
                    $item->color_name = $color ? $color->color_name : null;
                } else {
                    // If quantity not found, assign default values or handle error
                    $item->price = 0;
                    $item->color_name = null;
                    $item->capacity = null;
                    $item->size = null;
                }
            }
        }
    } else {
        // Handle the cart for non-logged-in users
        $cart = session()->get('cart', []);
        foreach ($cart as $cartKey => $item) {
            $productId = explode('_', $cartKey)[0];
            $product = Product::find($productId);
            if ($product) {
                $color = Color::find($item['color_id']);
                $quantity = Quantity::where('product_id', $productId)
                    ->where('color_id', $item['color_id'])
                    ->where('capacity', $item['capacity'])
                    ->where('size', $item['size'])
                    ->first();
                if ($quantity) {
                    $totalPrice += $item['quantity'] * $quantity->price;
                    $cartItems[] = (object)[
                        'product' => $product,
                        'quantity' => $item['quantity'],
                        'price' => $quantity->price,
                        'capacity' => $quantity->capacity,
                        'size' => $quantity->size,
                        'color_id' => $item['color_id'] ?? null,
                        'color_name' => $color ? $color->color_name : null,
                    ];
                } else {
                    $cartItems[] = (object)[
                        'product' => $product,
                        'quantity' => $item['quantity'],
                        'price' => 0,
                        'capacity' => null,
                        'size' => null,
                        'color_id' => $item['color_id'] ?? null,
                        'color_name' => null,
                    ];
                }
            }
        }
        $cartCount = count($cart);
    }
    $category1 = Category::whereNotNull('component_id')->get();
    $category2 = Category::whereNull('component_id')->get();
    $brand1 = Brand::whereNotNull('category_id')->get();
    return view('clients.order', array_merge($this->data, compact('cartItems', 'totalPrice', 'cartCount', 'user', 'category1', 'category2', 'brand1','shippingmethods')));
}
public function placeOrder(Request $request)
{
    // Bắt đầu một giao dịch
    DB::beginTransaction();
    Stripe::setApiKey(env('STRIPE_SECRET'));

    $token = $request->stripeToken;
    try {   

        

        $totalPrice = 0;
        $cartItems = [];
        if (Auth::check()) {
            // Xử lý khi người dùng đã đăng nhập
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            // Tạo đơn hàng mới cho người dùng đã đăng nhập
            $order = Orders::create([
                'user_id' => $userId,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'sdt' => $request->input('sdt'),
                'address' => $request->input('address'),
                'total_price' => $totalPrice,
                'shipping_methods_id' => $request->input('shipping'), // Lưu shipping_methods_id
                // Các trường khác như created_at, updated_at sẽ tự động được điền
            ]);
        } else {
            // Xử lý khi người dùng chưa đăng nhập
            $cart = session()->get('cart', []);
            // Tạo đơn hàng mới cho người dùng chưa đăng nhập
            $order = Orders::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'sdt' => $request->input('sdt'),
                'address' => $request->input('address'),
                'total_price' => $totalPrice,
                'shipping_methods_id' => $request->input('shipping'), // Lưu shipping_methods_id
                // Các trường khác như created_at, updated_at sẽ tự động được điền
            ]);
            
            foreach ($cart as $cartKey => $item) {
                $productId = explode('_', $cartKey)[0];
                $cartItems[] = (object)[
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'color_id' => $item['color_id'] ?? null,
                    'capacity' => $item['capacity'] ?? null,
                    'size' => $item['size'] ?? null,
                ];
            }
        }

         // /////////////////
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
            'order_id' => $order->order_id,
            'transaction_id' => $charge->id,
            'amount' => $charge->amount,
            'currency' => $charge->currency,
            'status' => $charge->status,
        ]);
        // /////////////////

        // Duyệt qua từng sản phẩm trong giỏ hàng
        foreach ($cartItems as $item) {
            // Tìm số lượng đúng với product_id, color_id và capacity từ bảng Quantity
            $quantity = Quantity::where('product_id', $item->product_id)
                ->where('color_id', $item->color_id)
                ->where('capacity', $item->capacity)
                ->where('size', $item->size)
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
                    return redirect()->route('home')->with('error', 'Sản phẩm ' . $item->product->product_name . ' hiện tại đã hết hàng!');
                }
            } else {
                // Nếu không tìm thấy số lượng, rollback giao dịch và thông báo lỗi
                DB::rollback();
                return redirect()->route('home')->with('error', 'Sản phẩm ' . $item->product->product_name . ' hiện tại đã hết hàng!');
            }
            // Cập nhật order_id trong Order_items hoặc thêm mới cho khách hàng chưa đăng nhập
            $product = Product::find($item->product_id);
            $color = Color::find($item->color_id);
            $orderItemData = [
                'order_id' => $order->order_id,
                'product_id' => $item->product_id,
                'product_name' => $product->product_name,
                'color_id' => $item->color_id,
                'color_name' => $color ? $color->color_name : null,
                'capacity' => $item->capacity,
                'size' => $item->size,
                'price' => $quantity->price,
                'quantity' => $item->quantity,
            ];
            if (Auth::check()) {
                $orderItem = Order_items::where('user_id', Auth::id())
                    ->where('product_id', $item->product_id)
                    ->whereNull('order_id')
                    ->first();
                if ($orderItem) {
                    $orderItem->update($orderItemData);
                }
            } else {
                Order_items::create($orderItemData);
            }
            // Tính tổng giá của đơn hàng
            $totalPrice += $item->quantity * $quantity->price;
        }
        // Cập nhật tổng giá cho đơn hàng
        $order->total_price = $totalPrice;
        $order->save();
        // Commit giao dịch
        DB::commit();
        if (!Auth::check()) {
            // Xóa giỏ hàng trong session cho người dùng chưa đăng nhập
            session()->forget('cart');
        }
        return redirect()->route('home')->with('success', 'Đặt hàng thành công!');
    } catch (\Exception $e) {
        // Nếu có lỗi xảy ra, rollback giao dịch
        DB::rollback();
        return redirect()->route('cartorder.index')->with('error', 'Đã xảy ra lỗi, vui lòng thử lại sau.');
    }
}
}
