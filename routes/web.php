<?php
use App\Http\Controllers\Clients\ClientController;
use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ClientController::class,'index'])->name('home');
Route::get('/tintuc',[ClientController::class,'tintuc'])->name('tintuc');
Route::get('/lienhe',[ClientController::class,'lienhe'])->name('lienhe');
Route::get('/cart',[ClientController::class,'cart'])->name('cart');

Route::prefix('collections')->name('collections')->group(function(){

    Route::get('/chuot',[ClientController::class,'category'])->name('category');

});

Route::prefix('product')->name('product')->group(function(){

    Route::get('/{id}',[ClientController::class,'product'])->name('product');

});

Route::get('/login',[ClientController::class,'login'])->name('login');
Route::get('/register',[ClientController::class,'register'])->name('register');


    Route::get('/loginAdmin',[AdminController::class,'login'])->name('loginAdmin');
    Route::post('/loginAdminCheck',[AdminController::class,'loginCheck'])->name('loginAdminCheck');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    Route::get('/admin',[AdminController::class,'index'])->name('homeAdmin');

