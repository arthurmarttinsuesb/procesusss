
<form method="POST" action="/processo/<?php echo e($processo->id); ?>">
     <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="card-body">
           
        (<span style="color: red;">*</span>) Campos Obrigatórios
        <br><br>
        <div class="row">
                <div class="form-group col-md-8">
                    <strong>Título <span style="color: red;">*</span></strong>
                    <input type='text' class="textarea form-control" name='titulo' value='<?php echo e($processo->titulo); ?>' required>
                </div>
                <div class="form-group col-md-4">
                    <strong>Processo <span style="color: red;">*</span></strong>
                    <select type="text" name="tipo" class="form-control" required>
                        <?php $__currentLoopData = Auth::user()->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nome): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($nome=="cidadao"): ?>
                                <option>Público</option>
                            <?php else: ?>
                               <option <?php echo e(($processo->tipo == "Público" ? "selected":"")); ?>>Público</option>
                               <option <?php echo e(($processo->tipo == "Privado" ? "selected":"")); ?>>Privado</option>
                            <?php endif; ?>  
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <strong>Descrição</strong>
                    <textarea class="textarea form-control" name='descricao'><?php echo e($processo->descricao); ?></textarea>
                </div>
        </div>
    </div>
    <!-- se o processo estiber bloqueado não pode alterar mais nada -->
    <?php if($processo->tramite=="Liberado"): ?>
        <div class="float-right">
            <button type='submit' class="btn btn-info">Salvar</button>
        </div>
    <?php endif; ?>
</form><?php /**PATH /var/www/html/processus/resources/views/processo/tab_processo.blade.php ENDPATH**/ ?>