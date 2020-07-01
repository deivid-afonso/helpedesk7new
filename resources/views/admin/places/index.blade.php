@extends('layouts.front')
@section('content')

<section class="section">
    <div class="container">
        <h1 class="title is-4 has-text-centered">Laboratórios</h1>
        <div class="columns">
            <div class="column">
                <a href="{{route('admin.places.create')}}" class="button is-warning">Cadastrar Laboratório</a>
            </div>
        </div>
        <div class="columns is-centered">
            <div class="column">
                <div class="box">
                    <table class="table table-striped is-fullwidth has-text-centered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descrição</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($places as $place)
                            <tr>
                                <td class="is-narrow">{{ $place->id}}</td>
                                <td>{{ $place->description}}</td>
                                <td class="is-narrow">
                                    <form action="{{route('admin.places.destroy', ['place' => $place->id])}}" method="post">
                                        <a href="{{route('admin.places.edit', ['place'=> $place->id])}}" class="button is-small is-primary">EDITAR</a>
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="button is-small is-danger" onclick="return confirm('Gostaria de apagar o registro {{$place->id}}?')" >REMOVER</button>
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


{{$places->links()}}
@endsection
