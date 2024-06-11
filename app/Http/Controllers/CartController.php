<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Img;
use App\Models\Color;
use App\Models\Order_items;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public $data =[];

    public function index()
    {
        $this->data['title'] = 'Trang giỏ hàng';
        // $cart = Auth::check() ? Order_items::where('user_id', Auth::id())->get() : session()->get('cart', []);
        // return view('clients.cart1',$this->data, compact('cart'));

        $cart = [];
        $img2 = [];
        $color2 = [];
    
        if (Auth::check()) {
            $cart = Auth::user()->cartItems;
        } else {
            $cart = session()->get('cart', []);
            
            // Lấy ảnh sản phẩm từ bảng img cho mỗi sản phẩm trong giỏ hàng
            foreach ($cart as $id => $details) {
                $img2[$id] = Img::where('product_id', $id)->first();
                $color2[$id] = Color::where('product_id', $id)->first();
            }
        }
        return view('clients.cart1',$this->data, compact('cart', 'img2','color2'));
    }
    public function add(Request $request)
    {
        $product = Product::find($request->input('product_id'));
        $img = Img::where('product_id', $request->input('product_id'))->first();
        if (Auth::check()) {
            $cartItem = Order_items::where('user_id', Auth::id())
                ->where('product_id', $product->product_id)
                ->first();

            if ($cartItem) {
                $cartItem->quantity++;
                $cartItem->save();
            } else {
                Order_items::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->product_id,
                    'quantity' => 1,
                ]);
            }
        } else {
            $cart = session()->get('cart', []);
            
            if(isset($cart[$product->product_id])) {
                $cart[$product->product_id]['quantity']++;
            } else {
                $cart[$product->product_id] = [
                    "name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->product_name
                ];
            }

            session()->put('cart', $cart);
        }
        return redirect()->back()->with('status', 'Thêm vào giỏ hàng thành công!');
    }
    public function update(Request $request)
    {
        if (Auth::check()) {
            $cartItem = Order_items::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->first();
            if ($cartItem) {
                $cartItem->quantity = $request->quantity;
                $cartItem->save();
            }
        } else {
            if($request->product_id && $request->quantity) {
                $cart = session()->get('cart');
                $cart[$request->product_id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Cập nhật giỏ hàng thành công!');
            }
        }
        return redirect()->back(); // Redirect ngược lại trang trước sau khi cập nhật giỏ hàng

    }

    public function remove(Request $request)
    {
        if (Auth::check()) {
            Order_items::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->delete();
        } else {
            if($request->product_id) {
                $cart = session()->get('cart');
                if(isset($cart[$request->product_id])) {
                    unset($cart[$request->product_id]);
                    session()->put('cart', $cart);
                }
                session()->flash('success', 'Xóa sản phẩm trong giỏ hàng thành công!');
            }
        }
        return redirect()->back(); // Redirect ngược lại trang trước sau khi cập nhật giỏ hàng
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
}
