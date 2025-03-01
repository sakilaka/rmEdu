<div class="column p-0">
    <div class="d-flex justify-content-between">
        <p class="result-search"><?php echo e($courses->total()); ?> Programs Found</p>
        <div class="filters-button">
            <span class="filter-open"><img
                    src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/img/icons/filter.642602b57b41.svg"
                    alt="filters">Filters</span>
            <span class="filter-opened"> <img
                    src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/img/icons/filter.642602b57b41.svg"
                    alt="filters">Close Filters</span>
        </div>
    </div>

    <div class="wrapper-result-tags-and-sort">
        <div class="tags searchingTags_wrapper mb-0">

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
                    <span class="tag filterTags" data-field="contry"
                        data-keyword="<?php echo e($contry->id); ?>"><?php echo e($contry->name); ?><span class="delete-tag">X</span></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if($select_state > 0): ?>
                <?php
                    $select_states = \App\Models\State::where('id', $select_state)->get();
                ?>
                <?php $__currentLoopData = $select_states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="tag filterTags" data-field="state"
                        data-keyword="<?php echo e($state->id); ?>"><?php echo e($state->name); ?><span class="delete-tag">X</span></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if($select_city > 0): ?>
                <?php
                    $select_cities = \App\Models\City::where('id', $select_city)->get();
                ?>
                <?php $__currentLoopData = $select_cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="tag filterTags" data-field="city"
                        data-keyword="<?php echo e($city->id); ?>"><?php echo e($city->name); ?><span class="delete-tag">X</span></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if($selected_degree > 0): ?>
                <?php
                    $selected_degrees = \App\Models\Degree::where('id', $selected_degree)->get();
                ?>
                <?php $__currentLoopData = $selected_degrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $degree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="tag filterTags" data-field="degree"
                        data-keyword="<?php echo e($degree->id); ?>"><?php echo e($degree->name); ?><span class="delete-tag">X</span></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if($selected_language > 0): ?>
                <?php
                    $selected_languages = \App\Models\CourseLanguage::where('id', $selected_language)->get();
                ?>
                <?php $__currentLoopData = $selected_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="tag filterTags" data-field="language"
                        data-keyword="<?php echo e($language->id); ?>"><?php echo e($language->name); ?><span
                            class="delete-tag">X</span></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if($selected_section > 0): ?>
                <?php
                    $selected_section = \App\Models\Section::where('id', $selected_section)->get();
                ?>
                <?php $__currentLoopData = $selected_section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="tag filterTags" data-field="section"
                        data-keyword="<?php echo e($section->id); ?>"><?php echo e($section->name); ?><span
                            class="delete-tag">X</span></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if($selected_subject > 0): ?>
                <?php
                    $selected_subjects = \App\Models\Department::where('id', $selected_subject)->get();
                ?>
                <?php $__currentLoopData = $selected_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="tag filterTags" data-field="subject"
                        data-keyword="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?><span
                            class="delete-tag">X</span></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if($selected_university > 0): ?>
                <?php
                    $selected_university = \App\Models\University::where('id', $selected_university)->get();
                ?>
                <?php $__currentLoopData = $selected_university; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="tag filterTags" data-field="university"
                        data-keyword="<?php echo e($university->id); ?>"><?php echo e($university->name); ?><span
                            class="delete-tag">X</span></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <a style="" class="clear-filter">Clear</a>
        </div>

        <form id="filter-form" method="POST" style="display:none"></form>
    </div>

    <div data-block-id="sort_bar" class="d-none d-md-block">
        <div id="sort_by" aria-label="Sort your results" class="mb-4">
            <ul class="sort_option_list ">
                <li class=" sort_category <?php echo e($course_category == 1 ? 'selected' : ''); ?> sort-score">
                    <a href="#" class="sort_option sort_category_course_list" cat="1"
                        data-category="sort-score" role="button">
                        Our Top Picks
                    </a>
                </li>
                <li class=" sort_category <?php echo e($course_category == 2 ? 'selected' : ''); ?> sort-popular">
                    <a href="#" class="sort_option sort_category_course_list" cat="2"
                        data-category="sort-popular" role="button">
                        Most Popular
                    </a>
                </li>
                <li class=" sort_category <?php echo e($course_category == 3 ? 'selected' : ''); ?> sort-speed">
                    <a href="#" class="sort_option sort_category_course_list" cat="3"
                        data-category="sort-speed" role="button">
                        Fastest Admissions
                    </a>
                </li>
                <li class=" sort_category <?php echo e($course_category == 4 ? 'selected' : ''); ?> sort-rating ">
                    <a href="#" class="sort_option sort_category_course_list" cat="4"
                        data-category="sort-rating" role="button">
                        Highest Rating
                    </a>
                </li>
                <li class=" sort_category <?php echo e($course_category == 5 ? 'selected' : ''); ?> sort-rank ">
                    <a href="#" class="sort_option sort_category_course_list" cat="5"
                        data-category="sort-rank" role="button">
                        Top Ranked
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>

<div class="onSearchResultPage" style="">

    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Search results</title>
    <div id="programsFoundCount" style="display:none"><?php echo e($courses->count()); ?> Programs Found</div>
    <span id="programsfound"></span>
    <div class="show-course-ajax-data-list show-course-paginate-ajax-data">
        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                if (session('partner_ref_id')) {
                    $partnerRef = session('partner_ref_id');
                } elseif (request()->query('partner_ref_id')) {
                    $partnerRef = request()->query('partner_ref_id');
                } else {
                    $partnerRef = null;
                }

                if ($partnerRef) {
                    $apply_url_params = ['id' => $course->id, 'partner_ref_id' => $partnerRef];
                    $course_details_url_params = [
                        'id' => $course->id,
                        'partner_ref_id' => $partnerRef,
                    ];
                    $course_list_url_params = ['partner_ref_id' => $partnerRef];

                    if (session('is_anonymous')) {
                        $apply_url_params['is_anonymous'] = 'true';
                        $course_details_url_params['is_anonymous'] = 'true';
                        $course_list_url_params['is_anonymous'] = 'true';
                    }

                    if (session('is_applied_partner')) {
                        $apply_url_params['is_applied_partner'] = true;
                        $course_details_url_params['is_applied_partner'] = true;
                        $course_list_url_params['is_applied_partner'] = true;
                    }

                    $apply_url = route('apply_cart', $apply_url_params);
                    $course_details_url = route('frontend.course.details', $course_details_url_params);
                    $course_list_url = route('frontend.university_course_list', $course_list_url_params);
                } else {
                    $apply_url = route('apply_cart', [
                        'id' => $course->id,
                    ]);

                    $course_details_url = route('frontend.course.details', [
                        'id' => $course->id,
                    ]);

                    $course_list_url = route('frontend.university_course_list');
                }
            ?>
            <div class="columns">
                <div class="column">
                    <div class="d-flex justify-content-center" style="position: relative;">
                        <div class="choice s-col-11 search-page-list-item">
                            <div class="choice-wrapper" data-url="<?php echo e($course_details_url); ?>">
                                <div class="s-row">
                                    <div class="s-col-9">
                                        <a href="<?php echo e($course_details_url); ?>" class="">
                                            <img style="margin-bottom:25px;"
                                                src="<?php echo e(@$course->university->image_show); ?>">
                                            <h4 class="title mb-1">
                                                <span class="mr-2" style="vertical-align: middle;">
                                                    <?php echo e(strlen($course->name) > 50 ? substr($course->name, 0, 50) . '...' : $course->name); ?>

                                                </span>
                                            </h4>
                                            <p class="school-name-desktop"><?php echo e(@$course->university->name); ?>

                                            </p>
                                            <div class="mobile-title">
                                                <div class="d-flex flex-column">
                                                    <img class="mx-auto" style="margin-bottom:25px"
                                                        src="<?php echo e(@$course->university->image_show); ?>">
                                                    <h4 class="title"
                                                        style="flex-direction: column; align-items: flex-start;">
                                                        <span class="mr-2" style="vertical-align: middle;">
                                                            <?php echo e(strlen($course->name) > 50 ? substr($course->name, 0, 50) . '...' : $course->name); ?>

                                                        </span>
                                                        <p><?php echo e(@$course->university->name); ?></p>
                                                    </h4>
                                                </div>
                                            </div>

                                            <div class="tags">
                                                <span class="">
                                                    <i class="fa fa-map-marker"></i>
                                                    <?php echo e($course->university->address); ?>,
                                                    <?php echo e(@$course->university->continent->name); ?> ,
                                                    <?php echo e(@$course->university->country->name); ?> ,
                                                    
                                                    
                                                </span>

                                                <span><i class="fa fa-comment"></i>
                                                    <?php echo e(@$course->language->name); ?>

                                                </span>
                                            </div>
                                            <div class="wrapper-bullts">
                                                <div class="bulit">
                                                    <div class="title">Next Start Date</div>
                                                    <div class="value">
                                                        <?php echo e(date('d M Y', strtotime(@$course->next_start_date))); ?>

                                                    </div>
                                                </div>
                                                <div class="bulit">
                                                    <div class="title">Yearly Tuition</div>
                                                    <div class="value"> <span
                                                            class="money">$<?php echo e(format_price(@$course->year_fee)); ?></span>
                                                    </div>
                                                </div>

                                                <div class="bulit">
                                                    <div class="title">Duration</div>
                                                    <div class="value"><?php echo e(@$course->course_duration); ?> Year
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="d-none d-md-block s-col-3 search-page-list-item-bottom">
                                        <div class="wrapper-bullts call-to-action justify-content-center">
                                            <div class="bulit">
                                                <div class="title">Application Deadline</div>
                                                <div class="value">
                                                    <?php echo e(date('d M Y', strtotime(@$course->application_deadline))); ?>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mb-2">
                                            <section class="apply__action d-flex justify-content-center">
                                                <button class="ca-button btn-primary-bg justify-content-center">
                                                    <a href="<?php echo e($apply_url); ?>" class="text-white">Apply
                                                        Now</a>
                                                </button>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if(@$courses->count() == 0): ?>
            <div class="text-center">
                <h1 style="font-size: 25px">Program Not Found !</h1>
            </div>
        <?php endif; ?>
    </div>

    
    <style>
        .pagination-link {
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
    <div class="columns">
        <?php if($courses->lastPage() != 1): ?>
            <div class="column" onclick="window.scrollTo(0, 0);">
                <nav class="pagination" role="navigation" aria-label="pagination" style="padding-left: 15px;">
                    <div class="pagination">
                        <a page_no="<?php echo e($courses->currentPage() == 1 ? 1 : $courses->currentPage() - 1); ?>"
                            class="page-link course-paginate next_page next pagination-link" href="javascript:void(0)"
                            aria-label="Previous"> &laquo;</a>

                        <?php for($i = 1; $i <= $courses->lastPage(); $i++): ?>
                            <a class="pagination-link course-paginate page current <?php if($i == $courses->currentPage()): ?> is-current <?php endif; ?>"
                                page_no="<?php echo e($i); ?>" <?php if($i == $courses->currentPage()): ?>  <?php endif; ?>
                                href="javascript:void(0)"><?php echo e($i); ?></a>
                        <?php endfor; ?>

                        <a page_no="<?php echo e($courses->currentPage() == $courses->lastPage() ? $courses->lastPage() : $courses->currentPage() + 1); ?>"
                            class="page-link course-paginate next_page next pagination-link" href="javascript:void(0)"
                            aria-label="Next"> &gt;</a>
                    </div>
                </nav>
            </div>
        <?php endif; ?>
    </div>

</div>
<?php /**PATH /home/rmintern/public_html/resources/views/Frontend/university/course_list_ajax.blade.php ENDPATH**/ ?>