<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/summernote/dist/summernote-bs4.css') }}">
    <title>{{ env('APP_NAME') }} | Add University Program</title>
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            overflow-y: auto;
        }
    </style>
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
                            Add University Program
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-12 m-auto grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample" action="{{ route('admin.u_course.store') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Universities <span class="text-danger">*</span></label>
                                                    <select id="university-select"
                                                        class="form-control form-control-lg select2"
                                                        name="university_id[]" required>
                                                        <option value="">Select All</option>
                                                        <!-- Select All option -->
                                                        @foreach ($universities as $university)
                                                            <option value="{{ $university->id }}">
                                                                {{ $university->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Department <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg select2" id="departments"
                                                        name="department_id" required multiple>
                                                        <option value="">Select Department</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg select2" id="degrees"
                                                        name="degree_id" required multiple>
                                                        <option value="">Select Degree</option>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Section <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select id="section" class="form-control form-control-lg select2"
                                                        name="section_id" required multiple>
                                                        <option value="">Select Section</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Course Name <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="text" name="course_name"
                                                        placeholder="Enter Course Name" class="form-control" required>
                                                </div>
                                            </div>



                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Course Duration <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="text" id="course_duration" name="course_duration"
                                                        placeholder="Enter Course Duration" class="form-control"
                                                        required>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Application Start Date <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="date" name="next_start_date" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Application Deadline <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="date" name="application_deadline"
                                                        class="form-control" required>
                                                </div>
                                            </div> --}}

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Course Language <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" name="language_id"
                                                        required>
                                                        <option value="">Select Course Language</option>
                                                        @foreach ($languages as $language)
                                                            <option value="{{ $language->id }}">{{ $language->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            {{-- <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Category <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select id="cat" class="form-control form-control-lg"
                                                        name="category_id" required>
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Sub Category </label>
                                                    <select id="subCat" class="form-control form-control-lg"
                                                        name="sub_category_id">
                                                        <option value="">Select Category First</option>
                                                    </select>
                                                </div>
                                            </div> --}}

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Related Programs</label>
                                                    <select class="form-control form-control-lg multipleSelect2Search"
                                                        name="relatedcourse_id[]" multiple>
                                                        <option value="">Select type</option>
                                                        @foreach ($courses as $course)
                                                            <option value="{{ $course->id }}">{{ $course->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Video URL</label>
                                                    <input type="text" class="form-control" name="trailer_video_url"
                                                        placeholder="Enter Youtube Video link" />
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Pre Requisites</label>
                                                    <div class="mg-t-10 mg-sm-t-0 add-data">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mt-2">
                                                            <div class="d-flex align-items-center select-add-section"
                                                                style="width: 97%;">
                                                                <input type="text" name="requisites[]"
                                                                    class="form-control"
                                                                    placeholder="Enter Pre Requisites">
                                                            </div>
                                                            <a id="plus-btn-data" href="javascript:void(0)"
                                                                class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                    class="fas fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Introduction <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <textarea class="form-control summernote" name="introduction" style="height: 150px" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About This Program / Overview <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <textarea class="form-control summernote" name="about" style="height: 150px" required></textarea>
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

    <script src="{{ asset('backend/assets/js/select2.js') }}"></script>
    <script src="{{ asset('backend/lib/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $('.summernote').summernote({
            placeholder: 'Write something...',
            tabsize: 4,
            height: 150
        });
    </script>

    <script src="{{ asset('backend/assets/js/dropify.js') }}"></script>
    <script>
        $(document).ready(function() {
            var selectElement = $('#university-select');

            selectElement.select2({
                placeholder: "Select Universities",
                allowClear: true
            });

        });
    </script>


    <script>
        $(document).ready(function() {
            $('#university-select').on('change', function() {
                var universityId = $(this).val();

                if (universityId) {
                    $.ajax({
                        url: "{{ route('get.details.by.university') }}", // Single API for all data
                        type: "GET",
                        data: {
                            university_id: universityId
                        },
                        success: function(response) {
                            console.log(response);

                            // Reset all fields
                            $('#departments, #degrees, #section').empty().append(
                                '<option value="">Select Option</option>');

                            // Set Degrees
                            var selectedDegrees = [];
                            $.each(response.degrees, function(key, value) {
                                $('#degrees').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                                selectedDegrees.push(value.id);
                            });
                            $('#degrees').val(selectedDegrees).trigger('change');

                            // Set Departments
                            var selectedDepartments = [];
                            $.each(response.departments, function(key, value) {
                                $('#departments').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                                selectedDepartments.push(value.id);
                            });
                            $('#departments').val(selectedDepartments).trigger('change');

                            // Set Sections
                            var selectedSections = [];
                            $.each(response.sections, function(key, value) {
                                $('#section').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                                selectedSections.push(value.id);
                            });
                            $('#section').val(selectedSections).trigger('change');

                            $('#course_duration').val(response.duration).trigger('change');


                        }
                    });
                } else {
                    // Clear fields if no university selected
                    $('#department, #degree, #section').empty().append(
                        '<option value="">Select Option</option>');
                    $('#department, #degree, #section').val([]).trigger('change');
                }
            });
        });
    </script>



    {{-- <script>
        $(document).ready(function() {
            var selectElement = $('#university-select');

            selectElement.select2({
                placeholder: "Select Universities",
                allowClear: true
            });

            selectElement.on('select2:select', function(e) {
                if (e.params.data.id === "all") {
                    selectElement.find("option").prop("selected", true);
                    selectElement.trigger("change");
                }
            });

            selectElement.on('select2:unselect', function(e) {
                if (e.params.data.id === "all") {
                    selectElement.find("option").prop("selected", false);
                    selectElement.trigger("change");
                }
            });
        });
    </script> --}}

    <script>
        $('.multipleSelect2Search').select2();
        $('.select2').select2();

        $('#thumbnail_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#thumbnail_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });

        // Course Pre Requisites start
        $('#plus-btn-data').on('click', function() {
            var myvar = '<div class="d-flex align-items-center justify-content-between mt-2">' +
                '<div class="d-flex align-items-center select-add-section" style="width: 97%;">' +
                '<input type="text" name="requisites[]" class="form-control" placeholder="Enter Pre Requisites">' +
                '</div>' +
                '<a href="javascript:void(0)" class="minus-btn-data-requisites px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>' +
                '</div>';

            $('.add-data').prepend(myvar);
        });
        $(document).on('click', '.minus-btn-data-requisites', function() {
            $(this).parent().remove();
        });

        // fetch degrees based on department selection
        $('#department').on("change", function() {
            let id = $(this).val();
            let url = '/get/degree/' + id;

            if (id == null || id == '') {
                $('#degree').empty();
                let html = '<option value="">Select Department First</option>';
                $('#degree').append(html);
            }

            $.ajax({
                url: url,
                type: 'GET',
                success: function(res) {
                    $('#degree').empty();
                    let html = '<option value="">Select Degree</option>';

                    res.forEach(function(element) {
                        html += '<option value="' + element.id + '">' + element.name +
                            '</option>';
                    });
                    $('#degree').append(html);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        // fetch sub categories based on category selection
        $('#cat').on("change", function() {
            let id = $(this).val();
            let url = '/get/subcat/' + id;

            if (id == null || id == '') {
                $('#subCat').empty();
                let html = '<option value="">Select Category First</option>';
                $('#subCat').append(html);
            }

            $.ajax({
                url: url,
                type: 'GET',
                success: function(res) {
                    $('#subCat').empty();
                    let html = '<option value="">Select Sub Category</option>';

                    res.forEach(function(element) {
                        html += '<option value="' + element.id + '">' + element.name +
                            '</option>';
                    });
                    $('#subCat').append(html);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
</body>

</html>
