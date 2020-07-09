<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['description', 'user_id'];

    public function devices()
    {
        return $this->hasMany(Device::class,'place_id','id');

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
