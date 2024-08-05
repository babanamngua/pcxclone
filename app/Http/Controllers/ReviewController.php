<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\CommentImage;
use App\Models\Orders;
use App\Models\Order_items;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('images')->get();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        // return view('reviews.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'product_id' => 'required|exists:product,product_id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required',
            'image_url.*' => 'nullable|image|file|max:8192'
        ]);

        $review = new Review();
        $review->user_id = Auth::id();
        $review->product_id = $request->input('product_id');
        $review->rating = $request->input('rating');
        $review->comment = $request->input('comment');
        $review->save();

         // Lấy các order item cần cập nhật
    $existOrderItems = Order_items::where('user_id', Auth::id())
    ->whereNotNull('order_id')
    ->whereNull('review_id')
    ->where('product_id', $request->input('product_id'))
    ->get();

// Cập nhật review_id cho từng order item
foreach ($existOrderItems as $orderItem) {
    $orderItem->review_id = $review->id;
    $orderItem->save();
}

        $RVFolder = public_path('storage/reviews/'.$review->id.$review->user_id.'-'.$review->product_id.'/'.'img');
        if (!File::exists($RVFolder)) 
            {
                File::makeDirectory($RVFolder, 0755, true);
            }
        $imgData = [];  
            $timestamp = Carbon::now()->format('His'); // Định dạng YYYYMMDD_HHMMSS
            if($files = $request->file('image_url'))
            {
                foreach($files as $key => $file)
                {
                    
                    $name ='-'.$key.'-'.  $timestamp . '.' . $file->getClientOriginalExtension();
                    $destinationPath = public_path('storage/reviews/'.$review->id.$review->user_id.'-'.$review->product_id.'/'.'img'); // Thư mục đích
                    $file->move($destinationPath, $name);
                    $imgData[] = [
                        'comment_id'=> $review->id,
                        'image_url'=> $name,
                    ];
                }
            }
            CommentImage::insert($imgData);
            return redirect()->back()->with('status', 'Bình luận hành công.');
    }

    public function show($id)
    {
        $review = Review::with('images')->findOrFail($id);
        return view('reviews.show', compact('review'));
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $review = Review::findOrFail($id);

        if ($review->user_id != Auth::id()) {
            return redirect()->route('reviews.index')->with('error', 'You can only edit your own reviews.');
        }

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('comment_images', 'public');
                CommentImage::create([
                    'comment_id' => $review->id,
                    'image_url' => $path
                ]);
            }
        }

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $commentimage = CommentImage::where('comment_id',$id)->get();

        if ($review->user_id != Auth::id()) {
            // return redirect()->route('reviews.index')->with('error', 'You can only delete your own reviews.');
            return redirect()->back()->with('error', 'Bạn không có quyền xóa bình luận này.');
        }
        //xóa comment image trong bảng Comment_image để tránh khóa chính, khóa ngoại
        if($commentimage){
            foreach ($commentimage as $cmtimg) {
                // Đường dẫn tới tệp ảnh
                $imagePath = public_path('storage/reviews/'.$review->id.$review->user_id.'-'.$review->product_id.'/'.'img'.'/'.$cmtimg->image_url);
                // public_path('storage/reviews/'.$review->id.$review->user_id.'-'.$review->product_id.'/'.'img');
                if (File::exists($imagePath)) {
                    File::delete($imagePath);

                }
                // Xóa bản ghi ảnh từ cơ sở dữ liệu
                $cmtimg->delete();
            }}
            $reviewFolder = public_path('storage/reviews/'.$review->id.$review->user_id.'-'.$review->product_id);          
            // Kiểm tra và xóa thư mục nếu tồn tại
            if (File::exists($reviewFolder)) {
                File::deleteDirectory($reviewFolder);
            }
        $review->delete();

        return redirect()->back()->with('success', 'Xóa bình luận thành công.');
    }
}
