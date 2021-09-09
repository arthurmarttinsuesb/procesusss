@extends('layouts.app')
 
 @section('htmlheader_title', 'Documento')
 @section('contentheader_title', 'Documento')
 @section('conteudo') 
 <!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Encaminhar Documento {{$modelo->processo->numero}} </h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Tela Inicial</a></li>
              <li class="breadcrumb-item active">Encaminhar Documento</li>
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
                        <a href="/processo/{{$modelo->processo->numero}}/edit" class="btn btn-block btn-outline-info "><i class="fa fa-undo-alt"></i> Retornar ao Processo</a>
                    </div>
              </div>
              @if (Session::has('message'))
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                     {{ Session::get('message') }}
                </div>
              @endif
              @if (Session::has('message_success'))
              <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     {{ Session::get('message_success') }}
                </div>
              @endif
           
              <form  method="POST" id="tramite_documento" action="/documento-tramite/store/{{$modelo->slug}}">
                 @csrf
                <div class="card-body">

                 <!-- @if($modelo->tramite=="Liberado" && Auth::user()->id==$modelo->fk_user)-->
                 <!-- @else -->
                 <!-- @endif-->
                 
                      (<span style="color: red;">*</span>) Campos Obrigatórios
                      <br><br>
                        <div class="form-row">
                                <div class="form-group col-md-2">
                                    <strong>Assinatura <span style="color: red;">*</span></strong>
                                    <select  name="assinatura" id="assinatura" class="form-control select2 @error('assinatura') is-invalid @enderror" required>
                                       <option value="" >Selecione</option>
                                       <option value="true" >Sim</option>
                                       <option value="false" >Não</option>
                                    </select>
                                    <input type="hidden"  name="processo" value="{{$modelo->fk_processo}}">
                                    <input type="hidden"  id="processo_documento" value="{{$modelo->id}}">
                                    @error('assinatura')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>
                                <div class="form-group col-md-2">
                                    <strong>Enviar Para <span style="color: red;">*</span></strong>
                                    <select  name="envio" id="envio" class="form-control select2 @error('envio') is-invalid @enderror" required>
                                       <option value="" >Selecione</option>
                                       @foreach(Auth::user()->getRoleNames() as $nome)
                                            @if($nome!="cidadao")
                                            <option value="setor" >Setor</option>
                                            <option value="colaborador" >Colaborador</option>
                                            @else
                                               <option value="setor" >Setor</option>
                                            @endif   
                                        @endforeach
                                      
                                    </select>
                                    @error('envio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 setor" style='display:none'>
                                    <strong>Setor <span style="color: red;">*</span></strong>
                                    <select  name="setor[]" class="form-control select2 @error('setor') is-invalid @enderror" multiple="multiple">
                                        @inject('setor','App\Setor')
                                        @foreach($secretaria as $secretarias)
                                            <optgroup label="{{$secretarias->titulo}}" >
                                                @foreach($setor->where('fk_secretaria',$secretarias->id)->get() as $setores)
                                                    <option value="{{$setores->id}}" >{{$setores->titulo}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    @error('setor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 colaborador" style='display:none'>
                                    <strong>Colaborador <span style="color: red;">*</span></strong>
                                    <select  name="usuario[]" class="form-control select2 @error('usuario') is-invalid @enderror" multiple="multiple">
                                    @foreach($usuario as $usuarios)
                                        <option value="{{$usuarios->id}}">{{$usuarios->nome}}</option>
                                    @endforeach
                                    </select>
                                    @error('usuario')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <br>
                                      <button type="submit" form="tramite_documento" class=" form-control btn btn-info" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>&nbsp Aguarde..."> <i class='fa fa-plus'></i> Enviar</button>
                                 </div> 
                            </div>   
                            <hr>
                
                     <input type="hidden"  name="processo" value="{{$modelo->fk_processo}}">
                     <input type="hidden"  id="processo_documento" value="{{$modelo->id}}">            
               
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                        <table id="table_tramite_documento" class="table table-bordered table-hover" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Assinatura Obrigatória</th>
                                                <th>Enviado Para</th>
                                                <th>Status</th>
                                                <th>Ação</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- /.card-body -->
              
                <!-- /.card-footer -->
              </form>
              
            <!-- /.card -->
           
           

          </div>
        
        </div>
       
    </section>
    
</div>


@endsection
@section('scripts-adicionais')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/tramite.js') }}"></script>
@endsection




