@extends('layouts.front')
@section('content')
<a href="{{route('admin.places.create')}}" class="btn btn-lg btn-success">Criar Lab</a>
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
                <div class="btn-group">
                  <a href="{{route('admin.places.edit', ['place'=> $place->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                  <form action="{{route('admin.places.destroy', ['place' => $place->id])}}" method="post">
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

{{$places->links()}}
@endsection
