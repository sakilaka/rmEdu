@extends('Frontend.layouts.master-layout')
@section('title', '- Find University')
@section('head')
    <style>
        .content_search {
            margin-top: 10rem;
            margin-bottom: 2rem;
        }
    </style>
@endsection

@section('main_content')
    <div class="content_search">
        <div class="container">
            <div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 style="color: var(--primary_background); font-family:'DM Sans', sans-serif; font-weight:700"
                            class="text-center mb-3">
                            Find Universities by Country
                        </h2>
                    </div>

                    <div class="col-9 col-md-5 mb-4">
                        <input type="text" placeholder="Filter Country" id="country-list-filter" class="form-control form-control-lg">
                    </div>
                </div>

            </div>

            <div class="country-container row mx-1">
                @foreach ($countries as $country)
                    <div class="col-6 col-md-3 col-lg-2 px-1">
                        <a href="{{ route('frontend.all_universities_list', ['continent' => $country->continent->id, 'country' => $country->id]) }}"
                            style="color: var(--primary_background)">
                            <div class="card my-1">
                                <div class="card-body">
                                    <span>{{ $country->name }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('Frontend.layouts.parts.news-letter')
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterInput = document.querySelector('input#country-list-filter');
            const countryCards = document.querySelectorAll('.country-container .col-6');
            const noResultMessage = document.createElement('div');

            noResultMessage.className = 'no-results text-center';
            noResultMessage.textContent = 'No Country Found';
            document.querySelector('.country-container').appendChild(noResultMessage);

            filterInput.addEventListener('keyup', function() {
                const filterValue = filterInput.value.toLowerCase();
                let visibleCardFound = false;

                countryCards.forEach(card => {
                    const countryName = card.querySelector('.card-body span').textContent
                        .toLowerCase();
                    if (countryName.includes(filterValue)) {
                        card.style.display = '';
                        visibleCardFound = true;
                    } else {
                        card.style.display = 'none';
                    }
                });

                noResultMessage.style.display = visibleCardFound ? 'none' : 'block';
            });

            filterInput.dispatchEvent(new Event('keyup'));
        });
    </script>
@endsection
