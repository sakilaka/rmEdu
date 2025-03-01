<section class="container" style="margin-top: 3rem">
    <style>
        .section-2-card {
            border-radius: 10px !important;
            padding: 0 0.8rem;
            margin-top: 1rem;
        }

        .section-2-card h4,
        .section-2-card p {
            transition: 0.4s;
        }

        .section-2-card h4 {
            font-size: 1.5em;
            font-weight: 700;
        }

        .section-2-card .card-body {
            padding: 20px;
            border-radius: 10px !important;
            transition: 0.4s;
        }

        .section-2-card .card-body img {
            filter: brightness(0) saturate(100%) invert(60%) sepia(40%) saturate(3229%) hue-rotate(157deg) brightness(86%) contrast(106%);
        }

        .section-2-card:hover {
            .card-body {
                background-color: var(--primary_background) !important;
            }

            h4,
            p {
                color: white !important;
            }
        }

        .section-2-card .card-body img {
            height: 60px !important;
            width: 60px !important;
        }
    </style>
    <div class="section-2-first-row slick-slider">
        <?php $__currentLoopData = $degrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $degree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $courses = App\Models\Course::where([
                    'degree_id' => $degree->id,
                    'status' => 1,
                ])->get();
                $course_count = count($courses);
            ?>
            <div class=" section-2-card"
                onclick="window.location.href = '<?php echo e(route('frontend.university_course_list', ['degree' => $degree->id])); ?>'">
                <div class="card card-body">
                    <div>
                        <img src="<?php echo e(asset('frontend/images/section-2-icons/Categorey-Icon-7.svg')); ?>" alt="">
                    </div>
                    <div class="mt-3">
                        <h4 class="font-dm-sans"><?php echo e($degree->name); ?></h4>
                        <p class="font-dm-sans"><?php echo e($course_count); ?> Course(s)</p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="section-2-second-row slick-slider">
        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $courses = App\Models\Course::where([
                    'department_id' => $department->id,
                    'status' => 1,
                ])->get();
                $course_count = count($courses);
            ?>
            <div class=" section-2-card"
                onclick="window.location.href = '<?php echo e(route('frontend.university_course_list', ['department' => $department->id])); ?>'">
                <div class="card card-body">
                    <div>
                        <img src="<?php echo e(asset('frontend/images/section-2-icons/Categorey-Icon-2.svg')); ?>" alt="">
                    </div>
                    <div class="mt-3">
                        <h4 class="font-dm-sans"><?php echo e($department->name); ?></h4>
                        <p class="font-dm-sans"><?php echo e($course_count); ?> Course(s)</p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php /**PATH /home/rmintern/public_html/resources/views/Frontend/layouts/parts/section-2.blade.php ENDPATH**/ ?>