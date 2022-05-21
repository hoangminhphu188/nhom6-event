<?php $__env->startSection('body'); ?>

<body class="full-screen register">
    <!-- Navbar -->
    <?php echo $__env->make('layouts.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="wrapper">
        <div class="page-header" style="background-image: url('<?php echo e(asset('assets')); ?>/img/sections/tttt.jpg');">
            <div class="filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h1 class="title">
                                <span>SỰ KIỆN PTIT</span>
                            </h1>
                            <p class="description">
                                CHÀO MỪNG BẠN ĐẾN VỚI TRANG THÔNG TIN SỰ KIỆN TẠI PTIT!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php echo $__env->make('layouts.user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\campus-event\resources\views/home.blade.php ENDPATH**/ ?>