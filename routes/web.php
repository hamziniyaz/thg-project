<?php

use Illuminate\Support\Facades\Route;

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

$controller_path = 'App\Http\Controllers';
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;

// Main Page Route
Route::get('/', $controller_path . [ProductController::class, 'index']);
Route::resource('/products', ProductController::class);
Route::delete('/products/image/delete', [ProductController::class, 'imageDeletion'])->name('products.image.delete');
Route::get('/detail/products/{product}', [ProductController::class, 'show'])->name('prod.detail');
