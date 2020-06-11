<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
class PlaceController extends Controller
{
    public function index($id)
    {
        //dd(Place::with('devices')->where('id', $id)->first());
        return Place::find($id)->devices;
    }
}
