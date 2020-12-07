@extends('layouts.app')

@section('htmlheader_title', 'Home')
@section('contentheader_title', 'Home')
@section('conteudo')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            @if (auth()->user()->status != 'Ativo')

            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Por favor, ative o seu usuario</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    Acesse o seu email e siga as instruções para concluir o seu registro
                </div>
                <!-- /.card-body -->
            </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Avisos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Avisos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main content -->
        <div class="container-fluid">
            <h4>Processos Recebidos</h4>
            <div class="row">
                <div class="col-md-12">
                    <!-- The time line -->
                    <div class="timeline">
                        <!-- timeline time label -->
                        @if($processo->count()>0)
                        <?php   $i = 0; ?>  
                            @foreach($processo as $processo_visualizar)
                            <?php $i = $i + 1; ?> 
                            <div class="time-label">
                                <span class="bg-teal">
                                    {{date('d/m/Y', strtotime($processo_visualizar->created_at))}} </span>
                            </div>
                            <div>
                                <i class="fas fa-folder-open bg-lightblue"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock">
                                              {{date('d/m/Y H:i', strtotime($processo_visualizar->created_at))}}
                                        </i> </span>
                                    <h3 class="timeline-header"><b>Processo:</b> {{$processo_visualizar->processo->numero}}</h3>

                                    <div class="timeline-body">
                                        <b> Teor do Processo: </b> {{$processo_visualizar->processo->tipo}} <br>
                                        <b> Criado Por: </b> {{$processo_visualizar->processo->user->nome}} <br>
                                        <b> Título: </b> {{$processo_visualizar->processo->titulo}} <br>
                                        <b> Descricao: </b> {{$processo_visualizar->processo->descricao ?? "Não possui"}} <br>
                                        
                                    </div>
                                    <div class="timeline-footer">
                                        <div class="btn-group btn-group-sm">
                                            <a href="/processo/{{$processo_visualizar->processo->numero}}/edit" class="btn bg-info color-palette" title="Visualizar Documento Completo"
                                                data-toggle="tooltip"><i class="fa fa-eye"></i> Acessar
                                            </a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <?php  if ($i == 5){
                                break;
                            }
                           ?>
                            @endforeach
                            @if($processo->count()> 5)
                           
                        <div class="row">
                            <div class="col-xl-10 col-sm-9">
                            </div>
                            <div class=" col-xl-2 col-sm-3">
                                <div class=" btn-group-sm">
                                            <a href="/processo/listar_processos" class="btn bg-info color-palette" title="Ver mais processos"
                                                data-toggle="tooltip"><i class="fa fa-eye"></i> Ver mais processos
                                            </a>
                                        </div>
                            </div>
                        </div>
                   
                                   
                            @endif
                        @else
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-info"></i> Atenção!</h5>No momento não possui processos encaminhados para você ou para o seu setor.
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <hr>
            <h4>Documentos Recebidos</h4>
            <div class="row">
                <div class="col-md-12">
                    <!-- The time line -->
                    <div class="timeline">
                        <!-- timeline time label -->
                    @if($documento->count()>0)
                    <?php   $i = 0; ?>  
                        @foreach($documento as $documentos)
                        <?php $i = $i + 1; ?> 
                        <!-- repete inicio -->
                        <div class="time-label">
                            <span class="bg-teal">{{date('d/m/Y H:i', strtotime($documentos->created_at))}} </span>
                        </div>
                        <div>
                            <i class="fas fa-file-alt bg-lightblue"></i>
                            <div class="timeline-item">
                                <span class="time">
                                    <i class="fas fa-clock">
                                       {{date('d/m/Y H:i', strtotime($documentos->created_at))}}
                                    </i>
                                </span>
                                <h3 class="timeline-header"><b>Documento:</b> {{$documentos->processo_documento->titulo}}</h3>
                                <div class="timeline-body">
                                     <b> Descrição: </b>
                                    <p align='justify'>{{$documentos->processo_documento->descricao}}</p> <br>
                                </div>
                                <div class="timeline-footer">
                                   @if($documentos->assinatura == TRUE)
                                        <div class="btn-group btn-group-sm">
                                            <button type='button' class="btn bg-success color-palette btnAssinar"
                                            data-id="{{$documentos->id}}" title="Assinar Documento" data-toggle="tooltip"><i class="fa fa-pencil-alt"></i></i> Assinar
                                            </button>
                                            <a href="/pdf/documento/{{$documentos->processo_documento->id}}" target='_blank' class="btn bg-info color-palette" title="Visualizar Documento Completo"
                                                data-toggle="tooltip"><i class="fa fa-eye"></i> Visualizar
                                            </a>
                                            <a href="/devolutiva/devolutiva/{{$documentos->id}}" class="btn bg-warning  color-palette btnDevolutiva"
                                            data-id="{{$documentos->id}}" title="Informar erro no Documento" data-toggle="tooltip"><i class="fa fa-pencil-alt"></i></i> Informar erro
                                            </a>
                                        </div>
                                        @else
                                        <div class="btn-group btn-group-sm">
                                            <button type='button' class="btn bg-success color-palette btnAssinar"
                                            data-id="{{$documentos->id}}" title="Marcar documento como lido" data-toggle="tooltip"><i class="fa fa-envelope-open-text"></i></i> Marcar como lido
                                            </button>
                                            <a href="/pdf/documento/" target='_blank' class="btn bg-info color-palette" title="Visualizar Documento Completo"
                                                data-toggle="tooltip"><i class="fa fa-eye"></i> Visualizar
                                            </a>
                                            <a href="/devolutiva/devolutiva/{{$documentos->id}}" class="btn bg-warning  color-palette btnDevolutiva"
                                            data-id="{{$documentos->id}}" title="Informar erro no Documento" data-toggle="tooltip"><i class="fa fa-pencil-alt"></i></i> Informar erro
                                            </a>
                                        </div>

                                    @endif
                                </div>
                            </div>
                        </div>
                        <?php  if ($i == 5){
                                break;
                            }
                           ?>
                        @endforeach
                        @if($documento->count()> 5)
                           
                           <div class="row">
                               <div class="col-xl-10 col-sm-9">
                               </div>
                               <div class=" col-xl-2 col-sm-3">
                                   <div class=" btn-group-sm">
                                               <a href="/documento/listar_documentos" class="btn bg-info color-palette" title="Ver mais documentos"
                                                   data-toggle="tooltip"><i class="fa fa-eye"></i> Ver mais documentos
                                               </a>
                                           </div>
                               </div>
                           </div>
                      
                                      
                               @endif
                    @else
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Atenção!</h5>No momento não possui documentos encaminhados para você ou para o seu setor.
                    </div>
                    @endif
                        <!-- repete fim -->
                        <!-- END timeline item -->
                    </div>

                </div>
                <!-- /.col -->
            </div>




        </div>

    </section>
    @include('sweetalert::alert')
    <script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/base.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    @endsection
