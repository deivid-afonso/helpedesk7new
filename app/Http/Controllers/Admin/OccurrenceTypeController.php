<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OccurrenceType;
use App\Http\Requests\OccurrenceTypeRequest;

class OccurrenceTypeController extends Controller
{
  private $occurrencetype;
   

  public function __construct(occurrencetype $occurrencetype)
  {
    $this->middleware(['auth', 'role:Admin']);

     $this->occurrencetype = $occurrencetype;
  }

  public function index()
  {
    $occurrencestypes = \App\OccurrenceType::paginate(10);
    //dd($occurrencesType eu botei tudo minusculo pra minimizar os erro, e nada
    return view('admin.occurrencestype.index', compact('occurrencestypes'));
  }


  public function create()
  {

     $occurrencestype = \App\OccurrenceType::all(['id', 'description']);
     
     return view('admin.occurrencestype.create', compact('occurrencestype'));
  }

  


  public function store(OccurrenceTypeRequest $request)
  {
    try 
    {
      $data = $request->all();
      
      $occurrencetype = new Occurrencetype;
  
      $occurrencetype->description = $data['description'];
   
      $occurrencetype->save();
   
      flash('tipo de ocorrência cadastrado com sucesso')->success();
      return redirect()->route('admin.occurrencestype.index');

    } 
    catch (\Throwable $th)
    {
      throw $th;
    } //o link do menu vc vai chamar admin.ocurrencestype.create
   
  }

  public function edit($occurrencetype)
  {
      $occurrencetype = \App\OccurrenceType::findOrFail($occurrencetype);
      //dd($occurrencetype);
      return view('admin.occurrencestype.edit', compact('occurrencetype'));
    
  }

  public function update(OccurrenceTypeRequest $request, $occurrencetype)
  {

      try
      {
        $data = $request->all();
        //dd($id); 
       
        $occurrencetype = OccurrenceType::findOrFail($occurrencetype);

        
        $occurrencetype->description = $data['description'];
        $occurrencetype->save();


          flash('Tipo de ocorrencia atualizada com sucesso')->success();
          return redirect()->route('admin.occurrencestype.index');
      } 
      catch (\Throwable $th) 
      {
          throw $th;
          flash('Erro, não cadastrado')->warning();
          return redirect()->route('admin.occurrencestype.index');


      }
    
  }

  public function destroy($occurrencetype)
  {
     try {
      $occurrencetype = \App\OccurrenceType::findOrFail($occurrencetype);
      //dd($occurrencetype);
      $occurrencetype->delete();
 
      flash('Tipo ocorrência Deletado com sucesso')->success();
      return redirect()->route('admin.occurrencestype.index');
     } catch (\Throwable $th) {
      flash('Tipo ocorrência não pode ser deletado!')->warning();
      return redirect()->route('admin.occurrencestype.index');
       throw $th;
     }
  }
}
