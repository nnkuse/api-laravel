<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Model\ListItem;
use App\Model\ListOfDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ListOfDate\ListOfDateResource;
use App\Http\Resources\ListOfDate\ListOfDateCollection;

class ListOfDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($listItemID)
    {
        $listItem = DB::table('list_of_dates')
                    ->join('list_items', 'list_of_dates.list_item_id', '=', 'list_items.id')
                    ->where('list_items.id', '=', $listItemID)
                    ->select('list_of_dates.*', 'list_items.list_name', 'list_items.agency')
                    ->get();
        // return response()->json($listItem);
        return ListOfDateCollection::collection($listItem);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $listItemID)
    {
        $credentials = $request->only('in_date');
        $insert = DB::table('list_of_dates')
            ->insert([
                'list_item_id' => $listItemID,
                'in_date' => $credentials['in_date'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        if ($insert) {
            return response()->json(['data' => $credentials], Response::HTTP_OK);
        }
        return response()->json(['error' => 'create error'], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ListOfDate  $listOfDate
     * @return \Illuminate\Http\Response
     */
    public function show($listItemID, $listOfDateID)
    {
        $listOfDateOne = DB::table('list_of_dates')
            ->join('list_items', 'list_of_dates.list_item_id', '=', 'list_items.id')
            ->where('list_items.id', '=', $listItemID)
            ->where('list_of_dates.id', '=', $listOfDateID)
            ->select('list_of_dates.*', 'list_items.list_name', 'list_items.agency')
            ->get();
        // return response()->json($listOfDateOne);
        return ListOfDateResource::collection($listOfDateOne);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ListOfDate  $listOfDate
     * @return \Illuminate\Http\Response
     */
    public function edit(ListOfDate $listOfDate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ListOfDate  $listOfDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $listItemID, $listOfDateID)
    {
        $credentials = $request->in_date;
        $listOfDateOne = DB::table('list_of_dates')
            ->where ('id', $listOfDateID)
            ->update(['in_date' => $credentials, 'updated_at' => Carbon::now()->toDateTimeString()]);
        return response(['data' => 'update complete'], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ListOfDate  $listOfDate
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListOfDate $listOfDate, $listItemID, $listOfDateID)
    {
        $listOfDateOne = DB::table('list_of_dates')
            ->where('id', '=', $listOfDateID)->delete();
        return response(['data' => 'delete complete'], Response::HTTP_OK);
    }
}
