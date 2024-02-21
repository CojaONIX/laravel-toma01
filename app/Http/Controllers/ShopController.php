<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    private $productRepo;
    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }

    public function index()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function cart()
    {
        $products = null;
        if(Session::get('products'))
        {
            $cartIDs = array_column(Session::get('products'), 'product_id');
            $products = Product::whereIn('id', $cartIDs)->get();
        }

        return view('cart', [
            'cart' => Session::get('products'),
            'products' => $products
        ]);
    }

    public function addToCart(CartRequest $request)
    {
        $product = $this->productRepo->getProductById($request->get('id'));
        if($product->amount < $request->amount)
        {
            return redirect()->back()->withErrors(['amount' => 'Na stanju ima samo ' . $product->amount . ' komada']);
        }

        Session::push('products', [
            'product_id' => $request->get('id'),
            'amount' => $request->get('amount')
        ]);

        return redirect()->route('cart.page');
    }

    public function emptyCart()
    {
        Session::forget('products');
        return redirect()->back();
    }


}
