<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\AdminCheck;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [HomepageController::class, 'index'])->name('home.page');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.page');
Route::view('/about', 'about')->name('about.page');

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact.page');
    Route::post('/send-contact', 'sendContact')->name('send.contact');
});

Route::middleware(['auth', AdminCheck::class])->name('admin.')->prefix('/admin')->group(function () {
    Route::controller(ContactController::class)->group(function () {
        Route::get('/all-contacts', 'getAllContacts')->name('all.contacts');
        Route::get('/edit-contact/{contact}', 'editContactPage')->name('edit.contact.page');
        Route::put('/edit-contact/{contact}', 'updateContact')->name('update.contact');
        Route::get('/delete-contact/{contact}', 'deleteContact')->name('delete.contact');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/all-products', 'getAllProducts')->name('all.products');
        Route::get('/add-product', 'addProductPage')->name('add.product.page');
        Route::post('/add-product', 'createProduct')->name('create.product');
        Route::get('/edit-product/{product}', 'editProductPage')->name('edit.product.page');
        Route::put('/edit-product/{product}', 'updateProduct')->name('update.product');
        Route::delete('/delete-product/{product}', 'deleteProduct')->name('delete.product');
    });
});

Route::get('/test', [TestController::class, 'showTest'])->name('test.page');
Route::post('/test', [TestController::class, 'ajaxGetTestData']);

require __DIR__.'/auth.php';
