<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer',
        ]);

        $product = Product::create($request->all());

        return new ProductResource($product);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer',
        ]);

        $product->update($request->all());

        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json("Product has been deleted", 200);
    }

    public function updateStock(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:0',
        ]);

        // Temukan produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Kurangi stok produk
        $product->stock -= $request->quantity;

        // Pastikan stok tidak negatif
        if ($product->stock < 0) {
            return response()->json(['error' => 'Insufficient stock'], 400);
        }

        $product->save();

        return new ProductResource($product);
    }
}
