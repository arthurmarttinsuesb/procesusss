@extends('layouts.app')

@section('htmlheader_title', 'Home')
@section('contentheader_title', 'Home')

@inject('documento', 'App\DocumentoTramite')

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




            <!-- Timelime example  -->

            <div class="row">
                <div class="col-md-12">
                    <!-- The time line -->

                    <div class="timeline">

                        <!-- timeline time label -->
                        @foreach($process as $processo_visualizar)
                        @if($processo_visualizar->status == 'Ativo')
                        <!-- repete inicio -->
                        <div class="time-label">
                            <span class="bg-teal">
                                {{Carbon\Carbon::parse($processo_visualizar->updated_at)->format('d/m/Y H:i')}} </span>
                        </div>

                        <!-- /.timeline-label -->
                        <!-- timeline item -->


                        <div>

                            <i class="fas fa-folder-open bg-lightblue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock">
                                        {{Carbon\Carbon::parse($processo_visualizar->updated_at)->format('d/m/Y H:i')}}
                                    </i> </span>
                                <h3 class="timeline-header"><a href="#">Visualizações Pendentes:</a> Você possui
                                    processos que precisam ser lidos</h3>

                                <div class="timeline-body">

                                    <b> Tipo do Processo: </b> {{$processo_visualizar->tipo}} <br>
                                    <b> Número do Processo</b> {{$processo_visualizar->numero}}

                                </div>

                                <div class="timeline-footer">
                                    <a href="/processo/{{$processo_visualizar->id}}/edit"
                                        class="btn bg-info color-palette btnEditar" title="Assinar"
                                        data-toggle="tooltip">
                                        <i class="fas fa-pencil-alt"> Editar</i>
                                    </a>
                                </div>

                            </div>


                        </div>
                        <!-- repete fim -->
                        @endif
                        @endforeach
                        <!-- END timeline item -->
                    </div>

                </div>
                <!-- /.col -->
            </div>


            <hr>
            <h4>Documentos Recebidos</h4>

            <!-- Timelime example  -->

            <div class="row">
                <div class="col-md-12">
                    <!-- The time line -->

                    <div class="timeline">
                        <!-- timeline time label -->
                        @foreach($docs as $documento_assinar)
                        @if($documento_assinar->assinatura == TRUE)

                        <!-- repete inicio -->
                        <div class="time-label">
                            <span class="bg-teal">
                                {{Carbon\Carbon::parse($documento_assinar->updated_at)->format('d/m/Y H:i')}} </span>
                        </div>

                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>

                            <i class="fas fa-file-alt bg-lightblue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock">
                                        {{Carbon\Carbon::parse($documento_assinar->updated_at)->format('d/m/Y H:i')}}
                                    </i> </span>
                                <h3 class="timeline-header"><a href="#">Assinaturas Pendentes:</a> Você possui
                                    documentos que precisam ser assinados</h3>

                                <div class="timeline-body">
                                    <b>Titulo:</b> {{$documento_assinar->titulo}} <br> <b> Descrição: </b>
                                    {{$documento_assinar->descricao}} <br>
                                    <b>Conteúdo: </b> {{$documento_assinar->conteudo}}
                                </div>

                                <div class="timeline-footer">
                                    <a href="#" class="btn bg-success color-palette btnAssinar" title="Assinar"
                                        data-toggle="tooltip">
                                        <i class="fa fa-edit">Assinar</i>
                                    </a>
                                </div>

                            </div>


                        </div>

                        @endif
                        @endforeach
                        <!-- repete fim -->
                        <!-- END timeline item -->
                    </div>

                </div>
                <!-- /.col -->
            </div>




        </div>

    </section>
    @include('sweetalert::alert')
    <!-- /.content -->

    <!-- jQuery -->

    <script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/base.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>


    @endsection