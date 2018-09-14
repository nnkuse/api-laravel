<?php

namespace App\Http\Controllers\Api;

use App\Model\ListDetail;
use App\Model\ListOfDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ListDetailResource;

class ListDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListOfDate $listOfDate, $listItemID, $listOfDateID)
    {
        $listDetail = DB::table('list_details')
                        ->join('list_of_dates', 'list_details.list_of_date_id', '=', 'list_of_dates.id')
                        ->join('list_items', 'list_of_dates.list_item_id', '=', 'list_items.id')
                        ->where('list_items.id', '=', $listItemID)
                        ->where('list_of_dates.id', '=', $listOfDateID)
                        ->paginate(20);
        return ListDetailResource::collection($listDetail);
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
     * @param  \App\Model\ListDetail  $listDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ListDetail $listDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ListDetail  $listDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ListDetail $listDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ListDetail  $listDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListDetail $listDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ListDetail  $listDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListDetail $listDetail)
    {
        //
    }
}
