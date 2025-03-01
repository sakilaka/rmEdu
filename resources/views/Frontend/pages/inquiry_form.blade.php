@extends('Frontend.layouts.master-layout')
@section('title', '- Inquery Form')
@section('head')
    @php
        $header_logo = \App\Models\Tp_option::where('option_name', 'theme_logo')->first();
        $header_logo = $header_logo->header_image == '' ? $header_logo->no_image : $header_logo->header_image_show;
    @endphp
    <style>
        .form-container {
            border-radius: 8px;
            background-color: rgba(245, 246, 255, 0.8);
            background-image: url('{{ $header_logo }}');
            background-repeat: no-repeat;
            background-position: top;
            background-size: 50% auto;
            background-blend-mode: overlay;
        }
    </style>

    <link rel="stylesheet"
        href="{{ asset('frontend/application/modules/frontend/views/themes/default/assets/css/select2.min.css') }}">

    <style>
        .select2-container--default .select2-selection--multiple {
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .select2-container .select2-selection--multiple {
            min-height: 48px;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: solid #ccc 1px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            font-size: 0.85rem;
        }
    </style>
@endsection
@section('main_content')


    <div class="content_search" style="margin-top:70px">
        <div class="" style="margin-top: 7rem; margin-bottom:3rem">
            <div class="container-lg">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="row mx-0 align-items-center justify-content-center">

                            @if (session()->has('success') && session('status') === 'submitted')
                                <div class="mt-5 pt-5 d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('frontend/images/done.png') }}" alt="" width="80px">
                                    <h5 class="text-center mt-3">{{ session('success') }}</h5>

                                    <a href="{{ route('home') }}" class="mt-2 btn btn-primary-bg">
                                        Explore Now
                                    </a>
                                </div>
                            @else
                                <div class="col-md-10 p-4 p-sm-5 mt-5 border form-container">
                                    <h2 class="h3 mb-4 mb-sm-5 text-center" style="font-weight: bold">
                                        General Inquiry Form
                                    </h2>
                                    <form action="{{ route('frontend.store_inquiry_form_data') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">

                                            <h5 class="fw-bold">Basic Informations</h5>
                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                        name="name" placeholder="Enter Full Name"
                                                        value="{{ old('name') }}" required>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>Date Of Birth
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="date" max="{{ now()->toDateString() }}"
                                                        class="form-control form-control-lg @error('dob') is-invalid @enderror"
                                                        name="dob" value="{{ old('dob') }}" required>
                                                    @error('dob')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                        name="email" placeholder="Enter Email Address"
                                                        value="{{ old('email') }}">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>Phone Number
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                        class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                                        name="phone" placeholder="Enter Contact Number"
                                                        value="{{ old('phone') }}" required>
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select name="country[]" id="country"
                                                        class="form-control select2 @error('country') is-invalid @enderror"
                                                        multiple>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                {{ in_array($country->id, old('country', [])) ? 'selected' : '' }}>
                                                                {{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>Applying Degree</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg @error('degree') is-invalid @enderror"
                                                        name="degree" placeholder="Enter Degree"
                                                        value="{{ old('degree') }}">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>Subject</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg @error('subject') is-invalid @enderror"
                                                        name="subject" placeholder="Enter Subject"
                                                        value="{{ old('subject') }}">
                                                    <p class="text-muted" style="font-style: italic;">Separate Subjects With
                                                        Comma (,)</p>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>University</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg @error('university') is-invalid @enderror"
                                                        name="university" placeholder="Enter University Name"
                                                        value="{{ old('university') }}">
                                                    <p class="text-muted" style="font-style: italic;">Separate University
                                                        Names
                                                        With Comma (,)</p>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-4 d-flex justify-content-between">
                                                <div>
                                                    <h5 class="fw-bold">Educational Informations</h5>
                                                </div>
                                                <div>
                                                    <button type="button"
                                                        class="btn btn-primary-bg add-education-btn">Add</button>
                                                </div>
                                            </div>

                                            <div class="education-details-container col-12">
                                                @forelse (old('education', []) as $index => $education)
                                                    <div class="education-item mt-4">
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="fw-bold">Education #{{ $loop->iteration }}</h6>
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-danger remove-education-btn">Remove</a>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label>Degree</label>
                                                                    <select class="form-control form-control-lg"
                                                                        name="education[{{ $index }}][name]">
                                                                        <option value="" disabled>Select a degree
                                                                        </option>
                                                                        <option value="SSC"
                                                                            {{ old('education.' . $index . '.name') == 'SSC' ? 'selected' : '' }}>
                                                                            SSC</option>
                                                                        <option value="HSC"
                                                                            {{ old('education.' . $index . '.name') == 'HSC' ? 'selected' : '' }}>
                                                                            HSC</option>
                                                                        <option value="Diploma"
                                                                            {{ old('education.' . $index . '.name') == 'Diploma' ? 'selected' : '' }}>
                                                                            Diploma</option>
                                                                        <option value="Bachelor"
                                                                            {{ old('education.' . $index . '.name') == 'Bachelor' ? 'selected' : '' }}>
                                                                            Bachelor</option>
                                                                        <option value="Masters"
                                                                            {{ old('education.' . $index . '.name') == 'Masters' ? 'selected' : '' }}>
                                                                            Masters</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label>GPA/CGPA</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="education[{{ $index }}][gpa]"
                                                                        placeholder="Enter GPA/CGPA Score"
                                                                        value="{{ old('education.' . $index . '.gpa') }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label>Year/Session</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="education[{{ $index }}][year]"
                                                                        placeholder="Enter Year/Session"
                                                                        value="{{ old('education.' . $index . '.year') }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label>Institution</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="education[{{ $index }}][institution]"
                                                                        placeholder="Enter Institution Name"
                                                                        value="{{ old('education.' . $index . '.institution') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="education-item mt-4">
                                                        @php
                                                            $random = rand();
                                                        @endphp
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="fw-bold">Education #1</h6>
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-danger remove-education-btn">Remove</a>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label>Degree</label>
                                                                    <select class="form-control form-control-lg"
                                                                        name="education[{{ $random }}][name]">
                                                                        <option value="" disabled selected>Select a
                                                                            degree
                                                                        </option>
                                                                        <option value="SSC">SSC</option>
                                                                        <option value="HSC">HSC</option>
                                                                        <option value="Diploma">Diploma</option>
                                                                        <option value="Bachelor">Bachelor</option>
                                                                        <option value="Masters">Masters</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label>GPA/CGPA</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="education[{{ $random }}][gpa]"
                                                                        placeholder="Enter GPA/CGPA Score">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label>Year/Session</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="education[{{ $random }}][year]"
                                                                        placeholder="Enter Year/Session">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label>Institution</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="education[{{ $random }}][institution]"
                                                                        placeholder="Enter Institution Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>

                                            <div class="col-12 col-md-6 mt-4">
                                                <h6 class="fw-bold">Available Documents</h6>
                                                <div class="row">
                                                    <!-- Group 1 -->
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[passport]" id="passport"
                                                                value="Passport"
                                                                {{ old('documents.passport') ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="passport">Passport</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[police-clearance]" id="police-clearance"
                                                                value="Police Clearance"
                                                                {{ old('documents.police-clearance') ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="police-clearance">Police
                                                                Clearance</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[english-proficiency]"
                                                                id="english-proficiency" value="English Proficiency"
                                                                {{ old('documents.english-proficiency') ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="english-proficiency">English
                                                                Proficiency</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[ielts]" id="ielts" value="IELTS"
                                                                {{ old('documents.ielts') ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="ielts">IELTS</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[toefl]" id="toefl" value="TOEFL"
                                                                {{ old('documents.toefl') ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="toefl">TOEFL</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[pte]" id="pte" value="PTE"
                                                                {{ old('documents.pte') ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="pte">PTE</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[gre]" id="gre" value="GRE"
                                                                {{ old('documents.gre') ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="gre">GRE</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[duolingo]" id="duolingo"
                                                                value="Duolingo"
                                                                {{ old('documents.duolingo') ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="duolingo">Duolingo</label>
                                                        </div>
                                                    </div>
                                                    <!-- Group 2 -->
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[health-certificate]"
                                                                id="health-certificate" value="Health Certificate"
                                                                {{ old('documents.health-certificate') ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="health-certificate">Health
                                                                Certificate</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[ssc]" id="ssc"
                                                                value="S.S.C Certificate"
                                                                {{ old('documents.ssc') ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="ssc">S.S.C
                                                                Certificate</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[hsc]" id="hsc"
                                                                value="H.S.C Certificate"
                                                                {{ old('documents.hsc') ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="hsc">H.S.C
                                                                Certificate</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[bsc]" id="bsc"
                                                                value="B.SC Certificate"
                                                                {{ old('documents.bsc') ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="bsc">B.SC
                                                                Certificate</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[msc]" id="msc"
                                                                value="M.SC Certificate"
                                                                {{ old('documents.msc') ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="msc">M.SC
                                                                Certificate</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[study-plan]" id="study-plan"
                                                                value="Study Plan"
                                                                {{ old('documents.study-plan') ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="study-plan">Study
                                                                Plan</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[bank-statement]" id="bank-statement"
                                                                value="Bank Statement"
                                                                {{ old('documents.bank-statement') ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="bank-statement">Bank
                                                                Statement</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="document-input-container row">
                                                    @foreach (old('documents_input', []) as $index => $input)
                                                        <div class="col-md-6 document-input-item mt-3"
                                                            id="{{ strtoupper($index) }}-input">
                                                            <label for="{{ strtoupper($index) }}-input"
                                                              class="fw-bold">{{ strtoupper($index) }}</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter {{ strtoupper($index) }} Score"
                                                                name="documents_input[{{ $index }}]"
                                                                id="{{ strtoupper($index) }}-input"
                                                                value="{{ $input }}">
                                                            <a href="javascript:void(0)"
                                                                class="text-danger remove-document-input"
                                                                data-doc="{{ strtoupper($index) }}">Remove</a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-4">
                                                <div class="form-group">
                                                    <label for="program">Program</label>
                                                    <select id="program" class="form-control form-control-lg"
                                                        name="program">
                                                        <option value="" disabled>Select Program</option>
                                                        <option value="Bachelor’s"
                                                            {{ old('program') == 'Bachelor’s' ? 'selected' : '' }}>
                                                            Bachelor’s</option>
                                                        <option value="Master’s"
                                                            {{ old('program') == 'Master’s' ? 'selected' : '' }}>
                                                            Master’s</option>
                                                        <option value="PhD"
                                                            {{ old('program') == 'PhD' ? 'selected' : '' }}>PhD
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-4">
                                                <div class="form-group">
                                                    <label for="budget">Budget</label>
                                                    <input type="number" id="budget"
                                                        class="form-control form-control-lg" name="budget"
                                                        placeholder="Enter Budget" value="{{ old('budget') }}">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label for="counselor-name">Counselor Name</label>
                                                    <textarea id="counselor-name" class="form-control form-control-lg" name="counselor_name" rows="3"
                                                        placeholder="Enter Counselor Name">{{ old('counselor_name') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label for="reference">Reference</label>
                                                    <textarea id="reference" class="form-control form-control-lg" name="reference" rows="3"
                                                        placeholder="Enter Reference">{{ old('reference') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-2">
                                                <div class="form-group">
                                                    <label for="note">Note</label>
                                                    <textarea id="note" class="form-control form-control-lg" name="note" rows="3"
                                                        placeholder="Enter Note">{{ old('note') }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-5 text-center">
                                                <button type="submit" class="btn btn-primary-bg">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('Frontend.layouts.parts.news-letter')

@endsection

@section('script')
    <script src="{{ asset('backend/lib/select2/js/select2.min.js') }}"></script>
    <script>
        $('.select2').select2({
            placeholder: 'Select an option'
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            /* --------------------- multiple education --------------------- */
            const educationContainer = document.querySelector('.education-details-container');
            const addEducationBtn = document.querySelector('.add-education-btn');

            let educationCount = 1;

            function createEducationFields() {
                const randomId = Math.floor(Math.random() * 1000000);

                const educationFields = `
                    <div class="col-12 education-item mt-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-bold">Education #${educationCount}</h6>
                            <a href="javascript:void(0)" class="btn btn-danger remove-education-btn">Remove</a>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Degree</label>
                                    <select class="form-control form-control-lg" name="education[${randomId}][name]">
                                        <option value="" disabled selected>Select a degree</option>
                                        <option value="SSC">SSC</option>
                                        <option value="HSC">HSC</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Bachelor">Bachelor</option>
                                        <option value="Masters">Masters</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>GPA/CGPA</label>
                                    <input type="text" class="form-control form-control-lg" name="education[${randomId}][gpa]"
                                        placeholder="Enter GPA/CGPA Score">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Year/Session</label>
                                    <input type="text" class="form-control form-control-lg" name="education[${randomId}][year]"
                                        placeholder="Enter Year/Session">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Institution</label>
                                    <input type="text" class="form-control form-control-lg" name="education[${randomId}][institution]"
                                        placeholder="Enter Institution Name">
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                educationContainer.insertAdjacentHTML('beforeend', educationFields);
                renumberEducationItems();
            }

            function renumberEducationItems() {
                const educationItems = document.querySelectorAll('.education-item h6');
                educationItems.forEach((item, index) => {
                    item.textContent = `Education #${index + 1}`;
                });
                educationCount = educationItems.length;
            }

            addEducationBtn.addEventListener('click', function() {
                educationCount++;
                createEducationFields();
            });

            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-education-btn')) {
                    e.target.closest('.education-item').remove();
                    renumberEducationItems();
                }
            });

            /* --------------------- show input box when checked --------------------- */
            const docCheckboxes = document.querySelectorAll('.doc-checkbox');
            const documentUploadContainer = document.querySelector('.document-input-container');

            function createUploadField(docName) {
                const uploadField = `
                    <div class="col-md-6 document-input-item mt-3" id="${docName}-input">
                        <label for="${docName}-input" class="fw-bold">${docName}</label>
                        <input type="text" class="form-control" placeholder="Enter ${docName} Score" name="documents_input[${docName.toLowerCase()}]" id="${docName}-input">
                        <a href="javascript:void(0)" class="text-danger remove-document-input" data-doc="${docName}">Remove</a>
                    </div>
                `;
                documentUploadContainer.insertAdjacentHTML('beforeend', uploadField);
            }

            docCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        if (['ielts', 'toefl', 'pte', 'gre', 'duolingo']
                            .includes(this.value.toLowerCase())) {
                            createUploadField(this.value);
                        }
                    } else {
                        document.getElementById(`${this.value}-input`)
                            .remove();
                    }
                });
            });

            documentUploadContainer.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-document-input')) {
                    const docName = e.target.getAttribute('data-doc');
                    document.getElementById(`${docName}-input`).remove();

                    const correspondingCheckbox = document.querySelector(
                        `.doc-checkbox[value="${docName}"]`);
                    if (correspondingCheckbox) {
                        correspondingCheckbox.checked = false;
                    }
                }
            });
        });
    </script>
@endsection
