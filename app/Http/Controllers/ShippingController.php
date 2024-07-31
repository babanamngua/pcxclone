<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingMethods;
use App\Models\Orders;
use App\Models\Shipping;

class ShippingController extends Controller
{
    public $data =[];
    public function edit($id)
    {
        $this->data['title'] = 'Trang thông tin vận chuyển';
        $order = Orders::where('order_id',$id)->get();
        $shippingmethods = ShippingMethods::all();
        $shipping = Shipping::where('order_id',$id)->get();
        $statusOptions = ['pending','delivering','delivered','cancelled','refunded','failed'];
        return view('admin.shipping.edit_shipping',$this->data,compact('order','shippingmethods','shipping','statusOptions'));
    }
    public function update(Request $request, $id)
    {
        $shipping = Shipping::findOrFail($id);
        $data = $request->validate([
        'shipping_date' =>'nullable',
        'shipped_date' =>'nullable',      
        'status' =>'nullable'
        ]);
        $shipping->shipping_date = $request->input('shipping_date');
        $shipping->shipped_date = $request->input('shipped_date');
        $shipping->save($data);

        return redirect()->back()->with('success', 'Thông tin vận chuyển cập nhật thành công.');
    }   
}
