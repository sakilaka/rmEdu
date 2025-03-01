<style>
    .university {
        transition: 0.3s;
        height: 100% !important;
    }

    .university-showcase-container .university-image-container .university-image {
        transition: transform 0.3s;
        transform-origin: center center;
        opacity: 1;
        width: 6.125rem !important;
        height: 5.375rem !important;
        object-fit: contain !important;
        -webkit-transform: perspective(0px) rotateX(0deg) rotateY(0deg) scaleX(1) scaleY(1);
        transform: perspective(0px) rotateX(0deg) rotateY(0deg) scaleX(1) scaleY(1);
    }

    .university:hover {
        border-color: var(--secondary_background);

        .university-showcase-container .university-image-container .university-image {
            -webkit-transform: perspective(0px) rotateX(0deg) rotateY(0deg) scaleX(1.05) scaleY(1.05);
            transform: perspective(0px) rotateX(0deg) rotateY(0deg) scaleX(1.05) scaleY(1.05);
        }
    }

    .university_name:hover {
        color: var(--secondary_background) !important;
    }

    .university-course-container {
        height: 370px !important;
    }

    .course-nav-tab .btn-dark-cerulean {
        color: #fff;
        background-color: var(--secondary_background) !important;
        border-color: var(--secondary_background) !important;
    }

    .course-nav-tab .btn-dark-cerulean:hover {
        color: #fff;
        background-color: var(--button_primary_bg) !important;
        border-color: var(--button_primary_bg) !important;
    }

    .course_nav_tabs::-webkit-scrollbar {
        width: 0px;
        display: none;
    }

    .course-nav-tab-subtitle {
        position: relative;
        display: flex;
        align-items: center;
        color: var(--button_primary_bg);
    }

    .course-nav-tab-subtitle .line {
        width: 30px;
        height: 1px;
        background-color: var(--button_primary_bg);
        margin-right: 10px;
    }

    .course-nav-tab-subtitle .text-uppercase {
        font-weight: 500;
    }

    .browse-more-btn.btn-dark-cerulean {
        color: #fff;
        background-color: var(--button_primary_bg) !important;
        border-color: var(--button_primary_bg) !important;
    }

    .browse-more-btn.btn-dark-cerulean:hover {
        color: #fff;
        background-color: var(--secondary_background) !important;
        border-color: var(--secondary_background) !important;
    }

    .course-university-image-container img {
        transition: transform 0.3s;
        transform-origin: center center;
        opacity: 1;
        width: 6.125rem !important;
        height: 5.375rem !important;
        object-fit: contain !important;
        -webkit-transform: perspective(0px) rotateX(0deg) rotateY(0deg) scaleX(1) scaleY(1);
        transform: perspective(0px) rotateX(0deg) rotateY(0deg) scaleX(1) scaleY(1);
    }
</style>

<div class="container-lg">
    <div class="row justify-content-center gy-4 gx-3">
        @if (count($related_courses) > 0)
            <div class="text-center">
                <h3 class="ca-card-title d-block text-center mb-4 font-dm-sans-title">Related Programs</h3>
            </div>
        @endif

        @foreach ($related_courses as $item)
            @php
                $course = App\Models\Course::find($item->relatedcourse_id);
            @endphp

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

            @if ($course->university)
                <div class="col-12 col-md-6 col-lg-3 col-auto mt-sm-3 mt-md-4">
                    <div class="text-center card university" style="border-radius:8px">
                        <div class="card-body university-course-container">
                            <div class="course-university-image-container">
                                <a href="{{ $course_details_url }}">
                                    <img decoding="async" src="{{ @$course->university->image_show }}"
                                        alt="{{ $course->university->name ?? '' }}"
                                        title="{{ $course->university->name ?? '' }}" style="border-radius: 8px"
                                        class="university-image">
                                </a>
                            </div>
                            <div class="mt-4">
                                <div class="mt-3">
                                    <a href="{{ $course_details_url }}" class="text-dark university_name">
                                        <h5 style="font-size: 1.25rem;" class="fw-bold">
                                            {{ strlen($course->name) > 40 ? substr($course->name, 0, 40) . '...' : $course->name }}
                                        </h5>
                                    </a>
                                    <div class="text-ellipsis"
                                        style="white-space:nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $course->university->address }}
                                    </div>
                                </div>
                                <div style="position: absolute; bottom: 0.85rem; width: 90%;">
                                    <!--Start Course Hints-->
                                    <table class="course-card__hints table table-borderless table-sm text-white mb-2">
                                        <tbody>
                                            <tr>
                                                <td width="80" class="ps-0 border-0">
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
                                                            {!! substr(@$course->university->name, 0, 30) !!}...</div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="80" class="ps-0 border-0">
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
                                                <td class="ps-0 border-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="course-card__hints--icon me-3">
                                                            <svg id="document" xmlns="http://www.w3.org/2000/svg"
                                                                width="17.26" height="14.926"
                                                                viewBox="0 0 17.26 14.926">
                                                                <path id="Path_148" data-name="Path 148"
                                                                    d="M16.065,17.081H1.2a1.2,1.2,0,0,0-1.2,1.2V28.364a1.2,1.2,0,0,0,1.2,1.2h8.67l-.262,1.6a.69.69,0,0,0,1.041.75l1.871-.985a.393.393,0,0,1,.248,0l1.871.985a.834.834,0,0,0,.388.1.656.656,0,0,0,.387-.123.726.726,0,0,0,.266-.728l-.262-1.6h.651a1.2,1.2,0,0,0,1.2-1.2V18.277A1.2,1.2,0,0,0,16.065,17.081ZM12.64,27.511a2.084,2.084,0,1,1,2.084-2.084A2.086,2.086,0,0,1,12.64,27.511Zm.6,2.5a1.383,1.383,0,0,0-1.2,0l-1.323.7.42-2.565a3.1,3.1,0,0,0,3.007,0l.164,1v.005l.256,1.56Zm2.994-1.651a.173.173,0,0,1-.171.171h-.819l-.187-1.142s0-.009,0-.013a3.108,3.108,0,1,0-4.831,0l0,.013-.187,1.142H1.2a.173.173,0,0,1-.171-.171V18.277a.173.173,0,0,1,.171-.171H16.065a.173.173,0,0,1,.171.171Z"
                                                                    transform="translate(0 -17.081)"
                                                                    fill="var(--secondary_background)" />
                                                                <path id="Path_149" data-name="Path 149"
                                                                    d="M43.246,60.243H31.631a.512.512,0,0,0,0,1.025H43.246a.512.512,0,0,0,0-1.025Z"
                                                                    transform="translate(-28.993 -57.295)"
                                                                    fill="var(--secondary_background)" />
                                                                <path id="Path_150" data-name="Path 150"
                                                                    d="M36.55,100.911H31.631a.512.512,0,0,0,0,1.025H36.55a.512.512,0,0,0,0-1.025Z"
                                                                    transform="translate(-28.993 -95.184)"
                                                                    fill="var(--secondary_background)" />
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
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold"
                                            style="color: var(--button_primary_bg); font-size:0.85rem;">
                                            {{ $course->year_fee ? 'Yearly $' . $course->year_fee : '' }}
                                        </span>
                                        <a href="{{ $apply_url }}" class="btn btn-secondary-bg">
                                            <img src="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/img/cart.png"
                                                style="width: 14px;">
                                            Apply Now
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($loop->iteration == 8)
                @php
                    break;
                @endphp
            @endif
        @endforeach
    </div>
</div>
