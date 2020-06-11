@extends('layouts.front')
@section('content')
    <h1>Atualizar ocorrencia</h1>
<form action="{{route('admin.occurrences.update', $occurrence ?? ''->id)}}" method="POST">

        {{-- pra gragar usar metodo store conforme acima --}}
        @csrf
        @method("PUT")

        <div class="form-group">
            <label>Laboratório</label>
            <select disabled name="place" class="form-control" >

                @foreach ($places as $place)
                    <option  value="{{$place->id}}" {{($place->id == $occurrence->place_id) ? "selected" : ""}}>{{$place->description}}</option>

                 @endforeach
            </select>

        </div>

        <div class="form-group">
            <label>Equipamento</label>
            <select disabled name="device" class="form-control" >
                @foreach ($devices as $device)
                    <option  value="{{$device->id}}" {{($device->id == $occurrence->device_id) ? "selected" : ""}}>{{$device->description}}</option>

                 @endforeach
            </select>

        </div>

        <div class="form-group">
            <label>Tipo Ocorrência</label>
            <select disabled name="occurrencetype" class="form-control" >
                @foreach ($occurrencestype as $occurrencetype)
                    <option  value="{{$occurrencetype->id}}" {{($occurrencetype->id == $occurrence->occurrencetype_id) ? "selected" : ""}}>{{$occurrencetype->description}}</option>

                 @endforeach
            </select>

        </div>

        <div class="form-group">
            <label>solucao</label>
            <input type="text" name="solution" class="form-control  @error('solution') is-invalid @enderror" value="{{$occurrence->solution}}">

            @error('solution')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>


        <div class="form-group">
            <label>status</label>
            <input type="text" name="status" class="form-control  @error('status') is-invalid @enderror" value="{{$occurrence->status}}">

            @error('status')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>obs</label>
            <input type="text" name="obs" class="form-control  @error('obs') is-invalid @enderror" value="{{$occurrence->obs}}">

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
