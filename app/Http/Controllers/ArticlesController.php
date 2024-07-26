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
        return view('admin.article.list_article',$this->data,compact('article'));
    }
    public function create()
    {        
        $this->data['title'] = 'Trang tạo bài viết';

        $article = Article::all();
        $nameid = Auth::user()->name;
        return view('admin.article.add_article',$this->data,compact('article','nameid'));
    }
    public function sanitizeTitle($title) {
        // Loại bỏ các ký tự không hợp lệ cho tên thư mục
        return preg_replace('/[\/\\\*<>;?]+/', '', $title);
    }
    public function store(Request $request)
    {
        $this->data['title'] = 'Trang bài viết';

        $request->validate([
            'title'=> 'required|string|max:255',
            'url_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'content'=> 'nullable',
        ]);

        // Step 1
        $article = new Article();
        $article->user_id = Auth::id();
        $article->title = $request->input('title');
        $article->author = $request->input('author');
        $article->content = $request->input('content');

        if ($request->hasFile('url_img')) {
            $image = $request->file('url_img');
            $name = date('d-m-y-H-i-s') . '.' . $image->getClientOriginalExtension();
            $article->url_img = $name;
        }

        $article->save();

        // Step 2: Sử dụng hàm sanitizeTitle để tạo tên thư mục hợp lệ
        $sanitizedTitle = $this->sanitizeTitle($article->title);
        $articleFolder = public_path('storage/articles/' . $sanitizedTitle . ' - ' . $article->id . '/img');

        if (!File::exists($articleFolder)) {
            File::makeDirectory($articleFolder, 0755, true);
        }

        // Step 3: Lưu ảnh vào thư mục đã tạo
        $destinationPath = public_path('storage/articles/' . $sanitizedTitle . ' - ' . $article->id);
        if (isset($image)) {
            $image->move($destinationPath, $name);
        }

        return redirect()->route('articles.index', $this->data)->with('success', 'Article created successfully.');
    }    public function edit($id)
    {
    $this->data['title'] = 'trang sửa bài viết';
    $article = Article::findOrFail($id);
        return view('admin.article.edit_article',$this->data, compact('article'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'title'=> 'required|string|max:255',
      'url_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
      'content'=> 'nullable',
        // 'url_img' => 'nullable|image|file',
        ]);

    $article = Article::findOrFail($id);
    
    // Lưu tieu de old
    $sanitizedOLDTitle = $this->sanitizeTitle($article->title);
    $oldArticleTitle = $sanitizedOLDTitle.' - '.$id;; 
//////////////////////////////////////
    // $article->editor = Auth::user()->name;
    $article->title = $request->input('title');
    $article->content = $request->input('content');
    // Lưu tieu de new
    $sanitizedNEWTitle = $this->sanitizeTitle($article->title);
    $niunem =  $sanitizedNEWTitle.' - '.$id;

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
    return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
}

    public function destroy($id)
   {
       $article = Article::findOrFail($id);
       $section = Section::where('article_id',$id)->get();
       $sanitizedTitle = $this->sanitizeTitle($article->title);
       $productFolder = public_path('storage/articles/' .$sanitizedTitle.' - '.$id);    
       // kiem tra xem co section trong article khong 
       if($section){
        foreach ($section  as $sec) {
            // Xóa bản ghi màu từ cơ sở dữ liệu
            $sec->delete();
        }}     
       // Kiểm tra và xóa thư mục nếu tồn tại
       if (File::exists($productFolder)) {
           File::deleteDirectory($productFolder);
       }
        $article->delete();
       return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
   }
   

}