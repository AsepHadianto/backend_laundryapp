<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSalesDetail;
use App\Http\Resources\ServiceSalesDetailResource;

class ServiceSalesDetailController extends Controller
{
    public function index()
    {
        $serviceSalesDetails = ServiceSalesDetail::all();
        return ServiceSalesDetailResource::collection($serviceSalesDetails);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sales_record_id' => 'required|exists:sales_records,id',
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|integer',
            'subtotal' => 'required|numeric',
        ]);

        $serviceSalesDetail = ServiceSalesDetail::create($request->all());

        return new ServiceSalesDetailResource($serviceSalesDetail);
    }

    public function show(ServiceSalesDetail $serviceSalesDetail)
    {
        return new ServiceSalesDetailResource($serviceSalesDetail);
    }

    public function update(Request $request, ServiceSalesDetail $serviceSalesDetail)
    {
        $request->validate([
            'sales_record_id' => 'required|exists:sales_records,id',
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|integer',
            'subtotal' => 'required|numeric',
        ]);

        $serviceSalesDetail->update($request->all());

        return new ServiceSalesDetailResource($serviceSalesDetail);
    }

    public function destroy(ServiceSalesDetail $serviceSalesDetail)
    {
        $serviceSalesDetail->delete();

        return response()->json("Service sales detail has been deleted", 200);
    }
}
