@extends('layouts.app')

@section('content')
<a href="{{route('admin.occurrencestype.create')}}" class="btn btn-lg btn-success">Criar Lab</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
			<th>Descrição</th>
			<th>Menu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($occurrencesType as $occurrenceType)
        <tr>
            <td>{{ $occurrenceType->id}}</td>
            <td>{{ $occurrenceType->description}}</td>
         
            <td>
                <div class="btn-group">
                  <a href="{{route('admin.occurrencestype.edit', ['occurrencetype'=> $occurrenceType->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                  <form action="{{route('admin.occurrencestype.destroy', ['occurrencetype' => $occurrenceType->id])}}" method="post">
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

{{$occurrenceType->links()}}
@endsection
