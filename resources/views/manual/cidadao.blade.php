@extends('layouts.app')

@section('htmlheader_title', 'Home')
@section('contentheader_title', 'Home')
@section('conteudo')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manual do cidadão</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Manual</li>
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
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-info"></i> Olá!</h5>Este é o seu manual que irá lhe auxiliar a utilizar nossa plataforma.
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-12" id="accordion">
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                1. Home
                            </h4>
                        </div>
                    </a>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <h5>Na home você tem disponível os menus do usuário</h5>
                            <div class="filter-container p-0 row">
                                <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                    <a href="{{asset('dist/img/sidebar.png') }}" data-toggle="lightbox" data-title="sample 1 - white">
                                        <img src="{{asset('dist/img/sidebar.png') }}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                </div>
                            </div>
                            <h5>Também é possível ver as atualizações que aconteceram em seus processos ou documentos</h5>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                2. Consultar Processo 
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <h5>Em Consultar Processo você tem acesso a outros processos que estão em tramitação no sistema. Você pode pesquisar pelo número do processo ou por seu autor. Assim será visível: </h5>
                            <ul>
                                <li>nome do autor do processo;</li>
                                <li>número do processo;</li>
                                <li>título;</li>
                                <li>a descrição do tipo de solicitação ou informação;</li>
                                <li>a quem foi encaminhada a solicitação ou informação;</li>
                                <li>o status informa o estado atual do processo, se ele ainda está em tramites ou se já foi encerrado.</li>
                            </ul>
                            <div class="filter-container p-0 row">
                                <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                    <a href="{{asset('dist/img/criar-inicio.png') }}" data-toggle="lightbox" data-title="sample 1 - white">
                                        <img src="{{asset('dist/img/criar-inicio.png') }}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                3. Processo
                            </h4>
                        </div>
                    </a>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <h5>Ao clicar em Processo, você terá acesso a todos os seus processos já criados.</h5>
                            <h5>Se deseja criar um novo processo, basta clicar em Adicionar processo, localizado na parte superior direta da página.</h5>
                            <h5>Então aparecerá uma tela de criação, basta preencher as informações iniciais do processo que deseja criar e clicar em “Criar”.</h5>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                4. Criar Processo
                            </h4>
                        </div>
                    </a>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <h5>Assim que cumprir o passo anterior você será direcionado à página onde terá acesso às informações mais avançadas do processo que acabou de criar</h5>
                            <div class="filter-container p-0 row">
                                <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                    <a href="{{asset('dist/img/criar-redirecionamento.png') }}" data-toggle="lightbox" data-title="sample 1 - white">
                                        <img src="{{asset('dist/img/criar-redirecionamento.png') }}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                5. Adicionar Documento
                            </h4>
                        </div>
                    </a>
                    <div id="collapseFive" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <h5>Clique em “Adicionar Documento” no canto superior direto você será direcionado à seguinte página.</h5>
                            <div class="filter-container p-0 row">
                                <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                    <a href="{{asset('dist/img/add-documento.png') }}" data-toggle="lightbox" data-title="sample 1 - white">
                                        <img src="{{asset('dist/img/add-documento.png') }}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                </div>
                            </div>
                            <h5>Aqui você deverá preencher os campos com o título do seu documento.</h5>
                            <h5>Depois escolher o modelo de documento (existem alguns <i>modelos já prontos</i> de documentos formais para fazer o preenchimento”, mas também é possível criar um novo modelo e este pode ficar salvo para um uso posterior seu).</h5>
                            <div class="filter-container p-0 row">
                                <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                    <a href="{{asset('dist/img/modelo-documento.png') }}" data-toggle="lightbox" data-title="sample 1 - white">
                                        <img src="{{asset('dist/img/modelo-documento.png') }}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                </div>
                            </div>
                            <h5>Ao finalizar a criação do documento você será redirecionado à página onde é possível ver os seus documentos já criados.</h5>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                6. Ações no Documento
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSix" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <h5>Na página de “Documentos” você terá acesso a algumas ações como:</h5>
                            <ul>
                                <li><i class="fa fa-eye"></i> Visualizar o documento</li>
                                <li><i class="fa fa-pencil-alt"></i> Fazer edição</li>
                                <li><i class="fa fa-paper-plane"></i> Encaminhar a algum setor</li>
                                <li><i class="fa fa-user-edit"></i> Fazer a assinatura virtual</li>
                                <li><i class="fa fa-trash"></i> Excluir o documento</li>
                            </ul>
                            <div class="filter-container p-0 row">
                                <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                    <a href="{{asset('dist/img/ações.png') }}" data-toggle="lightbox" data-title="sample 1 - white">
                                        <img src="{{asset('dist/img/ações.png') }}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                </div>
                            </div>
                            <h5>Clique no símbolo da caneta, para fazer a assinatura virtual e confirme a operação.</h5>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSeven">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                7. Anexar Documentos
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSeven" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <h5>Em anexos  é possível adicionar algum documento que seja necessário para o seu processo, como RG ou comprovantes. Clique em “Adicionar Anexos” e selecione o arquivo que deseja enviar e clique em “Salvar”.</h5>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseEight">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                8. Encaminhar processo
                            </h4>
                        </div>
                    </a>
                    <div id="collapseEight" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <h5>Seu processo pode ser encaminhado aos setores responsáveis diretamente pela plataforma.</h5>
                            <h5>Se já estiver tudo certo com o seu documento, clique em “Encaminhar processo” e em seguida em “Adicionar Encaminhamento”.</h5>
                            <div class="filter-container p-0 row">
                                <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                    <a href="{{asset('dist/img/encaminhar.png') }}" data-toggle="lightbox" data-title="sample 1 - white">
                                        <img src="{{asset('dist/img/encaminhar.png') }}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                </div>
                            </div>
                            <h5>Selecione o setor para o qual deseja fazer o encaminhamento e clique em “Salvar” que está ao lado direito.</h5>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                9. Anexar Documentos
                            </h4>
                        </div>
                    </a>
                    <div id="collapseNine" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <h5>Em “Informação do Processo” você poderá ter acesso ao status dos seus processos, sendo possível verificar se já foram finalizados ou se estão sendo tramitados.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>           
                   
    @endsection