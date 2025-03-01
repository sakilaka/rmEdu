<?php if(!empty($country_data) && $country_data['contents'] != ''): ?>
    <div class="row justify-content-center mt-3 mt-lg-0 mb-4">
        <div class="col-12 px-0">
            <div class="card w-100 shadow-none" style="border-radius: 8px">
                <div class="card-body">
                    <h3 class="text-center fw-bold mb-3" style="font-size: 1.5rem;">Student Life At
                        <?php echo e($country_data['name']); ?></h3>

                    <div class="text-contents" id="content-<?php echo e($country_data['id']); ?>">
                        <?php echo $country_data['contents'] ?? ''; ?>

                    </div>
                    <div class="text-center mt-2">
                        <a href="javascript:void(0)" class="text-center fw-bold see-more-toggle"
                            data-target="#content-<?php echo e($country_data['id']); ?>"
                            style="color: var(--primary_background)">See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="columns">
    <div class="column">
        <p class="result-search"><span class="count"><?php echo e($universities->count()); ?></span> Total University Found
        </p>
        <div class="dropdown">
        </div>
    </div>
</div>

<div class="columns mb-0">
    <div class="column pt-0 pb-0">
        <p class="result-search"></p>
        <div class="pt-0 wrapper-result-tags-and-sort">
            <div class="tags searchingTags_wrapper">
                <?php if($select_search != ''): ?>
                    <span class="tag filterTags" data-field="search_val"
                        data-keyword="<?php echo e($select_search); ?>"><?php echo e($select_search); ?><span class="delete-tag">X</span></span>
                <?php endif; ?>
                <?php if($select_continent > 0): ?>
                    <?php
                        $select_continents = \App\Models\Continent::where('id', $select_continent)->get();
                    ?>
                    <?php $__currentLoopData = $select_continents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $select_continent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="tag filterTags" data-field="continent"
                            data-keyword="<?php echo e($select_continent->id); ?>"><?php echo e($select_continent->name); ?><span
                                class="delete-tag">X</span></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php if($select_country > 0): ?>
                    <?php
                        $select_countries = \App\Models\Country::where('id', $select_country)->get();
                    ?>
                    <?php $__currentLoopData = $select_countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="tag filterTags" data-field="country"
                            data-keyword="<?php echo e($contry->id); ?>"><?php echo e($contry->name); ?><span
                                class="delete-tag">X</span></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php if($select_state > 0): ?>
                    <?php
                        $select_states = \App\Models\State::where('id', $select_state)->get();
                    ?>
                    <?php $__currentLoopData = $select_states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="tag filterTags" data-field="state"
                            data-keyword="<?php echo e($state->id); ?>"><?php echo e($state->name); ?><span
                                class="delete-tag">X</span></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php if($select_city > 0): ?>
                    <?php
                        $select_cities = \App\Models\City::where('id', $select_city)->get();
                    ?>
                    <?php $__currentLoopData = $select_cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="tag filterTags" data-field="city"
                            data-keyword="<?php echo e($city->id); ?>"><?php echo e($city->name); ?><span
                                class="delete-tag">X</span></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <a style="" class="clear-filter">Clear all</a>
            </div>

        </div>
    </div>
</div>

<ul class="list is-flex" style="flex-wrap:wrap">

    <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="school column is-3 is-3-tablet is-12-mobile">
            <div class="card" style="height: 100%;">
                <div class="card-content row is-flex" style="flex-direction: column;align-items: center;">

                    <img src="<?php echo e($university->image_show); ?>"
                        style="margin-right:auto; margin-left:auto; width:80%; height:auto">

                    <h5 class="title has-text-centered has-margin-top-2"
                        style="min-height:3rem;font-size: 1rem; overflow: hidden;margin-bottom: 0px;">
                        <?php echo e($university->name); ?>

                    </h5>
                    
                    <span class="is-hidden city"><?php echo e(@$university->city->name); ?></span>
                    <!-- <p class="school-name-desktop">ZIBS</p> -->
                    
                    <a href="<?php echo e(route('frontend.university_course_list')); ?>?university=<?php echo e(@$university->id); ?>"
                        class="stretched-link"> </a>
                </div>
            </div>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



</ul>

<?php if(@$universities->count() == 0): ?>
    <div class="text-center">
        <h1 style="font-size: 25px">University Not Found !</h1>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/university/ajax-university-filter.blade.php ENDPATH**/ ?>