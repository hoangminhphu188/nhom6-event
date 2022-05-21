<?php $__env->startSection('body'); ?>

<body>
    <!-- Navbar -->
    <?php echo $__env->make('layouts.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page-header page-header-small"
        style="background-image: url('<?php echo e(asset('assets')); ?>/img/sections/ptit.png');">
        <div class="filter filter-danger"></div>
        <div class="content-center">
            <div class="container">
                <h1>Let see all events below</h1>
                <h3>Hope you can find what you want</h3>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="main">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-12 ml-auto mr-auto text-center">
                            <form role="search" action="<?php echo e(route('user.events.search')); ?>" class="form-inline"
                                style="justify-content: center">
                                <div class="form-group">
                                    <input type="text" name="keyword" class="form-control border-input"
                                        placeholder="or search for something">&nbsp;&nbsp;
                                </div>
                                <button type="submit" class="btn btn-just-icon"><i class="fa fa-search"></i></button>
                            </form>
                            <div class="separator"></div>
                        </div>
                        <div class="row">
                            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6" data-toggle="modal"
                            data-target="#eventInfoModal<?php echo e($event->id); ?>" style="cursor: pointer">
                                <div class="card card-plain card-blog text-center">
                                    <div class="card-image" style="margin: auto">
                                        <a style="text-align: center">
                                            <img class="img img-raised" src="<?php echo e(asset('assets')); ?>/img/events/images/<?php echo e($event->image); ?>" />
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-category text-warning">
                                            <?php echo e(date('H:i', strtotime($event->start_date))); ?> <?php echo e(date('d-m-Y', strtotime($event->start_date))); ?>

                                            -
                                            <?php echo e(date('H:i', strtotime($event->end_date))); ?> <?php echo e(date('d-m-Y', strtotime($event->end_date))); ?>

                                            <br>
                                            <?php echo e($event->location); ?>

                                        </h6>
                                        <h3 class="card-title">
                                            <a><?php echo e($event->name); ?></a>
                                        </h3>
                                        <p class="card-description">
                                            <?php echo e($event->description); ?>

                                        </p>
                                        <br />
                                        <a class="btn btn-warning btn-round" data-toggle="modal"
                                        data-target="#eventInfoModal<?php echo e($event->id); ?>">See More</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php if(count($events) <= 0): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <h1 class="title">
                                    <span>No events found</span>
                                </h1>
                                <p class="description">
                                    Sorry, we can't find what you are looking for.
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="d-flex justify-content-center">
                    <?php echo $events->links(); ?>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php echo $__env->make('layouts.user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Modal -->
    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="eventInfoModal<?php echo e($event->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e($event->name); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <i class="fa fa-person"></i>
                                        Famous Person
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <?php $__currentLoopData = json_decode($event->famous_person); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="label label-default"><?php echo e($person); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <i class="fa fa-burger"></i>
                                        Free Food
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <?php $__currentLoopData = json_decode($event->free_food); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="label label-default"><?php echo e($food); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">

                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\campus-event\resources\views/user/events.blade.php ENDPATH**/ ?>