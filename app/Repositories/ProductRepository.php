<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function createNew($request)
    {
        $this->productModel->create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price'),
            'image' => $request->get('image')
        ]);
    }

    public function getProductById($id)
    {
        return $this->productModel->where(['id' => $id])->first();
    }

    public function editProduct($request, $product)
    {
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->amount = $request->get('amount');
        $product->price = $request->get('price');
        $product->image = $request->get('image');
        $product->save();
    }

    public function latestProducts($count)
    {
        return $this->productModel->latest()->take($count)->get();
    }
}
