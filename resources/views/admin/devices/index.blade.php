@extends('layouts.app')

@section('content')
<a href="{{route('devices.create')}}" class="btn btn-lg btn-success">Criar device</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
			<th>Descrição</th>
			<th>Patrimonio</th>
			<th>Laboratório</th>
			
			<th>Menu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($devices as $device)
        <tr>
            <td>{{ $device->id}}</td>
            <td>{{ $device->description}}</td>
            <td>{{ $device->patrimony}}</td>
            <td>{{ $device->place->description}}</td>
            
            <td>
                <a href="{{route('devices.edit', ['device'=> $device->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                <a href="{{route('devices.destroy', ['device'=> $device->id])}}" class="btn btn-sm btn-danger">REMOVER</a>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

{{$devices->links()}}
@endsection
