<div class=" float-right">
    <div class="table-responsive">
        <table>
            <tr>
                <input type="hidden" name="tramitacao" id="tramitacao" value="<?php echo e($tramite ?? ''); ?>">
                <?php if($tramite!==""): ?>
                <!-- <td>
                        <a href="processo/<?php echo e($processo->id); ?>/devolver/<?php echo e($tramite); ?>" class="btn btn-block btn-outline-warning"><i class="fa fa-undo-alt"></i> Devolver o Processo ao Autor(a)</a>
                    </td> -->
                <td>
                    <a href="/processo/<?php echo e($processo->id); ?>/devolver/<?php echo e($tramite); ?>" class="btn btn-block btn-outline-warning"><i class="fa fa-undo-alt"></i> Devolver o Processo ao Autor(a)</a>
                </td>
                <?php endif; ?>
                <td>
                    <a href="/processo/<?php echo e($processo->id); ?>/encerrar" class="btn btn-block btn-outline-danger"><i class="fa fa-times"></i> Encerrar o Processo</a>
                </td>

                <td>
                    <a href="/processo-tramitacao/create/<?php echo e($processo->numero); ?>/<?php echo e($tramite); ?>" class="btn btn-block btn-outline-info"><i class="fa fa-plus"></i> Adicionar Encaminhamento</a>
                </td>
            </tr>
        </table>
    </div>
</div>



<br>
<br>
<table id="table_tramite" class="table table-bordered table-hover" style="width:100%">
    <thead>
        <tr>
            <th>Trâmite</th>
        </tr>
    </thead>
    <tbody>
</table><?php /**PATH /var/www/html/processus/resources/views/processo/tab_tramitacao.blade.php ENDPATH**/ ?>