<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/summernote/dist/summernote-bs4.css')); ?>">
    <title><?php echo e(env('APP_NAME')); ?> | Edit University Program</title>
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__rendered{
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
                            Edit University Program
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-12 m-auto grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample"
                                        action="<?php echo e(route('admin.u_course.update', $course->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Department <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" id="department"
                                                        name="department_id" required>
                                                        <option value="">Select Department</option>
                                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $is_selected = '';
                                                                if ($department->id == $course->department_id) {
                                                                    $is_selected = 'selected';
                                                                   
                                                                }
                                                            ?>
                                                            <option value="<?php echo e($department->id); ?>" <?php echo e($is_selected); ?>>
                                                                <?php echo e($department->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                            <?php $__currentLoopData = $degrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $degree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($degree->id); ?>"
                                                                    <?php if($degree->id == $course->degree_id): ?> selected <?php endif; ?>>
                                                                    <?php echo e($degree->name); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                     
                                                    </select>
                                                </div>
                                            </div>

                                            

                                            

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Universities <span class="text-danger">*</span></label>
                                                    <select id="university-select" class="form-control form-control-lg select2" name="university_id[]" multiple="multiple" required>
                                                        <option value="all">Select All</option>
                                                        <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($university->id); ?>" 
                                                                <?php if(in_array($university->id, explode(',', $course->university_id))): ?> selected <?php endif; ?>>
                                                                <?php echo e($university->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Course Name <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="text" name="course_name"
                                                        placeholder="Enter Course Name" value="<?php echo e($course->name); ?>"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Section <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" name="section_id"
                                                        required>
                                                        <option value="">Select Section</option>
                                                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if($section->id == $course->section_id): ?> Selected <?php endif; ?>
                                                                value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Consultancy Fee <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="number" min="0" name="consultancy_fee"
                                                        placeholder="Enter Consultancy Fee"
                                                        value="<?php echo e($course->consultancy_fee); ?>" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Yearly Fee <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="number" min="0" name="year_fee"
                                                        placeholder="Enter Yearly Course Fee"
                                                        value="<?php echo e($course->year_fee); ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Program Type <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" name="course_type"
                                                        required>
                                                        <option <?php if($course->coursetype == '1'): ?> Selected <?php endif; ?>
                                                            value="1">Our Top Picks</option>
                                                        <option <?php if($course->coursetype == '2'): ?> Selected <?php endif; ?>
                                                            value="2">Most Popular</option>
                                                        <option <?php if($course->coursetype == '3'): ?> Selected <?php endif; ?>
                                                            value="3">Fastest Admissions</option>
                                                        <option <?php if($course->coursetype == '4'): ?> Selected <?php endif; ?>
                                                            value="4">Highest Rating</option>
                                                        <option <?php if($course->coursetype == '5'): ?> Selected <?php endif; ?>
                                                            value="5">Top Ranked</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Course Duration <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="number" min="0" name="course_duration"
                                                        placeholder="Enter Course Duration"
                                                        value="<?php echo e($course->course_duration); ?>" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Application Start Date <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="date" name="next_start_date"
                                                        value="<?php echo e($course->next_start_date); ?>" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Application Deadline <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="date" name="application_deadline"
                                                        value="<?php echo e($course->application_deadline); ?>"
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
                                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if($course->language_id == $language->id): ?> Selected <?php endif; ?>
                                                                value="<?php echo e($language->id); ?>"><?php echo e($language->name); ?>

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
                                                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selected_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if($selected_course->relatedcourses->where('course_id', $course->id)->all()): ?> Selected <?php endif; ?>
                                                                value="<?php echo e($selected_course->id); ?>">
                                                                <?php echo e($selected_course->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Video URL</label>
                                                    <input type="text" class="form-control"
                                                        name="trailer_video_url"
                                                        placeholder="Enter Youtube Video link"
                                                        value="<?php echo e($course->trailer_video_url); ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Pre Requisites</label>
                                                    <div class="mg-t-10 mg-sm-t-0 add-data">
                                                        <?php if($course->courserequisites->count() == 0): ?>
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
                                                        <?php else: ?>
                                                            <?php $__currentLoopData = $course->courserequisites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $courserequisite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between mt-2">
                                                                    <div class="d-flex align-items-center select-add-section"
                                                                        style="width: 97%;">
                                                                        <input type="text"
                                                                            name="old_requisites[<?php echo e($courserequisite->id); ?>]"
                                                                            value="<?php echo e($courserequisite->name); ?>"
                                                                            class="form-control"
                                                                            placeholder="Enter Pre Requisites">
                                                                    </div>
                                                                    <?php if($k == $course->courserequisites->count() - 1): ?>
                                                                        <a id="plus-btn-data"
                                                                            href="javascript:void(0)"
                                                                            class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-plus"></i></a>
                                                                    <?php else: ?>
                                                                        <a courserequisite_id="<?php echo e($courserequisite->id); ?>"
                                                                            href="javascript:void(0)"
                                                                            class="minus-btn-data-requisites px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-minus-circle"></i></a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Introduction <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <textarea class="form-control summernote" name="introduction" style="height: 150px" required><?php echo $course->introduction; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About This Program / Overview <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <textarea class="form-control summernote" name="about" style="height: 150px" required><?php echo $course->about; ?></textarea>
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
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Backend/courses/u_course/update.blade.php ENDPATH**/ ?>