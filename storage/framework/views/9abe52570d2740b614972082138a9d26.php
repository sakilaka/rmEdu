<!--============ its for header file call start =============-->
<!doctype html>
<html lang="en">

<?php
    $results = \App\Models\Tp_option::where('option_name', 'theme_custom_css')->first();
    $custom_html = \App\Models\Tp_option::where('option_name', 'theme_custom_html')->first();
    $custom_js = \App\Models\Tp_option::where('option_name', 'theme_custom_js')->first();
    $theme_seo = \App\Models\Tp_option::where('option_name', 'theme_options_seo')->first();
    $title = \App\Models\Tp_option::where('option_name', 'theme_option_header')->first();
    $logo = \App\Models\Tp_option::where('option_name', 'theme_logo')->first();

    $customCss = json_decode($results->option_value) ?? '';
    $custom_html = json_decode($custom_html->option_value) ?? '';
    $custom_js = json_decode($custom_js->option_value) ?? '';
    $metadata = json_decode($theme_seo->option_value) ?? '';

?>

<head>
    <link rel="shortcut icon" href="<?php echo e(@$logo->favicon_show); ?>" type="image/x-icon">

    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    <?php
        $titles = '';
        $keywords = '';
    ?>
    <?php $__currentLoopData = $metadata->og_title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            if (count($metadata->og_title) - 1 == $k) {
                $titles .= $item;
            } else {
                $titles .= $item . ',';
            }
        ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <meta property="og:title" content="<?php echo e($titles); ?>" />

    <?php $__currentLoopData = $metadata->og_keywords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            if (count($metadata->og_keywords) - 1 == $k) {
                $keywords .= $item;
            } else {
                $keywords .= $item . ',';
            }
        ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <meta property="keywords" content="<?php echo e($keywords); ?>" />

    
    <meta property="og:site_name" content="<?php echo e($title->company_name); ?>" />
    <meta property="og:description" content="<?php echo e($metadata->og_description); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:image" content="<?php echo e(asset('upload/seo/' . $metadata->og_image)); ?>" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />

    <?php if($custom_html): ?>
        
        <?php echo $custom_html->custom_headre_html; ?>

        
    <?php endif; ?>

    <title> <?php echo e(@$title->company_name); ?> <?php echo $__env->yieldContent('title'); ?></title>

    <?php
        $results = \App\Models\Tp_option::where('option_name', 'theme_color')->first();
        $dataObj = json_decode($results->option_value) ?? [];
    ?>

    <?php if($dataObj): ?>
        <style>
            /* secondary-> #00a5df,
            tertiary-> #e40046s */
            :root {
                --primary_background: <?php echo e($dataObj->primary_background ?? '#25497E'); ?>;
                --secondary_background: <?php echo e($dataObj->secondary_background ?? '#ee8e1c'); ?>;
                --tertiary_background: <?php echo e($dataObj->tertiary_background ?? '#ee8e1c'); ?>;

                --header_color: <?php echo e($dataObj->header_color); ?>;
                --header_banner_bg: <?php echo e($dataObj->header_banner_bg ?? '#102f25'); ?>;
                --header_text_color: <?php echo e($dataObj->header_text_color); ?>;

                --button1_color: <?php echo e($dataObj->button1_color); ?>;
                --button1_hover_color: <?php echo e($dataObj->button1_hover_color); ?>;
                --button2_color: <?php echo e($dataObj->button2_color); ?>;
                --button2_hover_color: <?php echo e($dataObj->button2_hover_color); ?>;
                --button2_text_color: <?php echo e($dataObj->button2_text_color); ?>;
                --button2_border_color: <?php echo e($dataObj->button2_border_color); ?>;
                --button2_hover_border_color: <?php echo e($dataObj->button2_hover_border_color ?? '#102f25'); ?>;

                --button_primary_bg: <?php echo e($dataObj->button_primary_bg ?? '#25497E'); ?>;
                --button_primary_hover_bg: <?php echo e($dataObj->button_primary_hover_bg ?? '#122643'); ?>;
                --button_secondary_bg: <?php echo e($dataObj->button_secondary_bg ?? '#ee8e1c'); ?>;
                --button_secondary_hover_bg: <?php echo e($dataObj->button_secondary_hover_bg ?? '#c26d07'); ?>;
                --button_tertiary_bg: <?php echo e($dataObj->button_tertiary_bg ?? '#ee8e1c'); ?>;
                --button_tertiary_hover_bg: <?php echo e($dataObj->button_tertiary_hover_bg ?? '#c26d07'); ?>;

                --package1_color: <?php echo e($dataObj->package1_color); ?>;
                --package2_color: <?php echo e($dataObj->package2_color); ?>;
                --footer_news_color: <?php echo e($dataObj->footer_news_color); ?>;
                --text_color: <?php echo e($dataObj->text_color); ?>;
                --product_text_color: <?php echo e($dataObj->product_text_color); ?>;

                --menu_color: <?php echo e($dataObj->menu_color); ?>;
                --category_color: <?php echo e($dataObj->category_color); ?>;
                --footer_color: <?php echo e($dataObj->footer_color); ?>;
                --footer_text_color: <?php echo e($dataObj->footer_text_color); ?>;
                --currency_background_color: <?php echo e($dataObj->currency_background_color); ?>;
                --currency_frontend_color: <?php echo e($dataObj->currency_frontend_color); ?>;
            }
        </style>
    <?php endif; ?>

    <?php if($customCss): ?>
        <style>
            <?php echo $customCss->custom_headre_css; ?>

        </style>
    <?php endif; ?>

    <?php if($custom_js): ?>
        <script>
            <?php echo $custom_js->custom_head_js; ?>

        </script>
    <?php endif; ?>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');
    </style>

    <?php echo $__env->make('Frontend.layouts.parts.header-link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('head'); ?>

    <style>
        html {
            scroll-behavior: smooth !important;
        }

        <?php if(
            !(Route::currentRouteName() == 'frontend.apply_now' ||
                (session('is_anonymous') == 'true' &&
                    request()->has('partner_ref_id') &&
                    !is_null(request()->query('partner_ref_id')))
            )): ?>
            .container {
                padding-left: 0px !important;
                padding-right: 0px !important;
            }
        <?php endif; ?>

        /* assign btn theme for this site */
        .btn-primary-bg {
            background-color: var(--button_primary_bg) !important;
            color: white !important;
            font-family: 'DM Sans', sans-serif !important;
        }

        .btn-primary-bg:hover {
            background-color: var(--button_primary_hover_bg) !important;
        }

        .btn-secondary-bg {
            background-color: var(--button_secondary_bg) !important;
            color: white !important;
            font-family: 'DM Sans', sans-serif !important;
        }

        .btn-secondary-bg:hover {
            background-color: var(--button_secondary_hover_bg) !important;
        }

        .btn-tertiary-bg {
            background-color: var(--button_tertiary_bg) !important;
            color: white !important;
            font-family: 'DM Sans', sans-serif !important;
        }

        .btn-tertiary-bg:hover {
            background-color: var(--button_tertiary_hover_bg) !important;
        }

        .typeahead .dropdown-item {
            padding: .25rem 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 26px;
            display: block;
            white-space: break-spaces;
        }

        @media screen and (max-width: 575px) {
            .signup-li {
                display: none;
            }

            .languageLi {
                /* display: none; */
            }

            /* .notificationLi{
            display: none;
        } */
            .languageLi a {
                font-size: 8px;
            }
        }

        .headerMenu li a {
            font-family: 'Inter', sans-serif;
        }

        /* multi language css start */
        .skiptranslate iframe {
            display: none;
        }

        .goog-te-gadget {
            position: relative;
            width: 100px;
            overflow: hidden;
            padding: 10px;
        }

        .goog-te-combo {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            padding: 5px;
        }

        /* multi language css End */

        /* VND css start */
        .currency-menu {
            align-items: center;
            display: flex;
            margin-right: 20px;
            position: relative;
        }

        .currency-menu a {
            color: var(--button2_text_color);
            background: var(--currency_frontend_color) !important;
            padding: 5px 10px;
        }

        .currency-dropdown {
            background: var(--currency_background_color);
            /* background: #fff; */

            border: 1px solid #ececec;
            border-radius: 0 0 4px 4px;
            min-width: 120px;
            opacity: 0;
            padding: 10px 15px;
            position: absolute;
            right: 0;
            top: 100%;
            transform: translateY(20px);
            transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            visibility: hidden;
            z-index: 2;
        }

        .currency-dropdown li {
            text-decoration: none;
            list-style: none;
            padding: 5px 10px;
        }

        .currency-menu:hover a {
            color: #000;
            ;
        }

        .currency-menu:hover .currency-dropdown {
            opacity: 1;
            top: 25px;
            transform: translateY(0);
            visibility: visible;
        }

        #goog-gt-tt {
            display: none !important;
        }

        /* VND css End */

        .gt_container-3pqq3h a.glink span{
            color: #1e1e1e;
        }
    </style>

    <link rel="stylesheet"
        href="<?php echo e(asset('frontend/application/modules/frontend/views/themes/default/assets/css/swiper-slide.min.css')); ?>">
    <script src="<?php echo e(asset('frontend/application/modules/frontend/views/themes/default/assets/js/swiper-slide.min.js')); ?>">
    </script>

    <style>
        .font-dm-sans {
            font-family: 'DM Sans', sans-serif !important;
        }

        .font-dm-sans-title {
            font-family: 'DM Sans', sans-serif !important;
            font-size: 2rem !important;
        }

        /* custom styles */
        *::-webkit-scrollbar {
            width: 10px;
        }

        *::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        *::-webkit-scrollbar-thumb {
            background: var(--primary_background);
            border-radius: 10px;
        }

        *::-webkit-scrollbar-thumb:hover {
            background: var(--secondary_background);
        }
    </style>

    <link rel="stylesheet"
        href="<?php echo e(asset('frontend/application/modules/frontend/views/themes/default/assets/css/slick-theme.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('frontend/application/modules/frontend/views/themes/default/assets/css/slick.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('frontend/ckeditor5-rendered.css')); ?>">
</head>

<body>

    <?php if($custom_html): ?>
        <?php echo $custom_html->custom_body_html; ?>

    <?php endif; ?>

    <!-- <div class="se-pre-con"></div> -->
    <input type="hidden" id="base_url" value="<?php echo e(url('/')); ?>">
    <input type="hidden" id="enterprise_id" value="1">
    <input type="hidden" id="enterprise_shortname" value="admin">
    <input type="hidden" id="user_type" value="">
    <input type="hidden" id="user_id" value="">
    <input type="hidden" name="CSRF_TOKEN" id="CSRF_TOKEN" value="23b826ad1bc7f991149ab321ac679e99">
    <input type="hidden" id="api_key" value="">
    <input type="hidden" id="cluster" value="">
    <input type="hidden" id="user_ban_login_message" value="">
    <input type="hidden" id="onlynumber_allow"
        value="@!#$%^&amp;*()_+[]{}?:;|\/~`-=abcdefghijklmnopqrstuvwxyz&gt;&lt;">
    <input type="hidden" id="security_character" value="@!#$%^&amp;*()_+[]{}?;|&#039;`/&gt;&lt;">
    <input type="hidden" id="coursespecial_character" value="@$^*_[]{}`&gt;&lt;">
    <input type="hidden" id="mail_specialcharacter_remove" value="!#$%^&amp;*()_+[]{}?:;|&#039;`/&gt;&lt;">
    <input type="hidden" id="examid" value="">
    <input type="hidden" id="popup" value="">
    <input type="hidden" id="segment1" value="home">
    <input type="hidden" id="segment2" value="">
    <input type="hidden" id="segment3" value="">
    <input type="hidden" id="segment4" value="">
    <input type="hidden" id="segment5" value="">

    <!--Start Back to top button -->
    <style>
        .btn-top {
            border-color: #ee8e1c;
        }

        .btn-top i {
            color: #ee8e1c;
            transition: 0.4s;
        }

        .btn-top:hover {
            background-color: #ee8e1c;
            border-color: #ee8e1c;
        }

        .btn-top:hover i {
            color: white;
        }
    </style>
    <button type="button" class="btn btn-top" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
    <!--End Back to top button -->

    <?php if(
        !(Route::currentRouteName() == 'frontend.apply_now' ||
            (session('is_anonymous') == 'true' &&
                request()->has('partner_ref_id') &&
                !is_null(request()->query('partner_ref_id')))
        )): ?>
        <?php echo $__env->make('Frontend.layouts.parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(Route::currentRouteName() == 'frontend.apply_now' ||
            Route::currentRouteName() == 'apply_cart' ||
            (Route::currentRouteName() == 'apply_admission' &&
                (session('is_anonymous') == 'false' &&
                    request()->query('partner_ref_id') &&
                    !is_null(request()->query('partner_ref_id'))))): ?>
        <?php echo $__env->make('Frontend.layouts.parts.partner_profile_banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->yieldContent('main_content'); ?>

    <?php if(
        !(Route::currentRouteName() == 'frontend.apply_now' ||
            (session('is_anonymous') == 'true' &&
                request()->has('partner_ref_id') &&
                !is_null(request()->query('partner_ref_id')))
        )): ?>
        <?php echo $__env->make('Frontend.layouts.parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo e(asset('frontend/application/modules/frontend/views/themes/default/assets/js/slick-slider.min.js')); ?>">
        </script>
        <script>
            $('.section-2-first-row').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2500,
                responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
            $('.section-2-second-row').slick({
                slidesToShow: 4,
                slidesToScroll: 2,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
            $('.testimonial-cards').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2500,
                responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
            $('.banner-section-container').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3500,
                infinite: true,
                responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        </script>
    <?php endif; ?>



    <style type="text/css">
        /* body{
            background-color: #1B1464;
            font-family: "Nunito Sans";
        } */
        .bg-custom {
            background-color: #130f40;
        }

        .button-fixed {
            bottom: 0;
            position: fixed;
            right: 0;
            border-radius: 4px;
        }

        .fas {
            cursor: pointer;
            font-size: 24px;
        }

        p {
            font-size: 14px;
        }

        @media screen and (max-width: 600px) {
            .navbar {
                padding: 0 5px !important;
            }

            .currency-menu {
                margin: 0;
            }

            .dropdown-user .nav-link {
                margin: 0 !important;
            }

            .currency-menu:hover .currency-dropdown {
                top: 31px;
            }

            .currency-menu a {
                color: var(--button2_text_color);
                background: #fff;
                padding: 3px 10px !important;
            }

            #google_translate_element {
                margin: 0 !important;
            }

            .goog-te-gadget {
                position: relative;
                width: 87px;
                overflow: hidden;
                padding: 8px;
            }
        }
    </style>

    <?php echo $__env->make('Frontend.layouts.parts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('script'); ?>

    
    <?php if(Session::has('success')): ?>
        <script>
            toastr.success("<?php echo e(Session::get('success')); ?>");
        </script>
        <?php echo e(Session::forget('success')); ?>

    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script>
            toastr.error("<?php echo e(Session::get('error')); ?>");
        </script>
        <?php echo e(Session::forget('error')); ?>

    <?php endif; ?>


    <script src="<?php echo e(asset('frontend/application/modules/frontend/views/themes/default/assets/js/sweetalert.min.js')); ?>">
    </script>

    <script>
        $("#search_btn").click(function(event) {
            event.stopPropagation();
            var searchInputArea = $("#search_input_area");
            if (searchInputArea.hasClass("d-none")) {
                searchInputArea.removeClass("d-none").addClass("d-block").fadeIn("slow");
            } else if (searchInputArea.hasClass("d-block")) {
                searchInputArea.removeClass("d-block").addClass("d-none").fadeOut("slow");
            }
        });

        $("#close_btn").click(function(event) {
            event.stopPropagation();
            var searchInputArea = $("#search_input_area");
            if (searchInputArea.hasClass("d-block")) {
                searchInputArea.removeClass("d-block").addClass("d-none").fadeOut("slow");
            }
        });

        $(document).click(function(event) {
            var searchInputArea = $("#search_input_area");
            var searchInput = $(".custom-input");
            if (!searchInputArea.is(event.target) && !searchInput.is(event.target) && searchInputArea.has(event
                    .target).length === 0 && searchInputArea.hasClass("d-block")) {
                searchInputArea.removeClass("d-block").addClass("d-none").fadeOut("slow");
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".delete-button").click(function() {
                $("#delete-modal").show();
                $("#car_id").val($(this).attr('CarId'))

            });
            $("#confirm-no").click(function() {
                $("#delete-modal").hide();
            });
            $("#confirm-yes").click(function() {
                $("#delete-modal").hide();
            });
        });



        $('.addcart').on('click', function() {
            var id = $(this).attr('CarId');

            Swal.fire({
                title: "Add To Cart Successfully!",
                icon: "success",
                confirmButtonText: "Ok",

            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "<?php echo e(url('/add-to-cart')); ?>/" + id
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $(".delete-button").click(function() {
                $("#delete-modal").show();
                $("#car_id").val($(this).attr('CarId'))

            });
            $("#confirm-no").click(function() {
                $("#delete-modal").hide();
            });
            $("#confirm-yes").click(function() {
                $("#delete-modal").hide();
            });
        });



        $('.addebookcart').on('click', function() {
            var id = $(this).attr('CarId');

            Swal.fire({
                title: "Add To Cart Successfully!",
                icon: "success",
                confirmButtonText: "Ok",

            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "<?php echo e(url('/add-to-ebook-cart')); ?>/" + id
                }
            });
        });
    </script>

    
    <script src="<?php echo e(asset('frontend/application/modules/frontend/views/themes/default/assets/js/axios.min.js')); ?>">
    </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/flatpickr.js">
    </script>
    <script
        src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/jquery.serializejson.js">
    </script>
    <script src="<?php echo e(asset('frontend/application/modules/frontend/views/themes/default/assets/js/umd-popper.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('frontend/application/modules/frontend/views/themes/default/assets/js/tippy-umd.min.js')); ?>">
    </script>
    <script
        src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/plugins/select2/dist/js/select2.min.js">
    </script>
    <script src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/dropzone.js"></script>

    <?php echo $__env->yieldContent('cus_sc'); ?>
    <script>
        $(document).ready(function() {
            $(".delete-button").click(function() {
                $("#delete-modal").show();
                $("#car_id").val($(this).attr('CarId'))

            });
            $("#confirm-no").click(function() {
                $("#delete-modal").hide();
            });
            $("#confirm-yes").click(function() {
                $("#delete-modal").hide();
            });
        });



        $('.cartremove').on('click', function() {
            var id = $(this).attr('CarId');
            Swal.fire({
                title: "Do you Want to delete ?",
                icon: "error",
                showCancelButton: true,
                confirmButtonText: "Yes !",
                cancelButtonText: "No !",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "<?php echo e(url('/remove-from-cart')); ?>/" + id
                }
            });
        });
    </script>


    
    <script>
        $('.add-save').on('click', function() {
            let c_id = $(this).attr('c_id');
            let arg = $(this);
            $.ajax({

                type: 'Get',

                url: "<?php echo e(url('add-to-save')); ?>/" + c_id,

                success: function(data) { //console.log(data);
                    // console.log(data);
                    if (data == "ok") {
                        $(arg).css('color', '#00a662');
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'success',
                            title: 'Course Added To Wishlist',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else if (data == "del") {
                        $(arg).css('color', '#969696');
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'success',
                            title: 'Course Remove From Wishlist',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }

            });
        });
    </script>

    <?php if(
        !(Route::currentRouteName() == 'frontend.apply_now' ||
            (session('is_anonymous') == 'true' &&
                request()->has('partner_ref_id') &&
                !is_null(request()->query('partner_ref_id')))
        )): ?>

        
        

        <script type="text/javascript">
            window.gtranslateSettings = window.gtranslateSettings || {};
            window.gtranslateSettings['43217984'] = {
                "default_language": "en",
                "languages": ["en", "zh-CN", "bn"],
                "wrapper_selector": "#gt-mordadam-43217984",
                "native_language_names": 1,
                "flag_style": "2d",
                "flag_size": 24,
                "horizontal_position": "inline",
                "flags_location": window.location.origin + "/translate/flags/"
            };
        </script>
        <script src="<?php echo e(asset('translate/js/gt.min.js')); ?>" data-gt-widget-id="43217984"></script>
        


        <?php if($custom_html): ?>
            <?php echo $custom_html->custom_footer_html; ?>

        <?php endif; ?>

        <?php if($custom_js): ?>
            <script>
                <?php echo $custom_js->custom_body_js; ?>

            </script>
        <?php endif; ?>
    <?php endif; ?>

</body>

<?php if($custom_js): ?>
    <script>
        <?php echo $custom_js->custom_footer_js; ?>

    </script>
<?php endif; ?>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Frontend/layouts/master-layout.blade.php ENDPATH**/ ?>