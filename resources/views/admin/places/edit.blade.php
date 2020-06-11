@extends('layouts.front')
@section('content')
    <h1>Atualizar laboratório</h1>
    <form action="{{route('admin.places.update', $place->id)}}" method="POST">
        {{-- pra gragar usar metodo store conforme acima --}}
        @csrf
        @method("PUT")
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$place->description}}">

            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>



        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Atualizar laboratório</button>
        </div>
    </form>
@endsection
