<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <title><?php echo e(env('APP_NAME')); ?> | Edit University</title>
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
                            Edit University
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="<?php echo e(route('admin.university.index')); ?>" class="btn btn-primary btn-fw">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                View All University</a>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-md-12 m-auto grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample"
                                        action="<?php echo e(route('admin.university.update', $university->id)); ?>" method="POST"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

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
                                                            <img src="<?php echo e($university->image_show ?? asset('frontend/images/No-image.jpg')); ?>"
                                                                alt="<?php echo e($university->name); ?>-icon" class="img-fluid"
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
                                                            <img src="<?php echo e($university->banner_image_show ?? asset('frontend/images/No-image.jpg')); ?>"
                                                                alt="<?php echo e($university->name); ?>-banner-image"
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
                                                            value="<?php echo e($university->name); ?>" required>
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
                                                        <?php $__currentLoopData = $continents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $continent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if($continent->id == $university->continent_id): ?> Selected <?php endif; ?>
                                                                value="<?php echo e($continent->id); ?>"><?php echo e($continent->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if($country->id == $university->country_id): ?> Selected <?php endif; ?>
                                                                value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                        <?php
                                                            $selectedDegrees = explode(
                                                                ',',
                                                                $university->degree_id ?? '',
                                                            );
                                                        ?>
                                                        <?php $__currentLoopData = $degrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $degree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($degree->id); ?>"
                                                                <?php echo e(in_array($degree->id, $selectedDegrees) ? 'selected' : ''); ?>>
                                                                <?php echo e($degree->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                        <?php
                                                            $selectedDepartments = explode(
                                                                ',',
                                                                $university->department_id ?? '',
                                                            );
                                                        ?>
                                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($department->id); ?>"
                                                                <?php echo e(in_array($department->id, $selectedDepartments) ? 'selected' : ''); ?>>
                                                                <?php echo e($department->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                        <?php
                                                            $selectedLanguages = explode(
                                                                ',',
                                                                $university->language_id ?? '',
                                                            );
                                                        ?>
                                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($language->id); ?>"
                                                                <?php echo e(in_array($language->id, $selectedLanguages) ? 'selected' : ''); ?>>
                                                                <?php echo e($language->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                        <?php
                                                            $selectedSections = explode(
                                                                ',',
                                                                $university->section_id ?? '',
                                                            );
                                                        ?>
                                                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($section->id); ?>"
                                                                <?php echo e(in_array($section->id, $selectedSections) ? 'selected' : ''); ?>>
                                                                <?php echo e($section->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Application Deadline<span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="date" name="app_deadline" value="<?php echo e($university->app_deadline); ?>" class="form-control"
                                                        placeholder="Enter Address" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Next start date<span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="date" name="next_start_date" value="<?php echo e($university->next_start_date); ?>" class="form-control"
                                                        placeholder="Enter Address" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Yearly tuition<span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="text" name="yearly_tuition" value="<?php echo e($university->yearly_tuition); ?>" class="form-control"
                                                        placeholder="Enter Address" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Duration<span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="number" step="0.1" name="duration" value="<?php echo e($university->duration); ?>" class="form-control"
                                                        placeholder="Enter Duration" required>
                                                </div>
                                            </div>

                                              <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Star<span
                                                            class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                        <select class="form-control" name="star" id="">
                                                            <option <?php if($university->star === 1): ?> selected <?php endif; ?> value="1">1</option>
                                                            <option <?php if($university->star === 2): ?> selected <?php endif; ?> value="2">2</option>
                                                            <option <?php if($university->star === 3): ?> selected <?php endif; ?> value="3">3</option>
                                                            <option <?php if($university->star === 4): ?> selected <?php endif; ?> value="4">4</option>
                                                            <option <?php if($university->star === 5): ?> selected <?php endif; ?> value="5">5</option>
                                                        </select>
                                                </div>
                                            </div>

                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address (Street/Apartment, City, State)<span
                                                            class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <input type="text" name="address" class="form-control"
                                                        placeholder="Enter Address"
                                                        value="<?php echo e($university->address); ?>" required>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label">Rank:</label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="number" name="rank" class="form-control"
                                                            placeholder="Enter University Rank in Local"
                                                            value="<?php echo e(json_decode($university->stat_values, true)['rank'] ?? ''); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label">Total Students:</label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="number" name="total_students"
                                                            class="form-control" placeholder="Enter Total Students"
                                                            value="<?php echo e(json_decode($university->stat_values, true)['total_students'] ?? ''); ?>">
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
                                                            value="<?php echo e(json_decode($university->stat_values, true)['world_ranking'] ?? ''); ?>">
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
                                                        <?php
                                                            $locations = json_decode($university->location, true) ?? [];
                                                        ?>
                                                        <?php $__empty_1 = true; $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $map): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mt-2">
                                                                <div class="d-flex align-items-center select-add-section"
                                                                    style="width: 97%;">
                                                                    <input type="text" name="location[]"
                                                                        class="form-control"
                                                                        placeholder="Enter Map Embed Code"
                                                                        value="<?php echo e($map); ?>">
                                                                </div>
                                                                <a href="javascript:void(0)"
                                                                    class="remove-embed-code px-1 p-0 m-0 ml-2"><i
                                                                        class="fas fa-minus-circle"></i></a>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Overview</label>
                                                    <textarea class="form-control editor" name="overview" style="height: 150px"><?php echo e($university->overview); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Accommodation</label>
                                                    <textarea class="form-control editor" name="accommodation" style="height: 150px"><?php echo e($university->accommodation); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Admissions Process</label>
                                                    <textarea class="form-control editor" name="admissions_process" style="height: 150px"><?php echo e($university->admissions_process); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Scholarships</label>
                                                    <textarea class="form-control editor" name="scholarships" style="height: 150px"><?php echo e($university->scholarships); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Fees Structure</label>
                                                    <textarea class="form-control editor" name="fees_structure" style="height: 150px"><?php echo e($university->fees_structure); ?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>English Requirements</label>
                                                    <textarea class="form-control editor" name="english_requirements" style="height: 150px"><?php echo e($university->english_requirements); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Budget</label>
                                                    <textarea class="form-control editor" name="budgets" style="height: 150px"><?php echo e($university->budgets); ?></textarea>
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
    <?php echo $__env->make('Backend.components.ckeditor5-config', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('backend/assets/js/select2.js')); ?>"></script>
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
    

    <script src="<?php echo e(asset('backend/assets/js/dropify.js')); ?>"></script>
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
            let url = '<?php echo e(url('get/country/')); ?>/' + id;

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
            let url = '<?php echo e(url('/get/state/')); ?>/' + id;

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
            let url = '<?php echo e(url('/get/city/')); ?>/' + id;

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
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Backend/university/update.blade.php ENDPATH**/ ?>