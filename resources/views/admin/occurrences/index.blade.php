@extends('layouts.front')
@section('content')
{{--<a href="{{route('admin.occurrences.create')}}" class="btn btn-lg btn-success">Criar Ocorrência</a>--}}
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-3 has-text-centered">Ocorrências</h1>
                <div class="box" style="overflow-x: auto !important">
                    <div class="columns is-vcentered">
                        <div class="column is-narrow">
                            <div class="field">
                                <label for="" class="label">Status:</label>
                                <div class="control">
                                    <div class="select">
                                        <select name="status" id="occurrence-status">
                                            <option value="">Todos</option>
                                            <option value="resolvido">Resolvido</option>
                                            <option value="Aberto">Em andamento</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label for="" class="label">Locais:</label>
                                <div class="control">
                                    <div class="select">
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
                            <div class="field pt-4">
                                <label for="" class="label"></label>
                                <div class="control">
                                    <button id="occurrence-clear" type="button" class="button is-primary">Limpar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-container">
                        <table class="table is-fullwidth table-striped has-text-centered">
                            <thead>
                                <tr>
                                    {{-- <th>#</th> --}}
                                    {{-- <th>User</th> --}}
                                    <th>Lab</th>
                                    <th>Computador</th>
                                    <th>Status</th>
                                    <th>Tipo Ocorrência</th>
                                     {{-- <th>Solução</th> --}}
                                    {{-- <th>Obs</th> --}}
                                    {{-- <th>data de abertura</th>
                                    <th>data fechamento</th> --}}
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($occurrences as $occurrence)
                                <tr class="occurrence" data-status="{{$occurrence->status}}" data-place="{{$occurrence->place->description}}">
                                    {{-- <td>{{$occurrence->id}}</td> --}}
                                    {{-- <td>{{$occurrence->owner->name}}</td --}}
                                    <td>{{$occurrence->place->description}}</td>
                                    <td>{{$occurrence->device->description}}</td>
                                    <td>{{$occurrence->status}}</td>
                                    <td>{{$occurrence->occurrencetype->description}}</td>
                                    {{-- <td>{{$occurrence->solution}}</td> --}}
                                    {{-- <td>
                                        <b>Observações </b>{{$occurrence->obs}} <br>
                                        <b>Solução </b>{{$occurrence->solution}}
                                    </td> --}}
                                    {{-- <td>{{\Carbon\Carbon::parse($occurrence->created_at)->format('d/m/Y')}}</td>
                                    <td >
                                        @if ($occurrence->status == 'resolvido')
                                            {{\Carbon\Carbon::parse($occurrence->updated_at)->format('d/m/Y')}}
                                        @endif
                                    </td> --}}
                                    <td>
                                        <a href="{{route('admin.occurrences.show', ['occurrence'=> $occurrence->id])}}"
                                            >Detalhes</i>
                                        </a>
                                        @if ($occurrence->status == 'resolvido')
                                        <button type="button" class="button is-dark" disabled>
                                            <i class="icon-pencil-1"></i>
                                        </button>
                                        @else
                                        <a href="{{route('admin.occurrences.edit', ['occurrence'=> $occurrence->id])}}"
                                            class="button is-light"><i class="icon-pencil-1"></i>
                                        </a>
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
    </div>
</section>

{{$occurrences->links()}}
@endsection
<script src="{{ asset('assets/js/occurrences/index.js')}}"></script>
