<?php

namespace App\Http\Controllers;

use App\Http\Resources\Project as ProjectResource;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $projects = DB::table('projects as p')
        ->leftJoin('bids as b', 'p.id', '=', 'b.project_id')
        ->select(
            'p.id',
            'p.name',
            'p.location',
            'p.estimated_value',
            'p.deadline',
            DB::raw('COUNT(b.id) as total_bids'),
            DB::raw('MIN(b.bid_amount) as lowest_bid')
        )
        ->groupBy('p.id', 'p.name', 'p.location', 'p.estimated_value', 'p.deadline');

   
    if ($request->has('deadline') && $request->input('deadline') !== null) {
        $inputDate = Carbon::parse($request->input('deadline'))->format('Y-m-d');
        $projects->whereDate('p.deadline', '=', $inputDate);
    }

    $projects = $projects->orderBy('lowest_bid', 'asc')->paginate(5);

    return view('display-project', compact('projects'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      
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
