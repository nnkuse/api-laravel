<?php

namespace App\Model;

use App\Model\ListItem;
use App\Model\ListDetail;
use Illuminate\Database\Eloquent\Model;

class ListOfDate extends Model
{
    public function listItem()
    {
        return $this->belongsTo(ListItem::class);
    }

    public function listDetail()
    {
        return $this->hasMany(ListDetail::class);
    }
}
