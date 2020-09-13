@extends('layouts.app')

@section('htmlheader_title', 'Colaboradores')
@section('contentheader_title', 'Colaboradores')

@section('conteudo')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Colaboradores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Colaboradores</li>
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
                        <div class="col-3 float-right">
                            <a href="{{ URL::to('usuario-setor/create') }}" class="btn btn-block btn-outline-info"><i class="fa fa-plus"></i>Adicionar Colaborador</a>
                        </div>
                    </div>
                    @if (Session::has('message'))
                    <div class="alert alert-info m-2">{{ Session::get('message') }}</div>
                    @endif
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="table_usuario-setor" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Setor</th>
                                    <th>Secretaria</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.row -->
    </section>
</div>
<!-- /.content -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/usuario-setor.js') }}"></script>
@endsection
