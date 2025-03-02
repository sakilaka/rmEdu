<!-- resources/views/Frontend/partials/course_cards.blade.php -->
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