<?php

namespace App\Http\Controllers;

use App\check_in;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subjectID, $subjectCheckID)
    {
        $check = DB::connection('mysql2')->table('check_in')
            ->join('subject_checks', 'check_in.subject_check_id', '=', 'subject_checks.id')
            ->join('subjects', 'subject_checks.subject_id', '=', 'subjects.id')
            ->join('students', 'check_in.student_id', 'students.student_id')
            ->where('subjects.id', '=', $subjectID)
            ->where('subject_checks.id', '=', $subjectCheckID)
            ->select('check_in.id', 'students.student_id', 'full_name')
            ->paginate(20);
        // return $check;
        return SubjectsCheckCollection::collection($check);
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
    public function store(Request $request, $subjectID, $subjectCheckID)
    {
        $credentials = $request->only('student_id', 'token');
        $tokens = DB::connection('mysql2')->table('subject_checks')
            ->join('subjects', 'subject_checks.subject_id', '=', 'subjects.id')
            ->where('subjects.id', '=', $subjectID)
            ->where('subject_checks.id', '=', $subjectCheckID)
            ->select('subject_checks.token')
            ->get();
        return $tokens;
        // if ($credentials['token'] == $tokens){
        //     $insert = DB::connection('mysql2')->table('check_in')
        //         ->insert([
        //             'student_id' => $credentials['in_date'],
        //             'subject_check_id' => $credentials['start_time'],
        //             'created_at' => now(),
        //             'updated_at' => now()
        //         ]);
        // } else {
        //     return response()->json(['error' => 'token_invalid']);
        // }

        if ($insert) {
            return response()->json(['data' => $credentials]);
        }
        return response()->json(['error' => 'create error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\check_in  $check_in
     * @return \Illuminate\Http\Response
     */
    public function show(check_in $check_in)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\check_in  $check_in
     * @return \Illuminate\Http\Response
     */
    public function edit(check_in $check_in)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\check_in  $check_in
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, check_in $check_in)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\check_in  $check_in
     * @return \Illuminate\Http\Response
     */
    public function destroy(check_in $check_in)
    {
        //
    }
}
