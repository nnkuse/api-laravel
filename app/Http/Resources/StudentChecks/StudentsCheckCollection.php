<?php

namespace App\Http\Resources\StudentChecks;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentsCheckCollection extends ResourceCollection
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
            'student' => $this->subject_name,
        ];
    }
}
