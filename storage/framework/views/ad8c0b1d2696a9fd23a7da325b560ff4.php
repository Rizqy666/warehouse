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
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
</head>

<body class="hold-transition login-page">

    <?php echo $__env->yieldContent('content'); ?>



    <!-- jQuery -->
    <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>
    <script>
        document.getElementById('showPassword').addEventListener('change', function() {
            const password = document.getElementById('password');
            const passwordConfirm = document.getElementById('password-confirm');
            if (this.checked) {
                password.type = 'text';
                passwordConfirm.type = 'text';
            } else {
                password.type = 'password';
                passwordConfirm.type = 'password';
            }
        });
    </script>

</body>

</html>
<?php /**PATH C:\laragon\www\warehouse\resources\views/layouts/auth.blade.php ENDPATH**/ ?>