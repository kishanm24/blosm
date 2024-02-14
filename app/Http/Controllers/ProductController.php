<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function getAttribute(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return $this->response(400,['errors' => $validator->errors()],"Validation Error");
        }

        $attribute = Category::where('id',$request->category_id)->with(['attributes','attributes.attributeValues' => function($query){ $query->select('attribute_id','value'); }])->first()['attributes'];

        return $this->response(200,$attribute,"Attribute Fetch successfully");
    }
}
