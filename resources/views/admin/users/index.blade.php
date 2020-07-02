@extends('layouts.front')
@section('content')

<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column">
                <h2 class="title is-3 has-text-centered">Usuários</h2>
                <div class="box">
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
                    <div class="columns is-multiline">
                        @foreach($users as $user)
                            <div class="column is-4-tablet is-4-desktop is-one-fifth-widescreen mb-2">
                                <div class="has-background-white-ter shadow">
                                    <div class="columns is-mobile is-marginless is-size-6">
                                        <div class="column has-text-left has-text-weight-bold">
                                            #{{ $user->id}}
                                        </div>
                                        <div class="column has-text-right has-text-weight-bold">
                                            <div class="tag is-dark">
                                                {{ $user->viewRole}}
                                            </div>
                                        </div>
                                    </div>
                                    <p class="title is-7 has-text-centered">
                                        {{ $user->name}}
                                    </p>
                                    <p class="subtitle is-size-7 has-text-centered">
                                        {{ $user->email}}
                                    </p>
                                    <div class="columns is-centered is-mobile p-2 px-2">
                                        <div class="column">
                                            <a href="{{route('admin.users.edit', ['user'=> $user->id])}}"
                                                    class="button is-small is-light is-fullwidth">EDITAR</a>
                                        </div>
                                        <div class="column">
                                            <form action="{{route('admin.users.destroy', ['user' => $user->id])}}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="button is-danger is-small is-fullwidth"  onclick="return confirm('Gostaria de apagar o registro {{$user->id}}?')">REMOVER</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- {{$users->links()}} -->
@endsection
