<form method="POST" id="form_anexo" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        (<span style="color: red;">*</span>) Campos Obrigatórios
        <br><br>
        <div class="row">
            <div class="form-group col-md-6">
                <strong>Tipo <span style="color: red;">*</span></strong>
                <input type="text" autocomplete="off" id="tipo" name="tipo" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <strong>Arquivo <span style="color: red;">*</span></strong>
                <input type="file" autocomplete="off" id="arquivo" name="arquivo" class="form-control">
            </div>
        </div>
    </div>
    <div class="float-right">
        <button type='button' class="btn btn-block btn-outline-info add_anexo"><i class="fa fa-plus"></i> Adicionar
            Anexo</button>
    </div>
</form>
<br>
<br>
<table id="table_anexo" class="table table-bordered table-hover" style="width:100%">
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Usuário</th>
            <th>Autenticado Por:</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
</table>