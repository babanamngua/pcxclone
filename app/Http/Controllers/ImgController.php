<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Img;
use App\Models\Product;
use Carbon\Carbon; // Sử dụng thư viện Carbon để làm việc với thời gian

class ImgController extends Controller
{
    public $data =[];
    public function upload($id)
    {
        $this->data['title'] = 'trang thêm ảnh sản phẩm';
        $product = Product::findOrFail($id);
        $img = Img::where('product_id',$id)->get();
        return view('admin.img.add_img',$this->data,compact('img','product'));
    }
    public function store(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $this->data['title'] = 'trang sản phẩm';
        $request->validate([
            'url_img.*' => 'nullable|image|file',
            ]);
            $imgData = [];  
            $timestamp = Carbon::now()->format('His'); // Định dạng YYYYMMDD_HHMMSS
            if($files = $request->file('url_img'))
            {
                foreach($files as $key => $file)
                {
                    
                    $name =$product->product_id.'-'.$key.'-'.  $timestamp . '.' . $file->getClientOriginalExtension();
                    $destinationPath = public_path('storage/products/'.$product->product_name.'/'.'img'); // Thư mục đích
                    $file->move($destinationPath, $name);

                    $imgData[] = [
                        'product_id'=>$product->product_id,
                        'url_img'=> $name,
                    ];
                }
            }
            Img::insert($imgData);

        return redirect()->back()->with('status', 'Thêm ảnh thành công.');
    }
    public function destroy($id)
   {
       
        $img = Img::findOrFail($id);
        $product = Product::findOrFail($img->product_id);
       // Xóa ảnh nếu có
        if ($img->url_img && file_exists(public_path('storage/products/'. $product->product_name.'/'.'img'.'/'. $img->url_img)))
        { unlink(public_path('storage/products/'. $product->product_name.'/'.'img'.'/'. $img->url_img));}
        $img->delete();
        return redirect()->back()->with('status', 'Xóa ảnh thành công.');
   }
}
