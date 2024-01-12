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

    public function addProductPage()
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

    public function editProductPage($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.editProduct', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64|unique:products,name,'.$id,
            'description' => 'required|string',
            'amount' => 'required|int|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable'
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->amount = $request->get('amount');
        $product->price = $request->get('price');
        $product->image = $request->get('image');

        $product->save();

        return redirect()->route('admin.all.products')->withSuccess('Product ' . $product->id . ' is edited.');
    }
}
