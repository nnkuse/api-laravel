<?php

namespace App\Http\Controllers\Api;

use App\Model\ListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ListItem\ListItemResource;
use App\Http\Resources\ListItem\ListItemCollection;

class ListItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listItem = DB::table('list_items')
                    ->paginate(20);
        // return ListItem::paginate(20);
        return ListItemCollection::collection($listItem);
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
     * @param  \App\Model\ListItem  $listItem
     * @return \Illuminate\Http\Response
     */
    public function show($listItemID)
    {
        $listItemOne = DB::table('list_items')
                        ->where('list_items.id', '=', $listItemID)
                        ->paginate(20);
        return ListItemResource::collection($listItemOne);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ListItem  $listItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ListItem $listItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ListItem  $listItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListItem $listItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ListItem  $listItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListItem $listItem)
    {
        //
    }
}
