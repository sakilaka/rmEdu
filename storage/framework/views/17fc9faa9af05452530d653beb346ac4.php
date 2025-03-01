<?php
    $footer_logo = \App\Models\Tp_option::where('option_name', 'theme_logo')->first();
    $social_url = \App\Models\Tp_option::where('option_name', 'theme_social_media')->first();
    $dataObj = json_decode($social_url->option_value);
    $footer_contents = \App\Models\Tp_option::where('option_name', 'theme_option_footer')->first();
?>

<style>
    @media screen and (min-width:992px) {
        .footer_description {
            padding-right: 5rem !important;
        }
    }

    @media screen and (min-width:1200px) {
        .footer_description {
            padding-right: 7.5rem !important;
        }
    }

    .text {
        font-family: 'DM Sans', sans-serif !important;
        font-size: 1rem !important;
        font-weight: 500;
        color: rgb(226, 255, 238);
        transition: 0.4s;
    }

    a.text:hover {
        color: var(--secondary_background);
    }

    .footer_title {
        font-family: 'DM Sans', sans-serif !important;
        font-weight: 700;
        font-size: 1.3rem !important;
    }

    .footer_social {
        margin-top: 5rem !important;
    }

    .footer_social_container a {
        color: white;
        background-color: transparent;
        margin-left: 8px;
        padding: 8px;
        border-radius: 50%;
        transition: 0.3s;
        text-align: center !important;
        border-style: solid;
        border-width: 2px 2px 2px 2px;
        border-color: #FFFFFF1A;
    }

    .footer_social_container a:hover {
        background-color: var(--secondary_background);
        color: white;
    }
</style>

<footer style="background-color: var(--footer_news_color); color:white !important;">
    <div class="container pt-5" style="<?php echo e(Route::is('frontend.course.details') ? 'padding: 0 1.65rem !important' : ''); ?>">
        <div class="row mx-0 py-3">
            <div class="col-12 col-lg-4">
                <div class="d-flex align-items-center">
                    <img src="<?php echo e($footer_logo->footer_image_show); ?>" class="img-fluid " style="height: 100px; width:160px"
                        alt="">
                </div>
                <div class="mt-4">
                    <p class="text footer_description">
                        <?php if(@$footer_contents->description > 0): ?>
                            <?php echo e(@$footer_contents->description); ?>

                        <?php endif; ?>
                    </p>
                </div>

                <div class="d-flex justify-content-between-align-items-center mt-5">
                    <img src="<?php echo e(asset('frontend/images/google-play-button.jpg')); ?>" width="145" height="45"
                        style="border-radius: 8px" alt="">
                    <img src="<?php echo e(asset('frontend/images/app-store-button.jpg')); ?>" width="145" height="45"
                        style="border-radius: 8px; margin-left:10px;" alt="">
                </div>
            </div>

            <div class="col-6 col-lg-2 ml-lg-4 mt-4 mt-lg-0">
                <h4 class="footer_title">Explore Courses</h4>

                <?php
                    $menus_s = \App\Models\Menu::where('type', 'footer_menu')
                        ->where('column_num', 1)
                        ->where('status', 1)
                        ->orderBy('position')
                        ->get();
                ?>
                <ul class="nav-list list-unstyled mb-0 mt-4">
                    <?php $__currentLoopData = $menus_s; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(url($menu_1->url)); ?>"
                                class="text-decoration-none mb-2 text d-flex align-items-center justify-content-start">
                                <span style="line-height: 0">
                                    <i class="fa fa-circle" aria-hidden="true" style="font-size: 10px"></i>
                                </span>&nbsp;
                                <span style="margin-left: 3px">
                                    <?php echo e($menu_1->name); ?>

                                </span>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div class="col-6 col-lg-2 ml-lg-4 mt-4 mt-lg-0">
                <h4 class="footer_title">Quick Links</h4>

                <?php
                    $menus_ss = \App\Models\Menu::where('type', 'footer_menu')
                        ->where('column_num', 2)
                        ->where('status', 1)
                        ->orderBy('position')
                        ->get();
                ?>
                <ul class="nav-list list-unstyled mt-4 mb-0">
                    <?php $__currentLoopData = $menus_ss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(url($menu_2->url)); ?>"
                                class="text-decoration-none mb-2 text d-inline-block"><?php echo e($menu_2->name); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <li>
                        <a href="<?php echo e(route('frontend.inquiry_form_show')); ?>"
                            class="text-decoration-none mb-2 text d-inline-block">Submit Inquiry Form</a>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                <h4 class="footer_title">Get In Touch</h4>

                <div class="mt-4 mb-0">
                    <?php if(@$footer_contents->email1 > 0): ?>
                        <a href="mailto:<?php echo e(@$footer_contents->email1); ?>" class="text"
                            style="margin-bottom: 10px; line-height:0.85;">
                            <i class="fa fa-solid fa-envelope" style="font-size: 0.9rem; margin-right:5px"></i>
                            <?php echo e(@$footer_contents->email1); ?>

                        </a>
                    <?php endif; ?>
                    <br>
                    <?php if(@$footer_contents->email2 > 0): ?>
                        <a href="mailto:<?php echo e(@$footer_contents->email2); ?>" class="text"
                            style="margin-bottom: 10px; line-height:0.85;">
                            <i class="fa fa-solid fa-envelope" style="font-size: 0.9rem; margin-right:5px"></i>
                            <?php echo e(@$footer_contents->email2); ?>

                        </a>
                    <?php endif; ?>
                </div>
                <div class="mt-3">
                    <?php if(@$footer_contents->phone1 > 0): ?>
                        <a href="mailto:<?php echo e(@$footer_contents->phone1); ?>" class="text"
                            style="margin-bottom: 10px; line-height:0.85;">
                            <i class="fa fa-phone" style="font-size: 0.9rem; margin-right:5px"></i>
                            <?php echo e(@$footer_contents->phone1); ?>

                        </a>
                    <?php endif; ?>
                    <br>
                    <?php if(@$footer_contents->phone2 > 0): ?>
                        <a href="mailto:<?php echo e(@$footer_contents->phone2); ?>" class="text"
                            style="margin-bottom: 10px; line-height:0.85;">
                            <i class="fa fa-phone" style="font-size: 0.9rem; margin-right:5px"></i>
                            <?php echo e(@$footer_contents->phone2); ?>

                        </a>
                    <?php endif; ?>
                </div>

                <div class="footer_social">
                    <h4 class="footer_title">Follow Us :</h4>
                    <div class="d-flex align-items-center footer_social_container">
                        <a class="footer_social_icons_container" style="margin-left: 0 !important">
                            <svg class="w-[40px] h-[40px] text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        <a class="footer_social_icons_container">
                            <svg class="w-[40px] h-[40px] text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        <a class="footer_social_icons_container">
                            <svg class="w-[40px] h-[40px] text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z" />
                            </svg>
                        </a>

                        <a class="footer_social_icons_container">
                            <svg class="w-[40px] h-[40px] text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z"
                                    clip-rule="evenodd" />
                                <path d="M7.2 8.809H4V19.5h3.2V8.809Z" />
                            </svg>
                        </a>

                    </div>
                </div>
            </div>

            
            <div class="col-12 mt-4">
                <hr>
                <div class="d-lg-flex justify-content-lg-end align-items-lg-center">
                    <div style="margin-right: 3rem">
                        <p class="text text-center py-3 mb-0">
                            &copy; <?php echo e(date('Y')); ?> <a href="#" class="text"><?php echo e(env('APP_NAME')); ?></a>.
                            All
                            Rights Reserved
                        </p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div style="margin-right: 18px">
                            <a href="<?php echo e(route('frontend.terms_conditions')); ?>" class="text text-center py-3 mb-0">
                                <span style="line-height: 0">
                                    <i class="fa fa-circle" aria-hidden="true" style="font-size: 10px"></i>
                                </span>
                                <span style="margin-left: 1px">
                                    Terms of services
                                </span>
                            </a>
                        </div>
                        <div style="margin-right: 18px">
                            <a href="<?php echo e(route('frontend.privacy_policy')); ?>" class="text text-center py-3 mb-0">
                                <span style="line-height: 0">
                                    <i class="fa fa-circle" aria-hidden="true" style="font-size: 10px"></i>
                                </span>
                                <span style="margin-left: 1px">
                                    Privacy Policy
                                </span>
                            </a>
                        </div>
                        <div>
                            <a href="<?php echo e(route('frontend.refund_policy')); ?>" class="text text-center py-3 mb-0">
                                <span style="line-height: 0">
                                    <i class="fa fa-circle" aria-hidden="true" style="font-size: 10px"></i>
                                </span>
                                <span style="margin-left: 1px">
                                    Refund Policy
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH /home/rmintern/public_html/resources/views/Frontend/layouts/parts/footer.blade.php ENDPATH**/ ?>