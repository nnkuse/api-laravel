<?php

namespace App\Model;

use App\Model\ListOfDate;
use Illuminate\Database\Eloquent\Model;

class ListDetail extends Model
{
    public function listOfDate()
    {
        return $this->belongsTo(ListOfDate::class);
    }
}
