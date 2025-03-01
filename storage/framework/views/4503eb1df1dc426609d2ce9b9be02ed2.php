<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo e(env('APP_NAME')); ?> | Admin Login</title>

    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/iconfonts/font-awesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/css/vendor.bundle.base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/css/vendor.bundle.addons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/style.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('backend/assets/images/favicon.png')); ?>" />

    <?php
        $results = \App\Models\Tp_option::where('option_name', 'theme_color')->first();
        $dataObj = json_decode($results->option_value);
    ?>
    <?php if($dataObj): ?>
        <style>
            :root {
                --primary_background: <?php echo e($dataObj->primary_background ?? '#25497E'); ?>;
                --secondary_background: <?php echo e($dataObj->secondary_background ?? '#00a5df'); ?>;
                --tertiary_background: <?php echo e($dataObj->tertiary_background ?? '#e40046'); ?>;

                --button_primary_bg: #164234;
                --button_primary_bg: <?php echo e($dataObj->button_primary_bg ?? '#25497E'); ?>;
                --button_primary_hover_bg: <?php echo e($dataObj->button_primary_hover_bg ?? '#122643'); ?>;
                --button_secondary_bg: <?php echo e($dataObj->button_secondary_bg ?? '#00a5df'); ?>;
                --button_secondary_hover_bg: <?php echo e($dataObj->button_secondary_hover_bg ?? '#0077a1'); ?>;
                --button_tertiary_bg: <?php echo e($dataObj->button_tertiary_bg ?? '#e40046'); ?>;
                --button_tertiary_hover_bg: <?php echo e($dataObj->button_tertiary_hover_bg ?? '#c2003b'); ?>;
            }

            /* assign btn theme for this site */
            .btn-primary-bg {
                background-color: var(--button_primary_bg) !important;
                color: white !important;
            }

            .btn-primary-bg:hover {
                background-color: var(--button_primary_hover_bg) !important;
            }

            .btn-secondary-bg {
                background-color: var(--button_secondary_bg) !important;
                color: white !important;
            }

            .btn-secondary-bg:hover {
                background-color: var(--button_secondary_hover_bg) !important;
            }

            .btn-tertiary-bg {
                background-color: var(--button_tertiary_bg) !important;
                color: white !important;
            }

            .btn-tertiary-bg:hover {
                background-color: var(--button_tertiary_hover_bg) !important;
            }

            .text-primary {
                color: var(--primary_background) !important;
            }
        </style>
    <?php endif; ?>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-center p-5">
                            <div class="brand-logo">
                                <img src="<?php echo e(asset('upload/site_setting/' . $theme_logo->header_image) ?? asset('backend/assets/images/logo.svg')); ?>"
                                    alt="logo">
                            </div>
                            <h4 class="text-primary">Hello, Admin!</h4>
                            <h6 class="font-weight-light text-primary">Sign in to continue.</h6>

                            <form class="pt-3" method="POST" action="<?php echo e(route('login')); ?>">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg"
                                        id="exampleInputEmail1" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" name="password" placeholder="Password">
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary-bg btn-lg font-weight-medium auth-form-btn"
                                        type="submit">
                                        SIGN IN
                                    </button>
                                </div>
                            </form>

                            <div class="my-2 d-flex justify-content-center align-items-center">
                                <a href="<?php echo e(route('admin.forget.password')); ?>" class="text-primary mt-3">Reset
                                    Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('backend/assets/vendors/js/vendor.bundle.base.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/vendors/js/vendor.bundle.addons.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/toastDemo.js')); ?>"></script>
    <?php echo $__env->make('Backend.components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/auth/login.blade.php ENDPATH**/ ?>