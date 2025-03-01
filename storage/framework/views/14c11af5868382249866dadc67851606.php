<?php $__env->startSection('title','- Forgot Password'); ?>
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<br>
<br>
<br>
    <?php
        $home_content = \App\Models\HomeContentSetup::first();
    ?>
<div class="py-5">
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="row mx-0 align-items-center border-md rounded-3">
                    <div class="col-md-6 border-end-md p-4 p-sm-5">
                        <h2 class="h3 mb-4 mb-sm-3">
                            Hey there!<br>Welcome back.                        </h2>
                        <div class="mt-sm-2 text-center">
                            Login as                            <strong>
                                <a href="<?php echo e(route('frontend.signin')); ?>" class="text-decoration-underline">Student</a>                            </strong>
                        </div>
                        <div class="mt-sm-2 text-center mb-5">
                            Login as                            <strong>
                                <a href="<?php echo e(route('frontend.consultant_signin')); ?>" class="text-decoration-underline">Partner</a>                            </strong>
                        </div>
                        
                        <img class="d-block mx-auto img-fluid" style="margin-top:50px; height:380px; width:330px;" src="<?php echo e($home_content->register_image_show); ?>"
                        alt="image">
                        <!--<div class="mt-4 mt-sm-5">Don't have an account? <a href="" class="text-decoration-underline">Sign up here</a></div>-->
                    </div>
                    <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                            
                            <?php if(session()->has('message')): ?>
                            <div class="alert alert-success">
                            <?php echo e(session()->get('message')); ?>

                            </div>
                            <script>
                                setTimeout(function(){
                                    $('.alert.alert-success').hide();
                                }, 3000);
                            </script>
                            <?php endif; ?>
                            

                    <h4>
                      Forgot Password!
                    </h4>


                        <form action="<?php echo e(route('forget.send_mail_f_password')); ?>" class="myform" id="learner_myform" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label class="form-label mb-1" for="email">
                                Please enter your email address                            </label>
                            <input class="form-control form-control-lg" name="email" type="text" id="email"
                                placeholder="example@gmail.com" tabindex="1" required="" autofocus>
                        </div>





                        <button class="btn btn-dark-cerulean btn-lg w-100 login_submit" type="submit">
                            Reset Password
                        </button>
                        </form>



                        <!-- <a class="btn btn-outline-dark-cerulean btn-lg w-100 mb-3" href=""><i
                                class="fab fa-facebook me-1"></i>Sign in with Facebook</a> -->



                        <div class="mt-sm-4 text-center">
                            Don't have an account?                            <strong>

                                <a href="<?php echo e(route('frontend.register')); ?>" class="text-decoration-underline">Create an Account</a>                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $__env->make('Frontend.layouts.parts.news-letter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rmintern/public_html/resources/views/Frontend/forgot_password.blade.php ENDPATH**/ ?>