<table>
    <thead>
        <tr>
            <th>#</th>
            <th>descritivo</th>
            <th>opções</th>
        </tr>
    </thead>
    <tbody>
        @foreach($occurrencestype as $ot)
            <tr>
                <td class="columm">{{ $ot->id}}</td>
                <td class="columm">{{ $ot->description}}</td>
                
                
                {{-- <td class="columm">
                    {!! Form::open(['route' => ['lab.destroy', $lab->id], 'method' =>'delete']) !!}
                    {!! Form::submit("Remover") !!}
                    {!! Form::close() !!}
                </td> --}}
            </tr>   
        @endforeach 
    </tbody>

</table>

{{$occurrencestype->links()}}