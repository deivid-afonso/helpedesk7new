@extends('layouts.app')

@section('content')
    <h1>Atualizar place</h1>
<form action="{{route('places.update', ['place=>$place->id'])}}" method="POST">
        {{-- pra gragar usar metodo store conforme acima --}}
        @csrf
        @method("PUT")
        <div class="form-group">
            <label>descrição</label>
            <input type="text" name="description" class="form-control" value={{$place->description}}>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Atualizar place</button>
        </div>
    </form>
@endsection    
