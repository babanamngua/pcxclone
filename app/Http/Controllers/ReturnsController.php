<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Order_items;
use App\Models\Product;
use App\Models\Color;
use App\Models\Quantity;
use App\Models\Discount;
use App\Models\ReturnItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReturnsController extends Controller
{
    public $data =[];
    public function index()
    {
        $this->data['title'] = "Trang đổi, trả sản phẩm";
        $orders = Orders::orderBy('created_at', 'desc')->get();
        $orderitem = Order_items::all();
        return view('admin.return_items.list_return_items', $this->data, compact('orders', 'orderitem'));
    }
    public function doiItem($id)
    {
        $this->data['title'] = "Trang đổi sản phẩm";
        $order = Orders::findOrFail($id);
        $orderitem = Order_items::where('order_id',$id)->get();
        $orderitemAll = Order_items::all();
        $retune = ReturnItem::where('order_id',$id)->get();
        $products = Product::all();
    
        // Initialize $color1 as an empty array
        $color1 = [];
        $quantitiesData = [];
    
        foreach ($products as $product) {
            $color1[$product->product_id] = Color::where('product_id', $product->product_id)->get();
        }
        foreach ($products as $product) {
            $quantitiesData[$product->product_id] = [];
            $quantities = Quantity::where('product_id', $product->product_id)->get();
    
            foreach ($quantities as $quantity) {
                $colorId = $quantity->color_id ?? null;
                // $colorId = $quantity->color_id;
                $capacity = $quantity->capacity ?? null;
                // $capacity = $quantity->capacity;
                $size = $quantity->size ?? null;
    
                if (!isset($quantitiesData[$product->product_id][$colorId])) {
                    $quantitiesData[$product->product_id][$colorId] = [];
                }
    
                if (!isset($quantitiesData[$product->product_id][$colorId][$capacity])) {
                    $quantitiesData[$product->product_id][$colorId][$capacity] = [];
                }
    
                $quantitiesData[$product->product_id][$colorId][$capacity][$size] = $quantity->price;
            }
        }
        
        return view('admin.return_items.list_doi_item', $this->data, compact('order', 'orderitem','products','color1','quantities','quantitiesData','retune','orderitemAll'));
    }
    public function add(Request $request,$id)
    {
        $request->validate([
            'product_id' => 'required|exists:product,product_id',
            'color_id' => 'nullable|exists:color,color_id',
            'capacity' => 'nullable',
            'size' => 'nullable',
            'quantity_product' => 'required|integer|min:1|max:100', // Validate quantity_product
            'quantity' => 'required',
            'exchange_quantity' => 'required',
        ]);
    
        $product = Product::find($request->input('product_id'));
        $colorId = $request->input('color_id') ?? null;
        $capacities = $request->input('capacity') ?? null;
        $size = $request->input('size') ?? null;
        $color = $colorId ? Color::find($colorId) : null;
        $quantity_product = $request->input('quantity_product'); // Get the quantity_product from the request
    
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
    
        $price = $quantity->price;
        $priceAfterDiscount = $price;

        if ($quantity->discount_id) {
            $discount = Discount::find($quantity->discount_id);
            // if ($discount && now()->between($discount->start_date, $discount->end_date)) {
                $priceAfterDiscount = $price - ($price * ($discount->value / 100));
            // }
        }
                $oRo = Order_items::create([
                    'product_id' => $product->product_id,
                    'product_name' => $product->product_name,
                    'quantity' => $quantity_product,
                    'color_id' => $color ? $color->color_id : null,
                    'color_name' => $color ? $color->color_name : null,
                    'capacity' => $capacities,
                    'size' => $size,
                    'price' => $priceAfterDiscount, // Use discounted price here
                ]);
                 // Tìm các mục trả lại liên quan đến order_id
        $retune = ReturnItem::where('order_id', $id)
        ->where('order_item_id', $request->input('exchange_order_items_id'))
        ->first();

    // Nếu không tìm thấy, tức là mục này chưa tồn tại, thì mới tạo mới
    if (!$retune) {
                ReturnItem::create([
                    'order_id' => $id,
                    'order_item_id' => $request->input('order_items_id'),
                    'product_id' => $product->product_id,
                    'quantity' => $request->input('quantity'),
                    'new' => 1,
                    'exchange_order_item_id' => $oRo->order_item_id,
                    'exchange_quantity' => $request->input('exchange_quantity'),
                ]);
                return redirect()->back()->with('status', 'Thành công!');
            } else {
                // Nếu đã tồn tại, có thể trả về một thông báo khác (tuỳ thuộc vào logic bạn muốn)
                return redirect()->back()->with('error', 'Sản phẩm này đã tồn tại bên đơn trả sản phẩm.');
            }
    }
    public function watchdoiItem($id)
    {
        $this->data['title'] = "Trang đổi sản phẩm";
        $order = Orders::findOrFail($id);
        $orderitem = Order_items::where('order_id',$id)->get();
        $orderitemAll = Order_items::all();
        $retune = ReturnItem::where('order_id',$id)->where('new',1)->get();
        return view('admin.return_items.xem_doi_item', $this->data, compact('order', 'orderitem','retune','orderitemAll'));
    }
    public function doiTtemdestroy($id)
    {
        $retune = ReturnItem::findOrFail($id);
        $orderitem = Order_items::where('order_item_id',$retune->exchange_order_item_id)->get();
        if($orderitem){
            foreach ($orderitem as $orderitems) {
                // Xóa bản ghi màu từ cơ sở dữ liệu
                $orderitems->delete();
            }}
        $retune->delete();
        return redirect()->back()->with('success', 'Thành công!');
    }
    

    public function traItem($id)
    {
        $this->data['title'] = "Trang trả sản phẩm";
        $order = Orders::findOrFail($id);
        $orderitem = Order_items::where('order_id',$id)->get();
        return view('admin.return_items.list_tra_item', $this->data, compact('order', 'orderitem'));
    }
    public function tra(Request $request, $id)
    {
        $request->validate([
            'exchange_quantity' => 'required',
        ]);
        // Tìm các mục trả lại liên quan đến order_id
        $retune = ReturnItem::where('order_id', $id)
            ->where('order_item_id', $request->input('exchange_order_items_id'))
            ->first();
    
        // Nếu không tìm thấy, tức là mục này chưa tồn tại, thì mới tạo mới
        if (!$retune) {
            ReturnItem::create([
                'order_id' => $id,
                'new' => 0,
                'exchange_order_item_id' => $request->input('exchange_order_items_id'),
                'exchange_quantity' => $request->input('exchange_quantity'),
            ]);
    
            return redirect()->back()->with('status', 'Thành công!');
        } else {
            // Nếu đã tồn tại, có thể trả về một thông báo khác (tuỳ thuộc vào logic bạn muốn)
            return redirect()->back()->with('error', 'Sản phẩm này đã tồn tại bên đơn đổi sản phẩm.');
        }
    }
    
    public function watchtraItem($id)
    {
        $this->data['title'] = "Trang trả sản phẩm";
        $order = Orders::findOrFail($id);
        $orderitemAll = Order_items::all();
        $retune = ReturnItem::where('order_id',$id)->where('new',0)->get();
        return view('admin.return_items.xem_tra_item', $this->data, compact('order','retune','orderitemAll'));
    }
    public function traItemdestroy($id)
    {
      $retune = ReturnItem::findOrFail($id);

        $retune->delete();
        return redirect()->back()->with('success', 'Thành công!');
    }
} 
    
