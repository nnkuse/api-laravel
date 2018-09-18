<?php

namespace App\Http\Resources\SubjectChecks;

use Illuminate\Http\Resources\Json\Resource;

class SubjectsCheckCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'subject_name'  => $this->subject_name,
            'in_date' => $this->in_date,
            'start_time'  => $this->start_time,
            'end_time' => $this->end_time,
            'token' => $this->token,
            'href'  => [
                'link' => route('studentcheck.index', [$this->subject_id, $this->id])
            ]
        ];
    }
}
