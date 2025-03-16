<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    {{-- <link rel="stylesheet" href="{{ asset('backend/assets/vendors/summernote/dist/summernote-bs4.css') }}"> --}}
    <title>{{ env('APP_NAME') }} | Edit University</title>
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
                            Edit University
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="{{ route('admin.university.index') }}" class="btn btn-primary btn-fw">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                View All University</a>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-md-12 m-auto grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample"
                                        action="{{ route('admin.university.update', $university->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col-sm-12 col-md-8 col-lg-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">University Icon <span
                                                                    class="text-danger"
                                                                    style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                            <div class="dropify-wrapper" style="border: none">
                                                                <div class="dropify-loader"></div>
                                                                <div class="dropify-errors-container">
                                                                    <ul></ul>
                                                                </div>
                                                                <input type="file" class="dropify" name="image"
                                                                    accept="image/*" id="icon_upload">
                                                                <button type="button"
                                                                    class="dropify-clear">Remove</button>
                                                                <div class="dropify-preview">
                                                                    <span class="dropify-render"></span>
                                                                    <div class="dropify-infos">
                                                                        <div class="dropify-infos-inner">
                                                                            <p class="dropify-filename">
                                                                                <span class="file-icon"></span>
                                                                                <span
                                                                                    class="dropify-filename-inner"></span>
                                                                            </p>
                                                                            <p class="dropify-infos-message">
                                                                                Drag and drop or click to replace
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-sm-6 d-flex justify-content-center align-items-center">
                                                        <div class="px-3">
                                                            <img src="{{ $university->image_show ?? asset('frontend/images/No-image.jpg') }}"
                                                                alt="{{ $university->name }}-icon" class="img-fluid"
                                                                style="border-radius: 10px; max-height: 200px !important;"
                                                                id="icon_preview">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-8 col-lg-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">University Banner Image
                                                                <span class="text-danger"
                                                                    style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                            <div class="dropify-wrapper" style="border: none">
                                                                <div class="dropify-loader"></div>
                                                                <div class="dropify-errors-container">
                                                                    <ul></ul>
                                                                </div>
                                                                <input type="file" class="dropify"
                                                                    name="banner_image" accept="image/*"
                                                                    id="banner_upload">
                                                                <button type="button"
                                                                    class="dropify-clear">Remove</button>
                                                                <div class="dropify-preview">
                                                                    <span class="dropify-render"></span>
                                                                    <div class="dropify-infos">
                                                                        <div class="dropify-infos-inner">
                                                                            <p class="dropify-filename">
                                                                                <span class="file-icon"></span>
                                                                                <span
                                                                                    class="dropify-filename-inner"></span>
                                                                            </p>
                                                                            <p class="dropify-infos-message">
                                                                                Drag and drop or click to replace
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-sm-6 d-flex justify-content-center align-items-center">
                                                        <div class="px-3">
                                                            <img src="{{ $university->banner_image_show ?? asset('frontend/images/No-image.jpg') }}"
                                                                alt="{{ $university->name }}-banner-image"
                                                                class="img-fluid"
                                                                style="border-radius: 10px; max-height: 200px !important;"
                                                                id="banner_preview">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">University Name:
                                                        <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="Enter University Name"
                                                            value="{{ $university->name }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Continent
                                                        <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span>
                                                    </label>
                                                    <select id="continent" class="form-control form-control-lg"
                                                        name="continent_id" id="phar_cat" required>
                                                        <option value="">Select Continent</option>
                                                        @foreach ($continents as $continent)
                                                            <option @if ($continent->id == $university->continent_id) Selected @endif
                                                                value="{{ $continent->id }}">{{ $continent->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Country <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" name="country_id"
                                                        id="country" required>
                                                        <option value="">Select Continent First</option>
                                                        @foreach ($countries as $country)
                                                            <option @if ($country->id == $university->country_id) Selected @endif
                                                                value="{{ $country->id }}">{{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree
                                                        <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span>
                                                    </label>
                                                    <select id="degree"
                                                        class="form-control form-control-lg select2"
                                                        name="degree_id[]" required multiple>
                                                        <option value="">Select Degree</option>
                                                        @php
                                                            $selectedDegrees = explode(
                                                                ',',
                                                                $university->degree_id ?? '',
                                                            );
                                                        @endphp
                                                        @foreach ($degrees as $degree)
                                                            <option value="{{ $degree->id }}"
                                                                {{ in_array($degree->id, $selectedDegrees) ? 'selected' : '' }}>
                                                                {{ $degree->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Department
                                                        <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span>
                                                    </label>
                                                    <select id="department"
                                                        class="form-control form-control-lg select2"
                                                        name="department_id[]" required multiple>
                                                        <option value="">Select Department</option>
                                                        @php
                                                            $selectedDepartments = explode(
                                                                ',',
                                                                $university->department_id ?? '',
                                                            );
                                                        @endphp
                                                        @foreach ($departments as $department)
                                                            <option value="{{ $department->id }}"
                                                                {{ in_array($department->id, $selectedDepartments) ? 'selected' : '' }}>
                                                                {{ $department->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Languages
                                                        <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span>
                                                    </label>
                                                    <select id="language"
                                                        class="form-control form-control-lg select2"
                                                        name="language_id[]" required multiple>
                                                        <option value="">Select Languages</option>
                                                        @php
                                                            $selectedLanguages = explode(
                                                                ',',
                                                                $university->language_id ?? '',
                                                            );
                                                        @endphp
                                                        @foreach ($languages as $language)
                                                            <option value="{{ $language->id }}"
                                                                {{ in_array($language->id, $selectedLanguages) ? 'selected' : '' }}>
                                                                {{ $language->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Section
                                                        <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span>
                                                    </label>
                                                    <select id="section"
                                                        class="form-control form-control-lg select2"
                                                        name="section_id[]" required multiple>
                                                        <option value="">Select Section</option>
                                                        @php
                                                            $selectedSections = explode(
                                                                ',',
                                                                $university->section_id ?? '',
                                                            );
                                                        @endphp
                                                        @foreach ($sections as $section)
                                                            <option value="{{ $section->id }}"
                                                                {{ in_array($section->id, $selectedSections) ? 'selected' : '' }}>
                                                                {{ $section->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Application Deadline</label>
                                                    <input type="date" name="app_deadline" value="{{ $university->app_deadline }}" class="form-control"
                                                        placeholder="Enter Address" >
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Next start date</label>
                                                    <input type="date" name="next_start_date" value="{{ $university->next_start_date }}" class="form-control"
                                                        placeholder="Enter Address">
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Yearly tuition</label>
                                                    <input type="text" name="yearly_tuition" value="{{ $university->yearly_tuition }}" class="form-control"
                                                        placeholder="Enter Address">
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Duration</label>
                                                    <input type="number" step="0.1" name="duration" value="{{ $university->duration }}" class="form-control"
                                                        placeholder="Enter Duration">
                                                </div>
                                            </div>

                                              <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Star</label>
                                                        <select class="form-control" name="star" id="">
                                                            <option @if($university->star === 1) selected @endif value="1">1</option>
                                                            <option @if($university->star === 2) selected @endif value="2">2</option>
                                                            <option @if($university->star === 3) selected @endif value="3">3</option>
                                                            <option @if($university->star === 4) selected @endif value="4">4</option>
                                                            <option @if($university->star === 5) selected @endif value="5">5</option>
                                                        </select>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>State <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" name="state_id"
                                                        id="state" required>
                                                        <option value="">Select Country First</option>
                                                        @foreach ($states as $state)
                                                            <option @if ($state->id == $university->state_id) Selected @endif
                                                                value="{{ $state->id }}">{{ $state->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>City <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" name="city_id"
                                                        id="city" required>
                                                        <option value="">Select State First</option>
                                                        @foreach ($cities as $city)
                                                            <option @if ($city->id == $university->city_id) Selected @endif
                                                                value="{{ $city->id }}">{{ $city->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address (Street/Apartment, City, State)<span
                                                            class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="text" name="address" class="form-control"
                                                        placeholder="Enter Address"
                                                        value="{{ $university->address }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label">Rank:</label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="number" name="rank" class="form-control"
                                                            placeholder="Enter University Rank in Local"
                                                            value="{{ json_decode($university->stat_values, true)['rank'] ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label">Top (%):</label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="number" name="top_rank_percentage"
                                                            class="form-control"
                                                            placeholder="Enter Top Rank Value in Percentage"
                                                            value="{{ json_decode($university->stat_values, true)['top_rank_percentage'] ?? '' }}">
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label">Total Students:</label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="number" name="total_students"
                                                            class="form-control" placeholder="Enter Total Students"
                                                            value="{{ json_decode($university->stat_values, true)['total_students'] ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label">World Ranking:</label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="number" name="world_ranking"
                                                            class="form-control"
                                                            placeholder="Enter World Ranking value"
                                                            value="{{ json_decode($university->stat_values, true)['world_ranking'] ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="d-flex justify-content-between">
                                                        <label>University Location (Embed Map)</label>
                                                        <a href="javascript:void(0)" id="add-embed-code"
                                                            class="btn btn-sm btn-primary">Add</a>
                                                    </div>
                                                    <div class="mg-t-10 mg-sm-t-0 embed-code-container">
                                                        @php
                                                            $locations = json_decode($university->location, true) ?? [];
                                                        @endphp
                                                        @forelse ($locations as $map)
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mt-2">
                                                                <div class="d-flex align-items-center select-add-section"
                                                                    style="width: 97%;">
                                                                    <input type="text" name="location[]"
                                                                        class="form-control"
                                                                        placeholder="Enter Map Embed Code"
                                                                        value="{{ $map }}">
                                                                </div>
                                                                <a href="javascript:void(0)"
                                                                    class="remove-embed-code px-1 p-0 m-0 ml-2"><i
                                                                        class="fas fa-minus-circle"></i></a>
                                                            </div>
                                                        @empty
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mt-2">
                                                                <div class="d-flex align-items-center select-add-section"
                                                                    style="width: 97%;">
                                                                    <input type="text" name="location[]"
                                                                        class="form-control"
                                                                        placeholder="Enter Map Embed Code">
                                                                </div>
                                                                <a href="javascript:void(0)"
                                                                    class="remove-embed-code px-1 p-0 m-0 ml-2"><i
                                                                        class="fas fa-minus-circle"></i></a>
                                                            </div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Overview</label>
                                                    <textarea class="form-control editor" name="overview" style="height: 150px">{{ $university->overview }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Accommodation</label>
                                                    <textarea class="form-control editor" name="accommodation" style="height: 150px">{{ $university->accommodation }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Admissions Process</label>
                                                    <textarea class="form-control editor" name="admissions_process" style="height: 150px">{{ $university->admissions_process }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Scholarships</label>
                                                    <textarea class="form-control editor" name="scholarships" style="height: 150px">{{ $university->scholarships }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Fees Structure</label>
                                                    <textarea class="form-control editor" name="fees_structure" style="height: 150px">{{ $university->fees_structure }}</textarea>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Academic Requirements</label>
                                                    <textarea class="form-control editor" name="academic_requirements" style="height: 150px">{{ $university->academic_requirements }}</textarea>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>English Requirements</label>
                                                    <textarea class="form-control editor" name="english_requirements" style="height: 150px">{{ $university->english_requirements }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Budget</label>
                                                    <textarea class="form-control editor" name="budgets" style="height: 150px">{{ $university->budgets }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('Backend.components.footer')
            </div>
        </div>
    </div>

    @include('Backend.components.script')
    @include('Backend.components.ckeditor5-config')

    <script src="{{ asset('backend/assets/js/select2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#degree').select2();
        });
        $(document).ready(function() {
            $('#department').select2();
        });
        $(document).ready(function() {
            $('#language').select2();
        });
        $(document).ready(function() {
            $('#section ').select2();
        });
    </script>
    {{-- <script src="{{ asset('backend/lib/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $('.summernote').summernote({
            placeholder: 'Write something...',
            tabsize: 4,
            height: 150
        });
    </script> --}}

    <script src="{{ asset('backend/assets/js/dropify.js') }}"></script>
    <script>
        $('#icon_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#icon_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
        $('#banner_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#banner_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
    </script>
    <script>
        $('#continent').on("change", function() {
            let id = $(this).val();
            let url = '{{ url('get/country/') }}/' + id;

            if (id == null || id == '') {
                $('#country').empty();
                let html = '<option value="">Select Continent First</option>';
                $('#country').append(html);
            }

            $.ajax({
                url: url,
                type: 'GET',
                success: function(res) {
                    $('#country').empty();

                    let html = '<option value="">Select Country</option>';
                    $.each(res, function(index, element) {
                        html += "<option value=" + element.id + ">" + element.name +
                            "</option>";
                    });
                    $('#country').append(html);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('#country').on("change", function() {
            let id = $(this).val();
            let url = '{{ url('/get/state/') }}/' + id;

            if (id == null || id == '') {
                $('#state').empty();
                let html = '<option value="">Select Country First</option>';
                $('#state').append(html);
            }

            $.ajax({
                url: url,
                type: 'GET',
                success: function(res) {

                    $('#state').empty();
                    let html = '<option value="">Select State</option>';
                    $.each(res, function(index, element) {
                        html += "<option value=" + element.id + ">" + element.name +
                            "</option>";
                    });
                    $('#state').append(html);
                    $('#state').val("").change();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('#state').on("change", function() {
            let id = $(this).val();
            let url = '{{ url('/get/city/') }}/' + id;

            if (id == null || id == '') {
                $('#city').empty();
                let html = '<option value="">Select State First</option>';
                $('#city').append(html);
            }

            $.ajax({
                url: url,
                type: 'GET',
                success: function(res) {

                    $('#city').empty();
                    let html = '<option value="">Select City</option>';
                    $.each(res, function(index, element) {
                        html += "<option value=" + element.id + ">" + element.name +
                            "</option>";
                    });
                    $('#city').append(html);
                    $('#city').val("").change();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>

    <script>
        $('#add-embed-code').on('click', function() {
            var myvar = '<div class="d-flex align-items-center justify-content-between mt-2">' +
                '<div class="d-flex align-items-center select-add-section" style="width: 97%;">' +
                '<input type="text" name="location[]" class="form-control" placeholder="Enter Map Embed Code">' +
                '</div>' +
                '<a href="javascript:void(0)" class="remove-embed-code px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>' +
                '</div>';

            $('.embed-code-container').prepend(myvar);
        });
        $(document).on('click', '.remove-embed-code', function() {
            $(this).parent().remove();
        });
    </script>
</body>

</html>
