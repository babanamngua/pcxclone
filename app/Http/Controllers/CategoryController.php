<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public $data =[];
    public function index()
    {
        $this->data['title'] = 'trang thể loại';
        // $category = Category::with('children')->whereNull('parent_id')->get();
        $category = Category::all();
        return view('admin.category.list_loaisp',$this->data, compact('category'));
    }
    public function create()
    {
        $this->data['title'] = 'trang thêm thể loại';
        $category = Category::whereNull('parent_id')::whereNotNull('group_name')->get();
        return view('admin.category.add_loaisp',$this->data,compact('category'));
    }
    public function store(Request $request)
    {
        $this->data['title'] = 'trang thêm thể loại';

        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:category,category_id',
            'group_name' => 'nullable|string|max:255',
        ]);

        Category::create($validated);

        return redirect()->route('category.index',$this->data)->with('success', 'Category added successfully.');
    }

}

