<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Section;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public $data =[];

    public function index()
    {
        $this->data['title'] = 'Trang bài viết';

        $article = Article::all();
        $section = Section::all();
        return view('admin.article.list_article',$this->data,compact('article','section'));
    }
    public function create()
    {        
        $this->data['title'] = 'Trang tạo bài viết';

        $article = Article::all();
        $nameid = Auth::user()->name;
        return view('admin.article.add_article',$this->data,compact('article','nameid'));
    }
    public function store(Request $request)
    {
        $this->data['title'] = 'Trang bài viết';

       $request->validate([
            'title'=> 'required|string|max:255',
          'url_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
          'content'=> 'nullable|string|max:255',
            // 'url_img' => 'nullable|image|file',

            ]);
            //step1
        $article = new Article();
        $article->user_id = Auth::id();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        if ($request->hasFile('url_img')) {
            $image = $request->file('url_img');
            $name = date('d-m-y-H-i-s') . '.' . $image->getClientOriginalExtension();
        $article->url_img = $name;
        }
        $article->save();
          //step2
        $articleFolder = public_path('storage/articles/' . $article->title.' - '.$article->id.'/'.'img');
        if (!File::exists($articleFolder))
            {
                File::makeDirectory($articleFolder, 0755, true);
            }
              //step3
        $destinationPath =public_path('storage/articles/' . $article->title.' - '.$article->id); // Corrected path to save image in img folder
        $image->move($destinationPath, $name);
        return redirect()->route('articles.index',$this->data)->with('success', 'Article created successfully.');
    }
    public function edit($id)
    {
    $this->data['title'] = 'trang sửa bài viết';
    $article = Article::findOrFail($id);
     return view('admin.article.edit_article',$this->data, compact('article'));
  
    }

public function update(Request $request, $id)
{
    $this->data['title'] = 'Trang bài viết';

    $request->validate([
        'title'=> 'required|string|max:255',
      'url_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
      'content'=> 'nullable|string|max:255',
        // 'url_img' => 'nullable|image|file',
        ]);
    $article = Article::findOrFail($id);
    $oldArticleTitle = $article->title.' - '.$id;; // Lưu tieu de old

    $article->title = $request->input('title');
    $article->content = $request->input('content');

    $niunem =  $request->input('title').' - '.$id;// Lưu tieu de new

    $newArticleFolder = public_path('storage/articles/' . $niunem.'/'.'img');
    $oldArticleFolder = public_path('storage/articles/' . $oldArticleTitle.'/'.'img');

    // Đổi tên thư mục nếu tên bài viết có sự thay đổi
    if ($oldArticleTitle !==  $niunem) {
        if (File::exists($oldArticleFolder )) {
            File::moveDirectory(public_path('storage/articles/' . $oldArticleTitle),
             public_path('storage/articles/' .  $niunem));
        }
    }

    // Tạo thư mục nếu chưa tồn tại
    if (!File::exists($newArticleFolder)) {
        File::makeDirectory($newArticleFolder, 0755, true);
    }

    // Xử lý ảnh
    if ($request->hasFile('url_img')) {
        if ($article->url_img && file_exists(public_path('storage/articles/' . $niunem.'/'.$article->url_img))) {
             unlink(public_path('storage/articles/' . $niunem.'/'.$article->url_img));
        }
        $image = $request->file('url_img');
        $name = date('d-m-y-H-i-s') . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('storage/articles/' . $niunem); // Thư mục đích
        $image->move($destinationPath, $name);
        $article->url_img= $name;
    }

    $article->save();
    return redirect()->route('articles.index', $this->data)->with('success', 'Article updated successfully.');
}

    public function destroy($id)
   {
    $this->data['title'] = 'trang sản phẩm';
       $product = Product::findOrFail($id);
       $images = Img::where('product_id', $id)->get();
       $colors = Color::where('product_id', $id)->get();
       $quantitys = Quantity::where('product_id', $id)->get();

       if($images){
       foreach ($images as $image) {
           // Đường dẫn tới tệp ảnh
           $imagePath = public_path('storage/products/' . $product->product_name .'/'.'img'.'/'. $image->url_img);
           if (File::exists($imagePath)) {
               File::delete($imagePath);
           }
           // Xóa bản ghi ảnh từ cơ sở dữ liệu
           $image->delete();
       }}
        if($quantitys){
        foreach ($quantitys as $quantity) {
            // Xóa bản ghi màu từ cơ sở dữ liệu
            $quantity->delete();
        }}
       // Xóa màu liên quan
       if($colors){
       foreach ($colors as $color) {
           // Xóa bản ghi màu từ cơ sở dữ liệu
           $color->delete();
       }}
       $productFolder = public_path('storage/products/' . $product->product_name);          
            // Kiểm tra và xóa thư mục nếu tồn tại
            if (File::exists($productFolder)) {
                File::deleteDirectory($productFolder);
            }
            $product->delete();
       return redirect()->route('product.index')->with('success', 'sản phẩm đã xóa thành công.');
   }
   

}
