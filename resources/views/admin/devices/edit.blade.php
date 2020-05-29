@extends('layouts.app')

@section('content')
    <h1>Atualizar device</h1>
<form action="{{route('admin.devices.update', $device ?? ''->id)}}" method="POST">

        {{-- pra gragar usar metodo store conforme acima --}}
        @csrf
        @method("PUT")

        <div class="form-group">
            <label>descrição</label>
            <input type="text" name="description" class="form-control  @error('description') is-invalid @enderror" value="{{$device->description}}">

            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Patrimônio</label>
            <input type="text" name="patrimony" class="form-control" value="{{$device->patrimony}}">
        </div>

        <div class="form-group">
            <label>Laboratório</label>
            <select name="place" class="form-control" >

                @foreach ($places as $place)
                    <option value="{{$place->id}}" {{($place->id == $device->place_id) ? "selected" : ""}}>{{$place->description}}</option>

                 @endforeach
            </select>

        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Atualizar device</button>
        </div>
    </form>
@endsection
