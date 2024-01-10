<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getAllProducts()
    {
        $products = Product::all();
        return view('admin.allProducts', compact('products'));
    }

    public function addProductForm()
    {
        return view('admin.addProduct');
    }

    public function createProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64|unique:products',
            'description' => 'required|string',
            'amount' => 'required|int|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable'
        ]);

        Product::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price'),
            'image' => $request->get('image')
        ]);

        return redirect()->route('admin.all.products')->withSuccess('Product is created.');

    }

    public function deleteProduct(Request $request, $id)
    {

        $products = Product::findOrFail($id);
        $products->delete();

        return redirect()->route('admin.all.products')->withSuccess('Product is deleted.');
    }
}
