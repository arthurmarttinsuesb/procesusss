@extends('layouts.app')

 @section('htmlheader_title', 'Encaminhamento')
 @section('contentheader_title', 'Encaminhamento')
 @section('conteudo')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Encaminhar Processo nº {{$processo->numero}} </h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Encaminhamento</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">

           <div class="card">
              <div class="card-header">
                    <div class="float-right">
                         <a href="/processo/{{$processo->id}}/edit" class="btn btn-block btn-outline-info "><i class="fa fa-undo-alt"></i> Retornar ao Processo</a>
                    </div>
              </div>
              @if (Session::has('message'))
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                     {{ Session::get('message') }}
                </div>
              @endif

                <form  method="POST" id="tramite">
                    @csrf
                    <div class="card-body">
                        (<span style="color: red;">*</span>) Campos Obrigatórios
                        <br><br>
                        <div class="row">
                            <div class="form-group col-md-6">
                            <input type="hidden" id="processo" value='{{$processo->id}}'>
                                <strong>Setor <span style="color: red;">*</span></strong>
                                @inject('secretaria', 'App\Secretaria')
                                <select id="select_secretaria"
                                    class="form-control select2 form-control @error('fk_setor', 'setor') is-invalid @enderror"
                                    name="fk_setor">
                                    @foreach ($setores as $setor)
                                        @foreach ($secretaria->where('id', $setor->id)->get() as $secSigla)
                                            @if (old('fk_setor') == $setor->id)
                                            <option value="{{$setor->id}}" selected>{{$secSigla->sigla}} - {{$setor->sigla}}
                                            </option>
                                            @else
                                            <option value="{{$setor->id}}">{{$secSigla->sigla}} - {{$setor->sigla}}</option>
                                            @endif
                                        @endforeach
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
                            <div class="form-group col-md-6" @foreach(Auth::user()->getRoleNames() as $nome)   @if($nome=="cidadao") hidden @endif  @endforeach>
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
                <!-- se o processo estiber bloqueado não pode alterar mais nada -->
                @if($processo->tramite=="Liberado")
                     <div class="card-footer">
                        <button type="button" form="tramite" class="btn btn-info float-right add_tramite" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                        &nbsp Aguarde...">Salvar</button>
                    </div>
                  @endif

                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->

          </div>
        </div>
    </section>
</div>


@endsection
@section('scripts-adicionais')
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/processo_tramitacao.js') }}"></script>
@endsection




