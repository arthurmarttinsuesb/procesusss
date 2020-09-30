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
                <div class="col-sm-6">
                    <h1>Meu Processo nº: {{$processo->numero}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Processos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
            @if (Session::has('message_sucesso'))
                <div class="alert alert-info alert-dismissible col-12">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('message_sucesso') }}
                </div>
            @endif

            @if (Session::has('message_erro'))
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                     {{ Session::get('message') }}
                </div>
            @endif
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-processo-tab" data-toggle="pill"
                                    href="#custom-tabs-four-processo" role="tab" aria-controls="custom-tabs-four-processo"
                                    aria-selected="true">Processo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill"
                                    href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                    aria-selected="true">Documentos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                    aria-selected="false">Anexos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                    href="#custom-tabs-four-messages" role="tab"
                                    aria-controls="custom-tabs-four-messages" aria-selected="false">Encaminhar Processo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-informacoes-tab" data-toggle="pill"
                                    href="#custom-tabs-four-informacoes" role="tab" aria-controls="custom-tabs-four-informacoes"
                                    aria-selected="false">Informações do Processo</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body " >
                        <input type='hidden' id='processo' name='processo' value='{{$processo->id}}' />
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-four-processo" role="tabpanel"
                                aria-labelledby="custom-tabs-four-processo-tab">
                                @include('processo.tab_processo')
                            </div>
                            <div class="tab-pane fade show" id="custom-tabs-four-home" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                @include('processo.tab_documento')
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-four-profile-tab">
                                @include('processo.tab_anexo')
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                aria-labelledby="custom-tabs-four-messages-tab">
                                @include('processo.tab_tramitacao')
                            </div>
                            <div class="tab-pane fade table-responsive p-0" id="custom-tabs-four-informacoes" role="tabpanel"
                                aria-labelledby="custom-tabs-four-informacoes-tab" style="height: 500px;">
                                @include('processo.tab_informacoes')
                            </div>
                        </div>
                    </div>
                </div> <!-- /.card -->
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
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/processo.js') }}"></script>
@endsection
