<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use App\Repositories\ProductRepository;
use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Models\Product;

class HomepageController extends Controller
{
    private $productRepo;
    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }

    public function index()
    {
        $currentDate = date('d.m.Y.');
        $currentTime = date('H:i:s');
        $hour = date('H'); // ??

        $products = $this->productRepo->latestProducts(3);

        $todayCourses = ExchangeRate::getTodayCourses();

        return view('home', compact('currentDate', 'currentTime', 'hour', 'products', 'todayCourses'));
    }
}
