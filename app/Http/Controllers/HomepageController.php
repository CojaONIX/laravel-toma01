<?php

namespace App\Http\Controllers;

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

        $apiService = new ApiService();
        $eurCurse = $apiService->getCurrencyCourse('EUR');
        $usdCurse = $apiService->getCurrencyCourse('USD');

        return view('home', compact('currentDate', 'currentTime', 'hour', 'products', 'eurCurse', 'usdCurse'));
    }
}
