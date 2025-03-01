<?php $__env->startSection('title', '- About'); ?>
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>

    <div class="content_search" style="margin-top:70px">
        <link href="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/css/ali.css"
            rel="stylesheet">
        <!-- <style> -->
        <style>
            .brand2-carousel .owl-item {
                padding: 15px 10px;
                text-align: center;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 5px;
            }

            .brand2-carousel .owl-item .brand_item {
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                height: 100%;
                background: #fff;
                box-shadow: 0 0 15px rgb(0 0 0 / 8%);
                padding: 35px 20px;
                width: 100%;
                align-items: center;
                justify-content: center;
            }

            .brand2-carousel .owl-item img {
                display: block;
                width: auto;
                max-width: 100%;
            }

            .brand2-carousel .owl-stage {
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
            }

            .main_title{
                color: var(--primary_background) !important;
            }
        </style>

        <div class="bg-alice-blue about_lead">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="text-center about_lead-inner">
                        <h2 class="text-capitalize text-center main_title font_open" style="color: var(--header_color)">
                            <?php echo e($about_content->about_text); ?></h2>
                        <p class="fs_18 text-center inner_text" style="color: var(--text_color)">
                            <?php echo e($about_content->description1); ?></p>
                        <br>

                        
                    </div>
                </div>
            </div>
        </div>

        <div class="mission py-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="mission_inner">
                        <h2 class="font_open mb-1 text-center main_title mission_txt" style="color: var(--header_color)">
                            <?php echo e($about_content->about_text2); ?></h2>
                        <p class="fs_18 inner_text text-center" style="color: var(--text_color)">
                            <?php echo e($about_content->description2); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-alice-blue py-40 mission">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="mission_inner">
                        <h2 class="font_open mb-1 text-center main_title why_choose_us" style="color: var(--header_color)">
                            <?php echo e($about_content->about_text3); ?></h2>
                        <p class="fs_18 inner_text text-center why_choose_short_text" style="color: var(--text_color)">
                            <?php echo e($about_content->description3); ?></p>
                    </div>
                </div>

                
            </div>
        </div>

        

        <link
            href="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/css/owl.carousel.min.css"
            rel="stylesheet">
        <link
            href="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/css/owl.theme.default.min.css"
            rel="stylesheet">
        <link href="#" rel="stylesheet">
        <style>
            /* Collabration Text */

            .coll_text {
                padding-top: 50px;
                font-family: 'Times New Roman', Times, serif;
            }

            #counter .logo-holder {
                width: 100%;
                display: block;
            }

            #counter .logo-holder img {
                height: 40px;
                max-width: inherit;
                width: auto;
                float: left;
                margin-right: 15px;
            }

            #counter .logo-holder h3 {
                display: inline-block;
                background: linear-gradient(90deg, #EA7D26 18.98%, #EDAC1F 81.39%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                text-emphasis-color: transparent;
                font-weight: 600;
                padding-top: 15px;
            }

            #counter .logo-holder .justify-content-center {
                display: inline-flex;
                margin-bottom: 5px;
                margin-top: 10px;
            }

            .logo-container ul {
                margin: 0;
                padding: 0;
                list-style: none;
                display: inline-block;
            }

            .logo-container {
                padding: 0px 50px;
            }

            .logo-container .logo-holder {
                background: #fff;
                border-radius: 10px;
                margin: 20px;
                box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
                display: flex;
                height: 120px;
            }

            .logo-container .logo-holder img {
                max-height: 60px;
                max-width: 50%;
                width: auto;
                margin: auto;
            }

            .owl-dots {
                position: absolute;
                bottom: -30px;
                left: 50%;
                -webkit-transform: translate(-50%, 0);
                transform: translate(-50%, 0);
            }

            .owl-dots .owl-dot {
                background: #C4C4C4;
                border-radius: 50%;
                width: 10px;
                height: 10px;
                float: left;
                margin-right: 10px;
            }

            .owl-dots .owl-dot.active {
                background: #494CA2;
            }

            .s_img1,
            .s_img2,
            .s_img3,
            .s_img4 {
                width: 30%;
            }

            .s_text1 {
                background: linear-gradient(90deg, #EA7D26 18.98%, #EDAC1F 81.39%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                text-emphasis-color: transparent;
                font-weight: 600;
            }


            /* Collabration Text */

            /* founder and co-funder section */
            .ourteam-section {
                padding-bottom: unset;
            }


            .our-team-title {
                margin-bottom: 15px;
            }

            .our-team-title h2 {
                padding: 0px;
                margin: 0px;
                font-weight: bold;
                border-left: 5px solid var(--header_color);
                ;
                /* border-left: 5px solid #007bff; */
                padding-left: 5px;
                border-radius: 4px;
                font-size: 24px;
            }

            .our-team {
                padding: 30px 0 40px;
                margin-bottom: 30px;
                background-color: #f7f5ec;
                text-align: center;
                overflow: hidden;
                position: relative;
                border: 1px solid #f7f5ec;
                ;
                /* border: 1px solid #007bff; */
                border-radius: 8px;
                transition: all 0.4s ease-in 0s;
                cursor: pointer;
            }

            .our-team:hover {
                background: white;
            }

            .our-team .picture {
                display: inline-block;
                height: 130px;
                width: 130px;
                z-index: 1;
                position: relative;
            }

            .our-team .picture::before {
                content: "";
                width: 100%;
                height: 0;
                border-radius: 50%;
                /* background-color: #1369ce; */
                background-color: var(--primary_background);
                position: absolute;
                bottom: 135%;
                right: 0;
                left: 0;
                opacity: 0.9;
                transform: scale(3);
                transition: all 0.3s linear 0s;
            }

            .our-team:hover .picture::before {
                height: 100%;
            }

            .our-team .picture::after {
                content: "";
                width: 100%;
                height: 100%;
                border-radius: 50%;
                background-color: var(--header_color);
                /* background-color: #1369ce; */
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1;
            }

            .our-team .picture img {
                width: 100%;
                height: 100%;
                border-radius: 50%;
                transform: scale(1);
                transition: all 0.9s ease 0s;
            }

            .our-team:hover .picture img {
                box-shadow: 0 0 0 14px #f7f5ec;
                transform: scale(0.7);
            }

            .our-team .title {
                display: block;
                font-size: 13px;
                color: #4e5052;
                text-transform: capitalize;
            }

            .our-team .social {
                width: 100%;
                padding: 0;
                margin: 0;
                /* background-color: #1369ce; */
                background-color: var(--header_color);
                position: absolute;
                bottom: -100px;
                left: 0;
                transition: all 0.5s ease 0s;
            }

            .our-team:hover .social {
                bottom: 0;
            }

            .our-team .social li {
                display: inline-block;
            }

            .our-team .social li a {
                display: block;
                padding: 10px;
                font-size: 17px;
                color: white;
                transition: all 0.3s ease 0s;
                text-decoration: none;
            }

            .our-team .social li a:hover {
                color: var(--header_color);
                /* color: #1369ce; */
                background-color: #f7f5ec;
            }

            .team-content .name {
                font-size: 18px;
                color: black;
                margin-top: 30px;
            }

            .closeIcon button {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .closeIcon button span {
                background: #da0b0b;
                padding: 10px;
                border-radius: 50%;
                height: 35px;
                width: 35px;
                position: absolute;
                margin-top: 3px;
                color: white;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>
        <div class="container mb-1">
            
            <br>
            <br>
            <br>
            <br>

            <section class="ourteam-section">
                <!-- Founder and CEO -->
                <div class="container">
                    <div class="our-team-title">
                        <h2 style="color: var(--primary_background)">Founder And CEO</h2>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = $founders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $founder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="our-team" data-toggle="modal" data-id="1" data-target=".bd-example-modal-lg"
                                    onclick="ViewDetailsModel(1)">
                                    <div class="picture">
                                        <img class="img-fluid" src="<?php echo e(@$founder->image_show); ?>">
                                    </div>
                                    <div class="team-content">
                                        <h3 class="name text-dark"><?php echo e(@$founder->name); ?></h3>
                                        <h4 class="title text-dark"><?php echo e(@$founder->designation); ?>

                                        </h4>
                                    </div>
                                    <ul class="social">
                                        <li><a href="<?php echo e(@$founder->facebook); ?>" class="fab fa-facebook"
                                                aria-hidden="true"></a></li>
                                        <li><a href="<?php echo e(@$founder->twitter); ?>" class="fab fa-twitter"
                                                aria-hidden="true"></a></li>
                                        <li><a href="<?php echo e(@$founder->google_plus); ?>" class="fab fa-google-plus"
                                                aria-hidden="true"></a></li>
                                        <li><a href="<?php echo e(@$founder->linkedin); ?>" class="fab fa-linkedin"
                                                aria-hidden="true"></a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>








        </div>
        <script src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/owl.carousel.min.js">
        </script>
        <script src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/main.js"></script>
        <!--End Brand Logo-->
    </div>
    <?php echo $__env->make('Frontend.layouts.parts.news-letter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/pages/about.blade.php ENDPATH**/ ?>