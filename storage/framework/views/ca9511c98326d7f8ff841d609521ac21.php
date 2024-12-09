<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(url('/home')); ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-header">MANAGEMENT DATA</li>
        <li class="nav-item">
            <a href="<?php echo e(route('barang-masuk.index')); ?>"
                class="nav-link<?php echo e(request()->routeIs('barang-masuk.index') ? ' active' : ''); ?>">
                <i class="nav-icon fa-solid fa-circle-down"></i>
                <p>
                    Barang Masuk
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('barang-keluar.index')); ?>"
                class="nav-link<?php echo e(request()->routeIs('barang-keluar.index') ? ' active' : ''); ?>">
                <i class="nav-icon fa-solid fa-circle-up"></i>
                <p>
                    Barang Keluar
                </p>
            </a>
        </li>
        <li class="nav-header">MANAGEMENT USER</li>
        <li class="nav-item">
            <a href="<?php echo e(route('logs.index')); ?>" class="nav-link<?php echo e(request()->routeIs('logs.index') ? ' active' : ''); ?>"
                id="logs-link">
                <i class="nav-icon fa-solid fa-chart-line"></i>
                <p>
                    Log Activity
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('users.index')); ?>"
                class="nav-link<?php echo e(request()->routeIs('users.index') ? ' active' : ''); ?>">
                <i class="nav-icon fa-solid fa-shield-halved"></i>
                <p>
                    User Login
                </p>
            </a>
        </li>
    </ul>
</nav>
<?php /**PATH C:\laragon\www\warehouse\resources\views/components/sidebar.blade.php ENDPATH**/ ?>