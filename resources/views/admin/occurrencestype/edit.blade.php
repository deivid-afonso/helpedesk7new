@extends('layouts.app')

@section('content')
    <h1>Atualizar Tipos de Ocorrencias</h1>
<form action="{{route('occurrencesType.update', ['occurrencesType=>$occurrencesType->id'])}}" method="POST">
        {{-- pra gragar usar metodo store conforme acima --}}
        @csrf
        @method("PUT")
        <div class="form-group">
            <label>descrição</label>
            <input type="text" name="description" class="form-control" value={{$occurrencesType->description}}>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Atualizar Tipo ocorrencia</button>
        </div>
    </form>
@endsection    
