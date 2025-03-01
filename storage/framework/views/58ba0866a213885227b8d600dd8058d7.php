<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Social Login</title>
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
                            <?php echo e(__('Social Login')); ?>

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
                                        action="<?php echo e(route('backend.theme-options-social-login-save')); ?>"
                                        data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <h4 class="text-muted"><?php echo e(__('Google')); ?></h4>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        class="font-weight-bold text-muted"><?php echo e(__('Google Client ID')); ?></label>
                                                    <input
                                                        value="<?php echo e(old('google_client_id', $datalist['google_client_id'])); ?>"
                                                        type="text" name="google_client_id" class="form-control">
                                                    <?php $__errorArgs = ['google_client_id'];
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
                                                <div class="form-group">
                                                    <label
                                                        class="font-weight-bold text-muted"><?php echo e(__('Google Client Secret')); ?></label>
                                                    <input
                                                        value="<?php echo e(old('google_secret_id', $datalist['google_secret_id'])); ?>"
                                                        type="text" name="google_secret_id" class="form-control">
                                                    <?php $__errorArgs = ['google_secret_id'];
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
                                                <em class="text-muted">Google Redirect URI :
                                                    <?php echo e(url('/google/callback')); ?></em>
                                            </div>

                                            <div class="col-sm-12 my-4">
                                                <div class="border-top border-secondary"></div>
                                            </div>

                                            <div class="col-sm-12 mb-4">
                                                <div class="mb-3">
                                                    <h4 class="text-muted"><?php echo e(__('Facebook')); ?></h4>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        class="font-weight-bold text-muted"><?php echo e(__('Facebook Client ID')); ?></label>
                                                    <input value="<?php echo e(old('fb_client_id', $datalist['fb_client_id'])); ?>"
                                                        type="text" name="fb_client_id" class="form-control">
                                                    <?php $__errorArgs = ['fb_client_id'];
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
                                                <div class="form-group">
                                                    <label
                                                        class="font-weight-bold text-muted"><?php echo e(__('Facebook Client Secret')); ?></label>
                                                    <input value="<?php echo e(old('fb_secret_id', $datalist['fb_secret_id'])); ?>"
                                                        type="text" name="fb_secret_id" class="form-control">
                                                    <?php $__errorArgs = ['fb_secret_id'];
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
                                                <em class="text-muted">Facebook Redirect URI :
                                                    <?php echo e(url('/facebook/callback')); ?></em>
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
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/setting/appearance/theme-options-social-login.blade.php ENDPATH**/ ?>