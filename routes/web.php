<?php

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

// Route::get('/welcome', function () {
//     return view('welcome');
// });


Route::get('/', [\App\Http\Controllers\HomepageController::class, 'index']);
Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index']);
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);
Route::post('/send-contact', [\App\Http\Controllers\ContactController::class, 'sendContact']);

Route::get('/admin/all-contacts', [\App\Http\Controllers\ContactController::class, 'getAllContacts']);

Route::view('/about', 'about');