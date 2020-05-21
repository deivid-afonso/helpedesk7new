<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OccurrenceType;

class OccurrenceTypeController extends Controller
{
    public function index()
    {
      //$occurrencesType = $this->occurrencesType->paginate(10);
      //dd($occurrencesType);
     // return view('admin.occurrencesType.index', compact('occurrencesType'));

        $occurrencesType = OccurrenceType::paginate(10);
        return view('admin.occurrencesType.index', compact('occurrencesType'));
    }

    public function create()
    {
      $ot = \App\OcurrenceType::all(['id', 'description']);

      return view('admin.occurrencesType.create', compact('occurrencesType'));
    }

    public function store(Request $request)
    {
      dd($request->all()); 
    }
}
