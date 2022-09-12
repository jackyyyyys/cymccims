<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    //
    protected $fillable =
    [
        'tag_id',
        'reader_id'
    ];

    public function rfidTag()
    {
        return $this->belongsTo('App\RfidTag');
    }

    public function rfidReader()
    {
        return $this->belongsTo('App\RfidReader');
    }
}
