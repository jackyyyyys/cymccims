<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RfidReader extends Model
{
    //
    protected $fillable =
    [
        'name',
        'zone_id'
    ];

    public function registers()
    {
        return $this->hasMany('App\Register');
    }

    public function zone()
    {
        return $this->belongsTo('App\Zone');
    }
}
