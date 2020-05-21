<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OccurrenceType;

class OccurrenceTypeController extends Controller
{
    public function index()
    {
      //$occurrencesType = $this->occurrencesType->paginate(10);
      //dd($occurrencesType);
     // return view('admin.occurrencesType.index', compact('occurrencesType'));

        $occurrencesType = \App\OccurrenceType::paginate(10);
        return view('admin.occurrencestype.index', compact('occurrencestype'));
    }

    public function create()
    {
      $ot = \App\OcurrenceType::all(['id', 'description']);

      return view('admin.occurrencestype.create', compact('occurrencestype'));
    }

    public function store(Request $request)
    {
      dd($request->all()); 
    }
}
