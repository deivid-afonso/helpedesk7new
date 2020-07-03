@extends('layouts.front')
@section('content')
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-6">
                <h1 class="title is-centered has-text-centered">Criar Tipo Ocorrência</h1>
                <div class="box">
                    <form action="{{route('admin.occurrencestype.store')}}" method="POST">
                        {{-- pra gravar usar metodo store conforme acima --}}
                        @csrf
                        <div class="field">
                            <label class="label">Descrição</label>
                            <div class="control is-expanded">
                                <input type="text" name="description" class="input @error('description') is-invalid @enderror" value="{{old('description')}}">
                            </div>
                            @error('description')
                                <div class="notification is-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="field">
                            <div class="control is-expanded">
                                <button type="submit" class="button is-success is-fullwidth">Criar Tipo Ocorrência</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
