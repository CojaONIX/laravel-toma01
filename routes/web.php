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

Route::get('/', [HomepageController::class, 'index'])->name('home.page');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.page');
Route::view('/about', 'about')->name('about.page');

Route::controller(ContactController::class)
        ->name('contact.')
        ->prefix('/contact')
        ->group(function () {
            Route::get('/', 'index')->name('page');
            Route::post('/send', 'sendContact')->name('send');
        });

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{product}', 'getProduct')->name('product.page');
});

Route::middleware(['auth', AdminCheck::class])
        ->name('admin.')
        ->prefix('/admin')
        ->group(function () {
            Route::controller(ContactController::class)
                    ->name('contact.')
                    ->prefix('/contact')
                    ->group(function () {
                        Route::get('/all', 'getAllContacts')->name('all.page');
                        Route::get('/delete/{contact}', 'deleteContact')->name('delete');

                        Route::prefix('/edit/{contact}')->group(function () {
                            Route::get('/', 'editContactPage')->name('edit.page');
                            Route::put('/', 'updateContact')->name('update');
                        });
                    });

            Route::controller(ProductController::class)
                    ->name('product.')
                    ->prefix('/product')
                    ->group(function () {
                        Route::get('/all', 'getAllProducts')->name('all.page');
                        Route::delete('/delete/{product}', 'deleteProduct')->name('delete');

                        Route::prefix('/add')->group(function () {
                            Route::get('/', 'addProductPage')->name('add.page');
                            Route::post('/', 'createProduct')->name('create');
                        });

                        Route::prefix('/edit/{product}')->group(function () {
                            Route::get('/', 'editProductPage')->name('edit.page');
                            Route::put('/', 'updateProduct')->name('update');
                        });
                    });
        });

Route::controller(TestController::class)
        ->prefix('/test')
        ->group(function () {
            Route::get('/','showTest')->name('test.page');
            Route::post('/', 'ajaxGetTestData');
        });


Route::middleware('auth')
        ->controller(ProfileController::class)
        ->name('profile.')
        ->prefix('/profile')
        ->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::patch('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
        });

require __DIR__.'/auth.php';
