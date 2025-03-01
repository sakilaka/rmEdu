<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Student Application Program Edit</title>
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
                            Student Application Program Info Edit
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="<?php echo e(route('admin.student_appliction_list')); ?>" class="btn btn-primary btn-fw">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                View All Application</a>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <?php echo $__env->make('Backend.student_appliction.theme_options_tabs_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="col-10">
                            <div class="tab-content tab-content-vertical bg-white rounded">
                                <div class="tab-pane fade show active" id="program-info-tab-content" role="tabpanel"
                                    aria-labelledby="home-tab-vertical">

                                    <form novalidate="" method="post"
                                        action="<?php echo e(route('admin.student_appliction_program_update', $s_appliction->id)); ?>"
                                        data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="col-lg-12 mb-2">
                                                <h4>Program Information</h4>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Application ID:')); ?></label>
                                                    <input disabled value="<?php echo e($s_appliction->application_code); ?>"
                                                        type="text" name="facebook" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('User_id/Name:')); ?></label>
                                                    <input disabled value="<?php echo e(@$s_appliction->student->name); ?>"
                                                        type="text" name="facebook" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Program Name:')); ?></label>

                                                    <?php $__currentLoopData = $s_appliction->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <input disabled value="<?php echo e(@$cart->course->name); ?>"
                                                            type="text" name="facebook" id="address"
                                                            class="form-control">
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('University Name:')); ?></label>
                                                    <?php $__currentLoopData = $s_appliction->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <input disabled value="<?php echo e(@$cart->course->university->name); ?>"
                                                            type="text" name="facebook" id="address"
                                                            class="form-control">
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('University 1:')); ?></label>
                                                    <select class="form-control" name="universityOne" id="">
                                                        <option value="">Select University</option>
                                                        <?php $__currentLoopData = $university; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($single->name); ?> " <?php echo e($single->name == $s_appliction->universityOne ? 'selected' : ''); ?>><?php echo e($single->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Status 1:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->statusOne); ?>"
                                                        type="text" name="statusOne" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('University 2:')); ?></label>
                                                    <select class="form-control" name="universityTwo" id="">
                                                        <option value="">Select University</option>
                                                        <?php $__currentLoopData = $university; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($single->name); ?> " <?php echo e($single->name == $s_appliction->universityTwo ? 'selected' : ''); ?>><?php echo e($single->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Status 2:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->statusOne); ?>"
                                                        type="text" name="statusTwo" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('University 3:')); ?></label>
                                                    <select class="form-control" name="universityThree" id="">
                                                        <option value="">Select University</option>
                                                        <?php $__currentLoopData = $university; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($single->name); ?> " <?php echo e($single->name == $s_appliction->universityThree ? 'selected' : ''); ?>><?php echo e($single->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Status 3:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->statusOne); ?>"
                                                        type="text" name="statusThree" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Application Fee:')); ?></label>
                                                    <input disabled value="<?php echo e($s_appliction->application_fee); ?>"
                                                        type="text" name="facebook" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Payment Status:')); ?></label>
                                                    <select name="payment_status" class="form-control form-control-lg">
                                                        <option <?php if($s_appliction->payment_status == 0): ?> Selected <?php endif; ?>
                                                            value="0">Unpaid</option>
                                                        <option <?php if($s_appliction->payment_status == 1): ?> Selected <?php endif; ?>
                                                            value="1">Paid</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Status:')); ?></label>
                                                    <?php
                                                        $statusLabels = [
                                                            0 => 'Not Complete',
                                                            1 => 'Processing',
                                                            2 => 'Approved',
                                                            3 => 'Cancel',
                                                            4 => 'Not Submitted',
                                                            5 => 'Submitted',
                                                            6 => 'Pending',
                                                            7 => 'E-documents Qualified',
                                                            8 => 'Waiting Processing',
                                                            9 => 'Processing',
                                                            10 => 'More Documents Needed',
                                                            11 => 'Re-Submitted',
                                                            12 => 'Rejected',
                                                            13 => 'Transferred',
                                                            14 => 'Accepted',
                                                            15 => 'E-offer Delivered',
                                                            16 => 'Offer Delivered',
                                                        ];
                                                    ?>

                                                    <select name="status" class="form-control form-control-lg">
                                                        <option value="">Select Status</option>
                                                        <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value); ?>"
                                                                <?php if($s_appliction->status == $value): ?> selected <?php endif; ?>>
                                                                <?php echo e($label); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Final destination:')); ?></label>
                                                    <input name="final_destination" value="<?php echo e($s_appliction->final_destination); ?>"
                                                        type="text" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Applied by:')); ?></label>
                                                    <input name="applied_by" value="<?php echo e($s_appliction->applied_by); ?>"
                                                        type="text" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Application Notice:')); ?></label>
                                                    <?php if($s_appliction->application_notice): ?>
                                                        <p class="my-2">
                                                            <a href="<?php echo e(asset('upload/application/' . $s_appliction->application_notice )); ?>" target="_blank">
                                                                View Current File
                                                            </a>
                                                        </p>
                                                    <?php else: ?>
                                                        <p class="my-2">No file uploaded.</p>
                                                    <?php endif; ?>
                                                    <input type="file" name="application_file" class="form-control form-control-lg">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Payment receipt:')); ?></label>
                                                    <?php if($s_appliction->payment_receipt): ?>
                                                        <p class="my-2">
                                                            <a href="<?php echo e(asset('upload/payment/' . $s_appliction->payment_receipt )); ?>" target="_blank">
                                                                View Current File
                                                            </a>
                                                        </p>
                                                    <?php else: ?>
                                                        <p class="my-2">No file uploaded.</p>
                                                    <?php endif; ?>
                                                    <input type="file" name="payment_receipt" class="form-control form-control-lg">
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row tabs-footer mt-15">
                                            <div class="col-lg-12">
                                                <a href="<?php echo e(route('admin.student_appliction_list')); ?>"
                                                    class="btn blue-btn btn-danger">Cancel</a>
                                                <button type="submit" class="btn blue-btn btn-primary">Save</button>
                                            </div>
                                        </div>

                                    </form>
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
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Backend/student_appliction/edit_program_info.blade.php ENDPATH**/ ?>