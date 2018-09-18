<?php

namespace App\Http\Resources\Subjects;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
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
                'link' => route('checksin.index', $this->id)
            ]
        ];
    }
}
