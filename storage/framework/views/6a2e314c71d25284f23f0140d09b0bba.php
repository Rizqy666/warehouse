<?php $__env->startSection('title', 'Log Activity'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">Log Activity</li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Log Activity</h3>
        </div>
        <div class="card-body">
            <h5>Total Logs: <?php echo e($data->total()); ?></h5>
            <table class="table table-bordered" id="logs-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Activity</th>
                        <th>Description</th>
                        <th>Logged At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($log->id); ?></td>
                            <td><?php echo e($log->user->name ?? 'N/A'); ?></td>
                            <td><?php echo e($log->activity); ?></td>
                            <td><?php echo e($log->description); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($log->logged_at)->locale('id_ID')->isoFormat('H:mm, D MMM YYYY') ?? '-'); ?>

                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
                <?php echo e($data->links('pagination::bootstrap-4')); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascript'); ?>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warehouse\resources\views/pages/logs/index.blade.php ENDPATH**/ ?>