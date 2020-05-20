@extends('layouts.app')

@section('content')
    <h1>Atualizar device</h1>
<form action="{{route('admin.devices.update', ['device=>$device->id'])}}" method="POST">
        {{-- pra gragar usar metodo store conforme acima --}}
        <input type="hidden" name="_token" value={{csrf_token()}}>
        <div class="form-group">
            <label>descrição</label>
            <input type="text" name="description" class="form-control" value={{$device->description}}>
        </div>
        
        <div class="form-group">
            <label>E-mail</label>
            <input type="text" name="patrimony" class="form-control" value={{$device->patrimony}}>
        </div>
        
      
        
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Atualizar device</button>
        </div>
    </form>
@endsection    
