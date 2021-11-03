@extends('layouts.app')

@section('htmlheader_title', 'Processo')
@section('contentheader_title', 'Processo')

@section('conteudo')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

<style>
    .float-right button {
        background-color: #fff;
    }
    .float-right button:hover {
        background-color: #17a2b8;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gerenciar Meus Processos</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Processos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color:#f4f6f9; border: 1px solid #f4f6f9; box-shadow: unset;">
                    <!-- <div class="card-header"> -->
                        <!-- <div class="row"> -->
                            <!-- <div class="col-xl-3 col-sm-11"> -->
                                <div class="float-right">
                                    <button data-toggle="modal" data-target="#modal-processo" class="btn btn-block btn-outline-info"><i class="fa fa-plus"></i> Adicionar Processo</button>
                                    <button data-toggle="modal" data-target="#modal_replicar_processo" class="btn btn-block btn-outline-info"><i class="fa fa-plus"></i> Replicar Processo</button>
                                </div>
                            <!-- </div> -->

                        <!-- </div> -->
                    <!-- </div> -->

                </div>
                <!-- /.card-header -->
                @if (Session::has('message'))
                <div class="alert alert-info m-2">{{ Session::get('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-body table-responsive-sm">
                        @if(Auth::user()->hasRole('administrador'))
                        <table id="table_administrador" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Criado Por</th>
                                    <th>Número Processo</th>
                                    <th>Data de Abertura</th>
                                    <th>Tipo</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                        </table>
                        @else
                        <table id="table_usuario" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Número Processo</th>
                                    <th>Data de Abertura</th>
                                    <th>Tipo</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                        </table>

                        @endif
                    </div>
                </div>
                
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
            <!-- /.row -->
    </section>
</div>
@include('processo.modal_processo')
@include('processo.modal_replicar_processo')
<!-- /.content -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/listar_processo.js') }}"></script>
@endsection