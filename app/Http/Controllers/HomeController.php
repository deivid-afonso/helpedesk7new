<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return redirect()->route('admin.occurrences.index');
       // return view('welcome');
    }
    //array_unique - se tiver repetido, tras somente um
    // array_column seta a coluna que vc quer trazer
    // dd(array_unique(array_column($occurrence, 'occurrence_id')))
}

