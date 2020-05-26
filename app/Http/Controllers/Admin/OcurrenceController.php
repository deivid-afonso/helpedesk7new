<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Place;
use App\Http\Requests\OccurrenceRequest;
use App\User;
use App\Occurrence;
use App\OccurrenceType;


class OcurrenceController extends Controller
{
    private $occurrence;
   

    public function __construct(occurrence $occurrence)
    {
       $this->occurrence = $occurrence;
    }
 
    public function index()
    {
      
      $places = \App\Place::pluck('description', 'id')->all();
      $devices = \App\Device::pluck('description', 'id')->all();
      $occurrencestype = \App\OccurrenceType::pluck('description', 'id')->all();
      //dd($ocurrencestype);
      // $devices = \App\Device::with('place')->where('place_id', 2)->get();
      //  //setar essas condicoes no front end
      //  //dd($devices);
      // foreach($devices as $device) 
      //{
      //   echo $device->description;
      //   echo '<br/>';    
      //}

      $occurrences = $this->occurrence->paginate(10);
      //dd($occurrences);
      return view('admin.occurrences.index', compact('occurrences'));
    }
 
    public function create()
    {
        //ex device
        $places = Place::all('id', 'description');//lista places
      //dd($places);
      //$device = \App\Device::all(['id', 'description', 'patrimony', 'place_id']);
     //add os outros campos no create e no edit


      
       $occurrence = \App\Occurrence::all(['id', 'place_id']);
       return view('admin.occurrences.create', compact('occurrence', 'places'));
    }
 
    
 
 
    public function store(occurrenceRequest $request)
    {
      try 
      {
        $data = $request->all();
       //  dd($data);
        $occurrence = new occurrence;
        $occurrence->description = $data['description'];
        $occurrence->place_id = $data['place_id']; // esse valor deve vir de algum select depois ... nao se esqueca
 
        $occurrence->save();
     
        flash('Equipamento cadastrado com sucesso')->success();
        return redirect()->route('admin.occurrences.index');
 
      } 
      catch (\Throwable $th)
      {
        throw $th;
      }
     
    }
 
    public function edit($id)
    {
       $places = \App\Place::pluck('description', 'id')->all();
       //dd($places);
       $occurrence = \App\occurrence::findOrFail($id);
       //dd($occurrence);

       return view('admin.occurrences.edit', compact('occurrence'));
    }
 
    public function update(occurrenceRequest $request, $id)
    {
       try 
       {
         $data = $request->all();
        
         $occurrence = occurrence::find($id);
 
         $occurrence->description = $data['description'];
         $occurrence->save();
  
         flash('Equipamento atualizado com sucesso')->success();
         return redirect()->route('admin.occurrences.index');
       } 
       catch (\Throwable $th) 
       {
         throw $th;
       }
    }
 
    public function destroy($occurrence)
    {
       $occurrence = \App\occurrence::findOrFail($occurrence);
       //dd($occurrence);
       $occurrence->delete();
 
       flash('Usuário Deletado com sucesso')->success();
       return redirect()->route('admin.occurrences.index');
    }
}
