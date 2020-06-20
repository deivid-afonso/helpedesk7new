@extends('layouts.front')
@section('content')
<a href="{{route('user.occurrence.create')}}" class="btn btn-lg btn-success">Criar Ocorrência</a>
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

                @endif

            </td>

        </tr>
        @endforeach
    </tbody>

</table>

{{$occurrences->links()}}
@endsection
