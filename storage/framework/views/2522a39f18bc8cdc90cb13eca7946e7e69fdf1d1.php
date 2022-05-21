<?php $__env->startSection('body'); ?>

<body>
    <!-- Navbar -->
    <?php echo $__env->make('layouts.admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="wrapper">
        <div class="main">
            <div class="section">
                <div class="container">
                    <h3>Event List</h3>
                    <div class="separator"></div>
                    <?php if(session('success')): ?>
                    <div class="alert alert-warning alert-with-icon" data-notify="container">
                        <div class="container">
                            <div class="alert-wrapper">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="nc-icon nc-simple-remove"></i>
                                </button>
                                <div class="message">
                                    <h6 style="margin-top: unset;"><i class="nc-icon nc-bell-55"></i> <?php echo e(session('success')); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($errors->any()): ?>
                    <div class="alert alert-warning alert-with-icon" data-notify="container">
                        <div class="container">
                            <div class="alert-wrapper">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="nc-icon nc-simple-remove"></i>
                                </button>
                                <div class="message">
                                    <h6 style="margin-top: unset;"><i class="nc-icon nc-bell-55"></i> <?php echo e($error->first()); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-10">
                            <form action="<?php echo e(route('admin.events.search')); ?>" method="get" class="form-inline">
                                <input name="keyword" value="<?php echo e(isset($keyword) ? $keyword : ''); ?>"
                                    class="form-control mr-sm-2" type="text" placeholder="Search">
                                <select name="status" class="selectpicker" data-style="btn btn-round">
                                    <option value="-1">All</option>
                                    <option value="1" <?php echo e(isset($status) && $status==1 ? 'selected' : ''); ?>>Active
                                    </option>
                                    <option value="0" <?php echo e(isset($status) && $status==0 ? 'selected' : ''); ?>>Inactive
                                    </option>
                                </select>
                                &nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary btn-just-icon btn-round"><i
                                        class="nc-icon nc-zoom-split"></i></button>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <div class="float-right">
                                <a href="<?php echo e(route('admin.events.create')); ?>" class="btn btn-warning btn-round">Create
                                    Event</a>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th class="col-md-1 text-center date-time-place">Start</th>
                                            <th class="col-md-1 text-center date-time-place">End</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($events) == 0): ?>
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                <h3>No data found!</h3>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($event->id); ?></td>
                                            <td><?php echo e($event->name); ?></td>
                                            <td><?php echo e($event->location); ?></td>
                                            <td class="text-center">
                                                <?php echo e(date('H:i', strtotime($event->start_date))); ?>

                                                <br>
                                                <?php echo e(date('d-m-Y', strtotime($event->start_date))); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e(date('H:i', strtotime($event->end_date))); ?>

                                                <br>
                                                <?php echo e(date('d-m-Y', strtotime($event->end_date))); ?>

                                            </td>
                                            <td class="text-center">
                                                <label>
                                                    <?php if($event->status == '1'): ?>
                                                    <input type="checkbox"
                                                        onchange="switchEventStatus(<?php echo e($event->id); ?>)" checked
                                                        data-toggle="switch" data-on-color="info" data-off-color="info">
                                                    <?php else: ?>
                                                    <input type="checkbox"
                                                        onchange="switchEventStatus(<?php echo e($event->id); ?>)"
                                                        data-toggle="switch" data-on-color="info" data-off-color="info">
                                                    <?php endif; ?>
                                                    <span class="toggle"></span>
                                                </label>
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" class="btn btn-info btn-link btn-sm"
                                                    data-toggle="modal" data-target="#eventInfoModal<?php echo e($event->id); ?>">
                                                    <i class="fa fa-info"></i>
                                                </button>
                                                <button type="button" class="btn btn-success btn-link btn-sm"
                                                    onclick="window.location.href='<?php echo e(route('admin.events.edit', $event->id)); ?>'">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-link btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#confirmDeleteEventModal<?php echo e($event->id); ?>">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                
                                <div class="d-flex justify-content-center">
                                    <?php echo $events->links(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Footer -->
    <?php echo $__env->make('layouts.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Modal -->
    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="eventInfoModal<?php echo e($event->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center"><?php echo e($event->name); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <i class="fa fa-image"></i>
                                        Event Image
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <img src="<?php echo e(asset('assets')); ?>/img/events/images/<?php echo e($event->image); ?>" alt="Event Image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <i class="fa fa-info"></i>
                                        Event Information
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-bold">Event description</label>
                                                <textarea class="form-control" rows="6"
                                                    readonly><?php echo e($event->description); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-bold">Famous person</label>
                                                <br>
                                                <?php $__currentLoopData = json_decode($event->famous_person); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="label label-default"><?php echo e($person); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-bold">Free food</label>
                                                <br>
                                                <?php $__currentLoopData = json_decode($event->free_food); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="label label-default"><?php echo e($food); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="left-side">
                        <button class="btn btn-warning btn-link"
                            onclick="window.location.href='<?php echo e(route('admin.events.edit', $event->id)); ?>'">Edit
                            Event</button>
                    </div>
                    <div class="divider"></div>
                    <div class="right-side">
                        <button class="btn btn-danger btn-link" data-toggle="modal"
                            data-target="#confirmDeleteEventModal<?php echo e($event->id); ?>">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmDeleteEventModal<?php echo e($event->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" style="max-width: 320px;">
            <div class="modal-content">
                <div class="modal-header no-border-header">
                    <div></div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <h5>Are you sure you want to do this? </h5>
                </div>
                <div class="modal-footer">
                    <div class="left-side">
                        <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Never mind</button>
                    </div>
                    <div class="divider"></div>
                    <div class="right-side">
                        <button type="button" class="btn btn-danger btn-link"
                            onclick="onDelete(<?php echo e($event->id); ?>)">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
<script>
    function switchEventStatus(id) {
            $.ajax({
                url: '<?php echo e(route('admin.events.status')); ?>',
                type: 'POST',
                data: {
                    id: id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(data) {
                    // console.log(data);
                },
                error: function(data) {
                    // console.log(data);
                }
            });
        };

    function onDelete(id) {
            $.ajax(
                {
                    url: '<?php echo e(route('admin.events.delete')); ?>',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function(data) {
                        window.location.reload();
                    },
                    error: function(data) {
                        // console.log(data);
                    }
                }
            )
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\campus-event\resources\views/admin/events/index.blade.php ENDPATH**/ ?>