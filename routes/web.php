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


Route::get('/', [HomepageController::class, 'index'])->name('homePage');
Route::get('/shop', [ShopController::class, 'index'])->name('shopPage');
Route::view('/about', 'about')->name('aboutPage');

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contactPage');
    Route::post('/send-contact', 'sendContact')->name('sendContact');
});

Route::name('admin.')->prefix('/admin')->group(function () {
    Route::controller(ContactController::class)->group(function () {
        Route::get('/all-contacts', 'getAllContacts')->name('all.contacts');
        Route::get('/delete-contact/{contact}', 'deleteContact')->name('delete.contact');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/all-products', 'getAllProducts')->name('all.products');
        Route::get('/add-product', 'addProductForm')->name('add.product.page');
        Route::post('/add-product', 'createProduct')->name('create.product');
        Route::delete('/delete-product/{product}', 'deleteProduct')->name('delete.product');
    });
});
