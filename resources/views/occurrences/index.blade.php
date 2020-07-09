@extends('layouts.front')
@section('content')
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="box">
                    <div class="columns align-items-end is-centered">
                        <div class="column is-narrow">
                            <div class="field">
                                <div class="control is-expanded">
                                    <a href="{{route('user.occurrence.create')}}" class="button is-warning is-fullwidth">
                                        Criar Ocorrência
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="column is-narrow">
                            <div class="field">
                                <label for="" class="label">Status:</label>
                                <div class="control is-expanded">
                                    <div class="select is-fullwidth">
                                        <select name="status" id="occurrence-status">
                                            <option value="">Todos</option>
                                            <option value="resolvido">Resolvido</option>
                                            <option value="Aberto">Em andamento</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-narrow">
                            <div class="field">
                                <label for="" class="label">Locais:</label>
                                <div class="control is-expanded">
                                    <div class="select is-fullwidth">
                                        <select name="" id="occurrence-place">
                                            <option value="">Todos</option>
                                            @foreach ($places as $place)
                                                <option value="{{$place->description}}">
                                                    {{$place->description}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-narrow">
                            <div class="field">
                                <label for="" class="label"></label>
                                <div class="control is-expanded">
                                    <button id="occurrence-clear" type="button" class="button is-dark is-fullwidth">
                                        Limpar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns is-centered is-vcentered py-4 px-4 is-multiline">
                        <div class="column is-full is-hidden-touch">
                            <div class="columns has-text-weight-bold">
                                <div class="column is-narrow has-text-centered">
                                    Abertura
                                </div>
                                <div class="column has-text-centered">
                                    Local
                                </div>
                                <div class="column has-text-centered">
                                    Dispositivo
                                </div>
                                <div class="column has-text-centered">
                                    Tipo
                                </div>
                                <div class="column is-narrow has-text-centered">
                                    Editar / Visualizar
                                </div>
                            </div>
                        </div>
                        @foreach ($occurrences as $occurrence)
                            <div class="occurrence column is-full my-2 has-background-white-bis has-shadow-1"
                            data-status="{{$occurrence->status}}" data-place="{{$occurrence->place->description}}">
                                <div class="columns is-centered is-marginless">
                                    <div class="column is-narrow is-hidden-touch">
                                        <div class="tag {{$occurrence->status == 'resolvido' ? 'is-success' : 'is-primary'}}">
                                            @if ($occurrence->status == 'resolvido')
                                                {{\Carbon\Carbon::parse($occurrence->updated_at)->format('d/m/Y')}}
                                            @else
                                                {{\Carbon\Carbon::parse($occurrence->created_at)->format('d/m/Y')}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="column has-text-centered has-text-weight-bold">
                                        <i class="icon-shop is-size-6"></i>
                                        {{$occurrence->place->description}}
                                    </div>
                                    <div class="column has-text-centered has-text-weight-bold">
                                        <i class="icon-desktop is-size-6"></i>
                                        {{$occurrence->device->description}}
                                    </div>
                                    <div class="column has-text-centered">
                                        {{$occurrence->occurrencetype->description}}
                                    </div>
                                    <div class="column is-narrow is-hidden-touch">
                                        @if ($occurrence->status == 'resolvido')
                                        <button type="button" class="button is-light" disabled>
                                            <i class="icon-pencil"></i>
                                        </button>
                                        @else
                                        <a href="{{route('admin.occurrences.edit', ['occurrence'=> $occurrence->id])}}"
                                            class="button is-light"><i class="icon-pencil"></i>
                                        </a>
                                        @endif
                                        <a class="button is-warning" href="{{route('admin.occurrences.show', ['occurrence'=> $occurrence->id])}}">
                                            <i class="icon-eye is-size-6"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="columns is-mobile is-centered is-hidden-desktop has-text-centered py-4">
                                    <div class="column">
                                        <div class="tag {{$occurrence->status == 'resolvido' ? 'is-success' : 'is-primary'}}">
                                            @if ($occurrence->status == 'resolvido')
                                                {{\Carbon\Carbon::parse($occurrence->updated_at)->format('d/m/Y')}}
                                            @else
                                                {{\Carbon\Carbon::parse($occurrence->created_at)->format('d/m/Y')}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="column">
                                        @if ($occurrence->status == 'resolvido')
                                        <button type="button" class="button is-light" disabled>
                                            <i class="icon-pencil"></i>
                                        </button>
                                        @else
                                        <a href="{{route('admin.occurrences.edit', ['occurrence'=> $occurrence->id])}}"
                                            class="button is-light"><i class="icon-pencil"></i>
                                        </a>
                                        @endif
                                        <a class="button is-warning" href="{{route('admin.occurrences.show', ['occurrence'=> $occurrence->id])}}">
                                            <i class="icon-eye is-size-6"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="columns">
                        <div class="column">
                            {{$occurrences->links()}}
                        </div>
                    </div>
                </div>
                <div class="columns">

                </div>
                <div class="table-container">
                    <table class="table table-striped is-fullwidth">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="display: none">User</th>
                                <th>Atendido por</th>
                                <th>Lab</th>
                                <th>Computador</th>
                                <th>Status</th>
                                <th>Tipo Ocorrência</th>
                                <th>Solução</th>
                                <th>Obs</th>
                                <th>data de abertura</th>
                                <th>data fechamento</th>
                                {{-- <th>Opções</th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($occurrences as $occurrence)
                            <tr>
                                <td>{{$occurrence->id}}</td>
                                <td style="display: none">{{$occurrence->owner->name}}</td>
                                <td>{{$occurrence->admin_id}}</td>
                                <td>{{$occurrence->place->description}}</td>
                                <td>{{$occurrence->device->description}}</td>
                                <td>{{$occurrence->status}}</td>
                                <td>{{$occurrence->occurrencetype->description}}</td>
                                <td>{{$occurrence->solution}}</td>
                                <td>{{$occurrence->obs}}</td>
                                <td>{{\Carbon\Carbon::parse($occurrence->created_at)->format('d/m/Y')}}</td>
                                <td >
                                    @if ($occurrence->status == 'resolvido')
                                        {{\Carbon\Carbon::parse($occurrence->updated_at)->format('d/m/Y')}}

                                    @endif

                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

{{$occurrences->links()}}
@endsection
