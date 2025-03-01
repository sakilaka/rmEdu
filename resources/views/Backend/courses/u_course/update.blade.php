<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/summernote/dist/summernote-bs4.css') }}">
    <title>{{ env('APP_NAME') }} | Edit University Program</title>
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__rendered{
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
                            Edit University Program
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-12 m-auto grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample"
                                        action="{{ route('admin.u_course.update', $course->id) }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Department <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" id="department"
                                                        name="department_id" required>
                                                        <option value="">Select Department</option>
                                                        @foreach ($departments as $department)
                                                            @php
                                                                $is_selected = '';
                                                                if ($department->id == $course->department_id) {
                                                                    $is_selected = 'selected';
                                                                   
                                                                }
                                                            @endphp
                                                            <option value="{{ $department->id }}" {{ $is_selected }}>
                                                                {{ $department->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" id=""
                                                        name="degree_id" required>
                                                        <option value="">Select Degree</option>
                                                            @foreach ($degrees as $degree)
                                                                <option value="{{ $degree->id }}"
                                                                    @if ($degree->id == $course->degree_id) selected @endif>
                                                                    {{ $degree->name }}
                                                                </option>
                                                            @endforeach
                                                     
                                                    </select>
                                                </div>
                                            </div>

                                            

                                            {{-- <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>University <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" name="university_id"
                                                        required>
                                                        <option value="">Select University</option>
                                                        @foreach ($universities as $university)
                                                            <option @if ($university->id == $course->university_id) Selected @endif
                                                                value="{{ $university->id }}">{{ $university->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Universities <span class="text-danger">*</span></label>
                                                    <select id="university-select" class="form-control form-control-lg select2" name="university_id[]" multiple="multiple" required>
                                                        <option value="all">Select All</option>
                                                        @foreach ($universities as $university)
                                                            <option value="{{ $university->id }}" 
                                                                @if(in_array($university->id, explode(',', $course->university_id))) selected @endif>
                                                                {{ $university->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Course Name <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="text" name="course_name"
                                                        placeholder="Enter Course Name" value="{{ $course->name }}"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Section</label>
                                                    <select class="form-control form-control-lg" name="section_id"
                                                        required>
                                                        <option value="">Select Section</option>
                                                        @foreach ($sections as $section)
                                                            <option @if ($section->id == $course->section_id) Selected @endif
                                                                value="{{ $section->id }}">{{ $section->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Consultancy Fee </label>
                                                    <input type="number" min="0" name="consultancy_fee"
                                                        placeholder="Enter Consultancy Fee"
                                                        value="{{ $course->consultancy_fee }}" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Yearly Fee </label>
                                                    <input type="number" min="0" name="year_fee"
                                                        placeholder="Enter Yearly Course Fee"
                                                        value="{{ $course->year_fee }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Program Type</label>
                                                    <select class="form-control form-control-lg" name="course_type"
                                                        required>
                                                        <option @if ($course->coursetype == '1') Selected @endif
                                                            value="1">Our Top Picks</option>
                                                        <option @if ($course->coursetype == '2') Selected @endif
                                                            value="2">Most Popular</option>
                                                        <option @if ($course->coursetype == '3') Selected @endif
                                                            value="3">Fastest Admissions</option>
                                                        <option @if ($course->coursetype == '4') Selected @endif
                                                            value="4">Highest Rating</option>
                                                        <option @if ($course->coursetype == '5') Selected @endif
                                                            value="5">Top Ranked</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Course Duration </label>
                                                    <input type="number" min="0" name="course_duration"
                                                        placeholder="Enter Course Duration"
                                                        value="{{ $course->course_duration }}" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Application Start Date </label>
                                                    <input type="date" name="next_start_date"
                                                        value="{{ $course->next_start_date }}" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Application Deadline</label>
                                                    <input type="date" name="application_deadline"
                                                        value="{{ $course->application_deadline }}"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Course Language <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" name="language_id"
                                                        required>
                                                        <option value="">Select Course Language</option>
                                                        @foreach ($languages as $language)
                                                            <option @if ($course->language_id == $language->id) Selected @endif
                                                                value="{{ $language->id }}">{{ $language->name }}
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
                                                            @php
                                                                $is_selected = '';
                                                                if ($category->id == $course->category_id) {
                                                                    $is_selected = 'selected';
                                                                    // Fetch sub category for the selected category
                                                                    $sub_categories = App\Models\Category::where(
                                                                        'parent_id',
                                                                        $course->category_id,
                                                                    )
                                                                        ->orderBy('id', 'desc')
                                                                        ->get();
                                                                }
                                                            @endphp
                                                            <option value="{{ $category->id }}" {{ $is_selected }}>
                                                                {{ $category->name }}
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
                                                        @isset($sub_categories)
                                                            @foreach ($sub_categories as $sub_category)
                                                                <option value="{{ $sub_category->id }}"
                                                                    @if ($sub_category->id == $course->sub_category_id) selected @endif>
                                                                    {{ $sub_category->name }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Related Programs</label>
                                                    <select class="form-control form-control-lg multipleSelect2Search"
                                                        name="relatedcourse_id[]" multiple>
                                                        <option value="">Select type</option>
                                                        @foreach ($courses as $selected_course)
                                                            <option @if ($selected_course->relatedcourses->where('course_id', $course->id)->all()) Selected @endif
                                                                value="{{ $selected_course->id }}">
                                                                {{ $selected_course->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Video URL</label>
                                                    <input type="text" class="form-control"
                                                        name="trailer_video_url"
                                                        placeholder="Enter Youtube Video link"
                                                        value="{{ $course->trailer_video_url }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Pre Requisites</label>
                                                    <div class="mg-t-10 mg-sm-t-0 add-data">
                                                        @if ($course->courserequisites->count() == 0)
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
                                                        @else
                                                            @foreach ($course->courserequisites as $k => $courserequisite)
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between mt-2">
                                                                    <div class="d-flex align-items-center select-add-section"
                                                                        style="width: 97%;">
                                                                        <input type="text"
                                                                            name="old_requisites[{{ $courserequisite->id }}]"
                                                                            value="{{ $courserequisite->name }}"
                                                                            class="form-control"
                                                                            placeholder="Enter Pre Requisites">
                                                                    </div>
                                                                    @if ($k == $course->courserequisites->count() - 1)
                                                                        <a id="plus-btn-data"
                                                                            href="javascript:void(0)"
                                                                            class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-plus"></i></a>
                                                                    @else
                                                                        <a courserequisite_id="{{ $courserequisite->id }}"
                                                                            href="javascript:void(0)"
                                                                            class="minus-btn-data-requisites px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-minus-circle"></i></a>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Introduction <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <textarea class="form-control summernote" name="introduction" style="height: 150px" required>{!! $course->introduction !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About This Program / Overview <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <textarea class="form-control summernote" name="about" style="height: 150px" required>{!! $course->about !!}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary mr-2">Update</button>
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
        $(document).ready(function () {
            var selectElement = $('#university-select');
    
            // Initialize Select2
            selectElement.select2({
                placeholder: "Select Universities",
                allowClear: true
            });
    
            // Handle "Select All" functionality
            selectElement.on('change', function () {
                var selectedValues = $(this).val(); // Get selected values
    
                if (selectedValues && selectedValues.includes("all")) {
                    // Select all universities
                    $(this).find("option").prop("selected", true);
                } else {
                    // If "Select All" is deselected, remove all selections
                    $(this).find("option[value='all']").prop("selected", false);
                }
    
                $(this).trigger("change.select2"); // Update Select2 UI
            });
        });
    </script>
    <script>
        $('.multipleSelect2Search').select2();

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
