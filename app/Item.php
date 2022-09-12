<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable =
    [
        'name',
        'description',
        'category_id',
        'department_id',
        'store_zone_id',
        'latest_zone_id',
    ];

    public function rfidTags()
    {
        return $this->hasMany('App\RfidTag');
    }

    public function rules()
    {
        return $this->hasMany('App\Rule');
    }

    public function registers()
    {
        return $this->hasMany('App\Register');
    }

    public function category()
    {
        return $this->belongsTo('App\ItemCategory');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function store_zone()
    {
        return $this->belongsTo('App\Zone');
    }

    public function latest_zone()
    {
        return $this->belongsTo('App\Zone');
    }
}
