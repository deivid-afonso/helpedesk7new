<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['description'];

    public function device()
    {
        return $this->hasMany(Device::class,'device_id','id');

    }
}
