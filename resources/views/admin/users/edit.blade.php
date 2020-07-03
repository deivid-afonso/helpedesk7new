@extends('layouts.front')
@section('content')
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-6">
                <h1 class="title is-4 has-text-dark has-text-centered">Atualizar usuário</h1>
                <div class="box">
                    <form action="{{route('admin.users.update', $user->id)}}" method="POST">
                        {{-- pra gragar usar metodo store conforme acima --}}
                        @csrf
                        @method("PUT")
                        <div class="field">
                            <label class="label">Nome</label>
                            <div class="control is-expanded">
                                <input type="text" name="name" class="input @error('name') is-invalid @enderror" value="{{$user->name}}">
                            </div>
                            @error('name')
                                <p class="has-text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">E-mail</label>
                            <div class="control is-expanded">
                                <input type="text" name="email" class="input " value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Senha</label>
                            <div class="control is-expanded">
                                <input type="password" name="password" class="input @error('password') is-invalid @enderror">
                            </div>
                            @error('password')
                                <p class="has-text-danger">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="label">Tipo user</label>
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select disabled name="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}" {{($user->roles[0]->id == $role->id) ? 'selected' : ''}}>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <button type="submit" class="button is-success is-fullwidth">Atualizar user</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
