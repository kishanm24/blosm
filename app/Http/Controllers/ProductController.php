<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return $this->response(200,$products,"Product Fetch Successfully");
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product){
            return $this->response(404,[],"Product not found");
        }

        return $this->response($product);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        $product = Product::create($request->all());

        return $this->response(201,$product, "Product Create Successfully");
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return $this->response(404,[],"Product not found");
        }

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        $product->update($request->all());

        return $this->response(201,$product, "Product Update Successfully");
    }
}
