<!-- Modal -->
<div class="modal fade" id="modal_replicar_processo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Replicar Processo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form" action='/replicarModal'>
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-12">
                            <strong>Processo <span style="color: red;">*</span></strong>
                            <?php $processos = app('App\Processo'); ?>
                            <select id="processo" name='processo' class="form-control select2 <?php $__errorArgs = ['processo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="">Selecione</option>
                                <?php $__currentLoopData = $processos->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $processo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(Auth::user()->id == $processo->fk_user): ?>
                                <option value='<?php echo e($processo->numero); ?>'><?php echo e($processo->numero); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Criar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div><?php /**PATH /var/www/html/processus/resources/views/processo/modal_replicar_processo.blade.php ENDPATH**/ ?>