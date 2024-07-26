<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Section;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class SectionsController extends Controller
{
    public $data =[];

    public function index($id)
    {
        $this->data['title'] = 'Trang bài viết';
        $article = Article::findOrFail($id);
        $section = Section::where('article_id', $article->id)->get();
        return view('admin.section.list_section',$this->data,compact('article','section'));
    }
    public function create($id)
    {        
        $this->data['title'] = 'Trang tạo bài viết';
        // $article = Article::findOrFail($id);
        $article_id = $id;
        $section = Section::where('article_id', $id);
        return view('admin.section.add_section',$this->data,compact('section','article_id'));
    }
    public function store(Request $request)
    {
       $request->validate([
            'article_id'=> 'required',
            'content1'=>'nullable',
          'url_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
          'content2'=>'nullable',
            // 'url_img' => 'nullable|image|file',

            ]);
            //step1
        $section = new Section();
        $id = $request->input('article_id');
        $section->article_id =  $id;
        $section->content1 = $request->input('content1');
        $section->content2 = $request->input('content2');

        if ($request->hasFile('url_img')) {
            $image = $request->file('url_img');
            $name = date('d-m-y-H-i-s') . '.' . $image->getClientOriginalExtension();
            $section->url_img = $name;
        }
        $section->save();
        $article = Article::findOrFail($id);
          //step2
        $destinationPath =public_path('storage/articles/' . $article->title.' - '.$article->id.'/'.'img'); // Corrected path to save image in img folder
        $image->move($destinationPath, $name);
        return redirect()->route('sections.index', ['id' => $id])->with('success', 'Section created successfully.');
    }
    public function edit($articleId, $sectionId)
    {
    $this->data['title'] = 'trang sửa đoạn';
    $article = Article::findOrFail($articleId);
    $section = Section::findOrFail($sectionId);
    return view('admin.section.edit_section',$this->data, compact('article','section'));
    }

public function update(Request $request, $articleId, $sectionId)
{
    $request->validate([
        'article_id'=> 'required',
        'content1'=>'nullable',
      'url_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
      'content2'=>'nullable'
        ]);
    $article = Article::findOrFail($articleId);
   $section = Section::findOrFail($sectionId);
   $section->content1 = $request->input('content1');
   $section->content2 = $request->input('content2');
   
    // Xử lý ảnh
    if ($request->hasFile('url_img')) {
        if ($article->url_img && file_exists(public_path('storage/articles/' . $article->title.' - '.$articleId.'/'.'img'.'/'.$section->url_img))) {
             unlink(public_path('storage/articles/' . $article->title.' - '.$articleId.'/'.'img'.'/'.$section->url_img));
        }
        $image = $request->file('url_img');
        $name = date('d-m-y-H-i-s') . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('storage/articles/' . $article->title.' - '.$articleId.'/'.'img'); // Thư mục đích
        $image->move($destinationPath, $name);
        $section->url_img= $name;
    }

    $section->save();
    // return redirect()->route('sections.index', ['id' => $articleId])->with('success', 'Section updated successfully.');
    return redirect()->back()->with('success', 'Section updated successfully.');
}

public function destroy($articleId, $sectionId)
{
    $article = Article::findOrFail($articleId);
    $section = Section::findOrFail($sectionId);
    
    $imagePath = public_path('storage/articles/' . $article->title . ' - ' . $article->id . '/img/' . $section->url_img);          
    
    // Kiểm tra và xóa ảnh nếu tồn tại
    if (File::exists($imagePath)) {
        File::delete($imagePath);
    }
    
    // Xóa section
    $section->delete();

    return redirect()->route('sections.index', ['id' => $articleId])->with('success', 'Section deleted successfully.');
}
   
}
