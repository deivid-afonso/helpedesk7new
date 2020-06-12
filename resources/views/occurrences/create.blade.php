@extends('layouts.front')
@section('content')
    <h1>Criar Ocorrência</h1>
<form action="{{route('user.occurrence.store')}}" method="POST">
        @csrf


        <div class="form-group">
            <label>Tipo Ocorrência</label>
            <select name="occurrence_type_id" class="form-control">
                @foreach ($occurrencestype as $occurrence_type_id)
                    <option value="{{$occurrence_type_id->id}}">{{$occurrence_type_id->description}} </option>
                 @endforeach
            </select>

        </div>

        <div class="form-group">
            <label>Laboratório</label>
            <select id="place" name="place_id" class="form-control">
                <option value="" selected>Selecione </option>

                @foreach ($places as $place)
                    <option value="{{$place->id}}">{{$place->description}} </option>
                 @endforeach
            </select>

        </div>

        <div class="form-group">
            <label>device</label>
            <select id="device" name="device_id" class="form-control @error('device_id') is-invalid @enderror" value="{{old('device_id')}}">
               
            </select>
            @error('device_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
           

        </div>

        {{-- <div class="form-group">
            <label>Patrimonio</label>
            <input type="text" name="patrimony" class="form-control @error('patrimony') is-invalid @enderror" value="{{old('patrimony')}}">

            @error('patrimony')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div> --}}




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
            <button type="submit" class="btn btn-lg btn-success">Criar Ocorrência</button>
        </div>
    </form>
@endsection

@section('post-script')
<script type="text/javascript">
    function addOption(valor, text) {
        var option = new Option(text, valor);
        var select = document.getElementById("device");
        select.add(option);
    }
    $('#place').change(function () {
        var device_id = $(this).val();
        $.get('/api/place/' + device_id ).done(function (result) {
            $('#device').empty()
            
            result.forEach(function (item){
                addOption(item.id, item.description)
            })
           
        }).catch(function (){
            // $('#device').empty()
            return "";
        });
    });
</script>
@endsection
