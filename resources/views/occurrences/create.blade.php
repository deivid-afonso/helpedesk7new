@extends('layouts.front')
@section('content')
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-narrow has-background-white box">
                <h1 class="title has-text-centered has-text-primary">Criar Ocorrência</h1>
                <form action="{{route('user.occurrence.store')}}" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label has-text-grey-dark">Tipo Ocorrência</label>
                        <div class="control is-expanded">
                            <div class="select is-fullwidth">
                                <select name="occurrence_type_id" class="form-control">
                                    @foreach ($occurrencestype as $occurrence_type_id)
                                        <option value="{{$occurrence_type_id->id}}">{{$occurrence_type_id->description}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label has-text-grey-dark">Laboratório</label>
                        <div class="control is-expanded">
                            <div class="select is-fullwidth">
                                <select id="place" name="place_id" class="form-control">
                                    <option value="" selected>Selecione </option>
                                    @foreach ($places as $place)
                                        <option value="{{$place->id}}">{{$place->description}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label has-text-grey-dark">device</label>
                        <div class="control is-expanded">
                            <div class="select is-fullwidth">
                                <select id="device" name="device_id" class="form-control @error('device_id') is-invalid @enderror" value="{{old('device_id')}}">
                                </select>
                                @error('device_id')
                                <div class="title is-6 has-text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
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
                    <div class="field">
                        <label class="label has-text-grey-dark">Observações</label>
                        <div class="control is-expanded">
                            <textarea name="obs" class="textarea @error('obs') is-invalid @enderror" value="{{old('obs')}}"></textarea>
                        </div>
                        @error('obs')
                            <div class="title is-6 has-text-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-info">Criar Ocorrência</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('post-script')
<script type="text/javascript">
    var place = document.getElementById('place');
    var select = document.getElementById("device");
    function addOption(valor, text) {
        var option = new Option(text, valor);
        select.add(option);
    }
    function clearOptions(){
        for(i = select.length-1; i>=0; i--){
            select.remove(i);
        }
    }
    async function getPlaces(id) {
        var req = await fetch(`/api/place/${id}`);
        var res = await req.json();

        return res;
    }
    place.addEventListener('change' ,function () {
        var device_id = this.value;
        getPlaces(device_id).then(x => {
            clearOptions();
            x.forEach(item => {
                console.log(item);
                addOption(item.id, item.description)
            })
        });
    });
</script>
@endsection
