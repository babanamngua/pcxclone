<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;

class ColorController extends Controller
{
    public $data =[];
    public function add(Request $request)
    {
        $this->data['title'] = 'trang màu sản phẩm';
        $color = new Color();

        $request->validate([
            'color_name' => 'required|string|max:100',
            'color_code' => 'required|string|max:100',

        ]);
        $color->color_name = $request->input('color_name');  
        $color->color_code = $request->input('color_code');
        $color->save();
        return redirect()->back()->with('status', 'Thêm màu mới thành công.');
    }
    public function upload($id)
    {
        $this->data['title'] = 'trang thêm màu sản phẩm';
        $product = Product::findOrFail($id);
        $colors1 = Color::all();
        $colors2 = Color::where('product_id',$id)->get();
        return view('admin.color.add_color',$this->data,compact('colors1','colors2','product'));
    }
    public function store(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        
        $this->data['title'] = 'trang màu sản phẩm';
        $request->validate([
            'color_name.*' => 'required|string|max:100',
            'color_code.*' => 'required|string|max:100'
        ]);
        $colorsData = [];
        foreach ($request->color_name as $index => $colorName)
        {
            $colorsData[] = [
                'product_id' => $product->product_id,
                'color_name' => $colorName,
                'color_code' => $request->color_code[$index]
            ];
        }
         // Sử dụng Eloquent để chèn từng màu một vào cơ sở dữ liệu
    foreach ($colorsData as $color) {
        Color::create($color);
    }

        return redirect()->back()->with('status', 'Thêm màu vào sản phẩm thành công.');
    }
    public function destroy($id)
   {
    $this->data['title'] = 'trang màu sản phẩm';
       $color = Color::findOrFail($id);
       $color->delete();
       return redirect()->back()->with('status', 'Xóa màu thành công.');
   }
}
