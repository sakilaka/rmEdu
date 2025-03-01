@extends('Frontend.layouts.master-layout')
@section('title', '- All Universities')
@section('head')
    <link href="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/css/application-style.css"
        rel="stylesheet">
    <link href="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/css/tippy.css"
        rel="stylesheet">
    <link href="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/css/wnoty.css"
        rel="stylesheet">

    <link href="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/css/application.css"
        rel="stylesheet">
    <link
        href="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/css/application-bootstrap.css"
        rel="stylesheet">
    <link href="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/css/flatpickr.css"
        rel="stylesheet">
    <link href="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/css/dropzone.css"
        rel="stylesheet">
@endsection

@section('main_content')
@foreach ($courses as $course)
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
@endforeach

    <div class="container" style="margin-top: 7rem;">
        <h2 class="text-center fw-bold my-3" style="font-size: 2rem; color: #333; text-transform: uppercase;">
            Application Notes
        </h2>

        <div style="background-color: #f8f9fa; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
            <p class="fs-6" style="font-size: 1.1rem; line-height: 1.8; color: #2c2c2c;">
                I hereby affirm that: <br> <br>
                1) All information and materials provided are factually true and correct. I understand that I
                may be subject to a range of possible disciplinary actions, including admission revocation or
                expulsion, should the information I’ve certified be false. <br><br>
                2) During my stay in your university, I shall abide by the laws and decrees of your government,
                and will not participate in any activities which are deemed to be adverse to the social order in
                this country and are inappropriate to the capacity as a student. <br><br>
                3) During my study in your country, I shall observe the rules and regulations of the university,
                and will concentrate on my studies and researches, and will follow the teaching programs
                provided by the university. <br><br>
                4) Please check the application information carefully to ensure that the information is correct.
            </p>

            <div class="d-flex align-items-center my-3" style="font-size: 1.2rem; color: #333;">
                <input type="checkbox" id="agreement" style="width: 20px; height: 20px; margin-right: 10px;" required>
                <label for="agreement">I have read and agree to the regulations.</label>
            </div>
            
            <p id="error-message" style="color: red; display: none;">You must agree to the terms and conditions before proceeding.</p>

            <div class="text-center my-3">
                <button id="agreeBtn" class="btn btn-danger">Agree and Continue</button>
            </div>

        </div>
    </div>

    <script>
        document.getElementById('agreeBtn').addEventListener('click', function(event) {
            const checkbox = document.getElementById('agreement');
            const errorMessage = document.getElementById('error-message');

            if (!checkbox.checked) {
                event.preventDefault();  
                errorMessage.style.display = 'block'; 
            } else {
                errorMessage.style.display = 'none';  
                window.location.href = "{{ $apply_url }}";  
            }
        });
    </script>

@endsection
