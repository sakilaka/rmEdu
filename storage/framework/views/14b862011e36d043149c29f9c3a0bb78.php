<div class="pt-4 d-none mt-5 d-lg-block container">
    <h3 class="ca-card-title d-block text-center mb-4 font-dm-sans-title" style="margin-bottom: 2rem;">
        <?php echo e($home_content->university_location_title); ?></h3>

    <div class="row justify-content-center flex-nowrap">
        <?php $count = 0; ?>
        <?php $__currentLoopData = $homecontentlocations->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homecontentlocation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $link = '';
                $name = '';
                $image = '';

                switch ($homecontentlocation->type_loction_id) {
                    case '1':
                        if ($homecontentlocation->continent) {
                            $link = route('frontend.all_universities_list', [
                                'continent' => $homecontentlocation->continent->id,
                            ]);
                            $name = $homecontentlocation->continent->name;
                            $image = $homecontentlocation->photo
                                ? asset('upload/home_content/university_location/' . $homecontentlocation->photo)
                                : asset('frontend/images/No-image.jpg');

                            // $image = $homecontentlocation->continent->image_show;
                        }
                        break;
                    case '2':
                        if ($homecontentlocation->country) {
                            $link = route('frontend.all_universities_list', [
                                'continent' => $homecontentlocation->country->continent_id,
                                'country' => $homecontentlocation->country->id,
                            ]);
                            $name = $homecontentlocation->country->name;
                            $image = $homecontentlocation->photo
                                ? asset('upload/home_content/university_location/' . $homecontentlocation->photo)
                                : asset('frontend/images/No-image.jpg');

                            // $image = $homecontentlocation->country->image_show;
                        }
                        break;
                    case '3':
                        if ($homecontentlocation->state) {
                            $link = route('frontend.all_universities_list', [
                                'continent' => $homecontentlocation->state->country->continent_id ?? null,
                                'country' => $homecontentlocation->state->country_id ?? null,
                                'state' => $homecontentlocation->state->id,
                            ]);
                            $name = $homecontentlocation->state->name;
                            $image = $homecontentlocation->photo
                                ? asset('upload/home_content/university_location/' . $homecontentlocation->photo)
                                : asset('frontend/images/No-image.jpg');

                            // $image = $homecontentlocation->state->image_show;
                        }
                        break;
                    case '4':
                        if ($homecontentlocation->city) {
                            $link = route('frontend.all_universities_list', [
                                'continent' => $homecontentlocation->city->state->country->continent_id ?? null,
                                'country' => $homecontentlocation->city->state->country_id ?? null,
                                'state' => $homecontentlocation->city->state->id ?? null,
                                'city' => $homecontentlocation->city->id,
                            ]);
                            $name = $homecontentlocation->city->name;
                            $image = $homecontentlocation->photo
                                ? asset('upload/home_content/university_location/' . $homecontentlocation->photo)
                                : asset('frontend/images/No-image.jpg');

                            // $image = $homecontentlocation->city->image_show;
                        }
                        break;
                }
                $count++;
            ?>
            <?php if($link && $name && $image): ?>
                <div style="width: 50%">
                    <div class="embed-responsive embed-responsive-16by9" style="position: relative;">
                        <a href="<?php echo e($link); ?>" class="d-flex justify-content-center align-items-center"
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                            <p class="text-decoration-none text-white text-uppercase text_ellipse blog_title"
                                style="font-size:1.2rem; text-align: center; font-weight: bold;">
                                <?php echo e($name); ?>

                            </p>
                        </a>
                        <img style="height: 325px; border-radius:6px;" src="<?php echo e($image); ?>"
                            class="card-img-top embed-responsive-item lazyload" alt="">
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="row justify-content-center mt-3">
        <?php $__currentLoopData = $homecontentlocations->slice(2, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homecontentlocation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $link = '';
                $name = '';
                $image = '';

                switch ($homecontentlocation->type_loction_id) {
                    case '1':
                        if ($homecontentlocation->continent) {
                            $link = route('frontend.all_universities_list', [
                                'continent' => $homecontentlocation->continent->id,
                            ]);
                            $name = $homecontentlocation->continent->name;
                            $image = $homecontentlocation->photo
                                ? asset('upload/home_content/university_location/' . $homecontentlocation->photo)
                                : asset('frontend/images/No-image.jpg');

                            // $image = $homecontentlocation->continent->image_show;
                        }
                        break;
                    case '2':
                        if ($homecontentlocation->country) {
                            $link = route('frontend.all_universities_list', [
                                'continent' => $homecontentlocation->country->continent_id,
                                'country' => $homecontentlocation->country->id,
                            ]);
                            $name = $homecontentlocation->country->name;
                            $image = $homecontentlocation->photo
                                ? asset('upload/home_content/university_location/' . $homecontentlocation->photo)
                                : asset('frontend/images/No-image.jpg');

                            // $image = $homecontentlocation->country->image_show;
                        }
                        break;
                    case '3':
                        if ($homecontentlocation->state) {
                            $link = route('frontend.all_universities_list', [
                                'continent' => $homecontentlocation->state->country->continent_id ?? null,
                                'country' => $homecontentlocation->state->country_id ?? null,
                                'state' => $homecontentlocation->state->id,
                            ]);
                            $name = $homecontentlocation->state->name;
                            $image = $homecontentlocation->photo
                                ? asset('upload/home_content/university_location/' . $homecontentlocation->photo)
                                : asset('frontend/images/No-image.jpg');

                            // $image = $homecontentlocation->state->image_show;
                        }
                        break;
                    case '4':
                        if ($homecontentlocation->city) {
                            $link = route('frontend.all_universities_list', [
                                'continent' => $homecontentlocation->city->state->country->continent_id ?? null,
                                'country' => $homecontentlocation->city->state->country_id ?? null,
                                'state' => $homecontentlocation->city->state->id ?? null,
                                'city' => $homecontentlocation->city->id,
                            ]);
                            $name = $homecontentlocation->city->name;
                            $image = $homecontentlocation->photo
                                ? asset('upload/home_content/university_location/' . $homecontentlocation->photo)
                                : asset('frontend/images/No-image.jpg');

                            // $image = $homecontentlocation->city->image_show;
                        }
                        break;
                }
            ?>
            <?php if($link && $name && $image): ?>
                <div style="width: 20%">
                    <div class="embed-responsive embed-responsive-1by1"
                        style="position: relative; width: 100%; height: 100%;">
                        <a href="<?php echo e($link); ?>" class="d-flex justify-content-center align-items-center"
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                            <p class="text-decoration-none text-white text-uppercase text_ellipse blog_title"
                                style="font-size:1.2rem; text-align: center; font-weight: bold;">
                                <?php echo e($name); ?>

                            </p>
                        </a>
                        <img style="width: 100%; height: 100%; border-radius:6px; object-fit: cover;"
                            src="<?php echo e($image); ?>" class="card-img-top embed-responsive-item lazyload"
                            alt="">
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/layouts/parts/find-university.blade.php ENDPATH**/ ?>