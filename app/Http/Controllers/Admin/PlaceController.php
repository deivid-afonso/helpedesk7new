<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Place;
use App\Device;
use App\User;
use App\Http\Requests\PlaceRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PlaceController extends Controller
{
    private $place;


    public function __construct(place $place)
    {
       $this->middleware(['auth', 'role:Admin']);

       $this->place = $place;
    }

    public function index()
    {

      $places = \App\Place::paginate(10);

      return view('admin.places.index', compact('places'));
    }


    public function create()
    {

      
      $users = User::whereHas('roles', function($query) {
        $query->where('name', 'Admin');
        })->get();
        dd($users);
       $places = \App\Place::all(['id', 'description']);
       return view('admin.places.create', compact('places'));
    }




    public function store(PlaceRequest $request)
    {
      try
      {
        $data = $request->all();

        $place = new place;

        $place->description = $data['description'];

        $place->save();

        Alert::success('Laboratório criado com sucesso', 'Success Message');
        return redirect()->route('admin.places.index');

      }
      catch (\Throwable $th)
      {
        //dd($th);
        Alert::error('Ocorreu um erro ao criar o laboratório', 'Error Message');
       return view('admin.places.create', compact('places'));
      }
    }

    public function edit($place)
    {
       $place = $this->place->findOrFail($place);
       return view('admin.places.edit', compact('place'));
    }

    public function update(PlaceRequest $request, $place)
    {
        try
        {
            $data = $request->all();
            //dd($id);

            $place = Place::findOrFail($place);


            $place->description = $data['description'];
            $place->save();


            Alert::success('Laboratório alterado com sucesso', 'Success Message');
            return redirect()->route('admin.places.index');
        }
        catch (\Throwable $th)
        {
            throw $th;
            Alert::error('Erro, não foi possível alterar', 'Erro Message');
            return redirect()->route('admin.places.index');
        }
    }

    public function destroy($place)
    {
      $device = \App\Device::all(['place_id'])->has($place);
      

      if (!$device) 
      {
        try
        {
            $place = \App\Place::findOrFail($place);
            $place->delete();
            Alert::success('Laboratório removido com sucesso', 'Success Message');
            return redirect()->route('admin.places.index');
        }
        catch (\Throwable $e) 
        {
            report($e);
        }
      }
      else
      {
        Alert::error('Não pode ser deletado!', 'Possui equipamentos cadastrados!');
        return redirect()->route('admin.places.index');
      } 
    }

}
