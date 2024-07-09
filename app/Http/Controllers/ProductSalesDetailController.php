<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSalesDetail;
use App\Http\Resources\ProductSalesDetailResource;

class ProductSalesDetailController extends Controller
{
    public function index()
    {
        $productSalesDetails = ProductSalesDetail::all();
        return ProductSalesDetailResource::collection($productSalesDetails);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sales_record_id' => 'required|exists:sales_records,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'subtotal' => 'required|numeric',
        ]);

        $productSalesDetail = ProductSalesDetail::create($request->all());

        return new ProductSalesDetailResource($productSalesDetail);
    }

    public function show(ProductSalesDetail $productSalesDetail)
    {
        return new ProductSalesDetailResource($productSalesDetail);
    }

    public function update(Request $request, ProductSalesDetail $productSalesDetail)
    {
        $request->validate([
            'sales_record_id' => 'required|exists:sales_records,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'subtotal' => 'required|numeric',
        ]);

        $productSalesDetail->update($request->all());

        return new ProductSalesDetailResource($productSalesDetail);
    }

    public function destroy(ProductSalesDetail $productSalesDetail)
    {
        $productSalesDetail->delete();

        return response()->json("Product sales detail has been deleted", 200);
    }
}
