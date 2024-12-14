<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo e($totalIn); ?></h3>

                    <p>Barang Masuk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="<?php echo e(route('barang.masuk.index')); ?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo e($totalOut); ?></h3>

                    <p>Barang Keluar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo e(route('barang.keluar.index')); ?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php echo e($totalStock); ?></h3>

                    <p>Total Barang</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo e($totalUsers); ?></h3>

                    <p>Daftar User</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>

                </div>
                <a href="<?php echo e(route('users.index')); ?>" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warehouse\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>