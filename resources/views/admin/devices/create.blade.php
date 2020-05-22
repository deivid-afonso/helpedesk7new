@extends('layouts.app')

@section('content')
    <h1>Criar Device</h1>
<form action="{{route('admin.devices.store')}}" method="POST">
        {{-- pra gravar usar metodo store conforme acima --}}
        @csrf
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Patrimonio</label>
            <input type="text" name="patrimony" class="form-control">
        </div>

        <div class="form-group">
            <label>Laboratório</label>
            <select name="place_id" class="form-control">
               
                @foreach ($places as $place)
                    <option value="{{$place->id}}">{{$place->description}} </option>
                 @endforeach
            </select>
           
        </div>
        
        
        
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Criar Device</button>
        </div>
    </form>
@endsection    
