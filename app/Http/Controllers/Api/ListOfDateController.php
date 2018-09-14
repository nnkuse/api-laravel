<?php

namespace App\Http\Controllers\Api;

use App\Model\ListItem;
use App\Model\ListOfDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
                    ->paginate(20);
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
    public function store(Request $request)
    {
        //
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
            ->paginate(20);
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
    public function update(Request $request, ListOfDate $listOfDate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ListOfDate  $listOfDate
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListOfDate $listOfDate)
    {
        //
    }
}
