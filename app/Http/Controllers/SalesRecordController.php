<?php

namespace App\Http\Controllers;

use App\Models\SalesRecord;
use Illuminate\Http\Request;
use App\Http\Resources\SalesRecordResource;
use Carbon\Carbon;

class SalesRecordController extends Controller
{
    public function index()
    {
        $salesRecords = SalesRecord::all();
        return SalesRecordResource::collection($salesRecords);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);

        $salesRecord = SalesRecord::create($request->all());

        return new SalesRecordResource($salesRecord);
    }

    public function show(SalesRecord $salesRecord)
    {
        return new SalesRecordResource($salesRecord);
    }

    public function update(Request $request, SalesRecord $salesRecord)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'total_amount' => 'required|numeric',
        ]);

        $salesRecord->update($request->all());

        return new SalesRecordResource($salesRecord);
    }

    public function destroy(SalesRecord $salesRecord)
    {
        $salesRecord->delete();

        return response()->json("Sales record has been deleted", 200);
    }

    public function todayOmzet()
    {
        // Mengambil semua sales record yang dibuat hari ini
        $today = Carbon::today();
        $totalOmzet = SalesRecord::whereDate('date', $today)->sum('total_amount');

        return response()->json(['total_omzet' => (float) $totalOmzet], 200);
    }
}
