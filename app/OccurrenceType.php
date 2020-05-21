<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OccurrenceType extends Model
{
    protected $table = 'occurrences_type';


    protected $fillable = ['description'];
}
