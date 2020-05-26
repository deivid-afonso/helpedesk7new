@extends('layouts.app')

@section('content')
<a href="{{route('admin.occurrences.create')}}" class="btn btn-lg btn-success">Criar Ocorrência</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Lab</th>
            <th>Computador</th>
            <th>Status</th>
            <th>Tipo Ocorrência</th>
            <th>Solução</th>
            <th>Obs</th>
            <th>Opções</th>
			
        </tr>
    </thead>
    <tbody>
        @foreach($occurrences as $occurrence)
        <tr>
            <td>{{$occurrence->id}}</td>
            <td>{{$occurrence->owner->name}}</td>
            <td>{{$occurrence->place->description}}</td>
            <td>{{$occurrence->device->description}}</td>
            <td>{{$occurrence->status}}</td>
            <td>{{$occurrence->occurrencetype->description}}</td>
            <td>{{$occurrence->solution}}</td>
            <td>{{$occurrence->obs}}</td>
            
            <td>
                <div class="btn-group">
                  <a href="{{route('admin.occurrences.edit', ['occurrence'=> $occurrence->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                  <form action="{{route('admin.occurrences.destroy', ['occurrence' => $occurrence->id])}}" method="post">
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

{{$occurrences->links()}}
@endsection
