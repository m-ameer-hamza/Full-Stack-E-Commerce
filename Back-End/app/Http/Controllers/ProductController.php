<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResourse;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'message' => 'Products fetched successfully',
            'products' => ProductResourse::collection($products),
        ], 200);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $product = Product::create($data);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => new ProductResourse($product),
        ], 201);
    }

    public function getByCategory($category)
    {
        if(! in_array($category, ['electronics', 'appliances', 'clothing','grocery'])) {
            return response()->json([
                'message' => 'Invalid category',
            ], 400);
        }

        $products = Product::where('category', $category)->get();

        return response()->json([
            'message' => "$category products fetched successfully",
            'products' => ProductResourse::collection($products),
        ], 200);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (! $product) {
            return response()->json([
                'message' => 'Product not found',
            ], 404);
        }

        return response()->json([
            'product' => new ProductResourse($product),
        ], 200);
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $updatedInfo = $request->validated();
        $product = Product::find($id);
        if (! $product) {
            return response()->json([
                'message' => 'Product not found',
            ], 404);
        }

        $product->update($updatedInfo);

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => new ProductResourse($product),
        ], 200);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (! $product) {
            return response()->json([
                'message' => 'Product not found',
            ], 404);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully',
        ], 200);
    }
}
