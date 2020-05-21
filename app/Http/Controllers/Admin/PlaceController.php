<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Place;
class PlaceController extends Controller
{
    private $place;
   

    public function __construct(place $place)
    {
       $this->place = $place;
    }
 
    public function index()
    {
     
      $places = $this->place->paginate(10);
        //dd($places);
      return view('admin.places.index', compact('places'));
    }
 
    public function create()
    {
       $place = \App\Place::all(['id', 'description']);
       return view('admin.places.create');
    }
 
    
 
 
    public function store(Request $request)
    {
      try 
      {
        $data = $request->all();
        
        $place = new place;
    
        $place->description = $data['description'];
     
        $place->save();
     
        flash('Lugar cadastrado com sucesso')->success();
        return redirect()->route('places.index');
 
      } 
      catch (\Throwable $th)
      {
        throw $th;
      }
     
    }
 
    public function edit($place)
    {
       $place = $this->place->findOrFail($place);
       return view('admin.places.edit', compact('place'));
    }
 
    public function update(Request $request, $place)
    {

        try
        {
            $data = $request->all();
            //dd($data);
           $this->place->find($place);
         
           //ver update e delete


            flash('Lugar cadastrado com sucesso')->success();
            return redirect()->route('places.index');
        } 
        catch (\Throwable $th) 
        {
            throw $th;
            flash('Erro, não cadastrado')->warning();
            return redirect()->route('places.index');


        }
      
    }
 
    public function destroy($id)
    {
       $place = \App\Place::find($place);
       $place->delete();
 
       flash('Usuário Deletado com sucesso')->success();
       return redirect()->route('admin.places.index');
    }

    
}
