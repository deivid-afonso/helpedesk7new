<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'description', 'patrimony', 'place_id'
    ];

    public function place()//lab
    {
        return $this->belongsTo(Place::class);
    }

}
