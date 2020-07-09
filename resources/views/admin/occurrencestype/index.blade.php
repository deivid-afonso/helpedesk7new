@extends('layouts.front')
@section('content')

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-8-desktop is-6-fullhd">
                <h2 class="title is-3 has-text-centered">Tipos de ocorrências</h2>
                <div class="box">
                    <div class="columns">
                        <div class="column is-narrow">
                            <a href="{{route('admin.occurrencestype.create')}}" class="button is-warning">Criar Tipo de Ocorrência</a>
                        </div>
                    </div>
                    <table class="table is-fullwidth table-striped">
                        <thead>
                            <tr>
                                <th class="is-hidden-mobile">#</th>
                                <th>Descrição</th>
                                <th class="has-text-centered">Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($occurrencestypes as $occurrencestype)
                            <tr>
                                <td class="is-hidden-mobile">{{ $occurrencestype->id}}</td>
                                <td>{{ $occurrencestype->description}}</td>

                                <td class="is-narrow">
                                    <div class="btn-group">
                                    <form action="{{route('admin.occurrencestype.destroy', ['occurrencestype' => $occurrencestype->id])}}" method="post">
                                        <a href="{{route('admin.occurrencestype.edit', ['occurrencestype'=> $occurrencestype->id])}}" class="button is-small is-light">
                                            <i class="icon-pencil is-size-6"></i>
                                        </a>
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="button is-small is-danger"
                                        onclick="return confirm('Gostaria de apagar o registro {{$occurrencestype->id}}?')">
                                            <i class="icon-trash has-text-light is-size-6"></i>
                                        </button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="columns is-centered">
                        <div class="column is-narrow">
                            {{$occurrencestypes->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('post-script')

@endsection
