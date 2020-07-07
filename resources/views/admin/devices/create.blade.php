@extends('layouts.front')

@section('content')
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-6">
                <h1 class="title is-4 has-text-dark has-text-centered">Cadastrar Equipamento</h1>
                <div class="box">
                    <form action="{{route('admin.devices.store')}}" method="POST">
                        {{-- pra gravar usar metodo store conforme acima --}}
                        @csrf
                        <div class="field">
                            <label class="label">Descrição</label>
                            <div class="control is-expanded">
                                <input type="text" name="description" class="input @error('description') is-invalid @enderror" value="{{old('description')}}">
                            </div>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="label">Patrimonio</label>
                            <input type="text" name="patrimony" class="input @error('patrimony') is-invalid @enderror" value="{{old('patrimony')}}">

                            @error('patrimony')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="label">Laboratório</label>
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select name="place_id">
                                        @foreach ($places as $place)
                                            <option value="{{$place->id}}">{{$place->description}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field pt-4">
                            <div class="control is-expanded">
                                <button type="submit" class="button is-success is-fullwidth">Cadastrar Equipamento</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection    
