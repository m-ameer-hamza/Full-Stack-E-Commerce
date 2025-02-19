<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return response()->json([
            'products' => $products
        ], 200);
    }
    public function create(){
      // This method is not needed
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
      // This method is not needed
    }
    public function update(ProductRequest $request, $id){
        $productInfo = $request->validated();
        $product = Product::find($id);
        if(!$product){
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }
        $product->update($productInfo);
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
