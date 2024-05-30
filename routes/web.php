<?php
use App\Http\Controllers\Clients\ClientController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ClientController::class,'index'])->name('home');
Route::get('/tintuc',[ClientController::class,'tintuc'])->name('tintuc');
Route::get('/lienhe',[ClientController::class,'lienhe'])->name('lienhe');
Route::get('/cart',[ClientController::class,'cart'])->name('cart');

Route::prefix('collections')->name('collections')->group(function(){

    Route::get('/chuot',[ClientController::class,'category'])->name('category');

});

// Route::prefix('product')->name('product')->group(function(){

//     Route::get('/{id}',[ClientController::class,'product'])->name('product');

// });

Route::get('/login',[ClientController::class,'login'])->name('login');
Route::get('/register',[ClientController::class,'register'])->name('register');


    Route::get('/loginAdmin',[AdminController::class,'login'])->name('loginAdmin');
    Route::post('/loginAdminCheck',[AdminController::class,'loginCheck'])->name('loginAdminCheck');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    Route::get('/admin',[AdminController::class,'index'])->name('homeAdmin');


// Route::get('product',[ProductController::class,'index'])->name('product.index');
// Route::get('product/create',[ProductController::class,'create'])->name('product.create');

Route::get('brand',[BrandController::class,'index'])->name('brand.index');
Route::get('brand/create',[brandController::class,'create'])->name('brand.create');
Route::post('brand/',[brandController::class,'store'])->name('brand.store');
Route::get('brand/{id}/edit',[brandController::class,'edit'])->name('brand.edit');
Route::put('brand/{id}/update',[brandController::class,'update'])->name('brand.update');
Route::delete('brand/{id}/destroy',[brandController::class,'destroy'])->name('brand.destroy');

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
Route::get('product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::put('product/{product}/update',[ProductController::class,'update'])->name('product.update');
Route::delete('product/{product}/destroy',[ProductController::class,'destroy'])->name('product.destroy');
