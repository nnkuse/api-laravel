<?php

namespace App\Http\Controllers;

use App\subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SubjectRequest;
use App\Http\Resources\Subjects\SubjectsCollection;
use App\Http\Resources\Subjects\SubjectsResource;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = DB::connection('mysql2')->table('subjects')
                    ->join('users', 'subjects.own_id', '=', 'users.id')
                    ->select('subjects.id','subjects.subject_name', 'users.user_name')
                    ->paginate(20);
        return SubjectsCollection::collection($subject);
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
        $credentials = $request->only('subject_name', 'own_id');
        $insert = DB::connection('mysql2')->table('subjects')
        ->insert([
            'subject_name' => $credentials['subject_name'],
            'own_id' => $credentials['own_id'],
            'created_at' => now(),
            'updated_at' => now()]);
        if ($insert) {
            return response()->json(['data' => $credentials]);
        }
        return response()->json(['error' => 'create error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function show($subjectID)
    {
        $listOne = DB::connection('mysql2')->table('subjects')
            ->join('users', 'subjects.own_id', '=', 'users.id')
            ->where('subjects.id', '=', $subjectID)
            ->select('subjects.id', 'subjects.subject_name', 'users.user_name')
            ->get();
        // return $listOne;
        return SubjectsResource::collection($listOne);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function edit(subjects $subjects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subjects $subjects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function destroy(subjects $subjects)
    {
        //
    }
}
