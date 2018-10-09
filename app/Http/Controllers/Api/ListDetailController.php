<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Model\ListDetail;
use App\Model\ListOfDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ListDetailResource;
use Symfony\Component\HttpFoundation\Response;

class ListDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListOfDate $listOfDate, $listItemID, $listOfDateID)
    {
        //sum net income
        $sumIncome = DB::table('list_details')
                        ->where('list_details.list_of_date_id', '=', $listOfDateID)
                        ->sum('in_come');

        $sumExpense = DB::table('list_details')
                        ->where('list_details.list_of_date_id', '=', $listOfDateID)
                        ->sum('expense');

        $sumNetIncome =  $sumIncome -$sumExpense;
        // return $sumNetIncome;

        //update net_incom in table list_items
        DB::table('list_items')
            ->where('list_items.id', '=', $listItemID)
            ->update(['net_income' => $sumNetIncome, 'updated_at' => Carbon::now()->toDateTimeString()]);

        //header response
        $hearder = DB::table('list_items')
                    ->join('list_of_dates', 'list_items.id', '=', 'list_of_dates.list_item_id')
                    ->where('list_items.id', '=', $listItemID)
                    ->where('list_of_dates.id', '=', $listOfDateID)
                    ->select(
                        'list_items.id',
                        'list_items.list_name', 
                        'list_items.agency',
                        'list_items.net_income',
                        'list_of_dates.in_date'
                        
                    )->get();
        // return $hearder;

        //show detail
        $listDetail = DB::table('list_details')
                        ->join('list_of_dates', 'list_details.list_of_date_id', '=', 'list_of_dates.id')
                        ->join('list_items', 'list_of_dates.list_item_id', '=', 'list_items.id')
                        ->where('list_items.id', '=', $listItemID)
                        ->where('list_of_dates.id', '=', $listOfDateID)
                        ->select(
                            'list_details.id',
                            'list_details.list_detail_name',
                            'list_details.in_come',
                            'list_details.expense'
                        )
                        ->get();
        // return $listDetail;
        return response()->json([
            'data' => [
                'list_item_id' => $hearder[0]->id,
                'list_name' => $hearder[0]->list_name,
                'agency' => $hearder[0]->agency,
                'net_income' => $hearder[0]->net_income,
                'in_date' => $hearder[0]->in_date,
                'details' => $listDetail
            ]
        ]);
        // return response()->json($listDetail);
        // return ListDetailResource::collection($listDetail);
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
    public function store(Request $request, $listItemID, $listOfDateID)
    {
        $credentials = $request->only('list_detail_name', 'in_come', 'expense');
        $insert = DB::table('list_details')
            ->insert([
                'list_of_date_id' => $listOfDateID,
                'list_detail_name' => $credentials['list_detail_name'],
                'in_come' => $credentials['in_come'],
                'expense' => $credentials['expense'],
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
    public function update(Request $request, $listItemID, $listOfDateID, $listDetailID)
    {
        $list_detail_name = $request->list_detail_name;
        $in_come = $request->in_come;
        $expense = $request->expense;
        $listOfDateOne = DB::table('list_details')
            ->where('id', $listDetailID)
            ->update([
                'list_detail_name' => $list_detail_name,
                'in_come' => $in_come,
                'expense' => $expense,
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        return response(['data' => 'update complete'], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ListDetail  $listDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListDetail $listDetail, $listItemID, $listOfDateID, $listDetailID)
    {
        $listOfDateOne = DB::table('list_details')
            ->where('id', '=', $listDetailID)->delete();
        return response(['data' => 'delete complete'], Response::HTTP_OK);
    }
}
