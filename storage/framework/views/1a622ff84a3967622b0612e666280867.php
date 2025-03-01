<style>
    .image-container {
        position: relative;
        width: 100% !important;
        min-height: 48em !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
    }

    .image-container::before {
        content: "";
        position: absolute;
        top: 0;
        /* left: -10px; */
        width: 100%;
        height: 100%;
        background: linear-gradient(100deg, #0D0E21C2 50%, #04060E36 93%);
        z-index: 1;
    }

    .image-container .banner-text {
        color: white;
        font-size: 3.5rem;
        font-family: 'DM Sans', sans-serif;
        font-weight: 600;
        position: relative;
        z-index: 2;
    }

    .image-container .container {
        position: relative;
        z-index: 2;
        padding-left: 50px !important;
    }

    .image-container .banner-btn-container {
        margin-top: 30px !important;
    }

    .image-container .banner-btn {
        padding: 12px 15px;
        font-weight: 600;
    }

    .image-container .banner-btn:nth-child(1) {
        width: 240px;
    }

    .image-container .banner-btn:nth-child(2) {
        width: 160px;
    }

    @media screen and (max-width:991px) {
        .image-container .container {
            padding-left: 25px !important;
        }
    }

    @media screen and (max-width:399px) {
        .image-container .banner-btn:nth-child(2) {
            margin-left: 0px !important;
        }
    }

    @media screen and (min-width:400px) {
        .image-container .banner-btn:nth-child(2) {
            margin-left: 16px;
        }
    }

    @media screen and (max-width: 767px) {
        .image-container {
            min-height: 42em !important;
        }

        .image-container .banner-text {
            font-size: 2rem;
        }
    }

    .hover-white {
        transition: 0.3s;
    }

    .hover-white:hover {
        color: white !important;
        border-color: white !important;
    }

    .banner-section-container {
        width: 100% !important;
        overflow: hidden !important;
    }

    .banner-section-container.slick-slider {
        margin: 0px !important;
        width: 101% !important;
    }
</style>

<section class="position-relative overflow-hidden w-100" style="margin-top:3rem; width: 100% !important;">
    <div class="banner-section-container slick-slider">
        <div class="row mx-0 mt-md-5">
            <div class="col-12 px-0 position-relative">
                <div class="image-container d-flex justify-content-start align-items-center"
                    style="background-image: url(<?php echo e(asset('upload/home_content/hero_slider/' . $home_content->hero_slider_bg_1)); ?>); background-size:cover;">
                    <div class="container px-0">
                        <div class="row mx-0">
                            <div class="col-12 col-md-8 col-lg-6">
                                <div>
                                    <h2 class="banner-text">
                                        <?php echo e($home_content->hero_slider_title_1); ?>

                                    </h2>
                                </div>
                                <div
                                    class="d-md-flex justify-content-md-start align-items-md-center banner-btn-container">
                                    <?php
                                        $heroSliderBtnText1 = json_decode($home_content->hero_slider_btn_text_1);
                                    ?>

                                    <a href="<?php echo e($heroSliderBtnText1->hero_slider_btn_url_1_first); ?>"
                                        class="btn btn-primary-bg banner-btn">
                                        <?php echo e($heroSliderBtnText1->hero_slider_btn_text_1_first); ?>

                                        <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56"
                                            height="15.666" viewBox="0 0 28.56 15.666">
                                            <path id="right-arrow_3_" data-name="right-arrow (3)"
                                                d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                                                transform="translate(0 -107.5)" fill="#fff"></path>
                                        </svg>
                                    </a>

                                    <a href="<?php echo e($heroSliderBtnText1->hero_slider_btn_url_1_second); ?>"
                                        class="btn btn-tertiary-bg banner-btn mt-2 mt-md-0">
                                        <?php echo e($heroSliderBtnText1->hero_slider_btn_text_1_second); ?>

                                        <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56"
                                            height="15.666" viewBox="0 0 28.56 15.666">
                                            <path id="right-arrow_3_" data-name="right-arrow (3)"
                                                d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                                                transform="translate(0 -107.5)" fill="#fff"></path>
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="row mx-0 mt-md-5">
            <div class="col-12 px-0 position-relative">
                <div class="image-container d-flex justify-content-start align-items-center"
                    style="background-image: url(<?php echo e(asset('upload/home_content/hero_slider/' . $home_content->hero_slider_bg_2)); ?>); background-size:cover;">
                    <div class="container px-0">
                        <div class="row mx-0">
                            <div class="col-12 col-md-8 col-lg-6">
                                <div>
                                    <h2 class="banner-text">
                                        <?php echo e($home_content->hero_slider_title_2); ?>

                                    </h2>
                                </div>
                                <div
                                    class="d-md-flex justify-content-md-start align-items-md-center banner-btn-container">
                                    <?php
                                        $heroSliderBtnText2 = json_decode($home_content->hero_slider_btn_text_2);
                                    ?>

                                    <a href="<?php echo e($heroSliderBtnText2->hero_slider_btn_url_2_first); ?>"
                                        class="btn btn-primary-bg banner-btn">
                                        <?php echo e($heroSliderBtnText2->hero_slider_btn_text_2_first); ?>

                                        <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56"
                                            height="15.666" viewBox="0 0 28.56 15.666">
                                            <path id="right-arrow_3_" data-name="right-arrow (3)"
                                                d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                                                transform="translate(0 -107.5)" fill="#fff"></path>
                                        </svg>
                                    </a>

                                    <a href="<?php echo e($heroSliderBtnText2->hero_slider_btn_url_2_second); ?>"
                                        class="btn btn-tertiary-bg banner-btn mt-2 mt-md-0">
                                        <?php echo e($heroSliderBtnText2->hero_slider_btn_text_2_second); ?>

                                        <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56"
                                            height="15.666" viewBox="0 0 28.56 15.666">
                                            <path id="right-arrow_3_" data-name="right-arrow (3)"
                                                d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                                                transform="translate(0 -107.5)" fill="#fff"></path>
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="transform: translateY(-52px);">
        <style>
            .filtering_box {
                border-radius: 15px;
                z-index: 1;
                box-shadow: 0px 7px 14px rgba(28, 97, 167, 0.2);
            }

            @media screen and (max-width: 990px) {
                .hero_search_form {
                    width: 90%;
                    margin: 0 auto;
                    margin-top: 1rem;
                }
            }
        </style>
        <form class="hero_search_form" action="<?php echo e(route('frontend.university_course_list')); ?>" method="GET"
            onsubmit="removeEmptyFields(this)">
            <div class="row justify-content-center col-12 col-lg-7 py-4 bg-light m-auto filtering_box">
                <div class="col-12 col-lg-4 mt-2 mt-lg-0 col-padding-right">
                    <div class="">
                        <select class="form-control select2_form_select"  name="country">
                            <option value="">Select Country</option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        
                    </div>
                </div>
                
                <div class="col-12 col-lg-4 mt-3 mt-lg-0 col-padding-right">
                    <div class="">
                        <select class="form-control select2_form_select"  name="degree">
                            <option value="">Select Degree</option>
                            <?php $__currentLoopData = $degrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $degree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($degree->id); ?>"><?php echo e($degree->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        
                    </div>
                </div>

                <div
                    class="col-12-padding-right col-12 col-lg-3 mt-3 mt-lg-0 d-flex justify-content-center align-items-center">
                    <div>
                        <button type="submit" class="btn btn-secondary-bg" style="padding:8px 30px">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            Explore
                        </button>
                    </div>
                </div>
            </div>
        </form>
        
        <script>
            function removeEmptyFields(form) {
                for (var i = form.elements.length - 1; i >= 0; i--) {
                    var element = form.elements[i];
                    if (element.tagName === 'SELECT' && element.value === '') {
                        element.name = '';
                    }
                }
            }
        </script>
    </div>
</section>
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/layouts/parts/hero-section.blade.php ENDPATH**/ ?>