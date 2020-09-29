<div class="alert alert-danger alert-dismissible erros" style="display:none">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Atenção!</h5><br>
    <ul></ul>
</div>
<form method="POST" id="form_tramite" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        (<span style="color: red;">*</span>) Campos Obrigatórios
        <br><br>
        <div class="row">
            <div class="form-group col-6">
                <strong>Setor <span style="color: red;">*</span></strong>
                <select id="select_secretaria"
                    class="form-control select2 form-control @error('fk_setor', 'setor') is-invalid @enderror"
                    name="fk_setor">
                    @foreach ($setores as $setor)
                    @if (old('fk_setor') == $setor->id)
                    <option value="{{$setor->id}}" selected>{{$setor->titulo}}
                    </option>
                    @else
                    <option value="{{$setor->id}}">{{$setor->titulo}}</option>
                    @endif

                    @endforeach
                    <option value="selecione" selected>Selecione</option>
                </select>
                @error('fk_setor','setor')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- verifico se o tipo de usuário é cidadão, se for o campo do tipo usuário não vai ser mostrado-->
            <div class="form-group col-6" @foreach(Auth::user()->getRoleNames() as $nome)   @if($nome=="cidadao") hidden @endif  @endforeach>
                <strong>Usuario <span style="color: red;">*</span></strong>
                <select id="select_user"
                    class="form-control select2 form-control @error('fk_user', 'setor') is-invalid @enderror"
                    name="fk_user">
                    @foreach ($users as $user)
                    @if (old('fk_user') == $user->id)
                    <option value="{{$user->id}}" selected>{{$user->nome}}
                    </option>
                    @else
                    <option value="{{$user->id}}">{{$user->nome}}</option>
                    @endif

                    @endforeach
                    <option value="selecione" selected>Selecione</option>
                </select>
                @error('fk_user','setor')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
               
        </div>
    </div>
    <div class="float-right">
        <button type='button' class="btn btn-block btn-outline-info add_tramite"><i class="fa fa-share-square"></i> Encaminhar</button>
    </div>
</form>
<br>
<br>
    <table id="table_tramite" class="table table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Setor</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
    </table>



