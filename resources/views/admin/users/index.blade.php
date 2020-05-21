@extends('layouts.app')

@section('content')
<a href="{{route('users.create')}}" class="btn btn-lg btn-success">Criar User</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
			<th>Nome</th>
			<th>E-mail </th>
			{{-- <th>permissao </th> --}}
			<th>Menu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id}}</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>
            
            <td>
              <div class="btn-group">
                <a href="{{route('users.edit', ['user'=> $user->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                {{-- <a href="{{route('users.destroy', ['user'=> $user->id])}}" class="btn btn-sm btn-danger">REMOVER</a> --}}
                <form action="{{route('users.destroy', ['user' => $user->id])}}" method="post">
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

{{$users->links()}}
@endsection
