<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Order;
use App\Models\OrderItems;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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

    public function orderCart() // Naci bolji nacin za provere
    {
        if(!Auth::check())
        {
            return redirect()->back()->withErrors(['amount' => 'Dostupno samo ulogovanim korisnicima.']);
        }

        if(Session::get('products'))
        {
            $cart = Session::get('products');

            $orderItems = [];
            $priceTotal = 0;
            foreach($cart as $item)
            {
                $product = Product::where(['id' => $item['product_id']])->first();
                if($product->amount < $item['amount'])
                {
                    return redirect()->back()->withErrors(['amount' => 'Doslo je do promena kolicina i nekih proizvoda nema dovoljno na stanju.']);
                }
                $orderItems[] = [
                    'product_id' => $product->id,
                    'amount' => $item['amount'],
                    'price' => $product->price
                ];

                $priceTotal += $item['amount'] * $product->price; // Sta kad je doslo do promene cene???
            }

            $orderId = Order::create([
                'user_id' => Auth::id(),
                'price' => $priceTotal
            ])->id;

            foreach($orderItems as $item)
            {
                $item['order_id'] = $orderId;
                OrderItems::create($item);
            }

            Session::forget('products');

            return redirect()->back()->withErrors(['amount' => 'Uspesno ste kreirali Order.']); // Ovde success
        }

        return redirect()->back()->withErrors(['amount' => 'Nemate nista u korpi za narucivanje.']);
    }


}
