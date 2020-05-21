@extends('layouts.app')

@section('content')
<a href="{{route('places.create')}}" class="btn btn-lg btn-success">Criar device</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
			<th>Descrição</th>
			<th>Menu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($places as $place)
        <tr>
            <td>{{ $place->id}}</td>
            <td>{{ $place->description}}</td>
         
            <td>
                <a href="{{route('places.edit', ['place'=> $place->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                <a href="{{route('places.destroy', ['place'=> $place->id])}}" class="btn btn-sm btn-danger">REMOVER</a>
            </td>
        </tr> 
        @endforeach   
      
    </tbody>
    

</table>

{{$places->links()}}
@endsection
