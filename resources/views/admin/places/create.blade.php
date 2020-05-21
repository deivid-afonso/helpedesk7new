@extends('layouts.app')

@section('content')
    <h1>Criar Device</h1>
<form action="{{route('places.store')}}" method="POST">
        {{-- pra gravar usar metodo store conforme acima --}}
        <input type="hidden" name="_token" value={{csrf_token()}}>
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control">
        </div>
        
    
        
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Criar Device</button>
        </div>
    </form>
@endsection    
