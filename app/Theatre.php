<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    //
    protected $fillable =
    [
        'name',
        'description'
    ];

    public function zones()
    {
        return $this->hasMany('App\Zone');
    }
}
