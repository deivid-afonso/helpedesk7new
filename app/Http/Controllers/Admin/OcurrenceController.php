<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Place;
use App\User;
use App\Occurrence;
use App\OccurrenceType;
use App\Device;
use RealRashid\SweetAlert\Facades\Alert;

class OcurrenceController extends Controller
{
    private $occurrence;


    public function __construct(occurrence $occurrence)
    {

       $this->occurrence = $occurrence;
       $this->middleware(['auth', 'role:Admin']);

    }

    public function index()
    {
       $occurrences = $this->occurrence->paginate(10);
       $places = Place::all('description');
       return view('admin.occurrences.index', compact('occurrences','places'));
    }

    public function create()
    {
        //ex device
      $places = Place::all('id', 'description');//lista places
      //dd($places);
      $devices = Device::all(['id', 'description']);
      $users = User::all(['id', 'name']);
      $occurrencestype = OccurrenceType::all(['id', 'description']);
      //dd($devices);
     //add os outros campos no create e no edit

       $occurrence = \App\Occurrence::all(['id','user_id', 'occurrence_type_id', 'device_id', 'solution', 'obs', 'status', 'place_id']);
       return view('admin.occurrences.create', compact('occurrence', 'places', 'devices', 'users', 'occurrencestype'));
    }

    public function store(Request $request)
    {
      try
      {
        //dd($request);
        $data = $request->all();
        //dd($data);
        $occurrence = new occurrence;
        $occurrence->user_id = $data['user_id'];
        $occurrence->place_id = $data['place_id']; // esse valor deve vir de algum select depois ... nao se esqueca
        $occurrence->occurrence_type_id = $data['occurrence_type_id'];
        $occurrence->device_id = $data['device_id'];
        $occurrence->solution = $data['solution'];
        $occurrence->obs = $data['obs'];
        $occurrence->status = $data['status'];

        $occurrence->save();

        Alert::success('Ocorrencia criada com sucesso', 'Success Message');

        return redirect()->route('admin.occurrences.index');

      }
      catch (\Throwable $th)
      {
        throw $th;
        flash('Error')->warning();
      }

    }

    public function edit($occurrence)
    {
      //$places = \App\Place::pluck('description', 'id')->all();
       $places = Place::all('id', 'description');
       //dd($places);
       $devices = Device::all(['id', 'description']);
      //  $users = User::all(['id', 'name']);
       $occurrencestype = OccurrenceType::all(['id', 'description']);
       //dd($places);
       $occurrence = \App\occurrence::findOrFail($occurrence);
       //dd($occurrence);
       return view('admin.occurrences.edit', compact('occurrence', 'places', 'devices', 'occurrencestype'));

    }

    public function update(Request $request, $id)
    {
       try
       {
         $data = $request->all();
         //dd($data);
         $occurrence = occurrence::find($id);


         $occurrence->update($data);
         Alert::success('Ocorrencia editada com sucesso', 'Success Message');

         return redirect()->route('admin.occurrences.index');
       }
       catch (\Throwable $th)
       {
         throw $th;
         flash('erro')->warning();
         return redirect()->route('admin.occurrences.index');
       }
    }

    public function destroy($occurrence)
    {
       $occurrence = \App\occurrence::findOrFail($occurrence);
       //dd($occurrence);
       $occurrence->delete();

       Alert::success('Ocorrencia removida com sucesso', 'Success Message');

       return redirect()->route('admin.occurrences.index');
    }
}
