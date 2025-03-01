
<?php $__env->startSection('title', '- Refund Policy'); ?>
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>

    <div class="content_search" style="margin-top:70px">
        <div class="" style="margin-top: 10rem; margin-bottom:3rem">
            <div class="container-lg">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="row mx-0 align-items-center justify-content-center border-md rounded-3">
                            <div class="col-md-10 p-4 p-sm-5">
                                <h2 class="h3 mb-4 mb-sm-5" style="font-weight: bold"><?php echo e($content->title); ?></h2>
                                <?php echo $content->description; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php echo $__env->make('Frontend.layouts.parts.news-letter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rmintern/public_html/resources/views/Frontend/pages/refund_policy.blade.php ENDPATH**/ ?>