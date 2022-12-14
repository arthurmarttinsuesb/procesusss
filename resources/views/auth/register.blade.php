@extends('auth.app')
@section('htmlheader_title', 'Cadastro')
@section('contentheader_title', 'Cadastro')
@section('conteudo')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">


<br><br>
<div class="login-logo">
    <a href="{{ url('/home') }}"><img src="{{url('/img/logo-processus.png')}}" alt="Processus" style="width: 20%; height: auto;"></a>
</div>
<!-- /.login-logo -->
<div class="card">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Atenção!</strong> Houve algum problema com as suas informações.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card-body register-card-body">
        <form action="{{ url('/register') }}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <div class="row">
                <div class=" form-group col-md-3">
                    <label>Tipo <span style="color: red;">*</span></label>
                    <select id="tipo" name="tipo" class="form-control select2 @error('tipo') is-invalid @enderror">
                        <option value="">Selecione</option>
                        @if (old('tipo') == "PF")
                        <option value="PF" selected>Pessoa Física</option>
                        @else
                        <option value="PF">Pessoa Física</option>
                        @endif
                        @if (old('tipo') == "PJ")
                        <option value="PJ" selected>Pessoa Jurídica</option>
                        @else
                        <option value="PJ">Pessoa Jurídica</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Nome <span style="color: red;">*</span></label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome Completo" name="nome" value="{{ old('nome') }}" />
                </div>
                <div class="form-group col-md-3 nascimento">
                    <label>Data de Nascimento <span style="color: red;">*</span></label>
                    <input type="date" class="form-control @error('nascimento') is-invalid @enderror" name="nascimento" id="nascimento" maxlength="10" value="{{ old('nascimento')}}" placeholder="Data de Nascimento" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3 sexo ">
                    <label>Gênero <span style="color: red;">*</span></label>
                    <select id="sexo" name="sexo" class="form-control select2 @error('sexo') is-invalid @enderror">
                        <option value='' selected>Selecione ...</option>
                        @if (old('sexo') == "Masculino")
                        <option value="Masculino" selected>Masculino</option>
                        @else
                        <option value="Masculino">Masculino</option>
                        @endif
                        @if (old('sexo') == "Feminino")
                        <option value="Feminino" selected>Feminino</option>
                        @else
                        <option value="Feminino">Feminino</option>
                        @endif
                        @if (old('sexo') == "Outro")
                        <option value="Outro" selected>Outro</option>
                        @else
                        <option value="Outro">Outro</option>
                        @endif
                    </select>
                </div>
                <!-- <div class="row outro_genero " style="display: none;"> -->                
                <div class="col-md-3 outro_genero">
                    <label>Outro Gênero</label>
                    <input type="text" class="form-control " placeholder="Informe o seu gênero" name="genero" id="genero" value="{{ old('genero') }}" readonly />
                </div>
                <!-- </div> -->
                <div class="form-group col-md-3">
                    <div class="form-group cpf">
                        <label>CPF/CNPJ <span style="color: red;">*</span></label>
                        <input type="text" class="form-control @error('cpf_cnpj') is-invalid @enderror" name="cpf_cnpj" id="cpf_cnpj" placeholder="Identificação" value="{{ old('cpf_cnpj') }}" />
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="form-group cpf">
                        <label>Telefone <span style="color: red;">*</span></label>
                        <input type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" id="telefone" placeholder="(dd) 00000-000" data-inputmask='"mask":"(99)99999-9999"' value="{{ old('telefone') }}" data-mask />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <label>Estado <span style="color: red;">*</span></label>
                    @inject('estados', 'App\Estado')
                    <select id="estado" name='estado' class="form-control select2 @error('estado') is-invalid @enderror">
                        <option value="">Selecione</option>
                        @foreach($estados->get() as $estado)
                        <option value='{{$estado->id}}'>{{$estado->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Cidade <span style="color: red;">*</span></label>
                    <select id="cidade" name='cidade' class="form-control select2 @error('cidade') is-invalid @enderror">
                        <option value="">Selecione</option>
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label>Logradouro (Rua/Avenida) <span style="color: red;">*</span></label>
                    <div class="form-group">
                        <input type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro" id="logradouro" placeholder="Rua/Avenida" value="{{old('logradouro')}}" />
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label>Número <span style="color: red;">*</span></label>
                    <input type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" id="numero" placeholder="Número" value="{{old('numero')}}" />
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-4">
                    <label>Bairro <span style="color: red;">*</span></label>
                    <input type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" id="bairro" placeholder="Bairro" value="{{old('bairro')}}" />
                </div>
                <div class="form-group col-md-2">
                    <label>CEP <span style="color: red;">*</span></label>
                    <input type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" id="cep" placeholder="CEP" value="{{old('cep')}}" data-inputmask='"mask": "99999-999"' data-mask />
                </div>
                <div class="form-group col-md-6">
                    <label>Complemento</label>
                    <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento" value="{{old('complemento')}}" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Email <span style="color: red;">*</span></label>
                    <div class="form-group">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="email@exemplo.com" value="{{old('email')}}" />
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Senha (Min 8 caracteres) <span style="color: red;">*</span></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Senha de Acesso" name="password" />
                </div>
                <div class="form-group col-md-3">
                    <label>Repetir Senha<span style="color: red;">*</span></label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Repetir a Senha de Acesso" name="password_confirmation" />
                </div>
            </div>

            <hr>
            <div class="container lst">


                <h4 class="well">Anexar Documentos:</h4>

                <h5 class="well residencia">- Comprovante de Residência</h5>
                <div class="input-group hdtuto control-group lst increment">
                    <input type="file" name="filenames[]" class="myfrm form-control residencia" id = "file_Residencia">
                </div>
                <h5 class="well selfie">- Uma Selfie</h5>
                <div class="input-group hdtuto control-group lst increment">
                    <input type="file" name="filenames[]" class="myfrm form-control selfie" id = "file_Selfie"> 
                </div>
                <h5 class="well id doc_indentificacao">- Documento de Identificação</h5>
                <div class="input-group hdtuto control-group lst increment">
                    <input type="file" name="filenames[]" class="myfrm form-control doc_indentificacao" id = "file_ID">
                </div>
                <h5 class="well logo_empresa" hidden>- Logo da Empresa</h5>
                <div class="input-group hdtuto control-group lst increment">
                    <input type="file" name="filenames[]" class="myfrm form-control logo_empresa" id = "logo_empresa" hidden>
                </div>
                <h5 class="well comprovante_localizacao" hidden>- Comprovante de Localização</h5>
                <div class="input-group hdtuto control-group lst increment">
                    <input type="file" name="filenames[]" class="myfrm form-control comprovante_localizacao" id = "comprovante_localizacao" hidden>
                </div>
                <br>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">Ler os termos</button>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <input type="checkbox" name="terms" class="@error('terms') is-invalid @enderror"><strong> Eu aceito
                        os termos <span style="color: red;">*</span></strong></input>
                </div><!-- /.col -->
            </div>
            <div class="row"><br></div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 cadastrar">
                    <button type="submit" class="btn btn-primary btn-block btnInscrever">Inscreva-se</button>
                </div><!-- /.col -->
                <div class="col-md-3"></div>
            </div>


        </form>

    </div>
</div>

@endsection
@section('scripts-adicionais')
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-success").click(function() {
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
        });
        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".hdtuto").remove();
        });
    });
    $("body").on("click", ".btn-danger", function() {
        $(this).parents(".hdtuto").remove();
    });
    $(document).on('change', '#sexo', function() {
        var sexo = $("#sexo option:selected").val();
        if (sexo == "Outro") {
            $("#genero").prop("readonly", false);
        } else if (sexo == "Masculino") {
            $("#genero").prop("readonly", true);
        } else if (sexo == "Feminino") {
            $("#genero").prop("readonly", true);
        }
    });
    
    $(document).on('change', '#tipo', function() {
        var tipo = $("#tipo option:selected").val();

        if (tipo == "PF") {
            $(".nascimento").show();
            $(".sexo").show();
            $(".outro_genero").show();

            $(".comprovante_localizacao").hide()
            $(".logo_empresa").hide()

            $(".doc_indentificacao").show()
            $(".selfie").show();
            $(".residencia").show();

        } else if (tipo == "PJ") {
            $(".nascimento").hide();
            $(".sexo").hide();
            $(".outro_genero").hide();
            $(".selfie").hide();

            $(".comprovante_localizacao").prop("hidden", false)
            $(".logo_empresa").prop("hidden", false)

            $(".comprovante_localizacao").show()
            $(".logo_empresa").show()

            $(".doc_indentificacao").hide()
            $(".selfie").hide();
            $(".residencia").hide();
        }
    });
</script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/ativarUsuarios.js') }}"></script>
@endsection