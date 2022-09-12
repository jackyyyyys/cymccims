<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    //
    protected $fillable =
    [
        'name',
        'description'
    ];

    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
