 <!-- Main content -->

    <div class="float-right">
        <a href="/documento/{{$processo->id}} " class="btn btn-block btn-outline-info"><i class="fa fa-plus"></i> Adicionar Documento</a>
    </div>

    @if (Session::has('message'))
        <div class="alert alert-info alert-dismissible col-12">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('message') }}
        </div>
    @endif
    <br>
    <br>
    <table id="table_documento" class="table table-bordered table-hover" width="100%">
        <thead>
        <tr>
            <th>Título</th>
            <th>Conteúdo</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
    </table>
