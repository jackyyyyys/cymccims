<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    //
    protected $fillable =
    [
        'item_id',
        'zone_id',
        'is_allowed_in'
    ];

    public function zone()
    {
        return $this->belongsTo('App\Zone');
    }

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
