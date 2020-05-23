<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OccurrenceType;
use App\Http\Requests\OccurrenceTypeRequest;

class OccurrenceTypeController extends Controller
{
  private $occurrenceType;
   

  public function __construct(occurrenceType $occurrenceType)
  {
     $this->occurrenceType = $occurrenceType;
  }

  public function index()
  {
   
    

    $occurrencesType = \App\OccurrenceType::paginate(10);
    //dd($occurrenceType);
    return view('admin.occurrencestype.index', compact('occurrencesType'));
  }


  public function create()
  {

     $occurrencesType = \App\OccurrenceType::all(['id', 'description']);
     
     return view('admin.occurrencestype.create', compact('occurrencesType'));
  }

  


  public function store(OccurrenceTypeRequest $request)
  {
    try 
    {
      $data = $request->all();
      
      $occurrenceType = new OccurrenceType;
  
      $occurrenceType->description = $data['description'];
   
      $occurrenceType->save();
   
      flash('Lugar cadastrado com sucesso')->success();
      return redirect()->route('admin.occurrencestype.index');

    } 
    catch (\Throwable $th)
    {
      throw $th;
    }
   
  }

  public function edit($occurrenceType)
  {
     $occurrencesType = $this->occurrenceType->findOrFail($occurrenceType);
     return view('admin.occurrencestype.edit', compact('occurrencesType'));
  }

  public function update(OccurrenceTypeRequest $request, $occurrenceType)
  {

      try
      {
        $data = $request->all();
        //dd($id); 
       
        $occurrenceType = OccurrenceType::findOrFail($occurrenceType);

        
        $occurrenceType->description = $data['description'];
        $occurrenceType->save();


          flash('Lugar cadastrado com sucesso')->success();
          return redirect()->route('admin.occurrencestype.index');
      } 
      catch (\Throwable $th) 
      {
          throw $th;
          flash('Erro, não cadastrado')->warning();
          return redirect()->route('admin.occurrencestype.index');


      }
    
  }

  public function destroy($occurrenceType)
  {
     $occurrenceType = \App\OccurrenceType::findOrFail($occurrenceType);
     //dd($occurrenceType);
     $occurrenceType->delete();

     flash('Lugar Deletado com sucesso')->success();
     return redirect()->route('admin.occurrencestype.index');
  }
}
