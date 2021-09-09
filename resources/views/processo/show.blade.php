@extends('layouts.app')

@section('htmlheader_title', 'Processo')
@section('contentheader_title', 'Processo')

@section('conteudo')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.min.css') }}">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-8">
                    <h1>Processo nº: {{$processo->numero}}</h1><br>
                   
                   
                </div>
                <div class="col-md-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Processos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
             <!-- DOCUMENTOS -->
             <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Informações do Processo</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="height: 300px;">
                            <div class="col-md-12">
                                        <h5><b>Autor(a): </b> {{$processo->user->nome}}</h5>
                                        <h5><b>Título: </b> {{$processo->titulo}}</h5>
                                        <h5><b>Teor: </b> {{$processo->tipo}}</h5>
                                        <h5><b>Descrição: </b>{{$processo->descricao ?? "Não possui"}}</h5> 
                                        <h5><b>Status do Processo: </b>  
                                            @if($processo->status=='Ativo') 
                                                 <span class="right badge badge-success">em andamento</span>
                                                @elseif($processo->status=='Encaminhado') 
                                                    <span class="right badge badge-success">em andamento</span>
                                                @elseif($processo->status=='Finalizado' || $processo->status=='Encerrado')   
                                                     <span class="right badge badge-danger">encerrado</span>
                                            @endif   
                                        </h5>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
        <!-- /.row -->
            <!-- DOCUMENTOS -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Documentos</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                               <tr>
                                    <th>Título</th>
                                    <th>Conteúdo</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($processo_documento as $documentos)
                                    <tr>
                                        <td>{{$documentos->titulo}}</td>
                                        <td>{{$documentos->tipo}}</td>
                                        <td>
                                        @inject('documento_tramite', 'App\DocumentoTramite')
                                        @if($documento_tramite->where('fk_processo_documento', $documentos->id)->where('status','!=','Inativo')->count()==0)
                                            <span class="right badge badge-success">em andamento</span>
                                        @else
                                            @if($documento_tramite->where('fk_processo_documento', $documentos->id)->where('status','Pendente')->count()==0)
                                                <span class="right badge badge-secondary">concluído</span>
                                            @else
                                                <span class="right badge badge-info">enviado</span>
                                            @endif
                                        @endif
                                        </td>
                                        <td>
                                            @if($documentos->tipo=="Público")
                                                <a href="/pdf/documento/{{$documentos->id}}"
                                                    class="btn bg-teal color-palette btn-sm"
                                                    title="Visualizar" data-toggle="tooltip" target="_blank">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @elseif($documentos->tipo=="Privado")
                                                <span class="right badge badge-danger">Documento Privado</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach    
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
        <!-- /.row -->

            <!-- ANEXOS -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Anexos</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Conteúdo</th>
                                    <th>Usuário</th>
                                    <th>Autenticado Por:</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($processo_anexo as $anexos)
                                    <tr>
                                        <td>{{$anexos->titulo}}</td>
                                        <td>{{$anexos->tipo}}</td>
                                        <td>{{$anexos->user->nome}}</td>
                                        <td>{{isset($anexos->fk_user_atenticacao) ? $anexos->userAthenticated->nome : '(Sem autenticação)'}}</td>
                                        <td>
                                            @if($anexos->tipo=="Público")
                                                <a href="/anexo/{{$anexos->arquivo}}"
                                                    class="btn bg-teal color-palette btn-sm"
                                                    title="Visualizar Anexo" data-toggle="tooltip" target="_blank">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            @elseif($anexos->tipo=="Privado")
                                                    <span class="right badge badge-danger">Anexo Privado</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach    
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
        <!-- /.row -->


           <!-- TRAMITAÇÃO -->
           <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Tramitação</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Encaminhamentos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($processo_tramitacao as $tramitacaos)
                                    <tr>
                                        <td><h5>{{isset($tramitacaos->fk_user) ? 'Enviado para: '.$tramitacaos->user->nome.' - '.date('d/m/Y H:s',strtotime($tramitacaos->created_at)) : 'Enviado para: '.$tramitacaos->setor->titulo.' - '.date('d/m/Y H:s',strtotime($tramitacaos->created_at)) }}</h5>
                                        </td>
                                    </tr>
                                @endforeach    
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
        <!-- /.row -->



            </div>
            <div class="col-md-4" >
                <!-- TO DO List -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ion ion-clipboard mr-1"></i>
                            Informações do Processo
                        </h3>
                        <div class="card-tools">
                            <ul class="pagination pagination-sm">
                               {{ $log->links() }}
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <ul class="todo-list" data-widget="todo-list">
                            <li>
                                @foreach($log as $logs)
                                    <span class="handle">
                                        <i class="fas fa-arrow-right"></i>
                                    </span><?php echo $logs->status ?>
                                    <small class="badge badge-success"><i class="far fa-calendar-alt"></i> {{date('d/m/Y - H:s', strtotime($logs->created_at))}}</small><hr>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
</div>
</section>
</div>
@include('sweetalert::alert')
@endsection
@section('scripts-adicionais')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
@endsection