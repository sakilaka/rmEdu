<?php $__env->startSection('title','- FAQ'); ?>
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>


<div class="content_search" style="margin-top:70px">
    <!--Start Course Preview Header-->
<div class="hero-header text-white position-relative" style="background-color: var(--primary_background)">
    <div class="bottom-0 end-0 overflow-hidden position-absolute start-0 top-0">
        <img src="<?php echo e($faq_content->banner_image_show); ?>" class="img-fluid wh_sm_100" alt="">
    </div>
    <div class="container-lg hero-header_wrap position-relative">
        <div class="row align-items-end my-5">
            <div class="col-12">
                <h1 class="fw-semi-bold"><?php echo e($faq_content->title1); ?></h1>
                <span class="m-1"><?php echo e($faq_content->description1); ?></span>
            </div>
        </div>
    </div>
</div>
<!--End Course Preview Header-->
<!--Start F.A.Q-->
<div class="bg-alice-blue py-4" id="faq">
    <div class="container-lg">
        <!--Start Section Header-->
        <div class="section-header mb-4">
            <h4><?php echo e($faq_content->title2); ?></h4>
            <div class="section-header_divider mb-3"></div>
            
            <span class="m-1">Did not find the answer to your question? Send it to us now and we will get back to you: <a href="support@rminternationaledu.com">Send Email</a> </span>
        </div>
        <!--End Section Header-->

        <div class="row">
            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=> $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-6 col-md-6">
                <div class="accordion faq-accordion" id="faqAccordion<?php echo e($k); ?>">
                    <div class="accordion-item border-0 shadow-sm mb-2">
                        <h2 class="accordion-header" id="headingFive-<?php echo e($k); ?>">
                            <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive-<?php echo e($k); ?>" aria-expanded="true"
                                aria-controls="collapseFive-<?php echo e($k); ?>">
                                <strong><?php echo e($faq->question); ?></strong>
                            </button>
                        </h2>
                        <div id="collapseFive-<?php echo e($k); ?>" class="accordion-collapse collapse"
                            aria-labelledby="headingFive-<?php echo e($k); ?>"
                            data-bs-parent="#faqAccordion<?php echo e($k); ?>">
                            <div class="accordion-body">
                                <p><?php echo e($faq->answer); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!--End F.A.Q--></div>
<!--======== main content close ==========-->


<?php echo $__env->make('Frontend.layouts.parts.news-letter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/pages/faq.blade.php ENDPATH**/ ?>