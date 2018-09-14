<?php

namespace App\Http\Resources\ListOfDate;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\JsonResource;

class ListOfDateResource extends JsonResource
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
            'list_name' => $this->list_name,
            'agency' => $this->agency,
            'in_date' => $this->in_date,
            'href' => [
                'link' => route('listdetails.index', [$this->list_item_id, $this->id])
            ]
        ];
    }
}
