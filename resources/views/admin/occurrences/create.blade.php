<h1>Criar Equipamento</h1>
<form action="/admin/devices/device" method="POST">
    {{-- notfound 404 --}}
    <input type="hidden" name="_token" value={{csrf_token()}}>
    <div>
        <label>Descrição</label>
        <input type="text" name="description">
    </div>
    
    <div>
        <label>patrimonio</label>
        <input type="text" name="patrimony">
    </div>
    
   
    
    <div>
        <button type="submit">Criar device</button>
    </div>
</form>
