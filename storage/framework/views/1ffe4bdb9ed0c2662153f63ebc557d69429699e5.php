<?php $__env->startSection('htmlheader_title', 'Cadastro'); ?>
<?php $__env->startSection('contentheader_title', 'Cadastro'); ?>
<?php $__env->startSection('conteudo'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">


<br><br>
<div class="login-logo">
    <a href="<?php echo e(url('/home')); ?>"><img src="<?php echo e(url('/img/logo-processus.png')); ?>" alt="Processus" style="width: 20%; height: auto;"></a>
</div>
<!-- /.login-logo -->
<div class="card">
    <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <strong>Atenção!</strong> Houve algum problema com as suas informações.<br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <div class="card-body register-card-body">
        <form action="<?php echo e(url('/register')); ?>" method="post" enctype="multipart/form-data" id="form">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class=" form-group col-md-3">
                    <label>Tipo <span style="color: red;">*</span></label>
                    <select id="tipo" name="tipo" class="form-control select2 <?php $__errorArgs = ['tipo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="">Selecione</option>
                        <?php if(old('tipo') == "PF"): ?>
                        <option value="PF" selected>Pessoa Física</option>
                        <?php else: ?>
                        <option value="PF">Pessoa Física</option>
                        <?php endif; ?>
                        <?php if(old('tipo') == "PJ"): ?>
                        <option value="PJ" selected>Pessoa Jurídica</option>
                        <?php else: ?>
                        <option value="PJ">Pessoa Jurídica</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Nome <span style="color: red;">*</span></label>
                    <input type="text" class="form-control <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Nome Completo" name="nome" value="<?php echo e(old('nome')); ?>" />
                </div>
                <div class="form-group col-md-3 nascimento">
                    <label>Data de Nascimento <span style="color: red;">*</span></label>
                    <input type="date" class="form-control <?php $__errorArgs = ['nascimento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nascimento" id="nascimento" maxlength="10" value="<?php echo e(old('nascimento')); ?>" placeholder="Data de Nascimento" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3 sexo ">
                    <label>Gênero <span style="color: red;">*</span></label>
                    <select id="sexo" name="sexo" class="form-control select2 <?php $__errorArgs = ['sexo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value='' selected>Selecione ...</option>
                        <?php if(old('sexo') == "Masculino"): ?>
                        <option value="Masculino" selected>Masculino</option>
                        <?php else: ?>
                        <option value="Masculino">Masculino</option>
                        <?php endif; ?>
                        <?php if(old('sexo') == "Feminino"): ?>
                        <option value="Feminino" selected>Feminino</option>
                        <?php else: ?>
                        <option value="Feminino">Feminino</option>
                        <?php endif; ?>
                        <?php if(old('sexo') == "Outro"): ?>
                        <option value="Outro" selected>Outro</option>
                        <?php else: ?>
                        <option value="Outro">Outro</option>
                        <?php endif; ?>
                    </select>
                </div>
                <!-- <div class="row outro_genero " style="display: none;"> -->                
                <div class="col-md-3 outro_genero">
                    <label>Outro Gênero</label>
                    <input type="text" class="form-control " placeholder="Informe o seu gênero" name="genero" id="genero" value="<?php echo e(old('genero')); ?>" readonly />
                </div>
                <!-- </div> -->
                <div class="form-group col-md-3">
                    <div class="form-group cpf">
                        <label>CPF/CNPJ <span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?php $__errorArgs = ['cpf_cnpj'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cpf_cnpj" id="cpf_cnpj" placeholder="Identificação" value="<?php echo e(old('cpf_cnpj')); ?>" />
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="form-group cpf">
                        <label>Telefone <span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?php $__errorArgs = ['telefone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="telefone" id="telefone" placeholder="(dd) 00000-000" data-inputmask='"mask":"(99)99999-9999"' value="<?php echo e(old('telefone')); ?>" data-mask />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <label>Estado <span style="color: red;">*</span></label>
                    <?php $estados = app('App\Estado'); ?>
                    <select id="estado" name='estado' class="form-control select2 <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="">Selecione</option>
                        <?php $__currentLoopData = $estados->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value='<?php echo e($estado->id); ?>'><?php echo e($estado->nome); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Cidade <span style="color: red;">*</span></label>
                    <select id="cidade" name='cidade' class="form-control select2 <?php $__errorArgs = ['cidade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="">Selecione</option>
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label>Logradouro (Rua/Avenida) <span style="color: red;">*</span></label>
                    <div class="form-group">
                        <input type="text" class="form-control <?php $__errorArgs = ['logradouro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="logradouro" id="logradouro" placeholder="Rua/Avenida" value="<?php echo e(old('logradouro')); ?>" />
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label>Número <span style="color: red;">*</span></label>
                    <input type="text" class="form-control <?php $__errorArgs = ['numero'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="numero" id="numero" placeholder="Número" value="<?php echo e(old('numero')); ?>" />
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-4">
                    <label>Bairro <span style="color: red;">*</span></label>
                    <input type="text" class="form-control <?php $__errorArgs = ['bairro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="bairro" id="bairro" placeholder="Bairro" value="<?php echo e(old('bairro')); ?>" />
                </div>
                <div class="form-group col-md-2">
                    <label>CEP <span style="color: red;">*</span></label>
                    <input type="text" class="form-control <?php $__errorArgs = ['cep'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cep" id="cep" placeholder="CEP" value="<?php echo e(old('cep')); ?>" data-inputmask='"mask": "99999-999"' data-mask />
                </div>
                <div class="form-group col-md-6">
                    <label>Complemento</label>
                    <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento" value="<?php echo e(old('complemento')); ?>" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Email <span style="color: red;">*</span></label>
                    <div class="form-group">
                        <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" id="email" placeholder="email@exemplo.com" value="<?php echo e(old('email')); ?>" />
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Senha (Min 8 caracteres) <span style="color: red;">*</span></label>
                    <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Senha de Acesso" name="password" />
                </div>
                <div class="form-group col-md-3">
                    <label>Repetir Senha<span style="color: red;">*</span></label>
                    <input type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Repetir a Senha de Acesso" name="password_confirmation" />
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
                    <input type="checkbox" name="terms" class="<?php $__errorArgs = ['terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><strong> Eu aceito
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-adicionais'); ?>
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
<script src="<?php echo e(asset('plugins/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/inputmask/jquery.inputmask.js')); ?>"></script>
<script src="<?php echo e(asset('js/base.js')); ?>"></script>
<script src="<?php echo e(asset('js/ativarUsuarios.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/auth/register.blade.php ENDPATH**/ ?>