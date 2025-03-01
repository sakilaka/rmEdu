<style>
    @media screen and (min-width:1199px) {
        .testimonial-title-border {
            position: relative;
        }

        .testimonial-title-border:after {
            content: '';
            height: 221px;
            width: 1px;
            background: rgba(19, 38, 67, .1);
            position: absolute;
            right: 15px;
            top: 115px;
        }
    }

    @media screen and (max-width:767px){
        .testimonial-user-img{
            width: 20em !important;
            height:auto; 
        }
    }
    
    @media screen and (max-width:991px){
        .testimonial-user-img{
            width: 23em !important;
            height:auto; 
        }
    }
    
    @media screen and (min-width:992px){
        .testimonial-user-img{
            width: 30em !important;
            height:auto; 
        }
    }

    .testimonial-cards.slick-slide {
        margin: 0 20px !important;
    }
</style>
<section class="container testimonial-section" style="margin-top: 5rem">
    <div class="row">
        <div class="testimonial-title-border p-4 col-12 col-lg-3 d-flex flex-column justify-content-center align-items-center">
            <p class="mb-0" style="font-family: 'DM Sans', sans-serif;font-size:3rem;font-weight:600;">
                {{ $home_content->review_title1 }}</p>
            <p style="font-family: 'DM Sans', sans-serif;font-size:1rem;font-weight:500;">{{ $home_content->review_title2 }}</p>
        </div>

        <div class="col-12 col-lg-9 testimonial-cards slick-slider">
            @foreach ($testimonials as $testimonial)
                <div class="d-lg-flex justify-content-center p-4">
                    <div class="d-lg-flex">
                        <div class="col-lg-6 d-flex justify-content-end align-items-center">
                            <div>
                                <div>
                                    <img src="{{ asset('frontend/images/left-quotes-sign.png') }}" alt="">
                                </div>
                                <div>
                                    <p style="font-size: 1.05rem !important;font-family: 'DM Sans', sans-serif;">{!! $testimonial->comment !!}</p>
                                </div>
                                <div>
                                    <p class="mb-0 fw-bold mt-2" style="font-size: 1.25rem;font-family: 'DM Sans', sans-serif;">{{ $testimonial->name }}
                                    </p>
                                    <p class="mb-0" style="font-size: 0.9rem;font-family: 'DM Sans', sans-serif;">{{ $testimonial->designation }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="row">
                                    <div class="col">
                                        <img class="testimonial-user-img" src="{{ $testimonial->image_show ?? asset('frontend/images/New-Rectangle-2.webp') }}"
                                            alt="" style="border-radius:10px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
