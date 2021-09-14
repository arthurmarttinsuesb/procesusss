@extends('layouts.app')

@section('htmlheader_title', 'Home')
@section('contentheader_title', 'Home')

@section('conteudo')
    <!-- Content Wrapper. Contains page content -->
    <div class="wrapper">
    </div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sobre o Sistema</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Tela Inicial</a></li>
                            <li class="breadcrumb-item active">Sobre</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
            <!-- Main content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <div class="alert alert-info bg-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5> PROCESSUS</h5>Sistema de gestão e controle de processus desenvolvido através do Convênio 001/2019 PMJ/UESB
                            </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-6">
                    <input type="hidden">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">

                        </div>
                        <div class="card-body ">
                            <div class="card card-info card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="https://imageshack.com/i/pmq12hJtp" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">Claudia Ribeiro Santos Lopes</h3>

                                    <p class="text-muted text-center">Gerente de Projeto / Analista Sênior</p>

                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Doutora em Difusão do Conhecimento pela Universidade Federal da Bahia (FACED/UFBA)

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Professora da Universidade Estadual do Sudoeste da Bahia – UESB
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Coordenadora do Centro de Pesquisa e Desenvolvimento de Softwares – CPDS
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Coordenadora do Curso de Sistemas de Informação da UESB
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="hidden">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">

                        </div>
                        <div class="card-body ">
                            <div class="card card-info card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="https://imageshack.com/i/pnFau4PXp" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">Jéssica Cerqueira</h3>

                                    <p class="text-muted text-center">Scrum Master da Fábrica de Software</p>

                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Analista de Sistemas
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Desenvolvedora Web
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="hidden">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">

                        </div>
                        <div class="card-body ">
                            <div class="card card-info card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="https://imageshack.com/i/poMJg84Np" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">Tailane Maia</h3>

                                    <p class="text-muted text-center">Discente do Curso Sistemas de Informação (UESB)</p>

                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Bolsista, atua em projetos desenvolvidos na Fábrica de Software
                                            </a>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="hidden">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">

                        </div>
                        <div class="card-body ">
                            <div class="card card-info card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="https://imageshack.com/i/pnKt8owFp" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">Ronald Matos</h3>

                                    <p class="text-muted text-center">Discente do Curso Sistemas de Informação (UESB)</p>

                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Bolsista, atua em projetos desenvolvidos na Fábrica de Software
                                            </a>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="hidden">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">

                        </div>
                        <div class="card-body ">
                            <div class="card card-info card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="https://imageshack.com/i/pos3c2chp" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">Anderson Pereira</h3>

                                    <p class="text-muted text-center">Discente do Curso Sistemas de Informação (UESB)</p>

                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Bolsista, atua em projetos desenvolvidos na Fábrica de Software
                                            </a>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="hidden">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">

                        </div>
                        <div class="card-body ">
                            <div class="card card-info card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="https://imageshack.com/i/podRNMmWp" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">Túlio Calil</h3>

                                    <p class="text-muted text-center">Discente do Curso Sistemas de Informação (UESB)</p>

                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Bolsista, atua em projetos desenvolvidos na Fábrica de Software
                                            </a>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="hidden">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">

                        </div>
                        <div class="card-body ">
                            <div class="card card-info card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="https://imageshack.com/i/pn5XXDgrp" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">Willer Almeida</h3>

                                    <p class="text-muted text-center">Discente do Curso Sistemas de Informação (UESB)</p>

                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Bolsista, atua em projetos desenvolvidos na Fábrica de Software
                                            </a>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
                   
@endsection