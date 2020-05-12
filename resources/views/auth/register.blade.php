@extends('auth.app')
@section('conteudo')
<br><br>
    <div class="login-logo">
        <a href="../../index2.html"><b>Processus</b></a>
    </div>
        <!-- /.login-logo -->
    <div class="card">
        <div class="card-body register-card-body">
            <form action="{{ url('/register') }}" method="post" id="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="row">
                    <div class="form-group col-md-8">
                        <strong>Nome</strong>
                            <input type="text" class="form-control"
                                placeholder="Nome Completo" name="name"
                                value="{{ old('name') }}" />
                    </div>
                    <div class="form-group col-md-4">
                        <strong>Data de Nascimento</strong>
                            <input type="date" class="form-control" name="data_nascimento" id="data_nascimento"
                                maxlength="10" value="{{ old('data_nascimento') }}"
                                placeholder="Data de Nascimento" />
                    </div>
                   
                </div>
                <div class="row">
                    <div class="form-group col-md-3 sexo hidden">
                        <strong>Gênero</strong>
                        <select id="sexo" name="sexo"  class="form-control">
                            <option value='' selected >Selecione ...</option>  
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>                                    
                        </select>                               
                    </div>
                    <div class=" form-group col-md-3">
                        <strong>CPF ou CNPJ</strong>
                        <select id="tipo" name="tipo"  class="form-control">
                            <option value='' selected >Selecione ...</option>  
                            <option value="cpf">CPF</option>
                            <option value="cnpj">CNPJ</option>                                    
                        </select>                               
                    </div>
                    <div class="form-group col-md-6 cpfcnpj hidden">                                    
                        <div class="form-group">
                            <strong id="documentacao">CPF/CNPJ</strong>
                            <input type="text" class="form-control" name="cpf_cnpj" id="cpf_cnpj"
                                placeholder="Identificação" value="{{ old('cpf_cnpj') }}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-8">
                        <strong>E-Mail</strong>
                            <input type="email" class="form-control"
                                placeholder="e-mal para acesso" name="email"
                                value="{{ old('email') }}" />
                    </div>
                    <div class="form-group col-md-4">
                        <strong>Telefone</strong>
                            <input type="text" class="form-control" placeholder="Telefone p/ contato"
                                id="telefone" name="telefone" value="{{ old('telefone') }}" />
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-md-2">
                        <label>Estado <span style="color: red;">*</span></label>
                        @inject('estados', 'App\Estado')
                        <select id="estado" name='estado' class="form-control">
                            <option value="">Selecione</option>
                            @foreach($estados->get() as $estado)
                                <option value='{{$estado->id}}'>{{$estado->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Cidade <span style="color: red;">*</span></label>
                        <select id="cidade" name='cidade' class="form-control">
                            <option value="">Selecione</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <strong>Rua/Avenida</strong>
                        <div class="form-group">
                            <input type="text" class="form-control" name="logradouro" id="logradouro"
                                placeholder="Rua/Avenida" value="{{old('logradouro')}}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                            <strong>Número</strong>
                            <input type="text" class="form-control" name="numero" id="numero"
                            placeholder="Número" value="{{old('numero')}}" />
                    </div>
                    <div class="form-group col-md-4">
                        <strong>Bairro</strong>
                            <input type="text" class="form-control" name="bairro" id="bairro"
                                placeholder="Bairro" value="{{old('bairro')}}" />
                    </div>
                    <div class="form-group col-md-2">
                        <strong>CEP</strong>
                               <input type="text" class="form-control" name="cep" id="cep" placeholder="CEP"
                                value="{{old('cep')}}" />
                    </div>
                    <div class="form-group col-md-4">
                        <strong>Complemento</strong>
                            <input type="text" class="form-control" name="complemento" id="complemento"
                                placeholder="Complemento" value="{{old('complemento')}}" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <strong>Senha</strong>
                            <input type="password" class="form-control"
                                placeholder="Senha de Acesso" name="password" />
                    </div>
                    <div class="form-group col-md-6">
                            <strong>Repetir Senha</strong>
                            <input type="password" class="form-control"
                                placeholder="Repetir a Senha de Acesso"
                                name="password_confirmation" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">                                
                        <button type="button" class="btn btn-block btn-flat" data-toggle="modal"
                            data-target="#termsModal">Ler os termos</button>                             
                    </div><!-- /.col -->
                    <div class="col-md-6" >
                        <input type="checkbox" name="terms" ><strong> Eu aceito os termos</strong></input>  
                    </div><!-- /.col -->                              
                </div>
                <div class="row"><br></div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 cadastrar">
                        <button type="submit"
                            class="btn btn-primary btn-block btnInscrever">Inscreva-se</button>
                    </div><!-- /.col -->
                    <div class="col-md-3"></div>
                </div>

            </form>
    <!-- /.social-auth-links -->
        </div>
    </div>
@endsection
