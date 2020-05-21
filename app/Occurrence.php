<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occurrence extends Model
{
    protected $fillable = [
        'user_id', 'occurrence_type_id', 'device_id', 'solution', 'obs', 'status'
    ];
    public $timestamps = true;


    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ocurrence_type()
    {
        return $this->belongsTo(OcurrenceType::class, 'occurrence_type_id');
    }

    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }
}
