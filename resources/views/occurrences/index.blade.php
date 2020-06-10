@extends('layouts.app')

@section('content')
<a href="{{route('occurrences.create')}}" class="btn btn-lg btn-success">Criar Ocorrência</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th style="display: none">User</th>
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
                @else
                aberto
                @endif

            </td>

            {{-- <td>

                @if ($occurrence->status == 'resolvido')
                <a href="" class="btn btn-sm btn-dark">Fechado</a>

                @else
                <div class="btn-group">
                    <a href="{{route('admin.occurrences.edit', ['occurrence'=> $occurrence->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                    <form action="{{route('admin.occurrences.destroy', ['occurrence' => $occurrence->id])}}" method="post">
                        em tese esse metodo ocorrencias nao devem ser apagadas
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                    </form>
                </div>

                @endif


            </td> --}}
        </tr>
        @endforeach
    </tbody>

</table>

{{$occurrences->links()}}
@endsection