@extends('layouts.front')
@section('content')
<a href="{{route('admin.occurrencestype.create')}}" class="btn btn-lg btn-success">Criar Tipo de Ocorrência</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
			<th>Descrição</th>
			<th>Menu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($occurrencestypes as $occurrencestype)
        <tr>
            <td>{{ $occurrencestype->id}}</td>
            <td>{{ $occurrencestype->description}}</td>

            <td>
                <div class="btn-group">
                  <a href="{{route('admin.occurrencestype.edit', ['occurrencestype'=> $occurrencestype->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                  <form action="{{route('admin.occurrencestype.destroy', ['occurrencestype' => $occurrencestype->id])}}" method="post">
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Gostaria de apagar o registro {{$occurrencestype->id}}?')">REMOVER</button>
                  </form>
                </div>
              </td>

        </tr>
        @endforeach

    </tbody>


</table>

{{$occurrencestypes->links()}}
@endsection
