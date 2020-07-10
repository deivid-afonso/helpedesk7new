<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OccurrenceType;
use App\Http\Requests\OccurrenceTypeRequest;
use RealRashid\SweetAlert\Facades\Alert;

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

      Alert::success('Tipo de Ocorrencia criada com sucesso', 'Success Message');

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


            Alert::success('Tipo de Ocorrencia alterada com sucesso', 'Success Message');

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

      Alert::success('Tipo de Ocorrencia deletada com sucesso', 'Success Message');

      return redirect()->route('admin.occurrencestype.index');
     }
    catch (\Throwable $th)
    {
      Alert::error('Não pode ser deletado!', 'Possui ocorrências cadastradas!');
      return redirect()->route('admin.occurrencestype.index');
    }
  }
}
