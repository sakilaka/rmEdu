@extends('Frontend.layouts.master-layout')
@section('title', '- All Universities')
@section('head')
    <link rel="stylesheet"
        href="{{ asset('frontend/application/modules/frontend/views/themes/default/assets/css/select2.min.css') }}">
    <link href="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/css/main_china.css"
        rel="stylesheet">
    <link href="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/css/page_search_china.css"
        rel="stylesheet">
    <style type="text/css">
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
    </style>

    <style>
        .has-margin-top-2 {
            margin-top: 10px !important;
        }

        .stretched-link::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1;
            pointer-events: auto;
            content: "";
            background-color: rgba(0, 0, 0, 0);
        }

        .school-pagination li a {
            font-size: 1em;
            padding-left: 0.5em;
            padding-right: 0.5em;
            justify-content: center;
            text-align: center;
            border-color: #dbdbdb !important;
            color: #2f64bf;
            min-width: 2.25em;
            -webkit-appearance: none;
            align-items: center;
            border: 1px solid transparent;
            box-shadow: none;
            display: inline-flex;
            font-size: 1rem;
            height: 2.25em;
            line-height: 1.5;
            padding-bottom: calc(0.375em - 1px);
            padding-left: calc(0.625em - 1px);
            padding-right: calc(0.625em - 1px);
            padding-top: calc(0.375em - 1px);
            position: relative;
            vertical-align: top;

        }

        .school-pagination li.active a {
            background-color: #2f64bf !important;
            border-color: #2f64bf;
            border-radius: 0;
            color: #fff;

        }

        .top_hero {
            padding-bottom: 2rem;
            padding-right: 2rem;
            padding-left: 2rem;
            background: var(--primary_background);
            /* background: -webkit-linear-gradient(#d7353870, #d7353870), url({{ @$banner->image_show }}); */
            /* background: linear-gradient(#d7353870, #d7353870), url({{ @$banner->image_show }}); */
            background-position: center;
            background-repeat: no-repeat;
            padding-top: 7rem;
            /* height:300px; */
        }

        .no-result li {
            margin-left: 40px;
        }
    </style>

    <style>
        .filter.column.is-3 {
            background-color: #edf3ff9c;
            height: fit-content;
            border-radius: 10px;
            padding: 10px 20px;
        }

        @media screen and (min-width: 769px) {
            .all_university_container {
                margin-left: 1.5rem;
            }
        }

        .text-contents {
            max-height: 150px;
            overflow: hidden;
            position: relative;
            transition: max-height 0.3s ease;
        }

        .text-contents.expanded {
            max-height: none;
        }
    </style>
@endsection

@section('main_content')
    <header class="hero is-bold is-small top_hero" style="margin-top: 5rem">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <h1 class="title is-2 has-text-centered " style="color: #fff;">{{ @$banner->title }}</h1>
                    <div class="columns">
                        <div class="column is-three-fifths is-offset-one-fifth mx-auto" style="width: 40%">
                            <div class="field has-addons">
                                <div class="control">
                                    <input id="search-input" class="input" type="text"
                                        placeholder="Search by university">
                                </div>
                                <div class="control">
                                    <a id="search-input" class="btn-secondary-bg button"
                                        style="border: 1px solid var(--secondary_background)">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="section wrapper-search-page">
        <div class="container">
            <div class="columns ajax-filter-show">
                <div class="column is-3 filter">
                    <div class="wrapper-filters" style="display: block;">
                        <div class="toggle-header">
                            <h4 class="title is-5" style="color: var(--secondary_background); font-weight:bold">
                                Filter University
                            </h4>
                        </div>

                        <div class="my-2">
                            <div class="toggle-header" data-filterslist="continent">
                                <h5 class="title is-5">Continent</h5>
                                <div class="toggle-icon" style="transform: rotate(-45deg);"></div>
                            </div>
                            <div class="toggle-content" data-filters="continent">
                                <select name="continent" class="form-control select2_form_select" style="width: 90%;">
                                    <option value="">Select Continent</option>
                                    @foreach ($continents as $continent)
                                        <option value="{{ $continent->id }}"
                                            {{ request()->get('continent') == $continent->id ? 'selected' : '' }}>
                                            {{ @$continent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="my-2">
                            <div class="toggle-header" data-filterslist="country">
                                <h5 class="title is-5">Country</h5>
                                <div class="toggle-icon" style="transform: rotate(-45deg);"></div>
                            </div>
                            <div class="toggle-content" data-filters="country">
                                <select name="country" class="form-control select2_form_select" style="width: 90%;">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ @$country->id }}"
                                            {{ request()->get('country') == $country->id ? 'selected' : '' }}>
                                            {{ @$country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <div class="my-2">
                            <div class="toggle-header" data-filterslist="state">
                                <h5 class="title is-5">State</h5>
                                <div class="toggle-icon" style="transform: rotate(-45deg);"></div>
                            </div>
                            <div class="toggle-content" data-filters="state">
                                <select name="state" class="form-control select2_form_select" style="width: 90%;">
                                    <option value="">Select State</option>
                                    @foreach ($states as $state)
                                        <option value="{{ @$state->id }}"
                                            {{ request()->get('state') == $state->id ? 'selected' : '' }}>
                                            {{ @$state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        {{-- <div class="my-2">
                            <div class="toggle-header" data-filterslist="city">
                                <h5 class="title is-5">City</h5>
                                <div class="toggle-icon" style="transform: rotate(-45deg);"></div>
                            </div>
                            <div class="toggle-content" data-filters="city">
                                <select name="city" class="form-control select2_form_select" style="width: 90%;">
                                    <option value="">Select City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ @$city->id }}"
                                            {{ request()->get('city') == $city->id ? 'selected' : '' }}>
                                            {{ @$city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="column is-9 pt-0">

                    @include('Frontend.preloader')

                    <div class="all_university_container">
                        @if (!empty($country_data) && $country_data['contents'] != '')
                            <div class="row justify-content-center mt-3 mt-lg-0 mb-4">
                                <div class="col-12 px-0">
                                    <div class="card w-100 shadow-none" style="border-radius: 8px">
                                        <div class="card-body">
                                            <h3 class="text-center fw-bold mb-3" style="font-size: 1.5rem;">Student Life At
                                                {{ $country_data['name'] }}</h3>

                                            <div class="text-contents" id="content-{{ $country_data['id'] }}">
                                                {!! $country_data['contents'] ?? '' !!}
                                            </div>
                                            <div class="text-center mt-2">
                                                <a href="javascript:void(0)" class="text-center fw-bold see-more-toggle"
                                                    data-target="#content-{{ $country_data['id'] }}"
                                                    style="color: var(--primary_background)">See More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="columns">
                            <div class="column">
                                <p class="result-search"><span class="count">{{ $universities->count() }}</span> Total
                                    University Found</p>
                                <div class="dropdown">
                                </div>
                            </div>
                        </div>

                        <div class="columns mb-0">
                            <div class="column pt-0 pb-0">
                                <p class="result-search"></p>
                                <div class="pt-0 wrapper-result-tags-and-sort">
                                    <div class="tags searchingTags_wrapper">
                                        @if ($select_continent > 0)
                                            @php
                                                $select_continents = \App\Models\Continent::where(
                                                    'id',
                                                    $select_continent,
                                                )->get();
                                            @endphp
                                            @foreach ($select_continents as $select_continent)
                                                <span class="tag filterTags" data-field="continent"
                                                    data-keyword="{{ $select_continent->id }}">{{ $select_continent->name }}<span
                                                        class="delete-tag">X</span></span>
                                            @endforeach
                                        @endif

                                        @if ($select_country > 0)
                                            @php
                                                $select_countries = \App\Models\Country::where(
                                                    'id',
                                                    $select_country,
                                                )->get();
                                            @endphp
                                            @foreach ($select_countries as $contry)
                                                <span class="tag filterTags" data-field="country"
                                                    data-keyword="{{ $contry->id }}">{{ $contry->name }}<span
                                                        class="delete-tag">X</span></span>
                                            @endforeach
                                        @endif

                                        @if ($select_state > 0)
                                            @php
                                                $select_states = \App\Models\State::where('id', $select_state)->get();
                                            @endphp
                                            @foreach ($select_states as $state)
                                                <span class="tag filterTags" data-field="state"
                                                    data-keyword="{{ $state->id }}">{{ $state->name }}<span
                                                        class="delete-tag">X</span></span>
                                            @endforeach
                                        @endif

                                        @if ($select_city > 0)
                                            @php
                                                $select_cities = \App\Models\City::where('id', $select_city)->get();
                                            @endphp
                                            @foreach ($select_cities as $city)
                                                <span class="tag filterTags" data-field="city"
                                                    data-keyword="{{ $city->id }}">{{ $city->name }}<span
                                                        class="delete-tag">X</span></span>
                                            @endforeach
                                        @endif
                                        {{-- <a style="display:none;" class="clear-filter">Clear all</a> --}}
                                        <a style="" class="clear-filter">Clear all</a>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <ul class="list is-flex" style="flex-wrap:wrap">
                            @foreach ($universities as $university)
                                <li class="school column is-3 is-3-tablet is-12-mobile">
                                    <div class="card" style="height: 100%;">
                                        <div class="card-content row is-flex"
                                            style="flex-direction: column;align-items: center;">

                                            <img src="{{ $university->image_show }}"
                                                style="margin-right:auto; margin-left:auto; width:80%; height:auto">

                                            <h5 class="title has-text-centered has-margin-top-2"
                                                style="min-height:3rem;font-size: 1rem; overflow: hidden;margin-bottom: 0px;">
                                                {{ $university->name }}
                                            </h5>
                                            <span class="is-hidden city">{{ @$university->city->name }}</span>
                                            <a href="{{ route('frontend.university_details', ['id' => $university->id]) }}"
                                                class="stretched-link"> </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        @if (@$universities->count() == 0)
                            <div class="text-center">
                                <h1 style="font-size: 25px">University Not Found !</h1>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('Frontend.layouts.parts.news-letter')
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('see-more-toggle')) {
                    const link = e.target;
                    const target = document.querySelector(link.getAttribute('data-target'));

                    if (target.classList.contains('expanded')) {
                        target.classList.remove('expanded');
                        link.innerText = 'See More';
                    } else {
                        target.classList.add('expanded');
                        link.innerText = 'See Less';
                    }
                }
            });

            const seeMoreLinks = document.querySelectorAll('.see-more-toggle');
            seeMoreLinks.forEach(link => {
                const target = document.querySelector(link.getAttribute('data-target'));

                if (target.scrollHeight > target.offsetHeight) {
                    link.style.display = 'inline';
                }
            });
        });
    </script>

    <script src="{{ asset('backend/assets/js/select2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2_form_select').select2();

            $('select[name="continent"]').on('change', function() {
                $(this).prop('selected', true);

                getCountry($(this).val());
                filterUniversity();
            });
            $('select[name="country"]').on('change', function() {
                $(this).prop('selected', true);

                getState($(this).val());
                filterUniversity();
            });
            $('select[name="state"]').on('change', function() {
                $(this).prop('selected', true);

                getCity($(this).val());
                filterUniversity();
            });
            $('select[name="city"]').on('change', function() {
                $(this).prop('selected', true);
                filterUniversity();
            });
        });
    </script>

    <script>
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

        var del_name = "";
        var del_val = "";
        $(document).on('click', '.delete-tag', function() {
            del_name = $(this).parent().attr('data-field');
            del_val = $(this).parent().attr('data-keyword');
            filterUniversity(true)
            $(this).parent().remove();
            if ($('.searchingTags_wrapper').children().length == 2) {
                $('.clear-filter').css('display', 'none');
            }
        });

        $(document).on('click', '.clear-filter', function() {
            window.location = "{{ url('/list/all-universities') }}/"
            $('.filterTags').remove();
            //  op start
            // filterUniversity(false, true)
            return false;
            //  end end
            $('.clear-filter').css('display', 'none');
            //location.reload();
        });

        $(document).on('keydown', '#search-input', function(e) {
            var key = e.which;

            if (key == 13) {
                filterUniversity(false, true)
                return false;
            }
        })

        $(document).on('click', '#search-input', function(e) {
            filterUniversity(false, true)
            return false;
        })
    </script>

    <script>
        function filterUniversity(del_filter = false, onsearch_val = false) {

            var continent_id = $(document).find('select[name="continent"]:selected').val();
            var country_id = $(document).find('select[name="country"]:selected').val();
            var state_id = $(document).find('select[name="state"]:selected').val();
            var city_id = $(document).find('select[name="city"]:selected').val();
            var data_val = {};

            $(".all_university_container").empty();
            $('.preloader_container').removeClass('d-none').addClass('d-inline-block');

            if (continent_id) {
                if (del_filter == true) {
                    if (del_name != 'continent') {
                        data_val.continent = continent_id;
                    }
                } else {
                    data_val.continent = continent_id;
                }
            }

            if (country_id) {
                if (del_filter == true) {
                    if (del_name != 'country') {
                        data_val.country = country_id;
                    }
                } else {
                    data_val.country = country_id;
                }
            }

            if (state_id) {
                if (del_filter == true) {
                    if (del_name != 'state') {
                        data_val.state = state_id;
                    }
                } else {
                    data_val.state = state_id;
                }
            }

            if (city_id) {
                if (del_filter == true) {
                    if (del_name != 'city') {
                        data_val.city = city_id;
                    }
                } else {
                    data_val.city = city_id;
                }
            }

            if (onsearch_val == true) {
                data_val.search_val = $('#search-input').val();
            }
            data_val.onsearch_val = onsearch_val;

            $.ajax({
                type: 'GET',
                url: "{{ url('ajax-university-filter') }}",
                data: data_val,
                success: function(data) {
                    $('.preloader_container').removeClass('d-inline-block').addClass('d-none');
                    $(".all_university_container").append(data);
                },
                error: function() {
                    $('.preloader_container').removeClass('d-inline-block').addClass('d-none');
                }
            });
        }

        function getCountry(continent) {
            let countrySelect = $("select[name='country']");
            countrySelect.empty();

            let stateSelect = $("select[name='state']");
            stateSelect.empty();

            let citySelect = $("select[name='city']");
            citySelect.empty();

            $.ajax({
                type: 'GET',
                url: "{{ url('get-country') }}/" + continent,
                success: function(data) {

                    countrySelect.append('<option value="">Select Country</option>');
                    stateSelect.append('<option value="">Select State</option>');
                    citySelect.append('<option value="">Select City</option>');

                    $.each(data.response, function(index, country) {
                        countrySelect.append($('<option>', {
                            value: country.id,
                            text: country.name
                        }));
                    });
                },
                error: function() {
                    countrySelect.append('<option value="">Select Country</option>');
                    stateSelect.append('<option value="">Select State</option>');
                    citySelect.append('<option value="">Select City</option>');
                }
            });
        }

        function getState(country) {
            let stateSelect = $("select[name='state']");
            stateSelect.empty();

            let citySelect = $("select[name='city']");
            citySelect.empty();

            $.ajax({
                type: 'GET',
                url: "{{ url('get-state') }}/" + country,
                success: function(data) {

                    stateSelect.append('<option value="">Select State</option>');
                    citySelect.append('<option value="">Select City</option>');

                    $.each(data.response, function(index, state) {
                        stateSelect.append($('<option>', {
                            value: state.id,
                            text: state.name
                        }));
                    });
                },
                error: function() {
                    stateSelect.append('<option value="">Select State</option>');
                    citySelect.append('<option value="">Select City</option>');
                }
            });
        }

        function getCity(state) {
            let citySelect = $("select[name='city']");
            citySelect.empty();

            $.ajax({
                type: 'GET',
                url: "{{ url('get-city') }}/" + state,
                success: function(data) {

                    citySelect.append('<option value="">Select City</option>');
                    $.each(data.response, function(index, city) {
                        citySelect.append($('<option>', {
                            value: city.id,
                            text: city.name
                        }));
                    });
                },
                error: function() {
                    citySelect.append('<option value="">Select City</option>');
                }
            });
        }
    </script>
@endsection
