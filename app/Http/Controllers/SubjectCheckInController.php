<?php

namespace App\Http\Controllers;

use App\subject_check_in;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\SubjectChecks\SubjectsCheckCollection;

class SubjectCheckInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subjectID)
    {
        $subjectCheck = DB::connection('mysql2')->table('subject_checks')
            ->join('subjects', 'subject_checks.subject_id', '=', 'subjects.id')
            ->where('subjects.id', '=', $subjectID)
            ->select('subject_checks.*', 'subjects.subject_name')
            ->paginate(20);
        // return $subjectCheck;
        return SubjectsCheckCollection::collection($subjectCheck);
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
    public function store(Request $request, $subjectID)
    {
        $credentials = $request->only('in_date', 'start_time', 'end_time');
        $token = $this->getToken(5);
        $insert = DB::connection('mysql2')->table('subject_checks')
            ->insert([
                'in_date' => $credentials['in_date'],
                'start_time' => $credentials['start_time'],
                'end_time' => $credentials['end_time'],
                'token' => $token,
                'subject_id' => $subjectID,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        $credentials['token'] = $token;
        if ($insert) {
            return response()->json(['data' => $credentials]);
        }
        return response()->json(['error' => 'create error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subject_check_in  $subject_check_in
     * @return \Illuminate\Http\Response
     */
    public function show($subjectID, $subjectCheckID)
    {
        // $listOne = DB::connection('mysql2')->table('subjects')
        //     ->join('users', 'subjects.own_id', '=', 'users.id')
        //     ->where('subjects.id', '=', $subjectID)
        //     ->select('subjects.id', 'subjects.subject_name', 'users.user_name')
        //     ->get();
        // // return $listOne;
        // return SubjectsResource::collection($listOne);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subject_check_in  $subject_check_in
     * @return \Illuminate\Http\Response
     */
    public function edit(subject_check_in $subject_check_in)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subject_check_in  $subject_check_in
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subject_check_in $subject_check_in)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subject_check_in  $subject_check_in
     * @return \Illuminate\Http\Response
     */
    public function destroy(subject_check_in $subject_check_in)
    {
        //
    }

    function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int)($log / 8) + 1; // length in bytes
        $bits = (int)$log + 1; // length in bits
        $filter = (int)(1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }

    function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }

        return $token;
    }
}
