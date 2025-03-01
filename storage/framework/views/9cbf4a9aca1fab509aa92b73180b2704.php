<div class="container" style="margin-top: 5rem">
    <style>
        .course-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .single-course-category {
            flex: 1 1 calc(20% - 16px);
            margin: 10px 8px;
        }

        .single-course-category {
            padding: 40px 15px 15px;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -ms-border-radius: 5px;
            overflow: hidden;
            transition: all .4s ease;
            -webkit-transition: all .4s ease;
            -moz-transition: all .4s ease;
            -ms-transition: all .4s ease;
            margin-top: 15px;
            margin-bottom: 15px;
            background: #fff;
            text-align: center;
            position: relative;
            min-height: 275px !important;
            -webkit-box-shadow: 0px 0px 30px rgba(29, 23, 77, .06);
            box-shadow: 0px 0px 30px rgba(29, 23, 77, .06)
        }

        .single-course-category .course-media {
            margin-bottom: 25px
        }

        .single-course-category .course-media img {
            transition: all .4s ease;
            -webkit-transition: all .4s ease;
            -moz-transition: all .4s ease;
            -ms-transition: all .4s ease;
            width: 50px;
            margin: auto;
            object-fit: contain
        }

        .single-course-category .course-content .course-category-title {
            color: black !important;
            font-weight: 700;
            font-family: 'DM Sans', sans-serif !important;
            font-size: 1.15rem;
        }

        .single-course-category .hover-content {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            padding: 40px 30px 30px;
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all ease .4s;
            transition: all cubic-bezier(0, 0, 0.58, 0.01) .4s;
            background: var(--primary_background);
        }

        .single-course-category .hover-content .course-category-title a {
            color: #fff
        }

        .single-course-category .hover-content .course-category-title a:hover {
            color: #fff
        }

        .single-course-category .hover-content .btn-wrap {
            margin-top: 50px
        }

        .single-course-category .hover-content .course-button {
            font-size: 16px;
            width: 50px;
            height: 50px;
            border-radius: 8px;
            -webkit-border-radius: 8px;
            -ms-border-radius: 8px;
            background: rgba(255, 255, 255, .1);
            display: inline-block;
            padding: 12px;
            color: #fff
        }

        .single-course-category .hover-content .course-button:hover {
            background: var(--secondary_background)
        }

        .single-course-category:hover {
            -webkit-box-shadow: 0px 15px 40px rgba(40, 120, 235, .25);
            box-shadow: 0px 15px 40px rgba(40, 120, 235, .25)
        }

        .single-course-category:hover .hover-content {
            opacity: 1;
            visibility: visible
        }

        .course-location-container {
            position: absolute;
            bottom: 12px;
            left: 0;
            width: 100%;
            margin: 0;
        }

        .course-location {
            font-size: 0.89rem;
        }


        @media (max-width: 1199.98px) {
            .single-course-category {
                flex-basis: calc(33.333% - 16px);
            }
        }

        @media (max-width: 767.98px) {
            .single-course-category {
                flex-basis: calc(50% - 16px);
            }
        }

        @media (max-width: 575.98px) {
            .single-course-category {
                flex-basis: calc(100% - 16px);
            }
        }

        @media (min-width: 1200px) {
            .course-container {
                justify-content: center;
            }

            .single-course-category {
                flex: 0 1 calc(20% - 16px);
            }
        }
    </style>

    <h3 class="ca-card-title d-block text-center mb-4 font-dm-sans-title"><?php echo e($home_content->university_title); ?></h3>

    <div class="course-container">
        <?php
            $university_list = App\Models\University::where('status', 1)->limit(8)->orderBy('id', 'desc')->get();
        ?>

        <?php if(count($university_list) > 0): ?>
            <?php $__currentLoopData = $university_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $courses = App\Models\Course::where([
                        'university_id' => $university->id,
                        'status' => 1,
                    ])->get();
                    $course_count = count($courses);
                ?>

                <div class="single-course-category">
                    <div class="course-media">
                        <img data-lazyloaded="1" src="<?php echo e($university->image_show); ?>" decoding="async"
                            alt="Business &amp; Management" data-ll-status="loaded" class="entered litespeed-loaded">
                    </div>
                    <div class="course-content mt-3">
                        <p class=""><?php echo e($course_count); ?> PROGRAM(S)</p>
                        <a href="<?php echo e(route('frontend.university_details', $university->id)); ?>">
                            <h4 class="course-category-title">
                                <?php echo e(Illuminate\Support\Str::limit($university->name, 45, '...')); ?>

                            </h4>
                        </a>
                    </div>
                    <div class="course-location-container">
                        <p class="course-location" style="margin-bottom: 0">
                            
                            
                            <span><?php echo e(Illuminate\Support\Str::limit($university->address, 30, '...')); ?></span>
                        </p>
                        <p class="course-location" style="margin-bottom: 0">
                            <span><?php echo e($university->continent->name); ?>,</span>
                            <span><?php echo e($university->country->name); ?></span>
                        </p>
                    </div>


                    <div class="hover-content">
                        <div class="course-content">
                            <h4 class="course-category-title">
                                <a href="<?php echo e(route('frontend.university_details', $university->id)); ?>">
                                    <?php echo e($university->name); ?>

                                </a>
                            </h4>
                            <div class="btn-wrap">
                                <a class="course-button"
                                    href="<?php echo e(route('frontend.university_details', $university->id)); ?>"><i
                                        class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        <?php endif; ?>
    </div>

    <div class="text-center mt-2 firstbutton">
        <a href="<?php echo e(route('frontend.all_universities_list')); ?>" class="btn btn-lg browse-more-btn btn-primary-bg"
            style="color: var(--button2_text_color)">
            View All Universities
            <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56" height="15.666"
                viewBox="0 0 28.56 15.666">
                <path id="right-arrow_3_" data-name="right-arrow (3)"
                    d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                    transform="translate(0 -107.5)" fill="#fff"></path>
            </svg>
        </a>
    </div>
</div>
<?php /**PATH /home/rmintern/public_html/resources/views/Frontend/layouts/parts/section-3-university-showcase.blade.php ENDPATH**/ ?>