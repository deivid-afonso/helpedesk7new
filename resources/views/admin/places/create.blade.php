@extends('layouts.front')
@section('content')
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-6">
                <h1 class="title is-4 has-text-centered">Criar Laboratório</h1>
                <div class="box">
                    <form action="{{route('admin.places.store')}}" method="POST">
                        {{-- pra gravar usar metodo store conforme acima --}}
                        @csrf
                        <div class="field">
                            <label class="label">Descrição</label>
                            <div class="control is-expanded">
                                <input type="text" name="description" class="input @error('description') is-invalid @enderror" value="{{old('description')}}">
                            </div>
                            @error('description')
                                <p class="has-text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div class="field">
                            <div class="control is-expanded">
                                <button type="submit" class="button is-success is-fullwidth">Criar Laboratório</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection    
