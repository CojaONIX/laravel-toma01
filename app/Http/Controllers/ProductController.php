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
        return view('admin.addProducts');
    }

    public function createProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64',
            'description' => 'required|string',
            'amount' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable'
        ]);


        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'price' => $request->price,
            'image' => $request->image
        ]);

        return redirect('/admin/all-products')->withSuccess('Product is created.');

    }

    public function deleteProduct(Request $request, $id)
    {

        $products = Product::findOrFail($id);
        $products->delete();

        return redirect('/admin/all-products')->withSuccess('Product is deleted.');
    }
}
