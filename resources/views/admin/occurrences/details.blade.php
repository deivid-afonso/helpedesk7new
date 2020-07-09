@extends('layouts.front')
@section('content')

<section class="section">
    <div class="container">
        <h1 class="title has-text-centered has-text-primary">Detalhes Ocorrência</h1>
        <div class="columns is-centered">
            <div class="column is-8-desktop is-6-fullhd">
                <div class="box">
                    <div class="columns">
                        <div class="column is-narrow">
                            <a class="button is-danger is-fullwidth" href="{{ url()->previous() }}">Voltar</a>
                        </div>
                    </div>
                    <form action="{{route('admin.occurrences.update', $occurrence ?? ''->id)}}" method="POST">
                        {{-- pra gragar usar metodo store conforme acima --}}
                        @csrf
                        @method("PUT")
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">Atendido por</label>
                                    <div class="control is-expanded">
                                        <input disabled type="text" name="admin_id" class="input " value="{{$occurrence->admin_id}}">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">Id</label>
                                    <div class="control is-expanded">
                                        <input disabled type="text" name="id" class="input " value="{{$occurrence->id}}">
                                    </div>
                                </div>
                            </div>

                            <div class="column">
                                <div class="field">
                                    <label class="label">Aberto por</label>
                                    <div class="control is-expanded">
                                        <input disabled type="text" name="name" class="input " value="{{$occurrence->owner->name}}">
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                    <option  value="{{$occurrence->occurrencetype->description}}">{{$occurrence->occurrencetype->description}}</option>
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
                                            <select disabled name="status">
                                                <option  value="{{$occurrence->status}}">{{$occurrence->status}}</option>

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
                                <label class="label">Solução</label>
                                <textarea disabled class="textarea">{{$occurrence->solution}}</textarea>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">Observações</label>
                                    <textarea class="textarea" disabled>{{$occurrence->obs}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">aberto em</label>
                                    <div class="control is-expanded">
                                        <input disabled type="text"  class="input " value="{{\Carbon\Carbon::parse($occurrence->created_at)->format('d/m/Y')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">fechado em</label>
                                    <div class="control is-expanded">
                                        <input disabled type="text"  class="input"
                                        @if ($occurrence->status == 'resolvido')
                                            value="{{\Carbon\Carbon::parse($occurrence->updated_at)->format('d/m/Y')}}"
                                        @endif>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
