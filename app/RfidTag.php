<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RfidTag extends Model
{
    //
    protected $fillable =
    [
        'name',
        'item_id'
    ];

    public function registers()
    {
        return $this->hasMany('App\Register');
    }

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
