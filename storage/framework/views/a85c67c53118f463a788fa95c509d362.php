<?php $__env->startSection('title', '- Program list'); ?>
<?php $__env->startSection('head'); ?>
    <link rel="stylesheet"
        href="<?php echo e(asset('frontend/application/modules/frontend/views/themes/default/assets/css/select2.min.css')); ?>">
    <link href="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/css/china_admission.css"
        rel="stylesheet">
    <style type="text/css">
        .social a {
            display: inline-block;
            width: 27px;
            height: 27px;
            border-radius: 50%;
            margin: 5px 5px 0 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: initial;
            flex-direction: row;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #fff;
        }

        .scroll-top {
            width: auto !important;
            height: auto !important;
            position: fixed !important;
            bottom: 100px;
            right: 20px !important;
            display: none;
            padding: .5rem 1rem !important;
            font-size: 1.25rem !important;
            line-height: 1.5 !important;
            border-radius: .3rem !important;
            background: #E02200 !important;
            color: #fff !important;
            z-index: 999;
        }

        #secondary-nav {
            font-family: 'Lato', sans-serif !important;
        }

        #secondary-nav .navbar-nav>.nav-item>a {
            border-top: 3px solid transparent;
            display: inline-block;

        }

        #secondary-nav .navbar-nav>.nav-item {
            display: inline-block;
            padding-right: 35px;
        }


        #secondary-nav .navbar-nav>.nav-item>a:hover {
            color: #e10707 !important;
            border-color: #e10707 !important;
        }


        #secondary-nav {
            padding-top: 1px;
            border: 1px solid #e5e5e5;
        }

        #secondary-nav li a:hover {
            text-decoration: underline !important;
        }

        #secondary-nav li>.sub-menu .nav-item:hover {
            background: #f8f8f8;
            color: #333;
        }

        #secondary-nav>li a:hover {
            color: #e10707;
            text-decoration: underline !important;
        }

        .success {
            display: none;
            color: #28a745;
            font-weight: 400;
            text-align: center;
        }

        .top-nav a {
            color: #4a4a4a !important;
        }

        #secondary-nav .nav-item {
            font-family: Lato, sans-serif;
            font-weight: 400;
            font-size: 16px;
            display: inline-block;
        }

        .nav-item .nav-ca:hover {
            color: #e10707 !important;
            background: #fff;
            font-weight: 600;
            border-radius: 5px;
            -webkit-transition: all 0.2s;
            -moz-transition: all 0.2s;
            transition: all 0.2s;
        }

        #secondary-nav .sub-menu a {
            border-bottom: 1px solid #dcdadb;
            padding: 7px 20px;
            color: #333;
            font-family: Lato;
            font-weight: 400;
            font-size: 14px;
            line-height: 1.25;
            height: auto;
        }

        @media screen and (max-width: 800px) {
            .menu-content {
                background-color: #fff !important;
            }

            .nav-ca,
            .nav-link,
            .nav-link span,
            .nav-link i {
                color: #4a4a4a !important;
            }
        }

        @media (max-width: 800px) {
            .navbar .container {
                max-width: 100%;
            }
        }

        .custom-select {

            background: #f3f3f3 url("/static/assets/img/dropdownicon.svg") no-repeat right .75rem center;
            background-image: none\9;
            background-size: 8px 10px;
            border: 1px solid rgba(0, 0, 0, .15);

        }


        /* remove flicker on slider initial load */
        sp-no-js {
            visibility: hidden;
        }

        @media (max-width: 767px) {
            .siq_bR {
                bottom: 120px !important;
                right: 20px !important;
            }

            .scroll-top {
                bottom: 200px;
            }
        }

        .zsiq_custommain,
        .zsiq_floatmain {
            z-index: 999 !important;
        }

        #quiz-modal {
            z-index: 99999;
        }

        .i-review-input-checkbox+label,
        .i-review-input-radio+label {
            font-size: 12px;
        }

        .next-step {
            -webkit-font-smoothing: antialiased;
            letter-spacing: 0.04em;
            display: inline-block;
            position: relative;
            height: 36px;
            padding: 0 16px;
            border: none;
            border-radius: 2px;
            outline: none;
            font-size: 14px;
            font-weight: 600;
            line-height: 36px;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            color: #ffffff;
            background: #d71f27;
        }


        .delete {
            position: absolute;
            right: 0;
            top: -15px;
            padding: 10px;
        }

        .delete .close:hover {
            color: #d71f27;
        }

        .cart-itemList .item .mainContentArea .spec {
            color: #212529
        }

        .program .item .mainContentArea .spec {
            color: #212529
        }

        .itemPool {
            text-align: center;
            padding-bottom: 100px;
        }

        .item {
            position: relative;
            background-color: #ffffff;
            margin: 0 auto 20px;
            border-radius: 5px;
            padding: 2% 3%;
            cursor: pointer;
            text-align: left;
            overflow: hidden;
            min-height: 95px;
        }

        .item a {
            color: #212529
        }

        .item .uniLogo {
            margin: 10px 15px 10px 0;
        }


        .item .mainContentArea .title {
            font-size: 1.5rem;
            font-weight: 700;
            padding-top: 8px;
            line-height: 1.5rem;
        }

        .item .mainContentArea .spec {
            font-size: .8rem;
            margin-bottom: 10px;
            margin-top: 5px;
        }

        .item .mainContentArea .spec span {
            color: #212529
        }

        .item .mainContentArea .details {
            display: block;
        }

        .item .mainContentArea .details .detail {
            display: inline-block;
            vertical-align: top;
            margin: 5px 20px 0 0;
        }

        .item .mainContentArea .details .detail .name {
            color: #212529;
            font-size: .6rem;
        }

        .item .mainContentArea .details .detail .number {
            font-size: 1.3rem;
            font-weight: 700;
            display: inline-block;
            text-transform: uppercase;
        }

        .item .mainContentArea .details .detail .unit {
            font-size: .5rem;
            display: inline-block;
        }

        .item .mainContentArea .details .detail .year {
            font-size: .8rem;
            font-weight: 700;
            display: inline-block;
        }

        .item .actionArea {
            background-color: #fafafa;
            width: 200px;
            height: 100%;
            position: absolute;
            right: 0;
            top: 0;
            text-align: center;
        }

        .item .actionArea .deadline {
            color: #212529;
            font-size: .8rem;
            margin: 15px auto 5px;
        }

        .item .actionArea .deadline .date {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .item .actionArea .button {
            display: inline-block;
        }

        #cart-modal {
            z-index: 99999;
        }
    </style>

    <style>
        @media (max-width: 767px) {
            .siq_bR {
                bottom: 120px !important;
                right: 20px !important;
            }

            .scroll-top {
                bottom: 200px;
            }
        }

        .zsiq_custommain,
        .zsiq_floatmain {
            z-index: 999 !important;
        }
    </style>

    <style>
        #header {
            height: 56px;
            width: 100%;
            display: flex;
            background-color: #d71f27;
            padding-right: 1.5em;
        }

        #header nav {
            background-color: #d71f27;
            height: 56px;
        }

        #header img {
            height: 56px;
        }

        #header .right-nav {
            justify-content: flex-end;
            display: flex;
            align-items: center;
            width: auto;
            flex-shrink: 0;
        }

        ul.dropdown {
            display: none;
            position: absolute;
            top: 6%;
            right: 0;
            margin-top: .5em;
            background: #ffffff;
            min-width: 12em;
            padding: 0;
            border-radius: 0 0 .2em .2em;
        }

        ul.dropdown li {
            list-style-type: none;
        }

        ul.dropdown li a {
            text-decoration: none;
            padding: .5em 1em;
            display: block;
            color: #484848
        }

        ul.toggle {
            top: 80%;
        }

        .mr-2,
        .mx-2 {
            margin-right: .5rem !important
        }

        .is-hidden-mobile .right-nav .mdc-button {
            color: white;
            flex-shrink: 0;
        }

        .tags .tag {
            background-color: var(--secondary_background);
        }

        #sort_by .sort_option_list,
        #sort_by .sort_option_sublist {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        #sort_by {
            position: relative;
            margin: 10px 0;
        }

        #sort_by .sort_label {
            cursor: default
        }

        #sort_by .sort_option_list {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            font-size: 14px !important;
        }


        #sort_by .sort_category {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            display: inline-block;
            font-size: 14px !important;
            font-weight: normal;
            position: relative;
            padding: 0;
            border-radius: 8px;
            margin: 0 8px;
            background-color: #fff;
            transition: 0.4s ease-in-out;
            box-shadow: 1px 4px 20px -18px rgb(120 200 159);
        }

        #sort_by .sort_category:first-child {
            margin-left: 0;
        }

        #sort_by .sort_category:last-child {
            margin-right: 0;
        }

        #sort_by .sort_option,
        #sort_by .deal-container {
            background: 0;
            border-radius: 8px;
            color: #4a4a4a;
            display: block;
            font-size: 14px;
            font-weight: normal;
            line-height: 27px;
            outline: 0;
            padding: 7px;
            text-align: center;
            text-decoration: none;
            white-space: nowrap
        }

        #sort_by .sort_option:hover {
            background-color: #fafcff
        }

        #sort_by .sort_option>i.b-sprite,
        #sort_by .sort_option>.bui__down_orange {
            display: inline-block;
            margin: 0;
            position: static;
            vertical-align: middle
        }

        #sort_by .sort_category.selected {
            background: var(--secondary_background);
        }

        #sort_by .sort_category.selected .sort_option,
        #sort_by .sort_category.selected .deal-container {
            color: #fff;
            font-weight: bold;
        }

        #sort_by .sort_category.selected .sort_option:hover {
            background-color: var(--secondary_background)
        }

        #sort_by .sort_option_sublist {
            background-color: #fff;
            border-radius: .3em;
            border: 1px solid #c2c2c2;
            padding: .5em 0;
            position: absolute;
            top: 22px;
            width: 100%;
            z-index: 1000;
            text-align: center
        }

        #sort_by .sort_option_sublist_title {
            color: #333;
            display: block;
            font-size: 13px;
            font-weight: bold;
            margin: 5px 0 3px 0;
            padding: 0 0 0 5px;
            white-space: nowrap
        }

        #sort_by .sort_suboption {
            color: #6c757d;
            display: block;
            font-size: 11px;
            font-weight: normal;
            outline: 0;
            padding: .2em .5em .4em;
            text-align: center;
            text-decoration: none;
            white-space: nowrap
        }


        #sort_by .sort_suboption:hover {
            background-color: var(--secondary_background);
            color: #fff;
        }

        #sort_by .sort_option_sublist .selected .sort_suboption {
            background-color: var(--secondary_background);
            color: #fff;
        }

        #sort_by .sort_more_options {
            border-top: 1px solid #6c757d;
            -webkit-box-flex: 0;
            -webkit-flex-grow: 0;
            -ms-flex-positive: 0;
            flex-grow: 0;
            padding: 0;
            position: relative;
            text-align: center;
            width: 30px
        }

        #sort_by .sort_more_options__button {
            background: transparent;
            border: 0;
            cursor: pointer;
            margin: 0;
            padding: 0;
            width: 100%
        }

        #sort_by .sort_more_options__dropdown {
            background: #fff;
            border-radius: 0 0 3px 3px;
            border: 1px solid #6c757d;
            display: none;
            padding: 0;
            position: absolute;
            right: -1px;
            top: 100%;
            z-index: 2
        }

        #sort_by .sort_more_options__dropdown:after {
            background: #fff;
            border-right: 1px solid #6c757d;
            border-bottom: 1px solid #6c757d;
            content: '';
            height: 2px;
            position: absolute;
            right: -1px;
            top: -3px;
            width: 2px
        }

        #sort_by .sort_more_options__button:hover~.sort_more_options__dropdown:after {
            background: #fafcff
        }

        #sort_by .sort_more_options__dropdown.is-visible,
        #sort_by .sort_more_options__dropdown.is-visible {
            display: block
        }

        #sort_by .sort_more_options__dropdown .sort_category {
            border: 0;
            height: 28px;
            width: 100%
        }

        #sort_by .sort_more_options__dropdown .sort_option {
            text-align: right
        }

        #sort_by .sort_more_options__dropdown .sort_option_sublist {
            left: auto;
            line-height: 1.2;
            -webkit-transform: none;
            -ms-transform: none;
            transform: none;
            right: 4px
        }

        #sort_by .sort_more_options__dropdown .sort_suboption {
            text-align: right
        }

        #sort_by .sort_option:focus,
        #sort_by .sort_suboption:focus {
            position: relative;
            z-index: 1
        }

        #sort_by .review_score .sort_option_sublist_title,
        #sort_by .sort_score .sort_option_sublist_title {
            color: #333;
            font-size: 12px;
            font-weight: normal;
            margin: 0;
            padding: .2em .5em .4em
        }

        .sort_category.sort-score {
            border-radius: 4px 0px 0px 4px;
        }

        .with_dd.sort_class.sort_category {
            border-radius: 0px 4px 4px 0px;
        }

        .accending-sort {
            transform: rotate(180deg);
        }

        .discipline-container {
            display: grid;
            grid-gap: 10px;
            grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
        }

        .discipline {
            padding: 1em;
            margin: 5px;
            text-align: center;
            box-sizing: border-box;
            overflow: hidden;
            box-shadow: rgb(99 99 99 / 20%) 0px 2px 8px;
            height: 200px !important;
        }

        .discipline img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .search-page-header {
            border-bottom: solid 1px #c2c2c2;
            border-top: solid 1px #c2c2c2;
        }

        .slick-next:before,
        .slick-prev:before {
            color: #6c757d !important;
            font-size: 25px !important;
        }

        .slick-arrow {
            margin-top: -10px !important;
        }

        .slick-prev {
            display: none !important;
        }

        .slick-arrow.slick-next {
            right: 0px;
        }

        @media screen and (max-width: 768px) {
            .why-ca-card {
                min-width: 240px !important
            }
        }
    </style>

    <style>
        .column.is-3 {
            background-color: #edf3ff9c;
            height: fit-content;
            border-radius: 10px;
            padding: 10px 20px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
    <?php if(
        !(Route::currentRouteName() == 'frontend.apply_now' ||
            (session('is_anonymous') == 'true' &&
                request()->has('partner_ref_id') &&
                !is_null(request()->query('partner_ref_id')))
        )): ?>
        <?php
            $marginTop = 'mt-5';
            $paddingTop = 'pt-5';
        ?>
    <?php else: ?>
        <?php
            $marginTop = 'mt-0';
            $paddingTop = 'pt-0';
        ?>
    <?php endif; ?>
    <section class="section wrapper-search-page search-results <?php echo e($marginTop . ' ' . $paddingTop); ?>">
        <div class="container mt-5 ajax-course-show">
            <div class="columns">
                <div class="column is-3">
                    <div class="wrapper-filters" style="display: block;">
                        <div class="toggle-header">
                            <h4 class="title is-5" style="color: var(--secondary_background); font-weight:bold">
                                Filter Universities
                            </h4>
                        </div>

                        <div class="my-2">
                            <div class="toggle-header" data-filterslist="degree">
                                <h5 class="title is-5">Degree</h5>
                                <div class="toggle-icon" style="transform: rotate(-45deg);"></div>
                            </div>
                            <div class="toggle-content" data-filters="degree">
                                <select name="degree" class="form-control select2_form_select" style="width: 90%;">
                                    <option value="">Select Degree</option>
                                    <?php $__currentLoopData = $degrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $degree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($degree->id); ?>"
                                            <?php echo e(request()->get('degree') == $degree->id ? 'selected' : ''); ?>>
                                            <?php echo e($degree->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="my-2">
                            <div class="toggle-header" data-filterslist="language">
                                <h5 class="title is-5">Language</h5>
                                <div class="toggle-icon" style="transform: rotate(-45deg);"></div>
                            </div>
                            <div class="toggle-content" data-filters="language">
                                <select name="language" class="form-control select2_form_select" style="width: 90%;">
                                    <option value="">Select Language</option>
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($language->id); ?>"
                                            <?php echo e(request()->get('language') == $language->id ? 'selected' : ''); ?>>
                                            <?php echo e($language->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="my-2">
                            <div class="toggle-header" data-filterslist="department">
                                <h5 class="title is-5">Department</h5>
                                <div class="toggle-icon" style="transform: rotate(-45deg);"></div>
                            </div>
                            <div class="toggle-content" data-filters="department">
                                <select name="department" class="form-control select2_form_select" style="width: 90%;">
                                    <option value="">Select Department</option>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($department->id); ?>"
                                            <?php echo e(request()->get('department') == $department->id ? 'selected' : ''); ?>>
                                            <?php echo e($department->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="my-2">
                            <div class="toggle-header" data-filterslist="session">
                                <h5 class="title is-5">Session</h5>
                                <div class="toggle-icon" style="transform: rotate(135deg);"></div>
                            </div>
                            <div class="toggle-content" data-filters="session" style="display: none">
                                <select name="session" class="form-control select2_form_select" style="width: 90%;">
                                    <option value="">Select Session</option>
                                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($session->id); ?>"
                                            <?php echo e(request()->get('session') == $session->id ? 'selected' : ''); ?>>
                                            <?php echo e($session->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="my-2">
                            <div class="toggle-header" data-filterslist="continent">
                                <h5 class="title is-5">Continent</h5>
                                <div class="toggle-icon" style="transform: rotate(135deg);"></div>
                            </div>
                            <div class="toggle-content" data-filters="continent" style="display: none">
                                <select name="continent" class="form-control select2_form_select" style="width: 90%;">
                                    <option value="">Select Continent</option>
                                    <?php $__currentLoopData = $continents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $continent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($continent->id); ?>"
                                            <?php echo e(request()->get('continent') == $continent->id ? 'selected' : ''); ?>>
                                            <?php echo e($continent->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="my-2">
                            <div class="toggle-header" data-filterslist="country">
                                <h5 class="title is-5">Country</h5>
                                <div class="toggle-icon" style="transform: rotate(135deg);"></div>
                            </div>
                            <div class="toggle-content" data-filters="country" style="display: none">
                                <select name="country" class="form-control select2_form_select" style="width: 90%;">
                                    <option value="">Select Country</option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$country->id); ?>"
                                            <?php echo e(request()->get('country') == $country->id ? 'selected' : ''); ?>>
                                            <?php echo e(@$country->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="column is-9">
                    <?php echo $__env->make('Frontend.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="all_courses_container">
                        <div class="column p-0">
                            <div class="d-flex justify-content-between">
                                <p class="result-search"><?php echo e($universities->total()); ?> Universities Found</p>
                                <div class="filters-button"></div>
                            </div>

                            <div class="wrapper-result-tags-and-sort">
                                <div class="tags searchingTags_wrapper mb-0">
                                    <a href="<?php echo e(route('frontend.university_course_list')); ?>" class="clear-filter" onclick="console.log('Clicked')">Clear</a>
                                </div>

                            </div>
                        </div>

                        <div class="onSearchResultPage">
                            <div id="programsFoundCount" style="display:none"><?php echo e($universities->count()); ?> Universities
                                Found
                            </div>
                            <span id="programsfound"></span>
                            <div class="show-course-ajax-data-list show-course-paginate-ajax-data">
                                <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $university_details_url = route('frontend.university_details', [
                                            'id' => $university->id,
                                        ]);
                                    ?>

                                    <div class="columns">
                                        <div class="column">
                                            <div class="d-flex justify-content-center" style="position: relative;">
                                                <div class="choice s-col-11 search-page-list-item">
                                                    <div class="choice-wrapper" data-url="<?php echo e($university_details_url); ?>">

                                                        <div class="s-row">
                                                            <div class="s-col-9">
                                                                <a href="<?php echo e($university_details_url); ?>" class="">
                                                                    <img style="margin-bottom:25px"
                                                                        src="<?php echo e($university->image_show); ?>">
                                                                    <h4 class="title mb-1">
                                                                        <span class="mr-2"
                                                                            style="vertical-align: middle;">
                                                                            <?php echo e(strlen($university->name) > 50 ? substr($university->name, 0, 50) . '...' : $university->name); ?>

                                                                        </span>
                                                                    </h4>

                                                                    <p class="fw-bold"><?php echo e($university->courses_count); ?> programs</p>

                                                                    <p class="school-name-desktop">
                                                                        <div class="mobile-title">
                                                                            <div class="d-flex flex-column">
                                                                                <img class="mx-auto"
                                                                                    style="margin-bottom:25px"
                                                                                    src="<?php echo e($university->image_show); ?>">
                                                                                <h4 class="title"
                                                                                    style="flex-direction: column; /* align-items: flex-start; */">
                                                                                    <span class="mr-2 text-center"
                                                                                        style="vertical-align: middle;">
                                                                                    </span>
                                                                                    <p><?php echo e($university->name); ?></p>
                                                                                </h4>
                                                                            </div>
                                                                        </div>

                                                                        <div class="tags">
                                                                            <span class="">
                                                                                <i class="fa fa-map-marker"></i>
                                                                                <?php echo e(strlen($university->address ?? '') > 20 ? substr($university->address, 0, 20) . '...' : $university->address ?? ''); ?>,
                                                                                <?php echo e($university->continent->name); ?> ,
                                                                                <?php echo e($university->country->name); ?> ,
                                                                            </span>
                                                                            <span>
                                                                                <i class="fa fa-comment"></i>
                                                                                <?php echo e($university->language?->name); ?>

                                                                            </span>
                                                                        </div>

                                                                        <div class="wrapper-bullts">
                                                                            <div class="bulit">
                                                                                <div class="title">Next Start Date</div>
                                                                                <div class="value">
                                                                                    <?php echo e(date('d M Y', strtotime($university->next_start_date))); ?>

                                                                                </div>
                                                                            </div>
                                                                            <div class="bulit">
                                                                                <div class="title">Yearly Tuition</div>
                                                                                <div class="value"> <span
                                                                                        class="money">$<?php echo e(format_price($university->year_fee)); ?></span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="bulit">
                                                                                <div class="title">Duration</div>
                                                                                <div class="value">
                                                                                    <i class="fa fa-clock"></i>
                                                                                    <?php echo e($university->course_duration); ?> Year
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                </a>
                                                            </div>

                                                            <div
                                                                class="d-none d-md-block s-col-3 search-page-list-item-bottom">

                                                                <div
                                                                    class="wrapper-bullts call-to-action justify-content-center">
                                                                    <div class="bulit">
                                                                        <div class="title">Application Deadline</div>
                                                                        <div class="value text-danger"
                                                                            style="<?php echo e(strtotime($university->app_deadline) < strtotime(now()) ? 'text-decoration: line-through;' : ''); ?>">
                                                                            <?php echo e(date('d M Y', strtotime($university->app_deadline))); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="<?php echo e(route('frontend.university_details', $university->id)); ?>"
                                                    class=""></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if(@$universities->count() == 0): ?>
                                    <div class="text-center">
                                        <h1 style="font-size: 25px">University Not Found !</h1>
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
                                <?php if($universities->lastPage() != 1): ?>
                                    <div class="column">
                                        <nav class="pagination" role="navigation" aria-label="pagination"
                                            style="padding-left: 15px;">
                                            <div class="pagination">
                                                <a page_no="<?php echo e($universities->currentPage() == 1 ? 1 : $universities->currentPage() - 1); ?>"
                                                    class="page-link course-paginate next_page next pagination-link"
                                                    href="javascript:void(0)" aria-label="Previous"> &laquo;</a>

                                                <?php for($i = 1; $i <= $universities->lastPage(); $i++): ?>
                                                    <a class="pagination-link course-paginate page current <?php if($i == $universities->currentPage()): ?> is-current <?php endif; ?>"
                                                        page_no="<?php echo e($i); ?>"
                                                        <?php if($i == $universities->currentPage()): ?>  <?php endif; ?>
                                                        href="javascript:void(0)"><?php echo e($i); ?></a>
                                                <?php endfor; ?>

                                                <a page_no="<?php echo e($universities->currentPage() == $universities->lastPage() ? $universities->lastPage() : $universities->currentPage() + 1); ?>"
                                                    class="page-link course-paginate next_page next pagination-link"
                                                    href="javascript:void(0)" aria-label="Next"> &gt;</a>
                                            </div>
                                        </nav>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('backend/assets/js/select2.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('.select2_form_select').select2();
        });
        $(document).ready(function() {
            // Function to handle filter changes
            function applyFilters() {
                var degree = $('select[name="degree"]').val();
                var language = $('select[name="language"]').val();
                var department = $('select[name="department"]').val();
                var session = $('select[name="session"]').val();
                var continent = $('select[name="continent"]').val();
                var country = $('select[name="country"]').val();

                $.ajax({
                    url: "<?php echo e(route('frontend.university_course_list')); ?>",
                    type: "GET",
                    data: {
                        degree: degree,
                        language: language,
                        department: department,
                        session: session,
                        continent: continent,
                        country: country
                    },
                    success: function(response) {
                        // Update the university list with the filtered results
                        $('.all_courses_container').html($(response).find('.all_courses_container')
                            .html());
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            // Attach the filter function to the change event of the select elements
            $('select[name="degree"], select[name="language"], select[name="department"], select[name="session"], select[name="continent"], select[name="country"]')
                .change(function() {
                    applyFilters();
                });
        });

        $(document).on('click', '.course-paginate', function(e) {
            e.preventDefault();
            var page = $(this).attr('page_no');

            $.ajax({
                url: "<?php echo e(route('frontend.university_course_list')); ?>?page=" + page,
                type: "GET",
                success: function(response) {
                    $('.all_courses_container').html($(response).find('.all_courses_container').html());
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        // $(document).on('click', '.clear-filter', function(e) {
        //     e.preventDefault();
        //     $('select').val('');
        //     applyFilters();
        // });
    </script>


    <script type="text/javascript">
        try {
            ! function(n) {
                n.fn.drizzle = function(t) {
                    const i = ["asc", "desc"];
                    var e = n.extend({
                            child: ".child"
                        }, t),
                        c = n(e.child),
                        o = function() {
                            n(e.child).show()
                        },
                        r = function() {
                            n(e.child).hide()
                        };
                    return {
                        filter: function(t) {
                            if ("function" != typeof t) {
                                r();
                                var i = e.child + "" + t;
                                "*" !== t ? n(i).show() : this.rain()
                            } else t.call(this)
                        },
                        sort: function(t, o) {
                            if ("function" != typeof f && "function" != typeof o) {
                                var r = n(e.child).parent(),
                                    f = "asc";
                                o && o.order && (f = i.indexOf(o.order) ? o.order : "asc"), c.sort(function(i, e) {
                                    var c, r;
                                    return t ? (c = n(i).find(t).text(), r = n(e).find(t).text()) : (c = n(
                                        i).text(), r = n(e).text()), o && !0 === o.isNumber && (c =
                                        Number(c), r = Number(r)), c > r ? 1 : c < r ? -1 : 0
                                }), "desc" == f && (c = Object.assign([], c).reverse()), r.html(c)
                            } else "function" == typeof f && f.call(this), "function" == typeof o && type.call(this)
                        },
                        init: function() {
                            o()
                        },
                        rain: function() {
                            o()
                        },
                        unfilter: function() {
                            o()
                        },
                        dry: function() {
                            r()
                        },
                        erase: function() {
                            r()
                        },
                        destroy: function() {
                            r()
                        }
                    }
                }
            }(jQuery)
        } catch (n) {
            console.log("Caught an error", n)
        }

        $(document).ready(function() {
            $('#mobile-search').change(function() {
                $('#search-input').val($(this).val());
            });
            $('#mobile-search').on('keypress', function(e) {
                if (e.which === 13) {
                    $(this).attr("disabled", "disabled");
                    $('#applyFilter').click();
                    $(this).removeAttr("disabled");
                }
            });
            $('#mobile-search').click(function() {
                $('#applyFilter').click();
            })

            //filter toggle
            $(".filter-open").on("click", function() {
                if (window.innerWidth < 768) {
                    $(".wrapper-filters").css({
                        display: "block"
                    });
                    $(this).css({
                        display: "none"
                    });
                    $(".filter-opened").css({
                        display: "inline"
                    });
                }
            });

            $(".filter-opened").on("click", function() {
                if (window.innerWidth < 768) {
                    $(".wrapper-filters").css({
                        display: "none"
                    });
                    $(this).css({
                        display: "none"
                    });
                    $(".filter-open").css({
                        display: "inline"
                    });
                }
            });

            $(window).resize(function() {
                if (window.innerWidth >= 768) {
                    $(".wrapper-filters").css({
                        display: "block"
                    });
                }
            });

            $(".with_dd").on('click', function() {
                $(".sort_option_sublist").toggleClass("d-none")
                $(this).addClass("selected")
            });
            $(".sort_suboption_outer").on('click', function() {
                $(".sort_suboption_outer").removeClass("selected");
                $(this).addClass("selected");
            });

            //Eligibility
            var quizParams = ['age', 'edu_lvl', 'grade', 'hsk', 'ielts'];
            var hasParams = new RegExp(quizParams.join('|')).test(location.search);
            var preferences;
            if (Cookies.get("jwt") != undefined) {
                getPreference().then((response) => {
                    preferences = response.data;
                    if (response.data["search_quiz_data"] != undefined) {
                        if (hasParams)
                            $(".eligibility").val("search-eligible");
                        $(".has-auth").removeClass("d-none");
                    } else {
                        $(".has-no-auth").removeClass("d-none");
                    }
                })
            } else {
                $(".eligibility").val("not-set");
                $(".has-no-auth").removeClass("d-none");
            }

            $(".eligibility").on("change", function() {
                var option = $(this).val();
                if (option == "take-quiz")
                    showQuiz();
                else if (option == "not-set")
                    window.location = removeQuizParameters();
                else if (option == "search-eligible") {
                    preferences.search_quiz_data.replace('hks_lvl', 'hsk');
                    preferences.search_quiz_data.replace('ielts_lvl', 'ielts');
                    window.location.search = window.location.search + "&" + preferences.search_quiz_data
                        .split("/search/?")[1];
                } else if (option == "go-to-profile")
                    window.location = "/account/profile"
            })
        });

        //Sort subjects on the sidebar alphabetically
        var instance = $('#subjects').drizzle({
            child: '.subject' // child element
        });
        instance.sort('[data-value]', {
            order: 'asc'
        });


        //Sort bar
        var sortOption = "sort"
        var sort_categories = $('.sort_category')
        sort_categories.on('click', function() {
            if ($(this).find(".sort_option").data("category") != undefined) {
                sortOption = ($(this).find(".sort_option").data("category"));
            }
            sort_categories.removeClass("selected");
            if ($(this).hasClass("with_dd") == false) {
                $('#applyFilter').click();
            }
            $(this).addClass("selected")
        });

        $(document).on("click", ".toggle-header", function() {
            var vm = this,
                filterslistItem = $(vm).data();

            if (
                $(
                    ".toggle-content[data-filters=" + filterslistItem.filterslist + "]"
                ).css("display") == "none"
            ) {
                $(
                    ".toggle-content[data-filters=" + filterslistItem.filterslist + "]"
                ).css("display", 'block');

                $(vm)
                    .find(".toggle-icon")
                    .css({
                        transform: "rotate(-45deg)"
                    });
            } else {
                $(".toggle-content[data-filters=" + filterslistItem.filterslist + "]")
                    .css("display", 'none');
                $(vm).find(".toggle-icon")
                    .css({
                        transform: "rotate(135deg)"
                    });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/university/university_course_list.blade.php ENDPATH**/ ?>