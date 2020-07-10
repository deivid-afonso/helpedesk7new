@extends('layouts.front')
@section('content')
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-6">
                <h1 class="title is-4 has-text-centered">Criar usuário</h1>
                <div class="box">
                    <form action="{{route('admin.users.store')}}" method="POST">
                        {{-- pra gragar usar metodo store conforme acima --}}
                        @csrf
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">Nome</label>
                                    <div class="control">
                                        <input type="text" name="name" class="input @error('name') is-invalid @enderror" value="{{old('name')}}">
                                    </div>
                                    @error('name')
                                        <p class="has-text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">E-mail</label>
                                    <div class="control">
                                        <input type="text" name="email" class="input @error('email') is-invalid @enderror"value="{{old('email')}}" required>
                                    </div>
                                    @error('email')
                                        <p class="has-text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">Senha</label>
                                    <div class="control">
                                        <input type="password" name="password" class="input @error('password') is-invalid @enderror">
                                    </div>
                                    @error('password')
                                        <p class="has-text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">Tipo User</label>
                                    <div class="control is-expanded">
                                        <div class="select is-fullwidth">
                                            <select name="role_id" class="form-control">
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}} </option>
                                                 @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="button is-success is-fullwidth">Criar user</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
