<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\QuantityController;
use App\Http\Controllers\CapacityController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ShippingMethodsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ReviewController;


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Spatie\Permission\Contracts\Permission;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayMethodsController;


//giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/cart/order', [CartController::class, 'CartOrder'])->name('cartorder.index');
Route::post('/cart/order', [CartController::class, 'placeOrder'])->name('placeorder.infor');


//home
Route::get('/cart/count', [HomeController::class, 'count'])->name('cart.count');
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/products',[HomeController::class,'index'])->name('products.home');
Route::get('/products/{id}',[HomeController::class,'detail'])->name('products.detail');
Route::get('/get-price-by-color', [HomeController::class, 'getPriceByColor']);
Route::get('/baiviet',[HomeController::class,'tintuc'])->name('tintuc');
Route::get('/baiviet/{id}',[HomeController::class,'chitiettintuc'])->name('chitiettintuc');
Route::get('/lienhe',[HomeController::class,'lienhe'])->name('lienhe');
Route::get('/bestsellers',[HomeController::class,'bestsellers'])->name('bestsellers');
Route::get('/get-brands/{category_id}', [HomeController::class, 'getBrandsByCategory']);

    //collections
Route::prefix('collections')->name('collections.')->group(function(){
    Route::get('/{category}-{brand}', [HomeController::class, 'category'])->name('category');
    Route::get('/{category}', [HomeController::class, 'category1'])->name('category1');
});

//search

Route::get('/searching', [HomeController::class, 'search']);
Route::get('/search', [HomeController::class, 'searchBlade'])->name('products.search');

// Route::group(['middleware' => ['role:auth']], function() {
Route::group(['middleware' => ['role:auth|super-admin|admincheck']], function() {
// Route::middleware(['auth','admincheck'])->group(function () {
    //permissions
    Route::resource('permissions',PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);
    //roles
    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);
    //users
    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/orderclients', [OrdersController::class, 'orderclients'])->name('profile.orderclients');
    

    //binh luan
    Route::post('review/',[ReviewController::class,'store'])->name('review.store');
    Route::delete('review/{id}/destroy',[ReviewController::class,'destroy'])->name('review.destroy');
});
//dashboard
Route::middleware(['auth','admincheck'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('brand',[BrandController::class,'index'])->name('brand.index');
    Route::get('brand/create',[brandController::class,'create'])->name('brand.create');
    Route::post('brand/',[brandController::class,'store'])->name('brand.store');
    Route::get('brand/{id}/edit',[brandController::class,'edit'])->name('brand.edit');
    Route::put('brand/{id}/update',[brandController::class,'update'])->name('brand.update');
    Route::delete('brand/{id}/destroy',[brandController::class,'destroy'])->name('brand.destroy');


    Route::get('type',[BrandController::class,'typeindex'])->name('type.index');
    Route::get('type/create',[brandController::class,'typecreate'])->name('type.create');
    Route::post('type/',[brandController::class,'typestore'])->name('type.store');
    Route::get('type/{id}/edit',[brandController::class,'typeedit'])->name('type.edit');
    Route::put('type/{id}/update',[brandController::class,'typeupdate'])->name('type.update');
    Route::delete('type/{id}/destroy',[brandController::class,'typedestroy'])->name('type.destroy');

    Route::get('category',[CategoryController::class,'index'])->name('category.index');
    Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('category/',[CategoryController::class,'store'])->name('category.store');
    Route::get('category/{category}/edit',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('category/{category}/update',[CategoryController::class,'update'])->name('category.update');
    Route::delete('category/{category}/destroy',[CategoryController::class,'destroy'])->name('category.destroy');

    Route::get('component',[componentController::class,'index'])->name('component.index');
    Route::get('component/create',[ComponentController::class,'create'])->name('component.create');
    Route::post('component/',[ComponentController::class,'store'])->name('component.store');
    Route::get('component/{component}/edit',[ComponentController::class,'edit'])->name('component.edit');
    Route::put('component/{component}/update',[ComponentController::class,'update'])->name('component.update');
    Route::delete('component/{component}/destroy',[ComponentController::class,'destroy'])->name('component.destroy');

    Route::get('product',[ProductController::class,'index'])->name('product.index');
    Route::get('product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('product/',[ProductController::class,'store'])->name('product.store');
    Route::get('product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::put('product/{id}/update',[ProductController::class,'update'])->name('product.update');
    Route::delete('product/{id}/destroy',[ProductController::class,'destroy'])->name('product.destroy');

    Route::get('img/{id}/upload',[ImgController::class,'upload'])->name('img.upload');
    Route::post('img/{id}/upload',[ImgController::class,'store'])->name('img.store');
    Route::get('img/{id}/fixcolor',[ImgController::class,'Getfixcolor'])->name('img.Getfixcolor');
    Route::post('img/{id}/fixcolor',[ImgController::class,'fixcolor'])->name('img.fixcolor');
    Route::get('img/{id}/destroy',[ImgController::class,'destroy'])->name('img.destroy');

    Route::get('color/{id}/upload',[ColorController::class,'upload'])->name('color.upload');
    Route::post('color/{id}/upload',[ColorController::class,'store'])->name('color.store');
    Route::get('color/{id}/destroy',[ColorController::class,'destroy'])->name('color.destroy');
    Route::delete('color/{id}/destroy1',[ColorController::class,'destroy1'])->name('color.destroy1');
    Route::post('color/add',[ColorController::class,'add'])->name('color.add');

    // Routes for QuantityController
    Route::get('/quantity/upload/{id}', [QuantityController::class, 'upload'])->name('quantity.upload');
    Route::put('/quantity/update/{id}', [QuantityController::class, 'update'])->name('quantity.update');
    Route::post('/quantity/add', [QuantityController::class, 'add'])->name('quantity.add');
    Route::delete('/quantity/destroy/{id}', [QuantityController::class, 'destroy'])->name('quantity.destroy');

    Route::get('/capacity/upload/{id}', [CapacityController::class, 'upload'])->name('capacity.upload');
    Route::put('/capacity/update/{id}', [CapacityController::class, 'update'])->name('capacity.update');
    Route::post('/capacity/add', [CapacityController::class, 'add'])->name('capacity.add');
    Route::delete('/capacity/destroy/{id}', [CapacityController::class, 'destroy'])->name('capacity.destroy');

    Route::get('orders',[OrdersController::class,'index'])->name('orders.index');
    Route::get('orders/{id}/edit',[OrdersController::class,'edit'])->name('orders.edit');
    Route::put('orders/{id}/update',[OrdersController::class,'update'])->name('orders.update');
    Route::delete('orders/{id}/destroy',[OrdersController::class,'destroy'])->name('orders.destroy');

    Route::get('orderitem/{id}',[OrderItemController::class,'index'])->name('orderitem.index');
    Route::get('orderitem/{id}/edit',[OrderItemController::class,'edit'])->name('orderitem.edit');
    // Route::put('orderitem/{id}/update',[OrderItemController::class,'update'])->name('orderitem.update');
    // Route::delete('orderitem/{id}/destroy',[OrderItemController::class,'destroy'])->name('orderitem.destroy');

    Route::get('shippingmethods',[ShippingMethodsController::class,'index'])->name('shippingmethods.index');
    Route::get('shippingmethods/create',[ShippingMethodsController::class,'create'])->name('shippingmethods.create');
    Route::post('shippingmethods/',[ShippingMethodsController::class,'store'])->name('shippingmethods.store');
    Route::get('shippingmethods/{shippingmethods}/edit',[ShippingMethodsController::class,'edit'])->name('shippingmethods.edit');
    Route::put('shippingmethods/{shippingmethods}/update',[ShippingMethodsController::class,'update'])->name('shippingmethods.update');
    Route::delete('shippingmethods/{shippingmethods}/destroy',[ShippingMethodsController::class,'destroy'])->name('shippingmethods.destroy');

    Route::get('clients',[ClientsController::class,'index'])->name('clients.index');
    Route::get('clients/create',[ClientsController::class,'create'])->name('clients.create');
    Route::post('clients/',[ClientsController::class,'store'])->name('clients.store');
    Route::get('clients/{userId}/edit',[ClientsController::class,'edit'])->name('clients.edit');
    Route::put('clients/{userId}/update',[ClientsController::class,'update'])->name('clients.update');
    Route::get('clients/{userId}/destroy',[ClientsController::class,'destroy'])->name('clients.destroy');

    Route::get('articles',[ArticlesController::class,'index'])->name('articles.index');
    Route::get('articles/create',[ArticlesController::class,'create'])->name('articles.create');
    Route::post('articles/',[ArticlesController::class,'store'])->name('articles.store');
    Route::get('articles/{id}/edit',[ArticlesController::class,'edit'])->name('articles.edit');
    Route::put('articles/{id}/update',[ArticlesController::class,'update'])->name('articles.update');
    Route::delete('articles/{id}/destroy',[ArticlesController::class,'destroy'])->name('articles.destroy');

    Route::get('articles/{id}/sections',[sectionsController::class,'index'])->name('sections.index');
    Route::get('articles/{id}/sections/create',[sectionsController::class,'create'])->name('sections.create');
    Route::post('sections/',[sectionsController::class,'store'])->name('sections.store');
    Route::get('sections/{articleId}-{sectionId}/edit',[sectionsController::class,'edit'])->name('sections.edit');
    Route::put('sections/{articleId}-{sectionId}/update',[sectionsController::class,'update'])->name('sections.update');
    Route::delete('sections/{articleId}-{sectionId}/destroy',[sectionsController::class,'destroy'])->name('sections.destroy');

    Route::get('discount-product/{id}/',[QuantityController::class,'updateDiscountProductview'])->name('discountproductview.edit');
    Route::put('discount-product/{id}/update',[QuantityController::class,'updateDiscountProduct'])->name('discountproduct.update');
    Route::delete('discount-product/{id}/destroy',[QuantityController::class,'updateDiscountProductdestroy'])->name('discountproduct.destroy');

    Route::get('paymethods',[PayMethodsController::class,'index'])->name('paymethods.index');
    Route::get('paymethods/create',[PayMethodsController::class,'create'])->name('paymethods.create');
    Route::post('paymethods/',[PayMethodsController::class,'store'])->name('paymethods.store');
    Route::get('paymethods/{paymethods}/edit',[PayMethodsController::class,'edit'])->name('paymethods.edit');
    Route::put('paymethods/{paymethods}/update',[PayMethodsController::class,'update'])->name('paymethods.update');
    Route::delete('paymethods/{paymethods}/destroy',[PayMethodsController::class,'destroy'])->name('paymethods.destroy');
});

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');

require __DIR__.'/auth.php';



