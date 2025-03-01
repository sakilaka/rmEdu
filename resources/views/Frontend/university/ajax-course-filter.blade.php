<div class="column p-0">
    <div class="d-flex justify-content-between">
        <p class="result-search">{{ $courses->total() }} Programs Found</p>
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

            @if ($select_continent > 0)
                @php
                    $select_continents = \App\Models\Continent::where('id', $select_continent)->get();
                @endphp
                @foreach ($select_continents as $select_continent)
                    <span class="tag filterTags" data-field="continent"
                        data-keyword="{{ $select_continent->id }}">{{ $select_continent->name }}<span
                            class="delete-tag">X</span></span>
                @endforeach
            @endif

            @if ($select_country > 0)
                @php
                    $select_countries = \App\Models\Country::where('id', $select_country)->get();
                @endphp
                @foreach ($select_countries as $contry)
                    <span class="tag filterTags" data-field="contry"
                        data-keyword="{{ $contry->id }}">{{ $contry->name }}<span class="delete-tag">X</span></span>
                @endforeach
            @endif

            @if ($select_state > 0)
                @php
                    $select_states = \App\Models\State::where('id', $select_state)->get();
                @endphp
                @foreach ($select_states as $state)
                    <span class="tag filterTags" data-field="state"
                        data-keyword="{{ $state->id }}">{{ $state->name }}<span class="delete-tag">X</span></span>
                @endforeach
            @endif

            @if ($select_city > 0)
                @php
                    $select_cities = \App\Models\City::where('id', $select_city)->get();
                @endphp
                @foreach ($select_cities as $city)
                    <span class="tag filterTags" data-field="city"
                        data-keyword="{{ $city->id }}">{{ $city->name }}<span class="delete-tag">X</span></span>
                @endforeach
            @endif

            @if ($selected_degree > 0)
                @php
                    $selected_degrees = \App\Models\Degree::where('id', $selected_degree)->get();
                @endphp
                @foreach ($selected_degrees as $degree)
                    <span class="tag filterTags" data-field="degree"
                        data-keyword="{{ $degree->id }}">{{ $degree->name }}<span class="delete-tag">X</span></span>
                @endforeach
            @endif

            @if ($selected_language > 0)
                @php
                    $selected_languages = \App\Models\CourseLanguage::where('id', $selected_language)->get();
                @endphp
                @foreach ($selected_languages as $language)
                    <span class="tag filterTags" data-field="language"
                        data-keyword="{{ $language->id }}">{{ $language->name }}<span
                            class="delete-tag">X</span></span>
                @endforeach
            @endif

            @if ($selected_section > 0)
                @php
                    $selected_section = \App\Models\Section::where('id', $selected_section)->get();
                @endphp
                @foreach ($selected_section as $section)
                    <span class="tag filterTags" data-field="section"
                        data-keyword="{{ $section->id }}">{{ $section->name }}<span
                            class="delete-tag">X</span></span>
                @endforeach
            @endif

            @if ($selected_subject > 0)
                @php
                    $selected_subjects = \App\Models\Department::where('id', $selected_subject)->get();
                @endphp
                @foreach ($selected_subjects as $subject)
                    <span class="tag filterTags" data-field="subject"
                        data-keyword="{{ $subject->id }}">{{ $subject->name }}<span
                            class="delete-tag">X</span></span>
                @endforeach
            @endif

            @if ($selected_university > 0)
                @php
                    $selected_university = \App\Models\University::where('id', $selected_university)->get();
                @endphp
                @foreach ($selected_university as $university)
                    <span class="tag filterTags" data-field="university"
                        data-keyword="{{ $university->id }}">{{ $university->name }}<span
                            class="delete-tag">X</span></span>
                @endforeach
            @endif

            <a style="" class="clear-filter">Clear</a>
        </div>

        <form id="filter-form" method="POST" style="display:none"></form>
    </div>
    <div data-block-id="sort_bar" class="d-none d-md-block">
        <div id="sort_by" aria-label="Sort your results" class="mb-4">
            <ul class="sort_option_list ">
                <li class=" sort_category selected sort-score">
                    <a href="#" class="sort_option sort_category_course_list" cat="1"
                        data-category="sort-score" role="button">
                        Our Top Picks
                    </a>
                </li>
                <li class=" sort_category sort-popular">
                    <a href="#" class="sort_option sort_category_course_list" cat="2"
                        data-category="sort-popular" role="button">
                        Most Popular
                    </a>
                </li>
                <li class=" sort_category  sort-speed">
                    <a href="#" class="sort_option sort_category_course_list" cat="3"
                        data-category="sort-speed" role="button">
                        Fastest Admissions
                    </a>
                </li>
                <li class=" sort_category   sort-rating ">
                    <a href="#" class="sort_option sort_category_course_list" cat="4"
                        data-category="sort-rating" role="button">
                        Highest Rating
                    </a>
                </li>
                <li class=" sort_category  sort-rank ">
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
    <div id="programsFoundCount" style="display:none">{{ $courses->count() }} Programs Found</div>
    <span id="programsfound"></span>
    <div class="show-course-ajax-data-list show-course-paginate-ajax-data">
        @foreach ($courses as $course)
            @php
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
            @endphp
            <div class="columns">
                <div class="column">
                    <div class="d-flex justify-content-center" style="position: relative;">
                        <div class="choice s-col-11 search-page-list-item">
                            <div class="choice-wrapper" data-url="{{ $course_details_url }}">
                                <div class="s-row">
                                    <div class="s-col-9">
                                        <a href="{{ $course_details_url }}" class="">
                                            <img style="margin-bottom:25px;"
                                                src="{{ @$course->university->image_show }}">
                                            <h4 class="title mb-1">
                                                <span class="mr-2" style="vertical-align: middle;">
                                                    {{ strlen($course->name) > 50 ? substr($course->name, 0, 50) . '...' : $course->name }}
                                                </span>
                                            </h4>
                                            <p class="school-name-desktop">{{ @$course->university->name }}
                                            </p>
                                            <div class="mobile-title">
                                                <div class="d-flex flex-column">
                                                    <img class="mx-auto" style="margin-bottom:25px"
                                                        src="{{ @$course->university->image_show }}">
                                                    <h4 class="title"
                                                        style="flex-direction: column; align-items: flex-start;">
                                                        <span class="mr-2" style="vertical-align: middle;">
                                                            {{ strlen($course->name) > 50 ? substr($course->name, 0, 50) . '...' : $course->name }}
                                                        </span>
                                                        <p>{{ @$course->university->name }}</p>
                                                    </h4>
                                                </div>
                                            </div>

                                            <div class="tags">
                                                <span class="">
                                                    <i class="fa fa-map-marker"></i>
                                                    {{ $course->university->address }},
                                                    {{ @$course->university->continent->name }} ,
                                                    {{ @$course->university->country->name }} ,
                                                    {{-- {{ @$course->university->state->name }} , --}}
                                                    {{-- {{ @$course->university->city->name }} --}}
                                                </span>

                                                <span><i class="fa fa-comment"></i>
                                                    {{ @$course->language->name }}
                                                </span>
                                            </div>
                                            <div class="wrapper-bullts">
                                                <div class="bulit">
                                                    <div class="title">Next Start Date</div>
                                                    <div class="value">
                                                        {{ date('d M Y', strtotime(@$course->next_start_date)) }}
                                                    </div>
                                                </div>
                                                <div class="bulit">
                                                    <div class="title">Yearly Tuition</div>
                                                    <div class="value"> <span
                                                            class="money">${{ format_price(@$course->year_fee) }}</span>
                                                    </div>
                                                </div>

                                                <div class="bulit">
                                                    <div class="title">Duration</div>
                                                    <div class="value">{{ @$course->course_duration }} Year
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
                                                    {{ date('d M Y', strtotime(@$course->application_deadline)) }}

                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mb-2">
                                            <section class="apply__action d-flex justify-content-center">
                                                <button class="ca-button btn-primary-bg justify-content-center">
                                                    <a href="{{ $apply_url }}" class="text-white">Apply
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
        @endforeach

        @if (@$courses->count() == 0)
            <div class="text-center">
                <h1 style="font-size: 25px">Program Not Found !</h1>
            </div>
        @endif
    </div>

    {{-- pagination ajax start --}}
    <style>
        .pagination-link {
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
    <div class="columns">
        @if ($courses->lastPage() != 1)
            <div class="column" onclick="window.scrollTo(0, 0);">
                <nav class="pagination" role="navigation" aria-label="pagination" style="padding-left: 15px;">
                    <div class="pagination">
                        <a page_no="{{ $courses->currentPage() == 1 ? 1 : $courses->currentPage() - 1 }}"
                            class="page-link course-paginate next_page next pagination-link" href="javascript:void(0)"
                            aria-label="Previous"> &laquo;</a>

                        @for ($i = 1; $i <= $courses->lastPage(); $i++)
                            <a class="pagination-link course-paginate page current @if ($i == $courses->currentPage()) is-current @endif"
                                page_no="{{ $i }}" @if ($i == $courses->currentPage())  @endif
                                href="javascript:void(0)">{{ $i }}</a>
                        @endfor

                        <a page_no="{{ $courses->currentPage() == $courses->lastPage() ? $courses->lastPage() : $courses->currentPage() + 1 }}"
                            class="page-link course-paginate next_page next pagination-link" href="javascript:void(0)"
                            aria-label="Next"> &gt;</a>
                    </div>
                </nav>
            </div>
        @endif
    </div>

</div>
