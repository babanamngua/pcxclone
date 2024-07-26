<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Img;
use App\Models\Color;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Quantity;
use Illuminate\Support\Facades\Auth;
use App\Models\Order_items;
use App\Models\Component;
use App\Models\Article;
use App\Models\Section;
use App\Models\Review;
use App\Models\CommentImage;
use App\Models\User;



class HomeController extends Controller
{
    public $data =[];
    public function index(Request $request)
    {
        $this->data['title'] = 'Trang sản phẩm';
        $product1 = Product::all();
        $color1 = [];
        $quantitiesData = [];
        $cartCount = 0;
    
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = count($cartItems);
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
    
        foreach ($product1 as $product) {
            $color1[$product->product_id] = Color::where('product_id', $product->product_id)->get();
        }
    
        foreach ($product1 as $product) {
            $quantitiesData[$product->product_id] = [];
            $quantities = Quantity::where('product_id', $product->product_id)->get();
    
            foreach ($quantities as $quantity) {
                $colorId = $quantity->color_id ?? null;
                $capacity = $quantity->capacity ?? null;
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
    
        $category1 = Category::whereNotNull('component_id')->get();      
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();

        $categorycomponent = Category::whereNotNull('component_id')->get();
        $c0mponent = Component::all();
   
        // Lấy danh sách các bài viết và phân trang
        $article = Article::orderBy('created_at', 'desc')->take(3)->get(); // 10 là số bài viết mỗi trang

        return view('clients.home', $this->data, compact(
            'cartCount','category1','category2','brand1', 'brand2',
            'categorycomponent',           
            'c0mponent',
            'article',       
    
            'product1',
            'color1',
            'quantities',
            'quantitiesData'
        ));
    }
    
    public function count()
    {
        $cartCount = 0;
    
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = count($cartItems);
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
        return response()->json(['cartCount' => $cartCount]);
    }
    
    
    public function detail($id)
{
    $product = Product::findOrFail($id);
    $this->data['title'] = $product->product_name;
    $quantitiesData = [];
    $cartCount = 0;

    if (Auth::check()) {
        $userId = Auth::id();
        $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
        $cartCount = count($cartItems);
    } else {
        $cart = session()->get('cart', []);
        $cartCount = count($cart);
    }

    $colors = Color::where('product_id', $product->product_id)->get();
    $quantities = Quantity::where('product_id', $product->product_id)->get();
    $images = Img::where('product_id', $product->product_id)->get();
    $imagesByColor = $images->groupBy('color_id');

    foreach ($quantities as $quantity) {
        $colorId = $quantity->color_id ?? null;
        $capacity = $quantity->capacity ?? null;
        $size = $quantity->size ?? null;

        if (!isset($quantitiesData[$colorId])) {
            $quantitiesData[$colorId] = [];
        }

        if (!isset($quantitiesData[$colorId][$capacity])) {
            $quantitiesData[$colorId][$capacity] = [];
        }

        $quantitiesData[$colorId][$capacity][$size] = $quantity->price;
    }

    $initialColorId = optional($colors->first())->color_id ?? null;
    $initialCapacity = array_key_first($quantitiesData[$initialColorId] ?? $quantitiesData[null] ?? []);
    $initialSize = array_key_first($quantitiesData[$initialColorId][$initialCapacity] ?? $quantitiesData[null][$initialCapacity] ?? []);

    $initialPrice = $quantitiesData[$initialColorId][$initialCapacity][$initialSize] ?? $quantitiesData[null][$initialCapacity][$initialSize] ?? null;

    $category1 = Category::whereNotNull('component_id')->get();
    $category2 = Category::whereNull('component_id')->get();
    $brand1 = Brand::whereNotNull('category_id')->get();
    $brand2 = Brand::whereNull('category_id')->get();
    //////////////////////////////////////////////////////////
    // Fetch products of the same brand
    $sameBrandProducts = Product::where('brand_id', $product->brand_id)
                                ->where('product_id', '!=', $product->product_id)
                                ->take(6)
                                ->get();

    $color1 = [];
    $sameBrandQuantitiesData = [];
    foreach ($sameBrandProducts as $pro) {
        $color1[$pro->product_id] = Color::where('product_id', $pro->product_id)->get();
    }

    foreach ($sameBrandProducts as $pro) {
        $sameBrandQuantitiesData[$pro->product_id] = [];
        $sameBrandQuantities = Quantity::where('product_id', $pro->product_id)->get();

        foreach ($sameBrandQuantities as $quantity) {
            $sameBrandcolorId = $quantity->color_id ?? null;
            $sameBrandcapacity = $quantity->capacity ?? null;
            $sameBrandQsize = $quantity->size ?? null;

            if (!isset($sameBrandQuantitiesData[$pro->product_id][$sameBrandcolorId])) {
                $sameBrandQuantitiesData[$pro->product_id][$sameBrandcolorId] = [];
            }

            if (!isset($sameBrandQuantitiesData[$pro->product_id][$sameBrandcolorId][$sameBrandcapacity])) {
                $sameBrandQuantitiesData[$pro->product_id][$sameBrandcolorId][$sameBrandcapacity] = [];
            }

            $sameBrandQuantitiesData[$pro->product_id][$sameBrandcolorId][$sameBrandcapacity][$sameBrandQsize] = $quantity->price;
        }
    }
    // Initialize $sameBrandQuantities
    $sameBrandQuantities = [];
    //////////////////////////////////////////////////////////
     //////////////////////////////////////////////////////////
    // Fetch products of the same brand
    // $sameCategory = Category::all();
    $sameCategoryProducts = Product::where('category_id', $product->category_id)
                                ->where('brand_id','!=', $product->brand_id)
                                ->where('product_id', '!=', $product->product_id)
                                ->inRandomOrder()
                                ->take(6)
                                ->get();
    //////////////////////////////////////////////////////////
     //////////////////////////////////////////////////////////
     //comment

     $startReview = Review::where('product_id', $product->product_id)->get();

     $averageRating = $startReview->avg('rating');
        
        // Calculate the count of each rating
        $ratingCounts = array_fill(1, 5, 0);
        foreach ($startReview as $rv) {
            $ratingCounts[$rv->rating]++;
        }
        // Total number of ratings
        $totalRatings = array_sum($ratingCounts);

        $comment = Review::where('product_id', $product->product_id)
        ->orderBy('created_at', 'desc')
        ->get();
        $username  = User::all();
        $img = CommentImage::all();
    //////////////////////////////////////////////////////////
    return view('clients.chitietsanpham', $this->data, compact(
        'cartCount',
        'category1',
        'category2',
        'brand1',
        'brand2',

        'product',
        'colors',
        'quantities',
        'quantitiesData',
        'initialPrice',
        'images',
        'imagesByColor',

        'sameBrandProducts', // Pass the same brand products to the view
        'color1',
        'sameBrandQuantities',
        'sameBrandQuantitiesData',

        'sameCategoryProducts', // Pass the same category products to the view

        'startReview',
        'averageRating',
        'ratingCounts',
        'totalRatings',
        'comment',
        'username',
        'img',
    ));
}

    

    public function tintuc()
    {
        $this->data['title'] = 'Trang bài viết';
        $cartCount = 0;
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = count($cartItems);
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
        $category1 = Category::whereNotNull('component_id')->get();
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();
        /////////////////////////////////////////
        // Lấy danh sách các bài viết và phân trang
            $article = Article::orderBy('created_at', 'desc')->paginate(10); // 10 là số bài viết mỗi trang
        /////////////////////////////////////////
        return view('clients.listtintuc',$this->data,compact(
            'cartCount','category1','category2','brand1','brand2',
            'article'
        ));
    }
    public function chitiettintuc($id)
    {
        $this->data['title'] = 'Trang tin tức';
        $cartCount = 0;
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = count($cartItems);
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
        $category1 = Category::whereNotNull('component_id')->get();
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();
        /////////////////////////////////////////
        // $article = Article::findOrFail($id);
        $section = Section::where('article_id',$id)->get();
        /////////////////////////////////////////
        return view('clients.chitiettintuc',$this->data,compact(
            'cartCount','category1','category2','brand1','brand2',
            'section'
        ));
    }
    public function bestsellers()
    {
        $this->data['title'] = 'Trang sản phẩm đang giảm giá';
        $product1 = Product::orderBy('created_at', 'desc')->paginate(6);
        $color1 = [];
        $quantitiesData = [];
        $cartCount = 0;
    
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = count($cartItems);
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
    
        foreach ($product1 as $product) {
            $color1[$product->product_id] = Color::where('product_id', $product->product_id)->get();
        }
    
        foreach ($product1 as $product) {
            $quantitiesData[$product->product_id] = [];
            $quantities = Quantity::where('product_id', $product->product_id)->get();
    
            foreach ($quantities as $quantity) {
                $colorId = $quantity->color_id ?? null;
                $capacity = $quantity->capacity ?? null;
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
    
        $category1 = Category::whereNotNull('component_id')->get();      
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();

        $categorycomponent = Category::whereNotNull('component_id')->get();
        $c0mponent = Component::all();
   
   

        return view('clients.listbestsellers', $this->data, compact(
            'cartCount','category1','category2','brand1', 'brand2',
            'categorycomponent',           
            'c0mponent',
      
    
            'product1',
            'color1',
            'quantities',
            'quantitiesData'
        ));
    }
    public function lienhe()
    {
        $this->data['title'] = 'trang liên hệ';
        $cartCount = 0;
        

        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = count($cartItems);
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
        $category1 = Category::whereNotNull('component_id')->get();
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();
        return view('clients.lienhe',$this->data,compact(
            'cartCount',
            'category1',
            'category2',
            'brand1',
            'brand2'
        ));
    }
    public function category1($categoryName)
    {
    $this->data['title'] = $categoryName;
     // Lấy thông tin category
     $category = Category::where('category_name', $categoryName)->first();
    
    // Lấy thông tin brand có tên trùng với $brandName và có category_id không null
    // $brands = Brand::where('brand_name', $brandName)->whereNull('category_id')->first();
    
    // Kiểm tra nếu không tìm thấy category hoặc brand thì trả về 404
    if (!$category) {
        return abort(404);
    }

    // Lấy danh sách các sản phẩm chỉ khi category_id và brand_id trùng khớp
    $products = Product::where('category_id', $category->category_id)
                    //    ->where('brand_id', $brands->brand_id)
                       ->get();
     //dd($products); // Debug: Xem xem products có dữ liệu không
    // Các thông tin khác
    $color1 = [];
    $cartCount = 0;
    if (Auth::check()) {
        $userId = Auth::id();
        $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
        $cartCount = count($cartItems);
    } else {
        $cart = session()->get('cart', []);
        $cartCount = count($cart);
    }

    foreach ($products as $product) {
        $color1[$product->product_id] = Color::where('product_id', $product->product_id)->get();
    }
   
    $category1 = Category::whereNotNull('component_id')->get();
    $category2 = Category::whereNull('component_id')->get();
    $brand1 = Brand::whereNotNull('category_id')->get();
    $brand2 = Brand::whereNull('category_id')->get();

    // return view('clients.listsanpham1', $this->data, compact('category', 'brands', 'products', 'color1', 'cartCount', 'category1', 'category2', 'brand1', 'brand2'));
    return view('clients.listsanpham1',$this->data,[
        'category' => $category,
        // 'brands' => $brands,
        'products' => $products,
        'color1' => $color1,
        'cartCount' => $cartCount,
        'category1' => $category1,
        'category2'=> $category2,
        'brand1' => $brand1,
        'brand2'=> $brand2
    ]);
}
    public function category($categoryName, $brandName)
    {
    $this->data['title'] = $categoryName . ' ' . $brandName;
     // Lấy thông tin category
     $category = Category::where('category_name', $categoryName)->first();
    
    // Lấy thông tin brand có tên trùng với $brandName và có category_id không null
    $brands = Brand::where('brand_name', $brandName)->whereNull('category_id')->first();
    
    // Kiểm tra nếu không tìm thấy category hoặc brand thì trả về 404
    if (!$category || !$brands) {
        return abort(404);
    }

    // Lấy danh sách các sản phẩm chỉ khi category_id và brand_id trùng khớp
    $products = Product::where('category_id', $category->category_id)
                       ->where('brand_id', $brands->brand_id)
                       ->get();
     //dd($products); // Debug: Xem xem products có dữ liệu không
    // Các thông tin khác
    $color1 = [];
    $cartCount = 0;
    if (Auth::check()) {
        $userId = Auth::id();
        $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
        $cartCount = count($cartItems);
    } else {
        $cart = session()->get('cart', []);
        $cartCount = count($cart);
    }

    foreach ($products as $product) {
        $color1[$product->product_id] = Color::where('product_id', $product->product_id)->get();
    }
   
    $category1 = Category::whereNotNull('component_id')->get();
    $category2 = Category::whereNull('component_id')->get();
    $brand1 = Brand::whereNotNull('category_id')->get();
    $brand2 = Brand::whereNull('category_id')->get();

    // return view('clients.listsanpham1', $this->data, compact('category', 'brands', 'products', 'color1', 'cartCount', 'category1', 'category2', 'brand1', 'brand2'));
    return view('clients.listsanpham1',$this->data,[
        'category' => $category,
        'brands' => $brands,
        'products' => $products,
        'color1' => $color1,
        'cartCount' => $cartCount,
        'category1' => $category1,
        'category2'=> $category2,
        'brand1' => $brand1,
        'brand2'=> $brand2
    ]);
}
public function search(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('product_name', 'LIKE', "%{$query}%")->get();
    $quantitiesData = [];
    $priceRanges = [];

    foreach ($products as $product) {
        $quantitiesData[$product->product_id] = [];
        $quantities = Quantity::where('product_id', $product->product_id)->get();

        $prices = [];
        foreach ($quantities as $quantity) {
            $colorId = $quantity->color_id ?? null;
            $capacity = $quantity->capacity ?? null;
            $size = $quantity->size ?? null;

            if (!isset($quantitiesData[$product->product_id][$colorId])) {
                $quantitiesData[$product->product_id][$colorId] = [];
            }

            if (!isset($quantitiesData[$product->product_id][$colorId][$capacity])) {
                $quantitiesData[$product->product_id][$colorId][$capacity] = [];
            }

            $quantitiesData[$product->product_id][$colorId][$capacity][$size] = $quantity->price;
            $prices[] = $quantity->price;
        }

        if (!empty($prices)) {
            $minPrice = min($prices);
            $maxPrice = max($prices);
            if ($minPrice === $maxPrice) {
                $priceRanges[$product->product_id] = [
                    'single' => true,
                    'price' => $minPrice,
                ];
            } else {
                $priceRanges[$product->product_id] = [
                    'single' => false,
                    'min' => $minPrice,
                    'max' => $maxPrice,
                ];
            }
        }
    }

    return response()->json([
        'products' => $products,
        'quantitiesData' => $quantitiesData,
        'priceRanges' => $priceRanges,
    ]);
}



    public function searchBlade(Request $request)
    {
        $this->data['title'] = 'trang tìm kiếm';
        $cartCount = 0;
    
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = count($cartItems);
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
    
        $category1 = Category::whereNotNull('component_id')->get();
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();
        $searchTerm = $request->input('q');
        $products = Product::where('product_name', 'LIKE', '%' . $searchTerm . '%')->get();
    
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
    
        return view('clients.search-product', array_merge($this->data, compact(
            'products',
            'color1',
            'quantities',
            'quantitiesData',
             'searchTerm',
             
              'cartCount',
               'category1',
                'category2',
                 'brand1',
                  'brand2')));
    }

}