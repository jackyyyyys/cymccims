<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    //
    protected $fillable =
    [
        'name',
        'description',
        'theatre_id'
    ];

    public function rfidReaders()
    {
        return $this->hasMany('App\RfidReader');
    }

    public function rules()
    {
        return $this->hasMany('App\Rule');
    }

    public function registers()
    {
        return $this->hasMany('App\Register');
    }

    public function theatre()
    {
        return $this->belongsTo('App\Theatre');
    }
}
