
<form method="POST" action="/processo/{{$processo->id}}">
     @csrf
    @method('PUT')
    <div class="card-body">
        (<span style="color: red;">*</span>) Campos Obrigatórios
        <br><br>
        <div class="row">
                <div class="form-group col-8">
                    <strong>Título <span style="color: red;">*</span></strong>
                    <input type='text' class="textarea form-control" name='titulo' value='{{$processo->titulo}}' required>
                </div>
                <div class="form-group col-4">
                    <strong>Processo <span style="color: red;">*</span></strong>
                    <select type="text" name="tipo" class="form-control" required>
                        <option {{ ($processo->tipo == "Público" ? "selected":"") }}>Público</option>
                        <option {{ ($processo->tipo == "Privado" ? "selected":"") }}>Privado</option>
                    </select>
                </div>
                <div class="form-group col-12">
                    <strong>Descrição</strong>
                    <textarea class="textarea form-control" name='descricao'>{{$processo->descricao}}</textarea>
                </div>
        </div>
    </div>
    <div class="float-right">
        <button type='submit' class="btn btn-info">Salvar</button>
    </div>
</form>