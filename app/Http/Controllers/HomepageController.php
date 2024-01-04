<?php

namespace App\Http\Controllers;

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

        return view('home', compact('currentDate', 'currentTime', 'hour', 'products'));
    }
}
