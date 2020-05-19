<table>
    <thead>
        <tr>
            <th>#</th>
            <th>descritivo</th>
            <th>opções</th>
        </tr>
    </thead>
    <tbody>
        @foreach($devices as $device)
            <tr>
                <td class="columm">{{ $device->id}}</td>
                <td class="columm">{{ $device->description}}</td>
                
                
                {{-- <td class="columm">
                    {!! Form::open(['route' => ['lab.destroy', $lab->id], 'method' =>'delete']) !!}
                    {!! Form::submit("Remover") !!}
                    {!! Form::close() !!}
                </td> --}}
            </tr>   
        @endforeach 
    </tbody>

</table>

{{$users->links()}}