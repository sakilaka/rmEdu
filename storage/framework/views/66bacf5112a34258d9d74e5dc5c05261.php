<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | All Program</title>
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
                            All Program
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="<?php echo e(route('admin.u_course.create')); ?>" class="btn btn-primary btn-fw">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add Program</a>
                        </nav>
                    </div>

                    <div class="row card">
                        <div class="col-sm-12 card-body">
                            <table id="order-listing" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th>SL</th>
                                        <th>Course Name</th>
                                        <th>University Name</th>
                                        <th class="text-center">Country</th>
                                        <th class="text-center">Appliction Fee</th>
                                        <th class="text-center">Yearly Fee</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="odd">
                                            <td class="text-left"><?php echo e($loop->iteration); ?></td>
                                            <td
                                                style="font-size: 0.9rem; 
                                                        white-space: nowrap; 
                                                        overflow: hidden; 
                                                        text-overflow: ellipsis; 
                                                        max-width: 200px;">
                                                <a href="<?php echo e(route('frontend.course.details', ['id' => $course->id])); ?>"
                                                    style="color: var(--primary_background)" target="_blank"
                                                    data-toggle="tooltip" data-placement="top"
                                                    data-original-title="<?php echo e($course->name); ?>">
                                                    <?php echo e($course->name); ?>

                                                </a>
                                            </td>
                                            
                                            <td
                                                style="font-size: 0.9rem; 
                                                        white-space: nowrap; 
                                                        overflow: hidden; 
                                                        text-overflow: ellipsis; 
                                                        max-width: 200px;">
                                                <?php if($course->university): ?>
                                                    <a href="<?php echo e(route('frontend.university_details', ['id' => $course->university->id])); ?>"
                                                        style="color: var(--primary_background)" target="_blank"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="<?php echo e($course->university->name); ?>">
                                                        <?php echo e($course->university->name); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <span>No university available</span>
                                                <?php endif; ?>

                                                <?php echo e($course->university?->name); ?>

                                                </a>
                                            </td>

                                            <td class="text-center">
                                                <?php if($course->university && $course->university->country): ?>
                                                    <?php echo e(ucfirst($course->university->country->name)); ?>

                                                <?php else: ?>
                                                    <span>N/A</span>
                                                <?php endif; ?>
                                            </td>
                                            
                                            <td class="text-center"><?php echo e($course->consultancy_fee); ?></td>
                                            <td class="text-center"><?php echo e($course->year_fee); ?></td>
                                            <td class="text-center">
                                                <?php if($course->status == 1): ?>
                                                    <a href="<?php echo e(route('home-category.status_toggle', $course->id)); ?>">
                                                        <span class="badge badge-success">Active</span>
                                                    </a>
                                                <?php elseif($course->status == 0): ?>
                                                    <a href="<?php echo e(route('home-category.status_toggle', $course->id)); ?>">
                                                        <span class="badge badge-danger">Inactive</span>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-right d-flex justify-content-between align-items-center">
                                                <a href="<?php echo e(route('admin.u_course.edit', $course->id)); ?>"
                                                    class="btn text-primary">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <input type="hidden" value="<?php echo e($course->id); ?>">
                                                <a data-toggle="modal" data-target="#delete_modal_box"
                                                    class="btn text-primary delete-item">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                
                <div id="delete_modal_box" class="modal fade delete-modal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img src="<?php echo e(asset('backend/assets/images/warning.png')); ?>" alt=""
                                    width="50" height="46">
                                <h5 class="mt-3 mb-4">Are you sure want to delete this?</h5>
                                <div class="m-t-20 flex">
                                    <form action="<?php echo e(route('admin.u_course.delete')); ?>" method="POST" id="deleteForm">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="ucourse_id" id="modal_item_id" value="">
                                    </form>
                                    <div class="mt-3">
                                        <a href="#" class="btn btn-success" data-dismiss="modal">Cancel</a>
                                        <a class="btn btn-danger"
                                            onclick="document.getElementById('deleteForm').submit()">Confirm</a>
                                    </div>
                                </div>
                            </div>
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
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Backend/courses/u_course/index.blade.php ENDPATH**/ ?>