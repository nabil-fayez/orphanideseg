<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Route::get('/test-cors', function (Request $request) {
//     return response()->json([
//         'success' => true,
//         'message' => 'CORS is working!',
//         'data' => [
//             'timestamp' => now(),
//             'user_agent' => $request->userAgent(),
//             'origin' => $request->header('Origin')
//         ]
//     ]);
// });
// Route::post('/test-cors/post', function (Request $request) {
//     return response()->json([
//         'success' => true,
//         'message' => 'CORS is working!',
//         'data' => [
//             'timestamp' => now(),
//             'user_agent' => $request->userAgent(),
//             'origin' => $request->header('Origin')
//         ]
//     ]);
// });
// Route::get('/test', function () {
//     return response()->json(['message' => 'API is working!']);
// });

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);

Route::get('/brands', [BrandController::class, 'index']);
Route::get('/brands/{id}', [BrandController::class, 'show']);
Route::get('/brands/{id}/products', [BrandController::class, 'products']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/new', [ProductController::class, 'index']);
Route::get('/products/featured', [ProductController::class, 'featured']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/search', [ProductController::class, 'search']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // Cart
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart', [CartController::class, 'add']);
    Route::post('/cart/{id}', [CartController::class, 'update']);
    Route::post('/cart/{id}/remove', [CartController::class, 'remove']);
    Route::post('/cart/clear', [CartController::class, 'clear']);

    // Orders
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::post('/orders/{id}/cancel', [OrderController::class, 'cancel']);

    Route::get('/addresses', [AddressController::class, 'index']);
    Route::post('/addresses', [AddressController::class, 'store']);
    Route::post('/addresses/{id}', [AddressController::class, 'update']);
    Route::post('/addresses/{id}/delete', [AddressController::class, 'destroy']);

    Route::get('/user/addresses', [AddressController::class, 'index']); // نفس المسار السابق لكن باسم مختلف
    Route::post('/user/addresses/{id}/set-default', [AddressController::class, 'setDefault']);
});
