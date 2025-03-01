<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Partner Wise Student & Appliction List</title>
</head>

<body>
    <div class="container-scroller">
        <?php echo $__env->make('Backend.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid page-body-wrapper">
            <?php echo $__env->make('Backend.components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            Partner Wise Student & Appliction List
                        </h3>
                    </div>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="order-listing" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-left" style="max-width: 50px;">SL</th>
                                        <th>Partner</th>
                                        <th class="text-right">Total Students</th>
                                        <th class="text-right">Total Applications</th>
                                        <th class="text-right">Success Rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="<?php echo e($key % 2 == 0 ? 'even' : 'odd'); ?>">
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($item['partner']->name); ?></td>
                                            <td class="text-right">
                                                <?php if($item['total_students'] != 0): ?>
                                                    <?php echo e($item['total_students']); ?>

                                                    <a href="<?php echo e(route('admin.student_list_partner_wise', ['partner_id' => $item['partner']->id])); ?>"
                                                        class="ml-4 mr-2 badge badge-primary">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <span class="badge badge-primary"
                                                        style="background-color: transparent; border-color: transparent;">
                                                        <i class="fa fa-eye" aria-hidden="true"
                                                            style="color: transparent;"></i>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-right">
                                                <?php if($item['total_applications'] != 0): ?>
                                                    <?php echo e($item['total_applications']); ?>

                                                    <a href="<?php echo e(route('admin.appliction_list_partner_wise', ['partner_id' => $item['partner']->id])); ?>"
                                                        class="ml-4 mr-2 badge badge-primary">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <span class="badge badge-primary"
                                                        style="background-color: transparent; border-color: transparent;">
                                                        <i class="fa fa-eye" aria-hidden="true"
                                                            style="color: transparent;"></i>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-right"><?php echo e(number_format($item['success_rate'], 2)); ?>%</td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <?php echo $__env->make('Backend.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('Backend.components.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/student_appliction/partner_wise_student_application.blade.php ENDPATH**/ ?>