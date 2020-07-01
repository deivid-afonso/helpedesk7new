@extends('layouts.front')
@section('content')
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-6">
                    <h1 class="title is-4 has-text-dark has-text-centered">Atualizar laboratório</h1>
                    <div class="box">
                        <form action="{{route('admin.places.update', $place->id)}}" method="POST">
                            {{-- pra gragar usar metodo store conforme acima --}}
                            @csrf
                            @method("PUT")
                            <div class="field">
                                <label class="label">Descrição</label>
                                <input type="text" name="description" class="input @error('description') is-invalid @enderror" value="{{$place->description}}">
                                @error('description')
                                    <p class="has-text-danger">
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>
                            <div class="field">
                                <div class="control is-expanded">
                                   <button type="submit" class="button is-success is-fullwidth">Atualizar laboratório</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
