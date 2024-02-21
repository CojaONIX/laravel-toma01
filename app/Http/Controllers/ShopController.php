<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function addToCart(CartRequest $request)
    {
        Session::push('products', [
            'product_id' => $request->id,
            'amount' => $request->amount
        ]);

        return redirect()->route('cart.page');
    }

    public function cart()
    {

        return view('cart', [
            'cart' => Session::get('products')
        ]);
    }
}
