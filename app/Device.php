<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Place;


class Device extends Model
{
    protected $fillable = [ /// eita ... ta errado eita 2  os belong to ai ta errado?
        //um device pertence somente a um place
        //um place pode ter muitos devices
        'description', 'patrimony', 'place_id'
    ];

    public function place()//lab
    { /// nao ... 
        return $this->belongsTo(Place::class,'place_id','id');
        
    }

}
