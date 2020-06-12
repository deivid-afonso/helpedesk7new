@extends('layouts.front')
@section('content')
<a href="{{route('admin.devices.create')}}" class="btn btn-lg btn-success">Criar device</a>
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
            {{-- <td>{{$occurrence->device->description}}</td> --}}


            <td>
                <div class="btn-group">
                  <a href="{{route('admin.devices.edit', ['device'=> $device->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                  <form action="{{route('admin.devices.destroy', ['device' => $device->id])}}" method="post">
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                  </form>
                </div>
              </td>
        </tr>
        @endforeach
    </tbody>

</table>

{{$devices->links()}}
@endsection
