<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ListDetailResource extends Resource
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
            'list_detail_name' => $this->list_detail_name,
            'in_come' => $this->in_come,
            'expense' => $this->expense,
            'net_income' => $this->net_income,
            // 'href' => [
            //     'link' => route('listdetails.index', $this->id)
            // ]
        ];
    }
}
