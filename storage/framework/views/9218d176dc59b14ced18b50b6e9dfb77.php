<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('User-Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | My Notification</title>
</head>

<body>
    <div class="container-scroller">
        <?php echo $__env->make('User-Backend.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid page-body-wrapper">
            <?php echo $__env->make('User-Backend.components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            My Notification
                        </h3>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($notification->type == 'university'): ?>
                                    <div class="list d-flex align-items-center border-bottom py-3">
                                        <img class="img-sm rounded-circle"
                                            src="<?php echo e(@$notification->application->student->image_show ?? asset('frontend/images/No-image.jpg')); ?>"
                                            alt="">
                                        <div class="wrapper w-100 ml-3">
                                            <p class="mb-0" style="font-size: 0.9rem;">
                                                <b>Notification</b>
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-bell text-muted mr-2" aria-hidden="true"></i>
                                                    <a href="<?php echo e(!empty($notification->application) ? route('frontend.application-details', @$notification->application->id) : '#'); ?>"
                                                        class="mb-0 text-dark" style="font-size: 0.9rem;">
                                                        <?php echo e(@$notification->text); ?></a>
                                                </div>
                                                <small class="text-muted ml-auto">
                                                    <?php echo e(date('d M, Y h:i A', strtotime(@$notification->created_at))); ?>

                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif($notification->type == 'event'): ?>
                                    <div class="list d-flex align-items-center border-bottom py-3">
                                        <img class="img-sm rounded-circle"
                                            src="<?php echo e(@$notification->event_cart->event->host->image_show); ?>"
                                            alt="">
                                        <div class="wrapper w-100 ml-3">
                                            <p class="mb-0" style="font-size: 0.9rem;">
                                                <b><?php echo e(@$notification->application->student->name); ?></b>
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-bell text-muted mr-2" aria-hidden="true"></i>
                                                    <a href="<?php echo e(route('frontend.event.details', $notification->event_cart->event->id)); ?>"
                                                        class="mb-0 text-dark" style="font-size: 0.9rem;">
                                                        Event:
                                                        <?php echo e(@$notification->event_cart->order->order_number); ?>

                                                    </a>
                                                </div>
                                                <small class="text-muted ml-auto">
                                                    <?php echo e(date('d M, Y h:i A', strtotime(@$notification->created_at))); ?>

                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="list d-flex align-items-center border-bottom py-3">
                                        <img class="img-sm rounded-circle"
                                            src="<?php echo e(Auth::user()->image_show ?? asset('frontend/images/No-image.jpg')); ?>"
                                            alt="">
                                        <div class="wrapper w-100 ml-3">
                                            <p class="mb-0" style="font-size: 0.9rem;">
                                                <b>Notification</b>
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-bell text-muted mr-2" aria-hidden="true"></i>
                                                    <p class="mb-0 text-dark" style="font-size: 0.9rem;">
                                                        <?php echo e(@$notification->text); ?>

                                                    </p>
                                                </div>
                                                <small class="text-muted ml-auto">
                                                    <?php echo e(date('d M, Y h:i A', strtotime(@$notification->created_at))); ?>

                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <?php echo $__env->make('User-Backend.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('User-Backend.components.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/User-Backend/notifications.blade.php ENDPATH**/ ?>