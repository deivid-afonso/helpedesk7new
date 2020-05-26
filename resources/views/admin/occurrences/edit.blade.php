@extends('layouts.app')

@section('content')
    <h1>Atualizar ocorrencia</h1>
<form action="{{route('admin.occurrences.update', $occurrence ?? ''->id)}}" method="POST">
    
        {{-- pra gragar usar metodo store conforme acima --}}
        @csrf
        @method("PUT")

        <div class="form-group">
            <label>Tipo ocorrência</label>
            <select name="place" class="form-control" >
               
                @foreach ($places as $place) 
                    <option value="{{$place->id}}" {{($place->id == $device->place_id) ? "selected" : ""}}>{{$place->description}}</option>
      
                 @endforeach
            </select>
           
        </div>

        <div class="form-group">
            <label>solucao</label>
            <input type="text" name="status" class="form-control"  @error('solution') is-invalid @enderror" value={{$occurrence->solution}}>

            @error('solution')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        
       
        <div class="form-group">
            <label>status</label>
            <input type="text" name="status" class="form-control"  @error('status') is-invalid @enderror" value={{$occurrence->status}}>

            @error('status')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>obs</label>
            <input type="text" name="obs" class="form-control"  @error('obs') is-invalid @enderror" value={{$occurrence->obs}}>

            @error('obs')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        
        
      
        
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Atualizar ocorrencia</button>
        </div>
    </form>
@endsection    
