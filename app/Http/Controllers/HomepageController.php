<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $currentDate = date('d.m.Y.');
        $currentTime = date('H:i:s');
        $hour = date('H'); // ??

        return view('home', compact('currentDate', 'currentTime', 'hour'));
    }
}
