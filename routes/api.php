<?php

use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    //user api
    Route::post('/user-registration', [UserController::class, 'createUser']);
    Route::post('/user-login', [UserController::class, 'userLogin']);

    //vendor api
    Route::post('/vendor-registration', [VendorController::class, 'createVendor']);
    Route::post('/vendor-login', [VendorController::class, 'vendorLogin']);


    Route::prefix('otp')->group(function () {
        Route::post('/generate', [OtpController::class, 'generateOtp']);
        Route::post('/verify', [OtpController::class, 'verifyOtp']);
    });

    // Forgot Password
    Route::post('forgot-password', [UserController::class, 'forgotPassword']);

   // Verify OTP and Reset Password
    Route::post('forgot-password/verify-otp', [UserController::class, 'forgotPasswordVerifyOtp']);
    Route::post('forgot-password/reset-password', [UserController::class, 'resetPassword']);

    Route::group(['middleware' => ['auth:api']], function () {

        Route::put('/vendors/{id}', [VendorController::class, 'editVendor']);
        Route::get('/vendor', [VendorController::class, 'getVendorData']);

        //user profile
        Route::get('my-profile', [UserController::class, 'myProfile']);

        Route::get('/logout',[UserController::class,'logout']);
        Route::post('/change-password', [UserController::class, 'changePassword']);

        Route::get('/master-category', [CategoryApiController::class, 'getMasterCategory']);
        Route::get('/category', [CategoryApiController::class, 'getCategory']);
        Route::get('/sub-category', [CategoryApiController::class, 'getSubCategory']);

        Route::get('/attribute', [ProductController::class, 'getAttribute']);
    });

    Route::post('/files', [FileController::class, 'store']);
    Route::get('/files/{id}', [FileController::class, 'show']);
    Route::delete('/files/{id}', [FileController::class, 'destroy']);


});

