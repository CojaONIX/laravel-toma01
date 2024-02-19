<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Models\Product;

class HomepageController extends Controller
{
    public function index()
    {
        $currentDate = date('d.m.Y.');
        $currentTime = date('H:i:s');
        $hour = date('H'); // ??

        $products = Product::orderByDesc('id')->take(3)->get();
        //$products = Product::latest()->take(3)->get();

        $todayCourses = ExchangeRate::getTodayCourses();

        return view('home', compact('currentDate', 'currentTime', 'hour', 'products', 'todayCourses'));
    }
}
