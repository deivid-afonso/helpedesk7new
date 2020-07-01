@extends('layouts.front')
@section('content')

<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-narrow">
                <a href="{{route('admin.users.create')}}"
                    class="button is-warning">
                    Criar usuário
                </a>
            </div>
            <div class="column">
                <div class="field">
                    <div class="control is-expanded">
                        <input type="text" class="input">
                    </div>
                </div>
            </div>
            <div class="column is-narrow">
                <a href="" class="button is-link">Procurar</a>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="box">
                    <table class="table table-striped is-fullwidth">
                        <thead>
                            <tr class="has-text-centered">
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-mail </th>
                                <th>permissao </th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="has-text-centered">
                                <td>{{ $user->id}}</td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->viewRole}}</td>
                                <td>
                                    <form action="{{route('admin.users.destroy', ['user' => $user->id])}}" method="post">
                                        <a href="{{route('admin.users.edit', ['user'=> $user->id])}}"
                                            class="button is-small is-link">EDITAR</a>
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="button is-danger is-small"  onclick="return confirm('Gostaria de apagar o registro {{$user->id}}?')">REMOVER</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

{{$users->links()}}
@endsection
