@extends('layouts.app')

@section('content')
    <h1>Criar User</h1>
<form action="{{route('admin.users.store')}}" method="POST">
        {{-- pra gragar usar metodo store conforme acima --}}
        @csrf
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">

            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label>E-mail</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"value="{{old('email')}}">
            @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Criar user</button>
        </div>
    </form>
@endsection    
