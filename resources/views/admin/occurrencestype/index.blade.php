@extends('layouts.app')

@section('content')
<a href="{{route('occurrencesType.create')}}" class="btn btn-lg btn-success">Criar device</a>
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
         
            {{-- <td>
                <a href="{{route('occurrencesType.edit', ['occurrenceType'=> $occurrenceType->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                <a href="{{route('occurrencesType.destroy', ['occurrenceType'=> $occurrenceType->id])}}" class="btn btn-sm btn-danger">REMOVER</a>
            </td> --}}
        </tr> 
        @endforeach   
      
    </tbody>
    

</table>

{{$occurrencesType->links()}}
@endsection
