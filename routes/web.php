<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MasterCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');


Route::resource('vendor', VendorController::class);
Route::get('unapprove-vendor', [VendorController::class,'unApproveVendor'])->name('unapprove-vendor');

Route::prefix('admin')->group(function(){
    Route::resource('master-category', MasterCategoryController::class);

    Route::resource('category', CategoryController::class);

    Route::resource('sub-category', SubCategoryController::class);

    Route::resource('attribute', AttributeController::class);

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::post('/', [ProductController::class, 'store']);
        Route::put('/{id}', [ProductController::class, 'update']);
    });

    // Route::resource('products', ProductCo::class);
    // Route::get('master-category/create', [MasterCategoryController::class, 'create'])->name('master-category.create');
    // Route::post('master-category/store', [MasterCategoryController::class, 'store'])->name('master-category.store');
});

Route::resource('customer', UserController::class);

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');



