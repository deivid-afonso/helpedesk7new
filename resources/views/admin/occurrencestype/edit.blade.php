@extends('layouts.front')
@section('content')
    <h1>Atualizar tipo ocorrencia</h1>
    <form action="{{route('admin.occurrencestype.update', $occurrencetype->id)}}" method="POST">
        {{-- pra gragar usar metodo store conforme acima --}}
        @csrf
        @method("PUT")
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$occurrencetype->description}}">

            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>



        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Atualizar tipo ocorrência</button>
        </div>
    </form>
@endsection
