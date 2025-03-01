<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <title>{{ env('APP_NAME') }} | Edit Inquiry - {{ strtoupper($inquiry['unique_inquiry_code']) }}</title>
</head>

<body>
    <div class="container-scroller">
        @include('Backend.components.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('Backend.components.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            Edit Inquiry - {{ strtoupper($inquiry['unique_inquiry_code']) }}
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="{{ route('admin.inquiry.index') }}" class="btn btn-primary btn-fw">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                View All Inquiry</a>
                        </nav>
                    </div>

                    <div class="row card">
                        <div class="col-md-12 p-4 form-container">
                            <form
                                action="{{ route('admin.inquiry.update', ['unique_id' => $inquiry['unique_inquiry_code']]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <!-- Full Name Field -->
                                    <div class="col-12 col-md-6 mt-2">
                                        <div class="form-group">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                placeholder="Enter Full Name"
                                                value="{{ old('name', $inquiry['name'] ?? '') }}" required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Date of Birth Field -->
                                    <div class="col-12 col-md-6 mt-2">
                                        <div class="form-group">
                                            <label>Date Of Birth <span class="text-danger">*</span></label>
                                            <input type="date" max="{{ now()->toDateString() }}"
                                                class="form-control @error('dob') is-invalid @enderror" name="dob"
                                                value="{{ old('dob', $inquiry['date_of_birth'] ?? '') }}" required>
                                            @error('dob')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email Field -->
                                    <div class="col-12 col-md-6 mt-2">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="Enter Email Address"
                                                value="{{ old('email', $inquiry['email'] ?? '') }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Phone Number Field -->
                                    <div class="col-12 col-md-6 mt-2">
                                        <div class="form-group">
                                            <label>Phone Number <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                placeholder="Enter Contact Number"
                                                value="{{ old('phone', $inquiry['mobile'] ?? '') }}" required>
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Country Field -->
                                    <div class="col-12 col-md-6 mt-2">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select name="country[]" id="country"
                                                class="form-control select2 @error('country') is-invalid @enderror"
                                                multiple>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ in_array($country->id, old('country', json_decode($inquiry['country'], true) ?? [])) ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Applying Degree Field -->
                                    <div class="col-12 col-md-6 mt-2">
                                        <div class="form-group">
                                            <label>Applying Degree</label>
                                            <input type="text"
                                                class="form-control @error('degree') is-invalid @enderror"
                                                name="degree" placeholder="Enter Degree"
                                                value="{{ old('degree', $inquiry['applying_degree'] ?? '') }}">
                                            @error('degree')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Subject Field -->
                                    <div class="col-12 col-md-6 mt-2">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text"
                                                class="form-control @error('subject') is-invalid @enderror"
                                                name="subject" placeholder="Enter Subject"
                                                value="{{ old('subject', $inquiry['subject'] ?? '') }}">
                                            <p class="text-muted" style="font-style: italic;">Separate Subjects With
                                                Comma (,)</p>
                                            @error('subject')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- University Field -->
                                    <div class="col-12 col-md-6 mt-2">
                                        <div class="form-group">
                                            <label>University</label>
                                            <input type="text"
                                                class="form-control @error('university') is-invalid @enderror"
                                                name="university" placeholder="Enter University Name"
                                                value="{{ old('university', $inquiry['university'] ?? '') }}">
                                            <p class="text-muted" style="font-style: italic;">Separate University Names
                                                With Comma (,)</p>
                                            @error('university')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
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
                                        @forelse (old('education_details', json_decode($inquiry['education_details'], true) ?? []) as $index => $education)
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
                                                                name="education_details[{{ $index }}][name]">
                                                                <option value="" disabled>Select a degree
                                                                </option>
                                                                <option value="SSC"
                                                                    {{ old('education_details.' . $index . '.name', $education['name'] ?? '') == 'SSC' ? 'selected' : '' }}>
                                                                    SSC</option>
                                                                <option value="HSC"
                                                                    {{ old('education_details.' . $index . '.name', $education['name'] ?? '') == 'HSC' ? 'selected' : '' }}>
                                                                    HSC</option>
                                                                <option value="Diploma"
                                                                    {{ old('education_details.' . $index . '.name', $education['name'] ?? '') == 'Diploma' ? 'selected' : '' }}>
                                                                    Diploma</option>
                                                                <option value="Bachelor"
                                                                    {{ old('education_details.' . $index . '.name', $education['name'] ?? '') == 'Bachelor' ? 'selected' : '' }}>
                                                                    Bachelor</option>
                                                                <option value="Masters"
                                                                    {{ old('education_details.' . $index . '.name', $education['name'] ?? '') == 'Masters' ? 'selected' : '' }}>
                                                                    Masters</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mt-2">
                                                        <div class="form-group">
                                                            <label>GPA/CGPA</label>
                                                            <input type="text" class="form-control"
                                                                name="education_details[{{ $index }}][gpa]"
                                                                placeholder="Enter GPA/CGPA Score"
                                                                value="{{ old('education_details.' . $index . '.gpa', $education['gpa'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mt-2">
                                                        <div class="form-group">
                                                            <label>Year/Session</label>
                                                            <input type="text" class="form-control"
                                                                name="education_details[{{ $index }}][year]"
                                                                placeholder="Enter Year/Session"
                                                                value="{{ old('education_details.' . $index . '.year', $education['year'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mt-2">
                                                        <div class="form-group">
                                                            <label>Institution</label>
                                                            <input type="text" class="form-control"
                                                                name="education_details[{{ $index }}][institution]"
                                                                placeholder="Enter Institution Name"
                                                                value="{{ old('education_details.' . $index . '.institution', $education['institution'] ?? '') }}">
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
                                                                name="education_details[{{ $random }}][name]">
                                                                <option value="" disabled selected>Select a
                                                                    degree</option>
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
                                                            <input type="text" class="form-control"
                                                                name="education_details[{{ $random }}][gpa]"
                                                                placeholder="Enter GPA/CGPA Score">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mt-2">
                                                        <div class="form-group">
                                                            <label>Year/Session</label>
                                                            <input type="text" class="form-control"
                                                                name="education_details[{{ $random }}][year]"
                                                                placeholder="Enter Year/Session">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mt-2">
                                                        <div class="form-group">
                                                            <label>Institution</label>
                                                            <input type="text" class="form-control"
                                                                name="education_details[{{ $random }}][institution]"
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
                                            @php
                                                $available_docs = json_decode($inquiry['documents'], true);
                                            @endphp
                                            <!-- Group 1 -->
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[passport]" id="passport" value="Passport"
                                                        data-doc-check="passport"
                                                        {{ old('documents.passport') || (isset($available_docs['passport']) && $available_docs['passport']) ? 'checked' : '' }}>
                                                    <label class="" for="passport">Passport</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[police-clearance]" id="police-clearance"
                                                        value="Police Clearance" data-doc-check="police-clearance"
                                                        {{ old('documents.police-clearance') || (isset($available_docs['police-clearance']) && $available_docs['police-clearance']) ? 'checked' : '' }}>
                                                    <label class="" for="police-clearance">Police
                                                        Clearance</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[english-proficiency]" id="english-proficiency"
                                                        value="English Proficiency"
                                                        data-doc-check="english-proficiency"
                                                        {{ old('documents.english-proficiency') || (isset($available_docs['english-proficiency']) && $available_docs['english-proficiency']) ? 'checked' : '' }}>
                                                    <label class="" for="english-proficiency">English
                                                        Proficiency</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[ielts]" id="ielts" value="IELTS"
                                                        data-doc-check="ielts"
                                                        {{ old('documents.ielts') || (isset($available_docs['ielts']) && $available_docs['ielts']) ? 'checked' : '' }}>
                                                    <label class="" for="ielts">IELTS</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[toefl]" id="toefl" value="TOEFL"
                                                        data-doc-check="toefl"
                                                        {{ old('documents.toefl') || (isset($available_docs['toefl']) && $available_docs['toefl']) ? 'checked' : '' }}>
                                                    <label class="" for="toefl">TOEFL</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[pte]" id="pte" value="PTE"
                                                        data-doc-check="pte"
                                                        {{ old('documents.pte') || (isset($available_docs['pte']) && $available_docs['pte']) ? 'checked' : '' }}>
                                                    <label class="" for="pte">PTE</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[gre]" id="gre" value="GRE"
                                                        data-doc-check="gre"
                                                        {{ old('documents.gre') || (isset($available_docs['gre']) && $available_docs['gre']) ? 'checked' : '' }}>
                                                    <label class="" for="gre">GRE</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[duolingo]" id="duolingo" value="Duolingo"
                                                        data-doc-check="duolingo"
                                                        {{ old('documents.duolingo') || (isset($available_docs['duolingo']) && $available_docs['duolingo']) ? 'checked' : '' }}>
                                                    <label class="" for="duolingo">Duolingo</label>
                                                </div>
                                            </div>

                                            <!-- Group 2 -->
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[health-certificate]" id="health-certificate"
                                                        value="Health Certificate" data-doc-check="health-certificate"
                                                        {{ old('documents.health-certificate') || (isset($available_docs['health-certificate']) && $available_docs['health-certificate']) ? 'checked' : '' }}>
                                                    <label class="" for="health-certificate">Health
                                                        Certificate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[ssc]" id="ssc"
                                                        value="S.S.C Certificate" data-doc-check="ssc"
                                                        {{ old('documents.ssc') || (isset($available_docs['ssc']) && $available_docs['ssc']) ? 'checked' : '' }}>
                                                    <label class="" for="ssc">S.S.C Certificate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[hsc]" id="hsc"
                                                        value="H.S.C Certificate" data-doc-check="hsc"
                                                        {{ old('documents.hsc') || (isset($available_docs['hsc']) && $available_docs['hsc']) ? 'checked' : '' }}>
                                                    <label class="" for="hsc">H.S.C Certificate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[bsc]" id="bsc" value="B.SC Certificate"
                                                        data-doc-check="bsc"
                                                        {{ old('documents.bsc') || (isset($available_docs['bsc']) && $available_docs['bsc']) ? 'checked' : '' }}>
                                                    <label class="" for="bsc">B.SC Certificate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[msc]" id="msc" value="M.SC Certificate"
                                                        data-doc-check="msc"
                                                        {{ old('documents.msc') || (isset($available_docs['msc']) && $available_docs['msc']) ? 'checked' : '' }}>
                                                    <label class="" for="msc">M.SC Certificate</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[study-plan]" id="study-plan"
                                                        value="Study Plan" data-doc-check="study-plan"
                                                        {{ old('documents.study-plan') || (isset($available_docs['study-plan']) && $available_docs['study-plan']) ? 'checked' : '' }}>
                                                    <label class="" for="study-plan">Study Plan</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input doc-checkbox" type="checkbox"
                                                        name="documents[bank-statement]" id="bank-statement"
                                                        value="Bank Statement" data-doc-check="bank-statement"
                                                        {{ old('documents.bank-statement') || (isset($available_docs['bank-statement']) && $available_docs['bank-statement']) ? 'checked' : '' }}>
                                                    <label class="" for="bank-statement">Bank Statement</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="document-input-container row">
                                            @php
                                                $available_docs_input =
                                                    json_decode($inquiry['documents_input'], true) ?? [];
                                            @endphp
                                            @foreach ($available_docs_input as $index => $input)
                                                <div class="col-md-6 document-input-item mt-3"
                                                    id="{{ strtolower($index) }}-input">
                                                    <label for="{{ strtolower($index) }}-input"
                                                        class="fw-bold">{{ strtoupper($index) }}</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter {{ strtoupper($index) }} Score"
                                                        name="documents_input[{{ $index }}]"
                                                        id="{{ strtolower($index) }}-input"
                                                        value="{{ $input }}">
                                                    <a href="javascript:void(0)"
                                                        class="text-danger remove-document-input"
                                                        data-doc="{{ strtolower($index) }}">Remove</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4 mt-4">
                                        <div class="form-group">
                                            <label for="program">Program</label>
                                            <select id="program" class="form-control form-control-lg"
                                                name="program">
                                                <option value="" disabled>Select Program</option>
                                                <option value="Bachelor’s"
                                                    {{ old('program') == 'Bachelor’s' || (isset($inquiry['program']) && $inquiry['program'] == 'Bachelor’s') ? 'selected' : '' }}>
                                                    Bachelor’s</option>
                                                <option value="Master’s"
                                                    {{ old('program') == 'Master’s' || (isset($inquiry['program']) && $inquiry['program'] == 'Master’s') ? 'selected' : '' }}>
                                                    Master’s</option>
                                                <option value="PhD"
                                                    {{ old('program') == 'PhD' || (isset($inquiry['program']) && $inquiry['program'] == 'PhD') ? 'selected' : '' }}>
                                                    PhD
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4 mt-4">
                                        <div class="form-group">
                                            <label for="budget">Budget</label>
                                            <input type="number" id="budget" class="form-control" name="budget"
                                                placeholder="Enter Budget"
                                                value="{{ old('budget') ?? (isset($inquiry['budget']) ? $inquiry['budget'] : '') }}">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4 mt-4">
                                        <div class="form-group">
                                            <label for="interest">Interest</label>
                                            <select id="interest" class="form-control form-control-lg"
                                                name="interest">
                                                <option value="" selected disabled>Select Interest</option>
                                                <option value="Poor"
                                                    {{ old('interest') == 'Poor' || (isset($inquiry['interest']) && $inquiry['interest'] == 'Poor') ? 'selected' : '' }}>
                                                    Poor</option>
                                                <option value="Mid"
                                                    {{ old('interest') == 'Mid' || (isset($inquiry['interest']) && $inquiry['interest'] == 'Mid') ? 'selected' : '' }}>
                                                    Mid</option>
                                                <option value="High"
                                                    {{ old('interest') == 'High' || (isset($inquiry['interest']) && $inquiry['interest'] == 'High') ? 'selected' : '' }}>
                                                    High</option>
                                                <option value="Max"
                                                    {{ old('interest') == 'Max' || (isset($inquiry['interest']) && $inquiry['interest'] == 'Max') ? 'selected' : '' }}>
                                                    Max</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="counselor-name">Counselor Name</label>
                                            <textarea id="counselor-name" class="form-control" name="counselor_name" rows="3"
                                                placeholder="Enter Counselor Name">{{ old('counselor_name') ?? (isset($inquiry['counselor_name']) ? $inquiry['counselor_name'] : '') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="reference">Reference</label>
                                            <textarea id="reference" class="form-control" name="reference" rows="3" placeholder="Enter Reference">{{ old('reference') ?? (isset($inquiry['reference']) ? $inquiry['reference'] : '') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <div class="form-group">
                                            <label for="note">Note</label>
                                            <textarea id="note" class="form-control" name="note" rows="3" placeholder="Enter Note">{{ old('note') ?? (isset($inquiry['note']) ? $inquiry['note'] : '') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-5 text-center">
                                        <button type="submit" class="btn btn-primary-bg">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @include('Backend.components.footer')
            </div>
        </div>
    </div>

    @include('Backend.components.script')

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
                                    <input type="text" class="form-control" name="education[${randomId}][gpa]"
                                        placeholder="Enter GPA/CGPA Score">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Year/Session</label>
                                    <input type="text" class="form-control" name="education[${randomId}][year]"
                                        placeholder="Enter Year/Session">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Institution</label>
                                    <input type="text" class="form-control" name="education[${randomId}][institution]"
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
            const $docCheckboxes = $('.doc-checkbox');
            const $documentUploadContainer = $('.document-input-container');

            function createUploadField(docName, docValue) {
                const uploadField = `
                    <div class="col-md-6 document-input-item mt-3" id="${docName.toLowerCase()}-input">
                        <label for="${docName.toLowerCase()}-input" class="fw-bold">${docValue}</label>
                        <input type="text" class="form-control" placeholder="Enter ${docValue} Score" name="documents_input[${docName.toLowerCase()}]" id="${docName.toLowerCase()}-input">
                        <a href="javascript:void(0)" class="text-danger remove-document-input" data-doc="${docName.toLowerCase()}">Remove</a>
                    </div>
                `;
                $documentUploadContainer.append(uploadField);
            }

            $docCheckboxes.each(function() {
                $(this).on('change', function() {
                    const docCheckItem = $(this).data('doc-check');
                    const docCheckValue = $(this).val();

                    if ($(this).is(':checked')) {
                        if (['ielts', 'toefl', 'pte', 'gre', 'duolingo']
                            .includes(docCheckItem.toLowerCase())
                        ) {
                            createUploadField(docCheckItem, docCheckValue);
                        }
                    } else {
                        $(`#${docCheckItem}-input`).remove();
                    }
                });
            });

            $documentUploadContainer.on('click', '.remove-document-input', function(e) {
                const docName = $(this).data('doc');
                $(`#${docName}-input`).remove();

                const $correspondingCheckbox = $(`.doc-checkbox[data-doc-check="${docName}"]`);
                if ($correspondingCheckbox.length) {
                    $correspondingCheckbox.prop('checked', false);
                }
            });
        });
    </script>
</body>

</html>
