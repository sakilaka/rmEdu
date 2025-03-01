<style>
    /* -------- single course ---------- */
    .single-course {
        background: #FFFFFF !important;
        border-radius: 8px !important;
        -webkit-border-radius: 8px !important;
        -ms-border-radius: 8px !important;
        overflow: hidden !important;
        position: relative !important;
        transition: all 0.4s ease !important;
        -webkit-transition: all 0.4s ease !important;
        -moz-transition: all 0.4s ease !important;
        -ms-transition: all 0.4s ease !important;
        margin-bottom: 30px !important;
        border: 0.5px solid #f2f2f2 !important;
    }

    .single-course .lp-course-buttons {
        display: inline-block !important;
    }

    .single-course .course-thumb {
        position: relative !important;
        z-index: 1 !important;
        transition: all 0.5s ease !important;
        -webkit-transition: all 0.5s ease !important;
        -moz-transition: all 0.5s ease !important;
        -ms-transition: all 0.5s ease !important;
    }

    .single-course .course-thumb img {
        border-radius: 8px !important;
        height: 176px !important;
        width: 100% !important;
        object-fit: cover !important;
    }

    .single-course .course-thumb .course-link {
        display: block !important;
        width: 100% !important;
        height: 100% !important;
        z-index: -1 !important;
        position: relative !important;
    }

    .single-course .course-thumb .course-price-item .course-price {
        display: inline-block !important;
        text-align: center !important;
        position: absolute !important;
        right: 10px !important;
        bottom: -40px !important;
        min-width: 70px !important;
        min-height: 70px !important;
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        -webkit-box-align: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
        -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
        justify-content: center !important;
    }

    .single-course .course-thumb .course-price-item .course-price img {
        object-fit: contain !important;
        width: 5.5rem !important;
    }

    .single-course .course-thumb .meta-list {
        position: absolute !important;
        left: 15px !important;
        top: 15px !important;
    }

    .single-course .course-thumb .meta-list {
        margin-bottom: 15px !important;
    }

    .single-course .course-thumb .meta-list a {
        background: #1DC295 !important;
        display: inline-block !important;
        border-radius: 3px !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        padding: 3px 10px !important;
        color: #FFFFFF !important;
        text-transform: capitalize !important;
    }

    .single-course .course-thumb .meta-list a:hover {
        color: #FFFFFF !important;
    }

    .single-course .course-thumb .meta-list a:nth-child(odd) {
        /* background-color: #FFA100 !important; */
        background-color: var(--primary_background) !important;
    }

    .single-course .course-thumb .meta-list a:nth-child(3) {
        /* background: #14C6EB !important; */
        background: var(--secondary_background) !important;
    }

    .single-course .content-area {
        padding: 30px 15px 25px !important;
    }

    .single-course .content-area .ts-course-el-title {
        font-size: 20px !important;
        font-weight: 700 !important;
    }


    .single-course .content-area .ts-course-el-title a {
        color: #120F2D !important;
        transition: all 0.4s ease !important;
    }

    @media screen and (min-width:767px) {
        .single-course .content-area .ts-course-el-title {
            line-height: 1.4 !important;
            display: -webkit-box !important;
            -webkit-box-orient: vertical !important;
            -webkit-line-clamp: 1 !important;
            overflow: hidden !important;
        }

        .single-course .content-area .ts-course-el-title a {
            -webkit-transition: all 0.4s ease !important;
            -moz-transition: all 0.4s ease !important;
            -ms-transition: all 0.4s ease !important;
            display: -webkit-box !important;
            -webkit-line-clamp: 1 !important;
            -webkit-box-orient: vertical !important;
            max-width: 100% !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
        }

        .single-course .content-area .ts-course-el-title a:not(:only-child) {
            line-height: 2.8 !important;
        }
    }

    .single-course .content-area .ts-course-el-title a:hover {
        color: var(--secondary_background) !important;
    }

    .single-course .content-area .content-top ul {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        -webkit-box-pack: justify !important;
        -ms-flex-pack: justify !important;
        justify-content: space-between !important;
        margin-bottom: 13px !important;
    }

    .single-course .content-area .content-top ul li {
        display: inline-block !important;
    }

    .single-course .content-area .content-top ul li i {
        color: var(--tertiary_background) !important;
        padding-right: 5px !important;
    }

    .single-course .content-area .author-area {
        padding-bottom: 30px !important;
        margin-top: 15px !important;
    }

    .single-course .content-area .author-area .instructor {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        -webkit-box-align: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
    }

    .single-course .content-area .author-area .instructor .instructor-thumb {
        width: 34px !important;
        height: 34px !important;
        border-radius: 50% !important;
        -webkit-border-radius: 50% !important;
        -ms-border-radius: 50% !important;
        display: inline-block !important;
        margin-right: 15px !important;
        background: #defff6 !important;
        overflow: hidden !important;
    }

    .single-course .content-area .author-area .instructor .instructor-thumb img {
        width: 100% !important;
    }

    .single-course .content-area .author-area .instructor div span {
        font-size: 14px !important;
        font-weight: 400 !important;
        color: #706f81 !important;
    }

    .single-course .content-area .xs-ratting-content .xs-review-rattting {
        display: inline-block !important;
        vertical-align: middle !important;
    }

    .single-course .content-area .xs-ratting-content .xs-review-rattting .xs-star {
        line-height: 12px !important;
    }

    .single-course .content-area .course-footer {
        border-top: 1px solid #e3e3e8 !important;
        padding-top: 25px !important;
        position: relative !important;
        -webkit-transition: all 0.5s ease-in-out !important;
        transition: all 0.5s ease-in-out !important;
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        -webkit-box-pack: justify !important;
        -ms-flex-pack: justify !important;
        justify-content: space-between !important;
        -ms-flex-wrap: wrap !important;
        flex-wrap: wrap !important;
    }

    .single-course .content-area .course-footer {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
    }

    .single-course .content-area .course-footer .lessons {
        font-size: 14px !important;
        color: #706f81 !important;
    }

    .single-course .content-area .course-footer .lessons i {
        color: var(--tertiary_background) !important;
        margin-right: 7px !important;
    }

    .single-course .content-area .course-footer .cl-button .btn-link {
        font-size: 15px !important;
        text-decoration: none !important;
        text-transform: capitalize !important;
        border-bottom: 2px solid var(--tertiary_background) !important;
        font-weight: 700 !important;
        -webkit-transition: all ease 0.4s !important;
        transition: all ease 0.4s !important;
    }

    .single-course .content-area .course-footer .cl-button .btn-link i {
        margin-left: 6px !important;
        font-size: 13px !important;
    }

    .single-course .content-area .course-footer .cl-button .btn-link:hover {
        border-color: transparent !important;
    }

    .single-course .content-area .lessons {
        color: var(--primary_background) !important;
        font-size: 11px !important;
        font-weight: bold !important;
        vertical-align: middle !important;
    }

    .single-course .course-footer .cl-button .btn-link {
        border-radius: 8px !important;
        padding: 16px !important;
    }

    .single-course:hover {
        -webkit-box-shadow: 0px 15px 30px rgba(29, 23, 77, 0.08) !important;
        box-shadow: 0px 15px 30px rgba(29, 23, 77, 0.08) !important;
    }

    .single-course:hover .course-footer .cl-button .btn-link {
        border-bottom-color: #F14D5D !important;
        border-radius: 8px !important;
    }

    .single-course table tr,
    .single-course table th {
        padding: 0 !important;
    }
</style>

<div class="row">
    @foreach ($university_courses as $course)
        @php
            if (session('partner_ref_id')) {
                $partnerRef = session('partner_ref_id');
            } elseif (request()->query('partner_ref_id')) {
                $partnerRef = request()->query('partner_ref_id');
            } else {
                $partnerRef = null;
            }

            if ($partnerRef) {
                $apply_url_params = [
                    'id' => $course->id,
                    'partner_ref_id' => $partnerRef,
                ];

                if (session('is_anonymous')) {
                    $apply_url_params['is_anonymous'] = 'true';
                }

                if (session('is_applied_partner')) {
                    $apply_url_params['is_applied_partner'] = true;
                }

                $apply_url = route('apply_cart', $apply_url_params);
            } else {
                $apply_url = route('apply_cart', [
                    'id' => $course->id,
                ]);
            }
        @endphp

        <div class="col-12 col-md-6 col-lg-4 col-auto mt-3">
            <div class="single-course">
                <div class="single-course-wrap">
                    <div class="course-thumb">
                        <a href="{{ route('frontend.course.details', $course->id) }}">
                            <img decoding="async" class="img-fluid" src="{{ @$course->university->banner_image_show }}"
                                alt="Music Theory Learn New student &amp; Fundamentals">
                        </a>

                        <div class="course-price-item">
                            <span class="course-price">
                                <img decoding="async" class="img-fluid" src="{{ $course->university->image_show }}"
                                    alt="">
                            </span>
                        </div>
                        <div class="meta-list">
                            <a href="#">{{ $course->department->name }}</a>
                            <a href="#">{{ $course->degree->name }}</a>
                        </div>
                    </div>

                    <div class="content-area">
                        <div class="content-top">
                            <ul class="list-unstyled">
                                {{-- <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                                    {{ date('d M, Y', strtotime($course->next_start_date)) }}
                                </li> --}}
                                <li> <i class="fa fa-clock"></i>
                                    {{ $course->course_duration }} Year(s)</li>
                            </ul>
                        </div>
                        <h3 class="ts-course-el-title">
                            <a href="{{ route('frontend.course.details', $course->id) }}">
                                {{ $course->name }}
                            </a>
                        </h3>
                        <div class="author-area">
                            <!--Start Course Hints-->
                            <table class="course-card__hints table table-borderless table-sm text-white mb-2">
                                <tbody>
                                    <tr>
                                        <td width="80" class="ps-0">
                                            <div class="d-flex align-items-center">
                                                <div class="course-card__hints--icon me-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="bar-custom me-2">
                                                            <span class="fill"></span>
                                                            <span></span>
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="course-card__hints--text fs-12 fw-bold"
                                                    style="color: var(--product_text_color)">
                                                    {{ substr(@$course->university->name, 0, 50) }}...
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="80" class="ps-0">
                                            <div class="d-flex align-items-center">
                                                <div class="course-card__hints--icon me-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="bar-custom me-2">
                                                            <span class="fill"></span>
                                                            <span></span>
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="course-card__hints--text fs-12 fw-bold"
                                                    style="color: var(--product_text_color)">
                                                    Department:
                                                    {{ @$course->department->name }}</div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="ps-0">
                                            <div class="d-flex align-items-center">
                                                <div class="course-card__hints--icon me-3">
                                                    <svg id="document" xmlns="http://www.w3.org/2000/svg"
                                                        width="17.26" height="14.926" viewBox="0 0 17.26 14.926">
                                                        <path id="Path_148" data-name="Path 148"
                                                            d="M16.065,17.081H1.2a1.2,1.2,0,0,0-1.2,1.2V28.364a1.2,1.2,0,0,0,1.2,1.2h8.67l-.262,1.6a.69.69,0,0,0,1.041.75l1.871-.985a.393.393,0,0,1,.248,0l1.871.985a.834.834,0,0,0,.388.1.656.656,0,0,0,.387-.123.726.726,0,0,0,.266-.728l-.262-1.6h.651a1.2,1.2,0,0,0,1.2-1.2V18.277A1.2,1.2,0,0,0,16.065,17.081ZM12.64,27.511a2.084,2.084,0,1,1,2.084-2.084A2.086,2.086,0,0,1,12.64,27.511Zm.6,2.5a1.383,1.383,0,0,0-1.2,0l-1.323.7.42-2.565a3.1,3.1,0,0,0,3.007,0l.164,1v.005l.256,1.56Zm2.994-1.651a.173.173,0,0,1-.171.171h-.819l-.187-1.142s0-.009,0-.013a3.108,3.108,0,1,0-4.831,0l0,.013-.187,1.142H1.2a.173.173,0,0,1-.171-.171V18.277a.173.173,0,0,1,.171-.171H16.065a.173.173,0,0,1,.171.171Z"
                                                            transform="translate(0 -17.081)"
                                                            fill="var(--button2_color)" />
                                                        <path id="Path_149" data-name="Path 149"
                                                            d="M43.246,60.243H31.631a.512.512,0,0,0,0,1.025H43.246a.512.512,0,0,0,0-1.025Z"
                                                            transform="translate(-28.993 -57.295)"
                                                            fill="var(--button2_color)" />
                                                        <path id="Path_150" data-name="Path 150"
                                                            d="M36.55,100.911H31.631a.512.512,0,0,0,0,1.025H36.55a.512.512,0,0,0,0-1.025Z"
                                                            transform="translate(-28.993 -95.184)"
                                                            fill="var(--button2_color)" />
                                                    </svg>
                                                </div>
                                                <div class="course-card__hints--text fs-12 fw-bold"
                                                    style="color: var(--product_text_color)">
                                                    Degree: {{ @$course->degree->name }}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <!--End Course Hints-->
                        </div>
                        <div class="course-footer">
                            <div class="lessons">
                                @if ($course->year_fee)
                                    Yearly: ${{ $course->year_fee }}
                                @endif
                            </div>
                            <div class="cl-button">
                                <a href="{{ $apply_url }}" class="btn-details btn-link btn-tertiary-bg">Apply Now
                                    <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="university-aside-item__body text-center">
    <button class="university-header__btn btn btn--primary btn-primary-bg btn--lg js-call-modal"
        onclick="window.location.href='{{ route('frontend.university_course_list') }}?university={{ @$university->id }}'">
        View All Program(s)
    </button>
</div>
