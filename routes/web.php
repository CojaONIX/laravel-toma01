<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/welcome', function () {
//     return view('welcome');
// });


Route::get('/', [HomepageController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/send-contact', [ContactController::class, 'sendContact']);
Route::get('/admin/all-contacts', [ContactController::class, 'getAllContacts']);

Route::get('/admin/all-products', [ProductController::class, 'getAllProducts']);
Route::get('/admin/add-product', [ProductController::class, 'addProductForm']);
Route::post('/admin/add-product', [ProductController::class, 'createProduct']);
Route::delete('/admin/delete-product/{id}', [ProductController::class, 'deleteProduct']);

Route::view('/about', 'about');