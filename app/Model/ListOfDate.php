<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ListOfDate extends Model
{
    public function listItem()
    {
        return $this->belongsTo(ListItem::class);
    }
}
