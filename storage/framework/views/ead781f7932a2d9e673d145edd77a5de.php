<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Student Application Family Info Edit</title>
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
                            Student Application Family Info Edit
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
                                        action="<?php echo e(route('admin.student_appliction_update_family', $s_appliction->id)); ?>"
                                        data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="col-lg-12 mb-2">
                                                <h4>Family Information</h4>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Father Name:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->father_name); ?>" type="text"
                                                        name="father_name" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Father Nnationlity:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->father_nationlity); ?>" type="text"
                                                        name="father_nationlity" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Father Phone:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->father_phone); ?>" type="text"
                                                        name="father_phone" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Father Email:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->father_email); ?>" type="email"
                                                        name="father_email" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Father Workplace:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->father_workplace); ?>" type="text"
                                                        name="father_workplace" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Father Position:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->father_position); ?>" type="text"
                                                        name="father_position" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Mother Name:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->mother_name); ?>" type="text"
                                                        name="mother_name" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Mother Nationlity:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->mother_nationlity); ?>"
                                                        type="text" name="mother_nationlity" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Mother Phone:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->mother_phone); ?>" type="text"
                                                        name="mother_phone" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Mother Email:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->mother_email); ?>" type="email"
                                                        name="mother_email" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Mother Workplace:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->mother_workplace); ?>"
                                                        type="text" name="mother_workplace" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Mother Position:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->mother_position); ?>"
                                                        type="text" name="mother_position" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Guarantor Relationship:')); ?></label>
                                                    <select id="continent" class="form-control form-control-lg"
                                                        name="guarantor_relationship">
                                                        <option value="">Guarantor Relationship</option>
                                                        <option <?php if($s_appliction->guarantor_relationship == 'Father'): ?> Selected <?php endif; ?>
                                                            value="Father">Father</option>
                                                        <option <?php if($s_appliction->guarantor_relationship == 'Mother'): ?> Selected <?php endif; ?>
                                                            value="Mother">Mother</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Guarantor Name:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->guarantor_name); ?>" type="text"
                                                        name="guarantor_name" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Guarantor Address:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->guarantor_address); ?>"
                                                        type="text" name="guarantor_address" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Guarantor Phone:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->guarantor_phone); ?>"
                                                        type="text" name="guarantor_phone" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Guarantor Email:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->guarantor_email); ?>"
                                                        type="email" name="guarantor_email" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Guarantor Workplace:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->guarantor_workplace); ?>"
                                                        type="text" name="guarantor_workplace" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Guarantor Work Address:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->guarantor_work_address); ?>"
                                                        type="text" name="guarantor_work_address" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Study Fund:')); ?></label>

                                                    <select id="continent" class="form-control form-control-lg"
                                                        name="study_fund">
                                                        <option value="">Select Study Fund</option>
                                                        <option <?php if($s_appliction->study_fund == 'Self finance'): ?> Selected <?php endif; ?>
                                                            value="Self finance">Self finance</option>
                                                        <option <?php if($s_appliction->study_fund == 'Chinese Government Scholarship'): ?> Selected <?php endif; ?>
                                                            value="Chinese Government Scholarship">Chinese Government
                                                            Scholarship</option>
                                                        <option <?php if($s_appliction->study_fund == 'Part scholarship part self financed'): ?> Selected <?php endif; ?>
                                                            value="Part scholarship part self financed">Part
                                                            scholarship part self financed (University scholarship)
                                                        </option>
                                                    </select>

                                                    
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mb-2">
                                                <h4>Contact in Case of Emergencies</h4>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Emergency Contact Name:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->emergency_contact_name); ?>"
                                                        type="text" name="emergency_contact_name" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Emergency Contact Phone:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->emergency_contact_phone); ?>"
                                                        type="text" name="emergency_contact_phone" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Emergency Contact Email:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->emergency_contact_email); ?>"
                                                        type="email" name="emergency_contact_email" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label
                                                        for="address"><?php echo e(__('Emergency Contact Address:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->emergency_contact_address); ?>"
                                                        type="text" name="emergency_contact_address"
                                                        id="address" class="form-control">
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
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Backend/student_appliction/edit_family_info.blade.php ENDPATH**/ ?>