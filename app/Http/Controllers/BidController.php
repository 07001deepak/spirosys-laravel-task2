<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Http\Request;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('store-bids');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'company_name' => 'required|string',
            'bid_amount' => 'required|numeric|min:0',
            'bid_date' => 'required|before_or_equal:today',
        ]);
        $bid = Bid::create([
            'company_name' => $request->company_name,
            'bid_amount' => $request->bid_amount,
            'bid_date' => $request->bid_date,
            'project_id' => $request->id,
        ]);
        return response()->json(['message' => 'Bid Created Successfully', 'data' => $bid], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
