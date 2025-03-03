<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/summernote/dist/summernote-bs4.css')); ?>">
    <title><?php echo e(env('APP_NAME')); ?> | Add University Program</title>
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <?php echo $__env->make('Backend.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid page-body-wrapper">
            <?php echo $__env->make('Backend.components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                                    <form class="forms-sample" action="<?php echo e(route('admin.u_course.store')); ?>"
                                        method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Universities <span class="text-danger">*</span></label>
                                                    <select id="university-select"
                                                        class="form-control form-control-lg select2"
                                                        name="university_id[]" required>
                                                        <option value="">Select All</option>
                                                        <!-- Select All option -->
                                                        <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($university->id); ?>">
                                                                <?php echo e($university->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                                            

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Course Language <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" name="language_id"
                                                        required>
                                                        <option value="">Select Course Language</option>
                                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($language->id); ?>"><?php echo e($language->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>

                                            </div>

                                            

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Related Programs</label>
                                                    <select class="form-control form-control-lg multipleSelect2Search"
                                                        name="relatedcourse_id[]" multiple>
                                                        <option value="">Select type</option>
                                                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($course->id); ?>"><?php echo e($course->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                <?php echo $__env->make('Backend.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('Backend.components.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('backend/assets/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/summernote/summernote-bs4.min.js')); ?>"></script>
    <script>
        $('.summernote').summernote({
            placeholder: 'Write something...',
            tabsize: 4,
            height: 150
        });
    </script>

    <script src="<?php echo e(asset('backend/assets/js/dropify.js')); ?>"></script>
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
                        url: "<?php echo e(route('get.details.by.university')); ?>", // Single API for all data
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
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Backend/courses/u_course/create.blade.php ENDPATH**/ ?>