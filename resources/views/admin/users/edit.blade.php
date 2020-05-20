@extends('layouts.app')

@section('content')
    <h1>Atualizar User</h1>
<form action="{{route('admin.users.update', ['user=>$user->id'])}}" method="POST">
        {{-- pra gragar usar metodo store conforme acima --}}
        <input type="hidden" name="_token" value={{csrf_token()}}>
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" value={{$user->name}}>
        </div>
        
        <div class="form-group">
            <label>E-mail</label>
            <input type="text" name="email" class="form-control" value={{$user->email}}>
        </div>
        
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="password" class="form-control">
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Atualizar user</button>
        </div>
    </form>
@endsection    
