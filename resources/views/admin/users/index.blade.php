@extends('layouts.app')

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
			<th>Nome</th>
			<th>E-mail </th>
			<th>permissao </th>
			<th>Menu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id}}</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->admin}}</td>
            {{-- <td>
                {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE' ])!!}
                {!! Form::submit('Remover') !!}
                {!! Form::close() !!}
                 <a href="{{ route('user.edit', $user->id)}}">Editar</a>  
            </td> --}}
        </tr>
        @endforeach
    </tbody>

</table>

{{$users->links()}}
@endsection
