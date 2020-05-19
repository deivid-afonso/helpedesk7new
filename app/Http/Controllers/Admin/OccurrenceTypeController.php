<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OccurrenceTypeController extends Controller
{
    public function index()
    {
      // $users = $this->repository->all();

        //return view('user.index', [
          //  'users' => $users
        //]);

        $ot = \App\OcurrenceType::paginate(10);
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
