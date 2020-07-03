@extends('layouts.front')
@section('content')
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-narrow">
                <h1 class="title is-3">Atualizar tipo ocorrencia</h1>
                <div class="box">
                    <form action="{{route('admin.occurrencestype.update', $occurrencetype->id)}}" method="POST">
                        {{-- pra gragar usar metodo store conforme acima --}}
                        @csrf
                        @method("PUT")
                        <div class="field">
                            <label class="label">Descrição</label>
                            <div class="control">
                                <input type="text" name="description" class="input @error('description') is-invalid @enderror" value="{{$occurrencetype->description}}">
                            </div>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-success is-fullwidth">Atualizar tipo ocorrência</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
