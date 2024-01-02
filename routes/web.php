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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    echo "Hello world";
});

Route::get('/contact', function () {
    echo "Hello world - contact";
});

Route::view('/contact2', 'contact2');

// Vezba 01
// Route::get('/about', function () {
//     echo "Moj prvi sajt";
// });

// Vezba 02
Route::get('/about', function () {
    return view('about');
});