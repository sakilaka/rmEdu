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
        <p class="result-search"><span class="count">{{ $universities->count() }}</span> Total University Found
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
                @if ($select_search != '')
                    <span class="tag filterTags" data-field="search_val"
                        data-keyword="{{ $select_search }}">{{ $select_search }}<span class="delete-tag">X</span></span>
                @endif
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
                <a style="" class="clear-filter">Clear all</a>
            </div>

        </div>
    </div>
</div>

<ul class="list is-flex" style="flex-wrap:wrap">

    @foreach ($universities as $university)
        <li class="school column is-3 is-3-tablet is-12-mobile">
            <div class="card" style="height: 100%;">
                <div class="card-content row is-flex" style="flex-direction: column;align-items: center;">

                    <img src="{{ $university->image_show }}"
                        style="margin-right:auto; margin-left:auto; width:80%; height:auto">

                    <h5 class="title has-text-centered has-margin-top-2"
                        style="min-height:3rem;font-size: 1rem; overflow: hidden;margin-bottom: 0px;">
                        {{ $university->name }}
                    </h5>
                    {{-- <span class="is-hidden acronymn">None</span> --}}
                    <span class="is-hidden city">{{ @$university->city->name }}</span>
                    <!-- <p class="school-name-desktop">ZIBS</p> -->
                    {{-- <a href="{{ route('frontend.university_details', $university->id) }}" class="stretched-link"> </a> --}}
                    <a href="{{ route('frontend.university_course_list') }}?university={{ @$university->id }}"
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
