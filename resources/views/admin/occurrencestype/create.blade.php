<h1>Criar tipo ocorrencias</h1>
<form action="/admin/occurrencestype/ot" method="POST">
    {{-- notfound 404 --}}
    <input type="hidden" name="_token" value={{csrf_token()}}>
    <div>
        <label>Descrição</label>
        <input type="text" name="description">
    </div>
    
    
    
    <div>
        <button type="submit">Criar device</button>
    </div>
</form>
