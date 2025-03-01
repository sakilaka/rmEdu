<div class="py-4" style="margin-top: 5rem;">
    <div class="container-lg">
        <div class="row">
            <div class="col-12 course-nav-tab">

                <style>
                .course_nav_tabs.nav-tabs .nav-link {
                    padding: 0.6rem 0.8rem;
                    margin: 0 5px;
                    color: #191919;
                    font-weight: 600;
                    position: relative;
                    border: 0 !important;
                    border-radius: 8px !important;
                    transition: 0.5s;
                }

                .course_nav_tabs.nav-tabs .nav-item:first-child .nav-link {
                    margin-left: 0;
                }

                .course_nav_tabs::-webkit-scrollbar {
                    width: 0px;
                    display: none;
                }

                .course_nav_tabs.nav-tabs .nav-link:focus,
                .course_nav_tabs.nav-tabs .nav-item.show .nav-link,
                .course_nav_tabs.nav-tabs .nav-link.active {
                    background-color: var(--button_tertiary_bg) !important;
                }

                /* -------- single course ---------- */
                .single-course {
                    background: #FFFFFF;
                    border-radius: 8px;
                    -webkit-border-radius: 8px;
                    -ms-border-radius: 8px;
                    overflow: hidden;
                    position: relative;
                    transition: all 0.4s ease;
                    -webkit-transition: all 0.4s ease;
                    -moz-transition: all 0.4s ease;
                    -ms-transition: all 0.4s ease;
                    margin-bottom: 30px;
                    border: 0.5px solid #f2f2f2;
                }

                .single-course .lp-course-buttons {
                    display: inline-block;
                }

                .single-course .course-thumb {
                    position: relative;
                    z-index: 1;
                    transition: all 0.5s ease;
                    -webkit-transition: all 0.5s ease;
                    -moz-transition: all 0.5s ease;
                    -ms-transition: all 0.5s ease;
                }

                .single-course .course-thumb img {
                    border-radius: 8px;
                    height: 176px !important;
                    width: 100%;
                    object-fit: cover;
                }

                .single-course .course-thumb .course-link {
                    display: block;
                    width: 100%;
                    height: 100%;
                    z-index: -1;
                    position: relative;
                }

                .single-course .course-thumb .course-price-item .course-price {
                    display: inline-block;
                    text-align: center;
                    position: absolute;
                    right: 25px;
                    bottom: -25px;
                    min-width: 70px;
                    min-height: 70px;
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    justify-content: center;
                }

                .single-course .course-thumb .course-price-item .course-price img {
                    object-fit: contain;
                    width: 5.5rem;
                }

                .single-course .course-thumb .meta-list {
                    position: absolute;
                    left: 15px;
                    top: 15px;
                }

                .single-course .course-thumb .meta-list {
                    margin-bottom: 15px;
                }

                .single-course .course-thumb .meta-list a {
                    background: #1DC295;
                    display: inline-block;
                    border-radius: 3px;
                    font-size: 12px;
                    font-weight: 600;
                    padding: 0px 10px;
                    color: #FFFFFF !important;
                    text-transform: capitalize;
                }

                .single-course .course-thumb .meta-list a:hover {
                    color: #FFFFFF;
                }

                .single-course .course-thumb .meta-list a:nth-child(odd) {
                    /* background-color: #FFA100; */
                    background-color: var(--primary_background);
                }

                .single-course .course-thumb .meta-list a:nth-child(3) {
                    /* background: #14C6EB; */
                    background: var(--secondary_background);
                }

                .single-course .content-area {
                    padding: 30px 15px 25px;
                }

                .single-course .content-area .ts-course-el-title {
                    font-size: 20px;
                    font-weight: 700;
                }


                .single-course .content-area .ts-course-el-title a {
                    color: #120F2D;
                    transition: all 0.4s ease;
                }

                @media screen and (min-width:767px) {
                    .single-course .content-area .ts-course-el-title {
                        line-height: 1.4;
                        display: -webkit-box;
                        -webkit-box-orient: vertical;
                        -webkit-line-clamp: 1;
                        overflow: hidden;
                    }

                    .single-course .content-area .ts-course-el-title a {
                        -webkit-transition: all 0.4s ease;
                        -moz-transition: all 0.4s ease;
                        -ms-transition: all 0.4s ease;
                        display: -webkit-box;
                        -webkit-line-clamp: 1;
                        -webkit-box-orient: vertical;
                        max-width: 100%;
                        overflow: hidden;
                        text-overflow: ellipsis;
                    }

                    .single-course .content-area .ts-course-el-title a:not(:only-child) {
                        line-height: 2.8;
                    }
                }

                .single-course .content-area .ts-course-el-title a:hover {
                    color: var(--secondary_background);
                }

                .single-course .content-area .content-top ul {
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-pack: justify;
                    -ms-flex-pack: justify;
                    justify-content: space-between;
                    margin-bottom: 13px;
                }

                .single-course .content-area .content-top ul li {
                    display: inline-block;
                }

                .single-course .content-area .content-top ul li i {
                    color: var(--tertiary_background);
                    padding-right: 5px;
                }

                .single-course .content-area .author-area {
                    padding-bottom: 30px;
                    margin-top: 15px;
                }

                .single-course .content-area .author-area .instructor {
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                }

                .single-course .content-area .author-area .instructor .instructor-thumb {
                    width: 34px;
                    height: 34px;
                    border-radius: 50%;
                    -webkit-border-radius: 50%;
                    -ms-border-radius: 50%;
                    display: inline-block;
                    margin-right: 15px;
                    background: #defff6;
                    overflow: hidden;
                }

                .single-course .content-area .author-area .instructor .instructor-thumb img {
                    width: 100%;
                }

                .single-course .content-area .author-area .instructor div span {
                    font-size: 14px;
                    font-weight: 400;
                    color: #706f81;
                }

                .single-course .content-area .xs-ratting-content .xs-review-rattting {
                    display: inline-block;
                    vertical-align: middle;
                }

                .single-course .content-area .xs-ratting-content .xs-review-rattting .xs-star {
                    line-height: 12px;
                }

                .single-course .content-area .course-footer {
                    border-top: 1px solid #e3e3e8;
                    padding-top: 25px;
                    position: relative;
                    -webkit-transition: all 0.5s ease-in-out;
                    transition: all 0.5s ease-in-out;
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-pack: justify;
                    -ms-flex-pack: justify;
                    justify-content: space-between;
                    -ms-flex-wrap: wrap;
                    flex-wrap: wrap;
                }

                .single-course .content-area .course-footer {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                .single-course .content-area .course-footer .lessons {
                    font-size: 14px;
                    color: #706f81;
                }

                .single-course .content-area .course-footer .lessons i {
                    color: var(--tertiary_background);
                    margin-right: 7px;
                }

                .single-course .content-area .course-footer .cl-button .btn-link {
                    font-size: 15px;
                    color: var(--tertiary_background);
                    text-decoration: none;
                    text-transform: capitalize;
                    border-bottom: 2px solid var(--tertiary_background);
                    font-weight: 700;
                    -webkit-transition: all ease 0.4s;
                    transition: all ease 0.4s;
                }

                .single-course .content-area .course-footer .cl-button .btn-link i {
                    margin-left: 6px;
                    font-size: 13px;
                }

                .single-course .content-area .course-footer .cl-button .btn-link:hover {
                    color: var(--button_tertiary_hover_bg);
                    border-color: var(--button_tertiary_hover_bg);
                }

                .single-course .content-area .lessons {
                    color: var(--primary_background) !important;
                    font-size: 11px;
                    font-weight: bold;
                    vertical-align: middle;
                }

                .single-course .course-footer .cl-button .btn-link {
                    border-radius: 8px !important;
                    padding: 16px;
                }

                .single-course:hover {
                    -webkit-box-shadow: 0px 15px 30px rgba(29, 23, 77, 0.08);
                    box-shadow: 0px 15px 30px rgba(29, 23, 77, 0.08);
                }

                .single-course:hover .course-footer .cl-button .btn-link {
                    color: #F14D5D;
                    border-bottom-color: #F14D5D;
                    border-radius: 8px !important;
                }
            </style>

                <!-- Nav tabs -->
                <div class="d-md-flex justify-content-md-between align-items-md-center text-center">
                    <div>
                        <h2 style="font-size: 2.5em; font-weight:700; font-family:'DM Sans', sans-serif">
                            {{ $home_content->course_title }}
                        </h2>
                    </div>

                    <ul class="nav nav-tabs course_nav_tabs flex-nowrap border-0 overflow-auto" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-nowrap btn-primary-bg" href="#all_program" role="tab"
                                data-bs-toggle="tab">
                                All Programs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-nowrap btn-primary-bg" href="#our_top_pics" role="tab"
                                data-bs-toggle="tab">
                                Our Top Picks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-nowrap btn-primary-bg" href="#most_popular" role="tab"
                                data-bs-toggle="tab">
                                Most Popular
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-nowrap btn-primary-bg" href="#fastest_admissions" role="tab"
                                data-bs-toggle="tab">
                                Fastest Admissions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-nowrap btn-primary-bg" href="#highest_rating" role="tab"
                                data-bs-toggle="tab">
                                Highest Rating
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-nowrap btn-primary-bg" href="#top_ranked" role="tab"
                                data-bs-toggle="tab">
                                Top Ranked
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content mt-4">
                    <div role="tabpanel" class="tab-pane fade show active" id="all_program">
                        <div class="row justify-content-center gx-3 gy-4 mt-2">
                            @if (count($courses_all) > 0)
                            @foreach ($courses_all as $course)
                            <div class="col-12 col-md-6 col-lg-3 col-auto mt-sm-3 mt-md-4">

                                <div class="single-course">
                                    <div class="single-course-wrap">
                                        <div class="course-thumb">
                                            <a href="{{ route('frontend.course.details', $course->id) }}">
                                                <img decoding="async" class="img-fluid"
                                                    src="{{ @$course->university->banner_image_show }}"
                                                    alt="Music Theory Learn New student &amp; Fundamentals">
                                            </a>

                                            <div class="course-price-item">
                                                <span class="course-price">
                                                    <img decoding="async" class="img-fluid"
                                                        src="{{ $course->university->image_show ?? 'https://placehold.co/20x30' }}"
                                                        alt="{{ $course->university->name ?? 'University Image' }}">
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
                                                    <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        {{ date('d M, Y', strtotime($course->next_start_date)) }}
                                                    </li>
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
                                                <table
                                                    class="course-card__hints table table-borderless table-sm text-white mb-2">
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
                                                                        {{ substr(@$course->university->name, 0, 150) }}...
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
                                                                        <svg id="document"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="17.26" height="14.926"
                                                                            viewBox="0 0 17.26 14.926">
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
                                                    <a href="{{ route('frontend.course.details', $course->id) }}"
                                                        class="btn-details btn-link btn-tertiary-bg">Apply Now
                                                        <i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                            @else
                            <div class="text-center mt-4">
                                <h3>Course Not Found !</h3>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="our_top_pics">
                        <div class="row justify-content-center gx-3 gy-4 mt-2">
                            @if (count($courses_our_top_pics) > 0)
                            @foreach ($courses_our_top_pics as $course)
                            <div class="col-12 col-md-6 col-lg-3 col-auto mt-sm-3 mt-md-4">

                                <div class="single-course">
                                    <div class="single-course-wrap">
                                        <div class="course-thumb">
                                            <a href="{{ route('frontend.course.details', $course->id) }}">
                                                <img decoding="async" class="img-fluid"
                                                    src="{{ @$course->university->banner_image_show }}"
                                                    alt="Music Theory Learn New student &amp; Fundamentals">
                                            </a>

                                            <div class="course-price-item">
                                                <span class="course-price">
                                                    <img decoding="async" class="img-fluid"
                                                        src="{{ $course->university->image_show ?? 'https://placehold.co/20x30' }}"
                                                        alt="{{ $course->university->name ?? 'University Image' }}">
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
                                                    <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        {{ date('d M, Y', strtotime($course->next_start_date)) }}
                                                    </li>
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
                                                <table
                                                    class="course-card__hints table table-borderless table-sm text-white mb-2">
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
                                                                        <svg id="document"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="17.26" height="14.926"
                                                                            viewBox="0 0 17.26 14.926">
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
                                                    <a href="{{ route('frontend.course.details', $course->id) }}"
                                                        class="btn-details btn-link btn-tertiary-bg">Apply Now
                                                        <i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                            @else
                            <div class="text-center mt-4">
                                <h3>Course Not Found !</h3>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="most_popular">
                        <div class="row justify-content-center gx-3 gy-4 mt-2">
                            @if (count($courses_most_popular) > 0)
                            @foreach ($courses_most_popular as $course)
                            <div class="col-12 col-md-6 col-lg-3 col-auto mt-sm-3 mt-md-4">

                                <div class="single-course">
                                    <div class="single-course-wrap">
                                        <div class="course-thumb">
                                            <a href="{{ route('frontend.course.details', $course->id) }}">
                                                <img decoding="async" class="img-fluid"
                                                    src="{{ @$course->university->banner_image_show }}"
                                                    alt="Music Theory Learn New student &amp; Fundamentals">
                                            </a>

                                            <div class="course-price-item">
                                                <span class="course-price">
                                                    <img decoding="async" class="img-fluid"
                                                        src="{{ $course->university->image_show }}" alt="">
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
                                                    <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        {{ date('d M, Y', strtotime($course->next_start_date)) }}
                                                    </li>
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
                                                <table
                                                    class="course-card__hints table table-borderless table-sm text-white mb-2">
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
                                                                        <svg id="document"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="17.26" height="14.926"
                                                                            viewBox="0 0 17.26 14.926">
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
                                                    <a href="{{ route('frontend.course.details', $course->id) }}"
                                                        class="btn-details btn-link btn-tertiary-bg">Apply Now
                                                        <i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                            @else
                            <div class="text-center mt-4">
                                <h3>Course Not Found !</h3>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="fastest_admissions">
                        <div class="row justify-content-center gx-3 gy-4 mt-2">
                            @if (count($courses_fastest_admissions) > 0)
                            @foreach ($courses_fastest_admissions as $course)
                            <div class="col-12 col-md-6 col-lg-3 col-auto mt-sm-3 mt-md-4">

                                <div class="single-course">
                                    <div class="single-course-wrap">
                                        <div class="course-thumb">
                                            <a href="{{ route('frontend.course.details', $course->id) }}">
                                                <img decoding="async" class="img-fluid"
                                                    src="{{ @$course->university->banner_image_show }}"
                                                    alt="Music Theory Learn New student &amp; Fundamentals">
                                            </a>

                                            <div class="course-price-item">
                                                <span class="course-price">
                                                    <img decoding="async" class="img-fluid"
                                                        src="{{ $course->university->image_show }}" alt="">
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
                                                    <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        {{ date('d M, Y', strtotime($course->next_start_date)) }}
                                                    </li>
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
                                                <table
                                                    class="course-card__hints table table-borderless table-sm text-white mb-2">
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
                                                                        <svg id="document"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="17.26" height="14.926"
                                                                            viewBox="0 0 17.26 14.926">
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
                                                    <a href="{{ route('frontend.course.details', $course->id) }}"
                                                        class="btn-details btn-link btn-tertiary-bg">Apply Now
                                                        <i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                            @else
                            <div class="text-center mt-4">
                                <h3>Course Not Found !</h3>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="highest_rating">
                        <div class="row justify-content-center gx-3 gy-4 mt-2">
                            @if (count($courses_highest_rating) > 0)
                            @foreach ($courses_highest_rating as $course)
                            <div class="col-12 col-md-6 col-lg-3 col-auto mt-sm-3 mt-md-4">

                                <div class="single-course">
                                    <div class="single-course-wrap">
                                        <div class="course-thumb">
                                            <a href="{{ route('frontend.course.details', $course->id) }}">
                                                <img decoding="async" class="img-fluid"
                                                    src="{{ @$course->university->banner_image_show }}"
                                                    alt="Music Theory Learn New student &amp; Fundamentals">
                                            </a>

                                            <div class="course-price-item">
                                                <span class="course-price">
                                                    <img decoding="async" class="img-fluid"
                                                        src="{{ $course->university->image_show ?? 'https://placehold.co/20x30' }}"
                                                        alt="{{ $course->university->name ?? 'University Image' }}">
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
                                                    <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        {{ date('d M, Y', strtotime($course->next_start_date)) }}
                                                    </li>
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
                                                <table
                                                    class="course-card__hints table table-borderless table-sm text-white mb-2">
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
                                                                        <svg id="document"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="17.26" height="14.926"
                                                                            viewBox="0 0 17.26 14.926">
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
                                                    <a href="{{ route('frontend.course.details', $course->id) }}"
                                                        class="btn-details btn-link btn-tertiary-bg">Apply Now
                                                        <i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                            @else
                            <div class="text-center mt-4">
                                <h3>Course Not Found !</h3>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="top_ranked">
                        <div class="row justify-content-center gx-3 gy-4 mt-2">
                            @if (count($courses_top_ranked) > 0)
                            @foreach ($courses_top_ranked as $course)
                            <div class="col-12 col-md-6 col-lg-3 col-auto mt-sm-3 mt-md-4">

                                <div class="single-course">
                                    <div class="single-course-wrap">
                                        <div class="course-thumb">
                                            <a href="{{ route('frontend.course.details', $course->id) }}">
                                                <img decoding="async" class="img-fluid"
                                                    src="{{ @$course->university->banner_image_show }}"
                                                    alt="Music Theory Learn New student &amp; Fundamentals">
                                            </a>

                                            <div class="course-price-item">
                                                <span class="course-price">
                                                    <img decoding="async" class="img-fluid"
                                                        src="{{ $course->university->image_show }}" alt="">
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
                                                    <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        {{ date('d M, Y', strtotime($course->next_start_date)) }}
                                                    </li>
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
                                                <table
                                                    class="course-card__hints table table-borderless table-sm text-white mb-2">
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
                                                                        <svg id="document"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="17.26" height="14.926"
                                                                            viewBox="0 0 17.26 14.926">
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
                                                    <a href="{{ route('frontend.course.details', $course->id) }}"
                                                        class="btn-details btn-link btn-tertiary-bg">Apply Now
                                                        <i class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                            @else
                            <div class="text-center mt-4">
                                <h3>Course Not Found !</h3>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3 firstbutton">
                    <a href="{{ route('frontend.university_course_list') }}"
                        class="btn btn-lg browse-more-btn btn-primary-bg" style="color: var(--button2_text_color)">
                        Browse more Programs
                        <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56" height="15.666"
                            viewBox="0 0 28.56 15.666">
                            <path id="right-arrow_3_" data-name="right-arrow (3)"
                                d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                                transform="translate(0 -107.5)" fill="#fff"></path>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>