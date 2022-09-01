<?php if(auth()->user()): ?>
    <meta http-equiv="refresh" content="0;url=http://processus.local/home">

<?php else: ?>
    
    <?php $__env->startSection('htmlheader_title', 'Login'); ?>
    <?php $__env->startSection('contentheader_title', 'Login'); ?>
    <?php $__env->startSection('conteudo'); ?>

    <div class="login-box">
            <div class="login-logo">
                    <a href="<?php echo e(url('/home')); ?>"><img src="<?php echo e(url('/img/logo-processus.png')); ?>"
                    alt="Processus" style="width: 50%; height: auto;"></a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                <p class="login-box-msg">Faça o login para iniciar a sua sessão</p>

                <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                    <div class="input-group mb-3">
                    <input placeholder="Email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>
                    <div class="input-group mb-3">
                    <input placeholder="Senha" id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            Lembre-se
                        </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="/password/reset">>> Esqueceu a senha?</a>
                </p>
                <p class="mb-0">
                    <a href="<?php echo e(route('register')); ?>" class="text-center">>> Ainda não possui uma conta, cadastre-se.</a>
                </p>
                <p class="mb-0">
                    <a href="/sobre/geral" target="blank" class="text-center">>> Sobre o Sistema</a>
                </p>
                <br>
                <hr>
                <div class="login-logo">
                        <a href="/sobre"><img src="<?php echo e(url('/img/footer_logo.jpeg')); ?>"
                        alt="Processus" style="width: 100%; height: auto;"></a>
                </div>

                </div>
                <!-- /.login-card-body -->
            </div>
    </div>

    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/auth/login.blade.php ENDPATH**/ ?>