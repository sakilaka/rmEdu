<section class="blog-section" style="margin-bottom: 5rem; margin-top:5rem;">
    <div class="container">

        <div class="row mx-0" style="margin-top: 1.5rem;">
            <div class="col-12 col-md-7 col-lg-8 p-md-right-5">
                <h2 style="color: var(--primary_background); font-family:'DM Sans', sans-serif; font-weight:700">Latest
                    Updates</h2>
                <hr>

                <?php
                    $blogs = App\Models\Blog::where('status', 1)->orderBy('id', 'desc')->limit(4)->get();
                ?>
                <?php if(count($blogs) > 0): ?>
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="blog-item d-flex flex-row">
                            <div class="col-3">
                                <div class="blog-image" style="border-radius: 10px; overflow: hidden;">
                                    <img src="<?php echo e($item->image_show ?? asset('frontend/images/No-image.jpg')); ?>"
                                        alt="Blog Image" style="width: 100%; height: 110px;">
                                </div>
                            </div>
                            <div class="col-9 d-flex flex-column justify-content-between" style="padding-left: 1.5rem">
                                <div class="blog-content ml-3 mt-2">
                                    <a href="<?php echo e(route('frontend.blog_details', ['id' => $item->id])); ?>">
                                        <h5 class="blog-title" style="color: var(--primary_background);">
                                            <?php echo e($item->title); ?></h5>
                                    </a>
                                </div>
                                <div class="blog-content ml-3">
                                    <p class="blog-time" style="color: var(--primary_background);">23 June, 2024
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php if(!$loop->last): ?>
                            <hr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-5 col-lg-4">
                <style>
                    .subscription-form {
                        background-color: var(--primary_background);
                        border-radius: 8px;
                        -webkit-box-shadow: 0 4px 24px rgba(1, 33, 105, .25);
                        box-shadow: 0 4px 24px rgba(1, 33, 105, .25);
                        color: #fff;
                        padding: 132px 16px 32px;
                        position: relative;
                        font-family: 'DM Sans', sans-serif !important;
                    }

                    .subscription-form__bg-wrapper {
                        -webkit-box-pack: end;
                        -ms-flex-pack: end;
                        display: -webkit-box;
                        display: -webkit-flex;
                        display: -ms-flexbox;
                        display: flex;
                        -webkit-justify-content: flex-end;
                        justify-content: flex-end;
                        overflow: hidden;
                        pointer-events: none;
                        position: absolute;
                        right: 0;
                        top: 40px;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                        width: 100%
                    }

                    .subscription-form__bg {
                        height: 250px;
                        margin-right: -32px;
                        opacity: .3
                    }

                    .subscription-form__inner {
                        position: relative
                    }

                    .subscription-form__header {
                        margin-bottom: 40px;
                        text-align: center
                    }

                    .subscription-form__title {
                        font-size: 24px;
                        font-weight: 600;
                        line-height: 1.5
                    }

                    .subscription-form__subtitle {
                        font-size: 16px;
                        line-height: 1.5
                    }

                    .subscription-form__title+.subscription-form__subtitle {
                        margin-top: 8px
                    }

                    .subscription-form__row+.subscription-form__row {
                        margin-top: 24px
                    }

                    .subscription-form__input {
                        font-family: 'DM Sans', sans-serif !important;
                        background-color: #f3f3f3 !important;
                        border: 1px solid transparent !important;
                        border-radius: 4px !important;
                        color: #163269 !important;
                        font-size: 16px !important;
                        font-weight: 500 !important;
                        line-height: 52px !important;
                        min-width: 1% !important;
                        padding: 0 16px !important;
                        text-align: left !important;
                        -webkit-transition: border-color .4s linear, background-color .4s linear;
                        transition: border-color .4s linear, background-color .4s linear;
                        width: 100% !important;
                    }

                    .subscription-form__input:focus {
                        background-color: #fff !important;
                        border-color: var(--secondary_background) !important;
                    }

                    .submit-btn{
                        width: 100% !important;
                        margin-top: 1rem !important;
                        padding-top: 10px !important;
                        padding-bottom: 10px !important;
                        font-size: 1rem !important;
                        background-color: var(--secondary_background) !important;
                    }
                </style>
                <div class="card mb-4" style="border: 0">
                    <div class="card-body px-0 px-lg-4">
                        <div class="subscription-form px-3">
                            <div class="subscription-form__bg-wrapper">
                                <svg class="subscription-form__bg" width="305" height="250" viewBox="0 0 305 250"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.25 11.25L135.251 135.251C148.92 148.92 171.08 148.92 184.749 135.251L308.75 11.25M20 247.5H300C309.665 247.5 317.5 239.665 317.5 230V20C317.5 10.335 309.665 2.5 300 2.5H20C10.335 2.5 2.5 10.335 2.5 20V230C2.5 239.665 10.335 247.5 20 247.5Z"
                                        stroke="#00A5DF" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </div>

                            <div class="subscription-form__inner">
                                <div class="subscription-form__header">
                                    <h3 class="subscription-form__title">
                                        Subscribe to Newsletter
                                    </h3>

                                    <p class="subscription-form__subtitle">
                                        Get updates to news &amp; events
                                    </p>
                                </div>

                                <form class="subscription-form__form" id="newsletterForm"
                                    action="<?php echo e(route('frontend.subscription')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>

                                    <div class="subscription-form__row">
                                        <input type="text" name="name" placeholder="Your First Name"
                                            class="subscription-form__input" required="">
                                    </div>

                                    <div class="subscription-form__row">
                                        <input type="email" name="email" placeholder="Your Email Address"
                                            class="subscription-form__input" required="">
                                    </div>

                                    <button type="submit" class="btn btn-secondary-bg submit-btn">
                                        Subscribe
                                    </button>
                                </form>

                                <div class="mt-4">
                                    <p class="subscription-form__discalimer">
                                        By clicking "Subscribe" you agree with our 
                                        <a
                                            href="<?php echo e(route('frontend.privacy_policy')); ?>" target="_blank"
                                            rel="noreferrer" style="text-decoration: underline; color:var(--secondary_background)">Privacy Policy</a>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/layouts/parts/news-letter.blade.php ENDPATH**/ ?>