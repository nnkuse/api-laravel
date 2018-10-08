<?php

namespace App\Http\Resources\ListOfDate;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\JsonResource;

class ListOfDateCollection extends JsonResource
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
            'list_item_id' => $this->list_item_id,
            'list_name' => $this->list_name,
            'agency' => $this->agency,
            'in_date' => $this->in_date,
            'href' => [
                'link' => route('listofdates.show', [$this->list_item_id, $this->id])
            ]
        ];
    }
}
