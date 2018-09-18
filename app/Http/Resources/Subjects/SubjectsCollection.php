<?php

namespace App\Http\Resources\Subjects;

use Illuminate\Http\Resources\Json\Resource;

class SubjectsCollection extends Resource
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
            'subject_name' => $this->subject_name,
            'own' => $this->user_name,
            'href' => [
                'link' => route('subjects.show', $this->id)
            ]
        ];
    }
}
