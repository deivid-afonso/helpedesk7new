<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['description'];

    public function devices()
    {
        return $this->hasMany(Device::class,'place_id','id');

    }
}
