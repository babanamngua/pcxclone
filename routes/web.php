<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\ColorController;


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Spatie\Permission\Contracts\Permission;
use App\Http\Controllers\UserController;


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/products',[HomeController::class,'index'])->name('home');
Route::get('products/{id}',[HomeController::class,'detail'])->name('products.detail');
Route::get('products/{id}',[HomeController::class,'detail'])->name('products.detail');



// Route::group(['middleware' => ['role:super-admin|admin']], function() {

Route::resource('permissions',PermissionController::class);
Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

Route::resource('roles', RoleController::class);
Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

Route::resource('users', UserController::class);
Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware(['auth'])->group(function () {
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
    Route::get('img/{id}/destroy',[ImgController::class,'destroy'])->name('img.destroy');

    Route::get('color/{id}/upload',[ColorController::class,'upload'])->name('color.upload');
    Route::post('color/{id}/upload',[ColorController::class,'store'])->name('color.store');
    Route::get('color/{id}/destroy',[ColorController::class,'destroy'])->name('color.destroy');
    Route::delete('color/{id}/destroy1',[ColorController::class,'destroy1'])->name('color.destroy1');
    Route::post('color/add',[ColorController::class,'add'])->name('color.add');

// });
require __DIR__.'/auth.php';


