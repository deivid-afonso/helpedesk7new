@extends('layouts.front')

@section('content')
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-6">
                <h1 class="title is-4 has-text-centered">Atualizar device</h1>
                <div class="box">
                    <form action="{{route('admin.devices.update', $device ?? ''->id)}}" method="POST">
                        {{-- pra gravar usar metodo store conforme acima --}}
                        @csrf
                        @method("PUT")
                        <div class="field">
                            <label class="label">descrição</label>
                            <div class="control is-expanded">
                                <input type="text" name="description" class="input  @error('description') is-invalid @enderror" value="{{$device->description}}">
                            </div>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="label">Patrimônio</label>
                            <div class="control is-expanded">
                                <input type="text" name="patrimony" class="input" value="{{$device->patrimony}}">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Laboratório</label>
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select name="place" >
                                        @foreach ($places as $place)
                                            <option value="{{$place->id}}" {{($place->id == $device->place_id) ? "selected" : ""}}>{{$place->description}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control is-expanded">
                                <button type="submit" class="button is-success is-fullwidth">Atualizar device</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
