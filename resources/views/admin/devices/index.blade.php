@extends('layouts.front')
@section('content')

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column">
                <h2 class="title is-3 has-text-centered">Equipamentos</h2>
                <div class="box">
                    <div class="columns">
                        <div class="column is-narrow">
                            <a href="{{route('admin.devices.create')}}" class="button is-warning">Cadastrar Equipamento</a>
                        </div>
                    </div>
                    <table class="table table-striped is-fullwidth has-text-centered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descrição</th>
                                <th>Patrimonio</th>
                                <th>Laboratório</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($devices as $device)
                            <tr>
                                <td class="is-narrow">{{ $device->id}}</td>
                                <td>{{ $device->description}}</td>
                                <td>{{ $device->patrimony}}</td>
                                <td>{{ $device->place->description}}</td>
                                {{-- <td>{{$occurrence->device->description}}</td> --}}
                                <td class="is-narrow">
                                    <div class="columns is-marginless is-paddingless">
                                        <div class="column is-narrow is-paddingless mr-1">
                                            <a href="{{route('admin.devices.edit', ['device'=> $device->id])}}" class="button is-small is-info is-fullwidth">EDITAR</a>
                                        </div>
                                        <div class="column is-narrow is-paddingless">
                                            <form action="{{route('admin.devices.destroy', ['device' => $device->id])}}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="button is-small is-danger is-fullwidth" onclick="return confirm('Gostaria de apagar o registro {{$device->id}}?')">REMOVER</button>
                                            </form>
                                        </div>
                                    </div>
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

{{$devices->links()}}
@endsection
