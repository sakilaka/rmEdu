
<?php $__env->startSection('title', '- Instructor Login'); ?>
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
    <br>
    <br>
    <br>
    <div class="py-5">
        <div class="container-lg">
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="row mx-0 align-items-center border-md rounded-3">
                        <div class="col-md-6 border-end-md p-4 p-sm-5">
                            <?php
                                $home_content = \App\Models\HomeContentSetup::first();
                            ?>
                            <h2 class="h3 mb-4 mb-sm-3">
                                Hey there!<br>Welcome back. </h2>
                            <div class="mt-sm-2 text-center">
                                Login as <strong>
                                    <a href="<?php echo e(route('frontend.signin')); ?>" class="text-decoration-underline">Student</a>
                                </strong>
                            </div>
                            
                            <img class="d-block mx-auto img-fluid" style="margin-top:50px; height:380px; width:330px;"
                                src="<?php echo e($home_content->register_image_show); ?>" alt="image">
                            <!--<div class="mt-4 mt-sm-5">Don't have an account? <a href="" class="text-decoration-underline">Sign up here</a></div>-->
                        </div>
                        <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                            
                            <?php if(session()->has('message')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session()->get('message')); ?>

                                </div>
                                <script>
                                    setTimeout(function() {
                                        $('.alert.alert-success').hide();
                                    }, 3000);
                                </script>
                            <?php endif; ?>
                            
                            <h4>
                                Partner Sign in
                            </h4>

                            <!-- <a class="btn btn-outline-dark-cerulean btn-lg w-100 mb-3" href="#"><i
                                    class="fab fa-google me-1"></i>Sign in with Google</a> -->
                            <!--                         <a class="btn btn-outline-dark-cerulean btn-lg w-100 mb-3" href=""><i
                                    class="fab fa-facebook me-1"></i>Sign in with Facebook</a> -->

                            <!-- <div class="d-flex align-items-center py-3 mb-3">
                                <hr class="w-100">
                                <div class="px-3">Or</div>
                                <hr class="w-100">
                            </div> -->
                            <form action="<?php echo e(route('frontend.consultent_sign_in')); ?>" class="myform" id="learner_myform"
                                enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <?php echo csrf_field(); ?>

                                
                                <div class="mb-3">
                                    <label class="form-label mb-1" for="email">
                                        Email address </label>
                                    <input class="form-control form-control-lg" name="email" type="text" id="email"
                                        placeholder="Enter your Email" tabindex="1" required="" autofocus>
                                </div>
                                <div class="mb-3" style="position : relative">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <label class="form-label mb-0" for="password">
                                            Password </label><a class="fs-sm" href="#"
                                            class="text-decoration-underline"></a>
                                    </div>
                                    <input class="form-control form-control-lg" name="password" type="password"
                                        id="password" placeholder="Enter password" tabindex="2" required="">
                                    <span style="position: absolute;    right: 10px;    top: 36px;    font-size: 20px;">
                                        <a href="javascript:void(0)" onclick="viewpasswordSignin(4)">
                                            <div class="change-icon">
                                                <i class="fas fa-eye"></i>
                                            </div>
                                        </a>
                                    </span>
                                </div>

                                <div class="col-6 mb-2">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" data-val="true"
                                            data-val-required="The Remember me? field is required." id="rememberme"
                                            onclick="is_remember()" name="rememberme" type="checkbox" value="1"
                                            checked>
                                        <label class="custom-control-label" for="rememberme">Stay logged in for 30
                                            days</label>
                                    </div>
                                </div>

                                <button class="btn btn-primary-bg btn-lg w-100 login_submit" type="submit"
                                    onclick="loginProcess(4)">
                                    Sign in </button>
                            </form>
                            <div class="col-6 text-right">
                                <a class="m-link-muted small" href="<?php echo e(route('forget.password')); ?>">
                                    <strong>Forgot Password ?</strong>
                                </a>
                            </div>


                            <!-- <a class="btn btn-outline-dark-cerulean btn-lg w-100 mb-3" href=""><i
                                    class="fab fa-facebook me-1"></i>Sign in with Facebook</a> -->

                            


                            








                            

                            <div class="mt-sm-4 text-center">
                                Don't have an account? <strong>

                                    <a href="<?php echo e(route('frontend.consultant_register')); ?>"
                                        class="text-decoration-underline">Create an Account</a> </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php echo $__env->make('Frontend.layouts.parts.news-letter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/auth/login_consultant.blade.php ENDPATH**/ ?>