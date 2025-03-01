<div class="container" style="margin-top: 2rem">
    <style>
        .shadow-inner::before {
            background: linear-gradient(to top,
                    rgb(15 29 65 / 35%) 0%,
                    rgb(15 29 65 / 45%) 100%);
        }
    </style>
    @if (session('partner_ref_id') || request()->query('partner_ref_id'))
        @php
            $partner_ref_id = session('partner_ref_id') ?? request()->query('partner_ref_id');
            $partner = App\Models\User::find(base64_decode($partner_ref_id));
        @endphp
    @endif
    <div class="category-banner d-flex align-items-center position-relative overflow-hidden text-white px-4 py-5 px-sm-5 mb-4 text-center"
        style="height:250px!important;border-radius: 0.75rem;">
        <div class="shadow-inner">
            <div class="bottom-0 end-0 overflow-hidden position-absolute start-0 top-0" style="border-radius: 0.75rem;">
                <img src="{{ $partner ? $partner->user_profile_banner : asset('frontend/images/No-image.jpg') }}"
                    class="img-fluid wh_sm_100" alt="">
            </div>
        </div>
        <div class="position-relative d-flex justify-content-start align-items-center" style="z-index: 9">
            <div style="width: 7rem;">
                <img src="{{ $partner ? $partner->image_show : asset('frontend/images/no-profile.jpg') }}"
                    class="img-fluid" alt="" style="border-radius:5%">
            </div>
            <div style="margin-left: 2rem">
                @if ($partner)
                    @php
                        $country = App\Models\Country::find($partner->country);
                    @endphp
                    <div>
                        <h2 style="font-size: 2rem; font-weight:700;">{{ $partner->name }}</h2>
                        <p class="text-start" style="font-size: 1rem">
                            {{ $partner->address ? $partner->address . ',' : '' }}
                            {{ $country ? $country->name . ',' : '' }}
                            {{ $partner->continents->name ?? '' }}
                        </p>
                    </div>

                    <div>
                        <style>
                            .footer_social_container a {
                                background-color: #D9ECFF;
                                padding: 6px;
                                border-radius: 50%;
                                transition: 0.3s;
                                text-align: center !important;
                                border-style: solid;
                                border-width: 2px 2px 2px 2px;
                                border-color: #FFFFFF1A;
                                width: 36px;
                                height: 36px;
                                margin-right: 8px;
                            }

                            .footer_social_container a:hover {
                                background-color: #158BFE;
                                animation-name: footer-animation-push;
                                animation-duration: .3s;
                                animation-timing-function: linear;
                                animation-iteration-count: 1;
                            }

                            .footer_social_container a svg {
                                fill: #313041;
                            }

                            .footer_social_container a:hover>svg {
                                fill: white;
                            }

                            @keyframes footer-animation-push {
                                50% {
                                    transform: scale(0.8)
                                }

                                100% {
                                    transform: scale(1)
                                }
                            }
                        </style>

                        <div class="d-flex align-items-center justify-content-start mt-2 footer_social_container">
                            <a class="footer_social_icons_container" target="_blank"
                                href="{{ $partner->facebook_url ?? '#' }}" style="margin-left: 0 !important;">
                                <svg class="w-[40px] h-[40px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="20" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                            <a class="footer_social_icons_container" target="_blank"
                                href="{{ $partner->twitter_url ?? '#' }}" style="margin-left: 0 !important;">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                            <a class="footer_social_icons_container" target="_blank"
                                href="{{ $partner->instagram_url ?? '#' }}">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
