<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Place;


class Device extends Model
{
    protected $fillable = [
        'description', 'patrimony', 'place_id'
    ];

    public function place()//lab
    {
        return $this->belongsTo(Place::class,'place_id','id');

    }

}
