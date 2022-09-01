<ul class="todo-list" data-widget="todo-list">
    <li>
        <?php $__currentLoopData = $log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="handle">
                <i class="fas fa-arrow-right"></i>
            </span><?php echo $logs->status ?>
            <small class="badge badge-success"><i class="far fa-calendar-alt"></i> <?php echo e(date('d/m/Y - H:s', strtotime($logs->created_at))); ?></small><hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </li>
</ul>




<?php /**PATH /var/www/html/processus/resources/views/processo/tab_informacoes.blade.php ENDPATH**/ ?>