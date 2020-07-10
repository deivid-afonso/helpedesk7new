<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Http\Requests\OccurrenceRequest;
use App\User;
use App\Occurrence;
use App\OccurrenceType;
use App\Device;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewOccurrenceOpenedEmail;
use Illuminate\Foundation\Auth\User as AuthUser;
use RealRashid\SweetAlert\Facades\Alert;

class OcurrenceController extends Controller
{
    private $occurrence;


    public function __construct(occurrence $occurrence)
    {
       $this->occurrence = $occurrence;
       $this->middleware(['auth', 'role:User']);
    }

    public function index()
    {
        //para você conseguir usar o $this->middleware('role:Admin') ou permission:Editar algo ou can:editar algo
        //->where('status', '<>', 1)
       $occurrences = $this->occurrence->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(10); //lista somente ocorrencias do user
       $places = Place::all('description');

      return view('occurrences.index', compact('occurrences','places'));
    }

    public function create()
    {
        //ex device
      $places = Place::all('id', 'description');//lista places
      //dd($places);
      $devices = Device::all(['id', 'description']);
    //   $users = User::all(['id', 'name']);

      //dd($user);
      $occurrencestype = OccurrenceType::all(['id', 'description']);
      //dd($devices);
     //add os outros campos no create e no edit



       $occurrence = \App\Occurrence::all(['id','user_id', 'occurrence_type_id', 'device_id', 'solution', 'obs', 'status', 'place_id']);
       return view('occurrences.create', compact('occurrence', 'places', 'devices', 'occurrencestype'));
    }




    public function store(occurrenceRequest $request)
    {
      try
      {
        $data = $request->all();
        $occurrence = new occurrence;
        $occurrence->user_id = auth()->user()->id; //grava o user autenticado

        $occurrence->place_id = $data['place_id']; // esse valor deve vir de algum select depois ... nao se esqueca
        $occurrence->occurrence_type_id = $data['occurrence_type_id'];
        $occurrence->device_id = $data['device_id'];
        // $occurrence->solution = $data['solution'];
        $occurrence->obs = $data['obs'];
        $occurrence->status = 'Aberto';
        $user = auth()->user()->name;
        $occurrence->save();

        //Mail::to('peafonso@gmail.com.br')->send(new NewOccurrenceOpenedEmail($user));

        Alert::success('Ocorrencia editada com sucesso', 'Success Message');
        return redirect()->route('user.occurrence.index');

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
       return view('occurrences.edit', compact('occurrence', 'places', 'devices', 'occurrencestype'));

    }

    public function update(occurrenceRequest $request, $id)
    {
       try
       {
         $data = $request->all();
         //dd($data);
         $occurrence = occurrence::find($id);


         $occurrence->update($data);
         flash('Ocorrência atualizada com sucesso')->success();
         return redirect()->route('user.occurrence.index');
       }
       catch (\Throwable $th)
       {
         throw $th;
         flash('erro')->warning();
         return redirect()->route('user.occurrence.index');
       }
    }

    public function destroy($occurrence)
    {
       $occurrence = \App\occurrence::findOrFail($occurrence);
       //dd($occurrence);
       $occurrence->delete();

       flash('Ocorrência Deletada com sucesso')->success();
       return redirect()->route('user.occurrence.index');
    }

    public function show($occurrence)
    {
       $places = Place::all('id', 'description');
       $devices = Device::all(['id', 'description']);
       $occurrencestype = OccurrenceType::all(['id', 'description']);
       $occurrence = \App\occurrence::findOrFail($occurrence);
       return view('admin.occurrences.details', compact('occurrence', 'places', 'devices', 'occurrencestype'));
    }
}
