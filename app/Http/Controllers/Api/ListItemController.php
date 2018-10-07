<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Model\ListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ListItem\ListItemResource;
use App\Http\Resources\ListItem\ListItemCollection;
use Symfony\Component\HttpFoundation\Response;

class ListItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listItem = DB::table('list_items')->orderBy('id', 'desc')
                    ->get();
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
        $credentials = $request->only('list_name', 'agency', 'start_date', 'end_date');
        $insert = DB::table('list_items')
            ->insert([
                'list_name' => $credentials['list_name'],
                'agency' => $credentials['agency'],
                'start_date' => $credentials['start_date'],
                'end_date' => $credentials['end_date'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at'  => Carbon::now()->toDateTimeString()
            ]);
        if ($insert) {
            return response()->json(['data' => $credentials]);
        }
        return response()->json(['error' => 'create error']);
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
                        ->get();
        if ($listItemOne->count() > 0){
            return ListItemResource::collection($listItemOne);
        } else {
            return response(null, Response::HTTP_NO_CONTENT);
        }
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
