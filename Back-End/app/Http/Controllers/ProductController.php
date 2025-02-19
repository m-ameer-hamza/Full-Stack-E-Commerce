<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use GuzzleHttp\Psr7\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return response()->json([
            'products' => $products
        ], 200);
    }
    public function create(){
      //
    }
    public function store(ProductRequest $request){
        $productInfo = $request->validated();
        $product = Product::create($productInfo);
        return response()->json([
            'message' => 'Product created successfully',
        ], 201);
    }
    public function show($id){
        $product = Product::find($id);
        if(!$product){
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }
        return response()->json([
            'product' => $product
        ], 200);
    }
    public function edit(){
      //
    }
    public function update(ProductUpdateRequest $request, $id){
        $updatedInfo = $request->validated();
        $product = Product::find($id);
        if(!$product){
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }
        $product->update($updatedInfo);
        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ], 200);
    }
    public function destroy($id){
        $product = Product::find($id);
        if(!$product){
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }
        $product->delete();
        return response()->json([
            'message' => 'Product deleted successfully'
        ], 200);
    }

}
