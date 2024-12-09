<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WareHouse | <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/92449afa91.js" crossorigin="anonymous"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
    <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <?php if ($__env->exists('components.navbar')) echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="<?php echo e(url('/home')); ?>" class="brand-link d-flex justify-content-center align-items-center"
                style="height: 100%; font-size: 1.5rem;">
                <span class="brand-text font-weight-light">WareHouse</span>
            </a>
            <div class="sidebar">
                
                <?php if ($__env->exists('components.sidebar')) echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?php echo $__env->yieldContent('title'); ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Home</a></li>
                                <?php echo $__env->yieldContent('breadcrumb'); ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <?php echo $__env->yieldContent('content'); ?>
            </section>
        </div>
        <footer class="main-footer">
            <?php if ($__env->exists('components.footer')) echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </footer>

    </div>

    <!-- jQuery -->
    <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('javascript'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\warehouse\resources\views/layouts/master.blade.php ENDPATH**/ ?>