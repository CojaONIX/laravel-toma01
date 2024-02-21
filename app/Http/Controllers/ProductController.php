<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    private $productRepo;
    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }

    public function getAllProducts()
    {
        $products = Product::all();
        return view('admin.allProducts', compact('products'));
    }

    public function getProduct(Product $product)
    {
        return view('product', compact('product'));
    }

    public function addProductPage()
    {
        return view('admin.addProduct');
    }

    public function createProduct(ProductRequest $request)
    {
        $this->productRepo->createNew($request);

        return redirect()->route('admin.product.all.page')->withSuccess('Product is created.');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.product.all.page')->withSuccess('Product is deleted.');
    }

    public function editProductPage(Product $product)
    {
        return view('admin.editProduct', compact('product'));
    }

    public function updateProduct(ProductRequest $request, Product $product)
    {
        $this->productRepo->editProduct($request, $product);
        return redirect()->route('admin.product.all.page')->withSuccess('Product ' . $product->id . ' is edited.');
    }
}
