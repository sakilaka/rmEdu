<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Google Map</title>
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
                            <?php echo e(__('Google Map')); ?>

                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <?php echo $__env->make('Backend.setting.appearance.theme_options_appearance_nav_tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="col-10">
                            <div class="tab-content tab-content-vertical bg-white rounded">
                                <div class="tab-pane fade show active" id="program-info-tab-content" role="tabpanel"
                                    aria-labelledby="home-tab-vertical">

                                    <form novalidate="" method="post"
                                        action="<?php echo e(route('backend.theme-options-google-map-save')); ?>"
                                        data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label
                                                        class="font-weight-bold text-muted"><?php echo e(__('Google Map Embed URL')); ?></label>
                                                    <input value="<?php echo e(old('g_location', $datalist['g_location'])); ?>"
                                                        type="text" name="g_location" class="form-control">
                                                    <?php $__errorArgs = ['g_location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label
                                                        class="font-weight-bold text-muted"><?php echo e(__('Status')); ?></label>
                                                    <div class="d-flex">
                                                        <div class="form-check form-check-success ">
                                                            <label class="form-check-label" style="font-size: 0.9rem">
                                                                <input type="radio" class="form-check-input"
                                                                    name="status" value="1"
                                                                    <?php if(old('status', $datalist['status']) == 1): ?> checked <?php endif; ?>>
                                                                Active
                                                                <i class="input-helper"></i></label>
                                                        </div>
                                                        <div class="form-check form-check-danger ml-3">
                                                            <label class="form-check-label" style="font-size: 0.9rem">
                                                                <input type="radio" class="form-check-input"
                                                                    name="status" value="0"
                                                                    <?php if(old('status', $datalist['status']) == 0): ?> checked <?php endif; ?>>
                                                                Inactive
                                                                <i class="input-helper"></i></label>
                                                        </div>
                                                    </div>
													<?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row tabs-footer mt-15">
                                            <div class="col-lg-12 text-center">
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
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/setting/appearance/theme-options-google-map.blade.php ENDPATH**/ ?>