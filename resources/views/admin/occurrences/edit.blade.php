@extends('layouts.front')
@section('content')

<section class="section">
    <div class="container">
        <h1 class="title has-text-centered has-text-primary">Atualizar Ocorrência</h1>
        <div class="columns is-centered">
            <div class="column is-6">
                <div class="box">
                    <form action="{{route('admin.occurrences.update', $occurrence ?? ''->id)}}" method="POST">
                        {{-- pra gragar usar metodo store conforme acima --}}
                        @csrf
                        @method("PUT")
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <div class="control is-expanded">
                                        <label class="label">Laboratório</label>
                                        <div class="select is-fullwidth">
                                            <select disabled name="place">
                                                @foreach ($places as $place)
                                                    <option  value="{{$place->id}}" {{($place->id == $occurrence->place_id) ? "selected" : ""}}>{{$place->description}}</option>
                                                 @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <div class="control is-expanded">
                                        <label class="label">Equipamento</label>
                                        <div class="select is-fullwidth">
                                            <select disabled name="device">
                                                @foreach ($devices as $device)
                                                    <option  value="{{$device->id}}" {{($device->id == $occurrence->device_id) ? "selected" : ""}}>{{$device->description}}</option>
                                                 @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">Tipo Ocorrência</label>
                                    <div class="control is-expanded">
                                        <div class="select is-fullwidth">
                                            <select disabled name="occurrencetype">
                                                @foreach ($occurrencestype as $occurrencetype)
                                                    <option  value="{{$occurrencetype->id}}" {{($occurrencetype->id == $occurrence->occurrencetype_id) ? "selected" : ""}}>{{$occurrencetype->description}}</option>
                                                 @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">Status</label>
                        {{--            <input type="text" name="status" class="form-control  @error('status') is-invalid @enderror" value="{{$occurrence->status}}">--}}
                                    <div class="control is-expanded">
                                        <div class="select is-fullwidth">
                                            <select name="status">
                                                <option  value="Em atendimento" selected>Em atendimento</option>
                                                <option  value="resolvido" >resolvido</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('status')
                                        <p class="has-text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">Solução</label>
                                    <div class="control">
                                        <textarea type="text" name="solution" class="textarea  @error('solution') is-invalid @enderror" value="{{$occurrence->solution}}"></textarea>
                                        @error('solution')
                                            <p class="has-text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">Observações</label>
                                    <div class="control">
                                        <textarea type="text" name="obs" class="textarea  @error('obs') is-invalid @enderror" value="{{$occurrence->obs}}"></textarea>
                                    </div>
                                    @error('obs')
                                        <p class="has-text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="button is-success is-fullwidth">Atualizar ocorrencia</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
