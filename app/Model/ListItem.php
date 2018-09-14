<?php

namespace App\Model;

use App\Model\ListOfDate;
use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    public function listOfDate()
    {
        return $this->hasMany(ListOfDate::class);
    }
}
