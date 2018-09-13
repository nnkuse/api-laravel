<?php

namespace App\Http\Controllers\Api;

use App\Model\ListItem;
use Illuminate\Http\Request;
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
        // return ListItem::paginate(20);
        return ListItemCollection::collection(ListItem::paginate(20));
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
    public function show(ListItem $listItem, $id)
    {
        return new ListItemResource($listItem::find($id));
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
