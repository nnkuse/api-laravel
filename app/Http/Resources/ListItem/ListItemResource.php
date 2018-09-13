<?php

namespace App\Http\Resources\ListItem;

use Illuminate\Http\Resources\Json\Resource;

class ListItemResource extends Resource
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
          'start_date' => $this->start_date,
          'end_date' => $this->end_date,
          'net_income' => $this->net_income,
          'href' => [
              'list_of_date' => route('listofdates.index', $this->id)
          ]
        ];
    }
}
