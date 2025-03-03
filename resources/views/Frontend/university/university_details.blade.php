@extends('Frontend.layouts.master-layout')
@section('title', '- University Details')
@section('head')
    <link rel="stylesheet" href="{{ asset('frontend/studentconnect/css/app.f6cbb5f7.css') }}" />

    <style>
        .university-nav__list.nav-tabs .nav-link {
            margin-bottom: inherit;
            background: inherit;
            border: inherit;
            border-top-left-radius: inherit;
            border-top-right-radius: inherit;
        }

        .university-nav {
            overflow-x: auto;
            top: 0px!important;
        }

        .university-nav__list {
            display: flex;
            flex-wrap: nowrap;
        }

        .university-nav__item {
            flex: 1 0 auto;
        }


        .university-nav::-webkit-scrollbar {
            height: 0px;
        }

        .university-stat-values {
            margin: 0 auto;
            padding-bottom: 2rem;
            background-color: var(--primary_background);
        }

        .university-stat-values .stat-card {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #3971c3;
            color: white;
            border-radius: 8px;
            border: 0;
            height: 100%;
        }

        .university-stat-values .stat-card .card-body {
            text-align: center;
        }

        div.divider-border {
            background-color: white;
            width: 70% !important;
        }

        .map-card-container {
            overflow: hidden;
        }

        .map-card-container iframe {
            width: 100% !important;
            height: 100% !important;
        }
        .bg-some{
            background-color: white;
            padding: 10px;
            /* border-radius: 50%; */
        }
    </style>
    
@endsection

@section('main_content')
    <section class="_tps-university">

        <div class="wrapper">

            <main>
                <div class="university-header" style="background-image: url('{{ @$university->banner_image_show }}');">
                    <div class="container">
                        <div class="university-header__inner">
                            <div class="university-header__logo-wrapper">
                                <img class="university-header__logo bg-some" src="{{ @$university->image_show }}"
                                    alt="{{ @$university->name }}" title="{{ @$university->name }}" />
                            </div>

                            <div class="university-header__main d-flex align-items-start">
                                <div>

                                    <h1 class="university-header__heading">
                                        {{ @$university->name }}
                                    </h1>

                                    <ul class="breadcrumbs">
                                        <li class="breadcrumbs__item">
                                            <a href="{{ route('home') }}" class="breadcrumbs__link">
                                                Homepage
                                            </a>
                                        </li>
                                        <li class="breadcrumbs__item">
                                            <a href="{{ route('frontend.all_universities_list') }}"
                                                class="breadcrumbs__link">
                                                Find a University
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="university-header__actions">
                                <button
                                    class="enquireModalOpener university-header__btn btn btn--primary btn-secondary-bg btn--lg"
                                    data-toggle="modal" data-target="#enquireModal">
                                    Enquire now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="university-stat-values">
                    <div class="container mx-auto">
                        <div class="row">
                            @if ($university->stat_values && json_decode($university->stat_values, true)['rank'])
                                <div class="col-6 col-md-3 mt-2 mt-md-0">
                                    <div class="card stat-card">
                                        <div class="card-body">
                                            <h4 class="title fw-bolder">Ranked
                                                #{{ json_decode($university->stat_values, true)['rank'] }}</h4>
                                            {{-- <h5 class="text-uppercase mt-1" style="font-size: 14px; letter-spacing:2px;">
                                                {{$university->name}}</h5> --}}

                                            <div class="divider-border mx-auto my-2 my-md-3" style="height: 3px;"></div>

                                            <p class="text-uppercase" style="font-size: 13px; letter-spacing:1px;">For
                                                Graduate
                                                Employment</p>
                                            <p class="text-uppercase mt-1" style="font-size: 13px; letter-spacing:1px;">For
                                                Educational Experience</p>
                                            <p class="mt-3" style="font-size: 10px;">Source: Quality Indicators for
                                                Learning and
                                                Teaching (QILT)</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($university->stat_values && json_decode($university->stat_values, true)['top_rank_percentage'])
                                <div class="col-6 col-md-3 mt-2 mt-md-0">
                                    <div class="card stat-card">
                                        <div class="card-body">
                                            <h4 class="title fw-bolder">Top
                                                {{ json_decode($university->stat_values, true)['top_rank_percentage'] }}%
                                            </h4>

                                            <div class="divider-border mx-auto my-2 my-md-3" style="height: 3px;"></div>

                                            <p class="text-uppercase fw-bold">Of Universities Worldwide</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($university->stat_values && json_decode($university->stat_values, true)['total_students'])
                                <div class="col-6 col-md-3 mt-2 mt-md-0">
                                    <div class="card stat-card">
                                        <div class="card-body">
                                            <h4 class="title fw-bolder">
                                                {{ json_decode($university->stat_values, true)['total_students'] }}</h4>

                                            <div class="divider-border mx-auto my-2 my-md-3" style="height: 3px;"></div>

                                            <p class="text-uppercase fw-bold">International Students</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($university->stat_values && json_decode($university->stat_values, true)['world_ranking'])
                                <div class="col-6 col-md-3 mt-2 mt-md-0">
                                    <div class="card stat-card">
                                        <div class="card-body">
                                            <h4 class="title fw-bolder">Ranked
                                                {{ json_decode($university->stat_values, true)['world_ranking'] }}</h4>

                                            <div class="divider-border mx-auto my-2 my-md-3" style="height: 3px;"></div>

                                            <h4 class="fw-bold">Qs Ranking</h4>
                                            <p class="mt-3">Source: OS World Ranking</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="university-nav">
                    <div class="container">
                        <ul class="nav nav-tabs university-nav__list border-bottom-0" id="universityTab" role="tablist">
                            <li class="nav-item university-nav__item" role="presentation">
                                <a class="nav-link university-nav__btn active" id="overview-tab" data-bs-toggle="tab"
                                    href="#overview" role="tab" aria-controls="overview" aria-selected="true">
                                    Overview
                                </a>
                            </li>
                            <li class="nav-item university-nav__item" role="presentation">
                                <a class="nav-link university-nav__btn" id="programs-tab" data-bs-toggle="tab"
                                    href="#programs" role="tab" aria-controls="programs" aria-selected="false">
                                    Programs
                                </a>
                            </li>
                            <li class="nav-item university-nav__item" role="presentation">
                                <a class="nav-link university-nav__btn" id="scholarships-tab" data-bs-toggle="tab"
                                    href="#scholarships" role="tab" aria-controls="scholarships" aria-selected="false">
                                    Fees and Scholarships
                                </a>
                            </li>
                            <li class="nav-item university-nav__item" role="presentation">
                                <a class="nav-link university-nav__btn" id="accomodation-tab" data-bs-toggle="tab"
                                    href="#accomodation" role="tab" aria-controls="accomodation" aria-selected="false">
                                    Accommodation
                                </a>
                            </li>
                            <li class="nav-item university-nav__item" role="presentation">
                                <a class="nav-link university-nav__btn" id="admission-process-tab" data-bs-toggle="tab"
                                    href="#admission-process" role="tab" aria-controls="admission-process"
                                    aria-selected="false">
                                    Admission Process
                                </a>
                            </li>
                            <li class="nav-item university-nav__item" role="presentation">
                                <a class="nav-link university-nav__btn" id="location-tab" data-bs-toggle="tab"
                                    href="#location" role="tab" aria-controls="location" aria-selected="false">
                                    Location
                                </a>
                            </li>
                            <li class="nav-item university-nav__item" role="presentation">
                                <a class="nav-link university-nav__btn" id="academic_requirements-tab"
                                    data-bs-toggle="tab" href="#academic_requirements" role="tab"
                                    aria-controls="academic_requirements" aria-selected="false">
                                    Academic Requirements
                                </a>
                            </li>
                            <li class="nav-item university-nav__item" role="presentation">
                                <a class="nav-link university-nav__btn" id="english_requirements-tab"
                                    data-bs-toggle="tab" href="#english_requirements" role="tab"
                                    aria-controls="english_requirements" aria-selected="false">
                                    English Requirements
                                </a>
                            </li>
                            <li class="nav-item university-nav__item" role="presentation">
                                <a class="nav-link university-nav__btn" id="budgets-tab" data-bs-toggle="tab"
                                    href="#budgets" role="tab" aria-controls="budgets" aria-selected="false">
                                    Budget
                                </a>
                            </li>
                            {{-- <li class="nav-item university-nav__item" role="presentation">
                                <a class="nav-link university-nav__btn" id="faq-section-tab" data-bs-toggle="tab"
                                    href="#faq-section" role="tab" aria-controls="faq-section"
                                    aria-selected="false">
                                    FAQ
                                </a>
                            </li> --}}
                            <li class="nav-item university-nav__item" role="presentation">
                                <a class="nav-link university-nav__btn" id="reviews-section-tab" data-bs-toggle="tab"
                                    href="#reviews-section" role="tab" aria-controls="reviews-section"
                                    aria-selected="false">
                                    Reviews
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="university-body">
                    <div class="container mx-auto row">
                        <div class="col-md-7 col-lg-8 col-xl-9">
                            <div class="university-body__inner">
                                <div class="tab-content university-body__main" id="myTabContent">
                                    <div class="tab-pane fade show active university-body__section text section"
                                        id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                        <div>
                                            <h3 class="university-body__section-heading">
                                                Overview
                                            </h3>
                                        </div>
                                        <div class="university-body__section-inner">
                                            {!! $university->overview !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade university-body__section section" id="programs"
                                        role="tabpanel" aria-labelledby="programs-tab">
                                        <div>
                                            <h3 class="university-body__section-heading"
                                                style="color: var(--primary_background);font-weight:600;font-size: 18px;line-height: 1.5;margin: 0">
                                                University Program(s)
                                            </h3>
                                        </div>

                                        @if (count($university_courses) > 0)
                                            @include('Frontend.university.university_courses')
                                        @else
                                            <p class="text-center text-muted">No Program(s) Found!</p>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade university-body__section text section" id="scholarships"
                                        role="tabpanel" aria-labelledby="scholarships-tab">
                                        <div>
                                            <h3 class="university-body__section-heading">
                                                Scholarship(s)
                                            </h3>
                                        </div>
                                        <div class="university-body__section-inner">
                                            {!! $university->scholarships !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade university-body__section text section" id="accomodation"
                                        role="tabpanel" aria-labelledby="accomodation-tab">
                                        <div>
                                            <h3 class="university-body__section-heading">
                                                Accommodation
                                            </h3>
                                        </div>
                                        <div class="university-body__section-inner">
                                            {!! $university->accommodation !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade university-body__section text section"
                                        id="admission-process" role="tabpanel" aria-labelledby="admission-process-tab">
                                        <div>
                                            <h3 class="university-body__section-heading">
                                                Admission Process
                                            </h3>
                                        </div>
                                        <div class="university-body__section-inner ckeditor5-rendered">
                                            {!! $university->admissions_process !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade university-body__section text section" id="location"
                                        role="tabpanel" aria-labelledby="location-tab">
                                        <div>
                                            <h3 class="university-body__section-heading">
                                                Location
                                            </h3>
                                        </div>
                                        <div class="university-body__section-inner">
                                            <div class="row">
                                                @php
                                                    $locations = json_decode($university->location, true) ?? [];
                                                @endphp
                                                @foreach ($locations as $map)
                                                    <div class="col-md-3 mt-2 mt-md-0">
                                                        <div class="card">
                                                            <div class="card-body map-card-container p-1">
                                                                {!! $map !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade university-body__section text section" id="academic_requirements"
                                        role="tabpanel" aria-labelledby="academic_requirements-tab">
                                        <div>
                                            <h3 class="university-body__section-heading">
                                                Academic Requirements
                                            </h3>
                                        </div>
                                        <div class="university-body__section-inner ckeditor5-rendered">
                                            {!! $university->academic_requirements !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade university-body__section text section" id="english_requirements"
                                        role="tabpanel" aria-labelledby="english_requirements-tab">
                                        <div>
                                            <h3 class="university-body__section-heading">
                                                English Requirements
                                            </h3>
                                        </div>
                                        <div class="university-body__section-inner ckeditor5-rendered">
                                            {!! $university->english_requirements !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade university-body__section text section" id="budgets"
                                        role="tabpanel" aria-labelledby="budgets-tab">
                                        <div>
                                            <h3 class="university-body__section-heading">
                                                Budgets
                                            </h3>
                                        </div>
                                        <div class="university-body__section-inner ckeditor5-rendered">
                                            {!! $university->budgets !!}
                                        </div>
                                    </div>
                                    {{-- <div class="tab-pane fade university-body__section text section" id="faq-section"
                                        role="tabpanel" aria-labelledby="faq-section-tab">
                                        <div>
                                            <h3 class="university-body__section-heading">
                                                FAQ
                                            </h3>
                                        </div>
                                        <div class="university-body__section-inner">
                                            <div>
                                                <style>
                                                    .question::before,
                                                    .answer::before {
                                                        content: "";
                                                        border-radius: 2px;
                                                        height: 6px;
                                                        width: 6px;
                                                        position: absolute;
                                                        left: -20px;
                                                        top: 50%;
                                                        transform: translateY(-50%);
                                                        z-index: 1;
                                                    }

                                                    .question::before {
                                                        content: "Q: " !important;
                                                        background: none !important;
                                                        color: #5f74a2 !important;
                                                        font-weight: bold;
                                                        left: -30px;
                                                        top: 0 !important;
                                                        transform: none;
                                                    }

                                                    .answer::before {
                                                        content: "A: " !important;
                                                        background: none !important;
                                                        color: #5f74a2 !important;
                                                        font-weight: bold;
                                                        left: -30px;
                                                        top: 0 !important;
                                                        transform: none;
                                                    }

                                                    ul.faq li+li {
                                                        margin-top: 5px !important;
                                                    }

                                                    ul.faq li {
                                                        list-style-type: none;
                                                        position: relative;
                                                    }
                                                </style>
                                                <ul class="faq">
                                                    @foreach ($university->universityFAQ as $item)
                                                        @if ($item->answer)
                                                            <li class="question">{{ $item->question }}</li>
                                                            <li class="answer">{{ $item->answer }}</li>
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="tab-pane fade university-body__section text section" id="reviews-section"
                                        role="tabpanel" aria-labelledby="reviews-section-tab">
                                        <div>
                                            <h3 class="university-body__section-heading">
                                                Reviews
                                            </h3>
                                        </div>
                                        <div class="university-body__section-inner">
                                            <div class="{{-- university-body__section-content --}}">

                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4 text-center">
                                                        <div
                                                            class="d-inline-block px-5 py-4 rating-block rounded-3 text-center">
                                                            <div class="rating-point mb-3 text-center">
                                                                <h3 class="display-1 fw-light mb-0 fw-semi-bold"
                                                                    style="font-size: 6rem">
                                                                    {{ round(@$university->reviews->avg('ratting'), 1) }}
                                                                </h3>

                                                                @php
                                                                    $avg_round = floor(
                                                                        $university->reviews->avg('ratting'),
                                                                    );
                                                                @endphp

                                                                <div class="text-warning">
                                                                    @for ($i = 1; $i <= @$avg_round; $i++)
                                                                        <i class="fa fa-star"></i>
                                                                    @endfor
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8 col-lg-8">
                                                        <style>
                                                            table tr td,
                                                            table tr th {
                                                                border: none !important;
                                                            }
                                                        </style>
                                                        <table class="table table-borderless mb-0 white-space-nowrap">
                                                            <tbody>
                                                                @php
                                                                    @$five_count = @$university->reviews
                                                                        ?->where('ratting', 5)
                                                                        ?->count();
                                                                    @$five_percent =
                                                                        @$five_count > 0
                                                                            ? (@$five_count /
                                                                                    @$university?->reviews?->count()) *
                                                                                100
                                                                            : 0;
                                                                @endphp
                                                                <tr>
                                                                    <td width="70%" class="align-middle">
                                                                        <div class="rating-percent">
                                                                            <div class="progress">
                                                                                <div class="progress-bar bg-warning progress-bar-striped"
                                                                                    role="progressbar"
                                                                                    style="width: {{ @$five_percent }}%"
                                                                                    aria-valuenow="100" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td width="10%" class="align-middle">
                                                                        <div class="rating-quantity">
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                        </div>
                                                                    </td>
                                                                    <td width="20%" class="align-middle">
                                                                        <div class="user-rating text-muted">
                                                                            {{ round(@$five_percent), 1 }}%</div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    @php
                                                                        @$four_count = @$ebook->reviews
                                                                            ?->where('ratting', 4)
                                                                            ?->count();
                                                                        @$four_percent =
                                                                            @$four_count > 0
                                                                                ? (@$four_count /
                                                                                        @$university?->reviews?->count()) *
                                                                                    100
                                                                                : 0;
                                                                    @endphp
                                                                    <td width="70%" class="align-middle">
                                                                        <div class="rating-percent">
                                                                            <div class="progress">
                                                                                <div class="progress-bar bg-warning progress-bar-striped"
                                                                                    role="progressbar"
                                                                                    style="width: {{ @$four_percent }}%"
                                                                                    aria-valuenow="100" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td width="10%" class="align-middle">
                                                                        <div class="rating-quantity">
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star"
                                                                                style="color:#ffe6ad;"></i>
                                                                        </div>
                                                                    </td>
                                                                    <td width="20%" class="align-middle">
                                                                        <div class="user-rating text-muted">
                                                                            {{ round(@$four_percent), 1 }}
                                                                            % </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    @php
                                                                        @$three_count = @$university->reviews
                                                                            ?->where('ratting', 3)
                                                                            ?->count();
                                                                        @$three_percent =
                                                                            @$three_count > 0
                                                                                ? (@$three_count /
                                                                                        @$university?->reviews?->count()) *
                                                                                    100
                                                                                : 0;
                                                                    @endphp
                                                                    <td width="70%" class="align-middle">
                                                                        <div class="rating-percent">
                                                                            <div class="progress">
                                                                                <div class="progress-bar bg-warning progress-bar-striped"
                                                                                    role="progressbar"
                                                                                    style="width: {{ @$three_percent }}%"
                                                                                    aria-valuenow="60" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td width="10%" class="align-middle">
                                                                        <div class="rating-quantity">
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star"
                                                                                style="color:#ffe6ad;"></i>
                                                                            <i class="fa fa-star"
                                                                                style="color:#ffe6ad;"></i>
                                                                        </div>
                                                                    </td>
                                                                    <td width="20%" class="align-middle">
                                                                        <div class="user-rating text-muted">
                                                                            {{ round(@$three_percent), 1 }}%</div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    @php
                                                                        @$two_count = @$university->reviews
                                                                            ?->where('ratting', 2)
                                                                            ?->count();
                                                                        @$two_percent =
                                                                            @$two_count > 0
                                                                                ? (@$two_count /
                                                                                        @$university?->reviews?->count()) *
                                                                                    100
                                                                                : 0;
                                                                    @endphp
                                                                    <td width="70%" class="align-middle">
                                                                        <div class="rating-percent">
                                                                            <div class="progress">
                                                                                <div class="progress-bar bg-warning progress-bar-striped"
                                                                                    role="progressbar"
                                                                                    style="width: {{ @$two_percent }}%"
                                                                                    aria-valuenow="40" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td width="10%" class="align-middle">
                                                                        <div class="rating-quantity">
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                            <i class="fa fa-star"
                                                                                style="color:#ffe6ad;"></i>
                                                                            <i class="fa fa-star"
                                                                                style="color:#ffe6ad;"></i>
                                                                            <i class="fa fa-star"
                                                                                style="color:#ffe6ad;"></i>
                                                                        </div>
                                                                    </td>
                                                                    <td width="20%" class="align-middle">
                                                                        <div class="user-rating text-muted">
                                                                            {{ round(@$two_percent), 1 }}%
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>

                                                                    @php
                                                                        @$one_count = @$university->reviews
                                                                            ?->where('ratting', 1)
                                                                            ?->count();
                                                                        @$one_percent =
                                                                            @$one_count > 0
                                                                                ? (@$one_count /
                                                                                        @$university?->reviews?->count()) *
                                                                                    100
                                                                                : 0;
                                                                    @endphp

                                                                    <td width="70%" class="align-middle">
                                                                        <div class="rating-percent">
                                                                            <div class="progress">
                                                                                <div class="progress-bar bg-warning progress-bar-striped"
                                                                                    role="progressbar"
                                                                                    style="width: {{ @$one_percent }}%"
                                                                                    aria-valuenow="20" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td width="10%" class="align-middle">
                                                                        <div class="rating-quantity">
                                                                            <i class="fa fa-star text-warning"
                                                                                style="color:#ffe6ad;"></i>
                                                                            <i class="fa fa-star"
                                                                                style="color:#ffe6ad;"></i>
                                                                            <i class="fa fa-star"
                                                                                style="color:#ffe6ad;"></i>
                                                                            <i class="fa fa-star"
                                                                                style="color:#ffe6ad;"></i>
                                                                            <i class="fa fa-star"
                                                                                style="color:#ffe6ad;"></i>
                                                                        </div>
                                                                    </td>
                                                                    <td width="20%" class="align-middle">
                                                                        <div class="user-rating text-muted">
                                                                            {{ round(@$one_percent), 1 }}%</div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="row my-3">
                                                    @foreach ($university->reviews as $review)
                                                        <div class="col-12 col-sm-auto">
                                                            <div class="avatar d-flex align-items-center">
                                                                <div class="avatar-img me-3">
                                                                    <img src="{{ @$review->user->image_show }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="avatar-text">
                                                                    <h5 class="avatar-name mb-1">
                                                                        <a href="javascript:void(0)"
                                                                            style="text-decoration:none; color:var(--primary_background)">{{ @$review->user->name }}</a>
                                                                    </h5>
                                                                    <div class="avatar-designation">
                                                                        {{ $review->created_at->diffForHumans() }}
                                                                    </div>

                                                                    @php
                                                                        $avg_round = $review->ratting;
                                                                    @endphp

                                                                    <div class="mt-1">
                                                                        @for ($i = 1; $i <= $avg_round; $i++)
                                                                            <i class="fa fa-star text-warning"></i>
                                                                        @endfor
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3 mt-sm-0"
                                                            style="color: var(--text_color); margin-left:90px">
                                                            <p>{!! @$review->comment !!}</p>
                                                        </div>
                                                        <div class="col-md-12">
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="row">
                                                    <style>
                                                        .comment-respond {
                                                            clear: both;
                                                            padding: 0;
                                                            margin: 0;
                                                            /* padding: clamp(1.5625rem, 1.2845rem + 1.5337vw, 3.125rem); */
                                                            -webkit-border-radius: 10px;
                                                            border-radius: 10px;
                                                        }

                                                        .comment-respond .header_area {
                                                            padding: clamp(1.5625rem, 1.2845rem + 1.5337vw, 3.125rem);
                                                            background-color: #ebeeff8c;
                                                            -webkit-border-radius: 10px;
                                                            border-radius: 10px;
                                                        }

                                                        .comment-respond form {
                                                            padding: clamp(1.5625rem, 1.2845rem + 1.5337vw, 3.125rem);
                                                            display: grid;
                                                            grid-template-columns: repeat(2, 1fr);
                                                            gap: clamp(0.9375rem, 0.8819rem + 0.3067vw, 1.25rem);
                                                            float: left;
                                                            margin: 0;
                                                            width: 100%;
                                                        }

                                                        .comment-respond form>p.comment-notes {
                                                            grid-column: 1 / 3;
                                                        }

                                                        .comment-respond form>p.comment-form-rating {
                                                            grid-column: 1 / 3;
                                                        }

                                                        .comment-respond form>div.ratings {
                                                            grid-column: 1 / 3;
                                                            grid-row: 5/6;
                                                        }

                                                        .comment-respond form>p.comment-form-url {
                                                            grid-column: 1 / 3;
                                                        }

                                                        .comment-respond form>p.comment-form-comment {
                                                            grid-column: 1 / 3;
                                                        }

                                                        #respond input[type="submit"] {
                                                            border: none;
                                                            border-radius: 8px;
                                                            text-transform: capitalize;
                                                            font-weight: 600;
                                                            margin: 0;
                                                            font-family: 'DM Sans', sans-serif;
                                                            font-size: 14px;
                                                            letter-spacing: var(--wdtLetterSpacing_2X);
                                                            padding: 16px;
                                                            float: left;
                                                            cursor: pointer;
                                                            line-height: normal;
                                                            height: auto;
                                                            min-width: auto;
                                                            background-color: var(--button_primary_bg);
                                                            color: white;
                                                            transition: 0.5s;
                                                        }

                                                        #respond input[type="submit"]:hover {
                                                            background-color: var(--secondary_background);
                                                        }
                                                    </style>
                                                    <div id="respond" class="comment-respond">
                                                        <div class="header_area">
                                                            <h3 id="reply-title" class="comment-reply-title">
                                                                Leave a Comment
                                                            </h3>
                                                            <p class="comment-notes">
                                                                <span class="required-field-message">
                                                                    Required fields are marked
                                                                    <span class="required">*</span>
                                                                </span>
                                                            </p>
                                                        </div>

                                                        <form action="{{ route('frontend.review.store') }}"
                                                            method="post" id="commentform" class="comment-form"
                                                            novalidate="">
                                                            @csrf


                                                            <div class="dtlms-rating-wrapper">
                                                                <label for="lms_rating" class="mb-2">Ratings</label>
                                                                <div class="ratings">

                                                                    <div class="avatar-text">
                                                                        <div class="rating-input-block">
                                                                            <input type="hidden" name="ratting"
                                                                                id="input_rating">
                                                                            <input type="hidden" name="university_id"
                                                                                value="{{ $university->id }}">
                                                                            <input type="hidden" value="university"
                                                                                name="type" />
                                                                            <i data-rating="1"
                                                                                class="fa fa-star input-ratting"
                                                                                style="color:#ffe6ad;"></i>
                                                                            <i data-rating="2"
                                                                                class="fa fa-star input-ratting"
                                                                                style="color:#ffe6ad;"></i>
                                                                            <i data-rating="3"
                                                                                class="fa fa-star input-ratting"
                                                                                style="color:#ffe6ad;"></i>
                                                                            <i data-rating="4"
                                                                                class="fa fa-star input-ratting"
                                                                                style="color:#ffe6ad;"></i>
                                                                            <i data-rating="5"
                                                                                class="fa fa-star input-ratting"
                                                                                style="color:#ffe6ad;"></i>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <script>
                                                                    var ratingInputBlock = document.querySelector('.rating-input-block');

                                                                    // Mouseleave event
                                                                    ratingInputBlock.addEventListener('mouseleave', function() {
                                                                        var activeStar = document.querySelector('.input-ratting.active');
                                                                        var rm = activeStar ? parseInt(activeStar.getAttribute('data-rating')) : 0;

                                                                        for (var i = 1; i <= rm; i++) {
                                                                            var star = document.querySelector('.input-ratting[data-rating="' + i + '"]');
                                                                            star.classList.add('text-warning');
                                                                            star.classList.remove('btn-grey');
                                                                        }

                                                                        for (var ram = rm + 1; ram <= 5; ram++) {
                                                                            var star = document.querySelector('.input-ratting[data-rating="' + ram + '"]');
                                                                            star.classList.remove('text-warning');
                                                                            star.classList.add('btn-grey');
                                                                        }
                                                                    });

                                                                    // Mouseenter event
                                                                    ratingInputBlock.addEventListener('mouseenter', function() {
                                                                        console.log("over");
                                                                    });

                                                                    // Click event
                                                                    var stars = document.querySelectorAll('.input-ratting');
                                                                    stars.forEach(function(star) {
                                                                        star.addEventListener('click', function() {
                                                                            stars.forEach(function(s) {
                                                                                s.classList.remove('active');
                                                                            });

                                                                            if (this.classList.contains('active')) {
                                                                                document.getElementById('input_rating').value = '';
                                                                                this.classList.remove('active');
                                                                            } else {
                                                                                document.getElementById('input_rating').value = this.getAttribute(
                                                                                    'data-rating');
                                                                                this.classList.add('active');
                                                                            }
                                                                        });
                                                                    });

                                                                    // Hover event
                                                                    stars.forEach(function(star) {
                                                                        star.addEventListener('mouseenter', function() {
                                                                            var rating = parseInt(this.getAttribute('data-rating'));
                                                                            stars.forEach(function(s) {
                                                                                var sRating = parseInt(s.getAttribute('data-rating'));
                                                                                if (sRating <= rating) {
                                                                                    s.classList.add('text-warning');
                                                                                    s.classList.remove('btn-grey');
                                                                                } else {
                                                                                    s.classList.remove('text-warning');
                                                                                    s.classList.add('btn-grey');
                                                                                }
                                                                            });
                                                                        });
                                                                    });
                                                                </script>
                                                            </div>

                                                            <p class="comment-form-comment">
                                                                <textarea id="comment" name="comment" cols="45" rows="8" placeholder="Write a comment..."
                                                                    maxlength="65525" required></textarea>
                                                            </p>
                                                            <p class="form-submit">
                                                                <input name="submit" type="submit" id="submit"
                                                                    class="submit btn-primary-bg" value="Post Comment">
                                                            </p>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 col-lg-4 col-xl-3 mt-md-4">
                            <aside class="university-aside" style="border-radius: 8px">
                                <div class="university-aside-item">
                                    <div class="university-aside-item__label">
                                        Institution
                                    </div>

                                    <div class="university-aside-item__body">
                                        <div class="university-aside-item__row">
                                            {{ $university->name }}
                                        </div>
                                    </div>
                                </div>

                                <div class="university-aside-item">
                                    <div class="university-aside-item__label">
                                        Location
                                    </div>

                                    <div class="university-aside-item__body">
                                        <div class="university-aside-item__row">
                                            <div class="university-aside-item__cell">
                                                {{ ucfirst($university->address) }} <br>
                                                {{-- {{ ucfirst($university->city->name) }}, --}}
                                                {{-- {{ ucfirst($university->state->name) }}, --}}
                                                {{ ucfirst($university->country->name) }},
                                                {{ ucfirst($university->continent->name) }},
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="university-aside-item">
                                    <div class="university-aside-item__label">
                                        University Course
                                    </div>

                                    <div class="university-aside-item__body text-center">
                                        <button
                                            class="university-header__btn btn btn--primary btn-primary-bg btn--lg js-call-modal"
                                            onclick="window.location.href='{{ route('frontend.university_course_list') }}?university={{ @$university->id }}'">
                                            Explore Program(s)
                                        </button>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <span class="pseudo-anchor" id="block_1"></span>
        <section class="cta-block">
            <div class="container">
                <div class="cta-block__inner">
                    <div class="cta-block__main">
                        <h3 class="cta-block__heading">
                            Are you ready to start building your future?
                        </h3>

                        <p class="cta-block__text">
                            Contact our admission counseller and get a free consultation.
                        </p>
                    </div>

                    <div class="cta-block__action">
                        <button type="button"
                            class="enquireModalOpener cta-block__btn btn btn--xlg btn--primary btn-tertiary-bg js-call-modal"
                            data-toggle="modal" data-target="#enquireModal">
                            Book now
                        </button>
                    </div>
                </div>
            </div>
        </section>
        </main>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="enquireModal" tabindex="-1" role="dialog" aria-labelledby="enquireModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header py-3">
                        <h5 class="modal-title" id="exampleModalLabel">Have a Query?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('frontend.question') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="university" />
                        <input type="hidden" name="university_id" value="{{ $university->id }}" />
                        <div class="modal-body px-4">
                            <div class="form-group">
                                <label for="name" class="title">Name</label>
                                <input type="text" name="name" id="name" class="form-control mt-1" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="email" class="title">Email</label>
                                <input type="email" name="email" id="email" class="form-control mt-1" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="question" class="title">Your Query</label>
                                <textarea name="question" id="question" rows="5" class="form-control mt-1" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger px-3 py-2" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary-bg px-3 py-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    @include('Frontend.layouts.parts.news-letter')
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleButtons = document.querySelectorAll('.toggle-content-btn');

            toggleButtons.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const content = this.closest('.content-wrapper').querySelector('.content');

                    if (content.classList.contains('expanded')) {
                        content.classList.remove('expanded');
                        this.textContent = 'See More';
                    } else {
                        content.classList.add('expanded');
                        this.textContent = 'See Less';
                    }
                });
            });
        });
    </script>

    <script>
        $('.enquireModalOpener').click(function() {
            $('#enquireModal').modal('show');
        });
        document.addEventListener("DOMContentLoaded", function() {
            // Get the close button elements
            const closeModalButtons = document.querySelectorAll('[data-dismiss="modal"]');

            // Add click event listener to each close button
            closeModalButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    // Find the parent modal of the clicked button
                    const modal = button.closest('.modal');
                    if (modal) {
                        // Use Bootstrap modal method to hide the modal
                        $(modal).modal('hide');
                    }
                });
            });
        });
    </script>
    <script src="{{ asset('frontend/studentconnect/js/runtime.b7ed2637.js') }}"></script>
    <script src="{{ asset('frontend/studentconnect/js/730.535b5aff.js') }}"></script>
    <script src="{{ asset('frontend/studentconnect/js/app.773d3c55.js') }}"></script>
@endsection
