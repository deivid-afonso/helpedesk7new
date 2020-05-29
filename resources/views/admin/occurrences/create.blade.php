@extends('layouts.app')

@section('content')
    <h1>Criar Ocorrência</h1>
<form action="{{route('admin.occurrences.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label>User</label>
            <select name="user_id" class="form-control">


                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}} </option>
                 @endforeach
            </select>

        </div>

        {{-- layout estado cidade
            https://blog.schoolofnet.com/trabalhando-com-ajax-no-laravel/ --}}
        {{-- {!! Form::label('estado', 'Estados:') !!}
        {!! Form::select('estado', $estados) !!}

        {!! Form::label('cidade', 'Cidades:') !!}
        {!! Form::select('cidade', []) !!} --}}

        <div class="form-group">
            <label>Tipo Ocorrência</label>
            <select name="occurrencetype_id" class="form-control">


                @foreach ($occurrencestype as $occurrencetype)
                    <option value="{{$occurrencetype->id}}">{{$occurrencetype->description}} </option>
                 @endforeach
            </select>

        </div>

        <div class="form-group">
            <label>Laboratório</label>
            <select name="place_id" class="form-control">


                @foreach ($places as $place)
                    <option value="{{$place->id}}">{{$place->description}} </option>
                 @endforeach
            </select>

        </div>

        <div class="form-group">
            <label>device</label>
            <select name="device_id" class="form-control">


                @foreach ($devices as $device)
                    <option value="{{$device->id}}">{{$device->description}} </option>
                 @endforeach
            </select>

        </div>


        <div class="form-group">
            <label>Obs.</label>
            <input type="text" name="obs" class="form-control @error('obs') is-invalid @enderror" value="{{old('obs')}}">

            @error('obs')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>status</label>
            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{old('status')}}">

            @error('status')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>solução</label>
            <input type="text" name="solution" class="form-control @error('solution') is-invalid @enderror" value="{{old('solution')}}">

            @error('solution')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Criar Ocorrência</button>
        </div>
    </form>
@endsection

{{-- metodo estado cidade --}}
{{-- @section('post-script')
<script type="text/javascript">
    $('select[name=estado]').change(function () {
        var idEstado = $(this).val();
        $.get('/get-cidades/' + idEstado, function (cidades) {
            $('select[name=cidade]').empty();
            $.each(cidades, function (key, value) {
                $('select[name=cidade]').append('<option value=' + value.id + '>' + value.cidade + '</option>');
            });
        });
    });
</script>
@endsection --}}
