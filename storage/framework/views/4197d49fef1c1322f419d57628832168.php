<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Student Application Personal Info Edit</title>
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
                            Student Application Personal Info Edit
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="<?php echo e(route('admin.student_appliction_list')); ?>" class="btn btn-primary btn-fw">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                View All Application</a>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <?php echo $__env->make('Backend.student_appliction.theme_options_tabs_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="col-10">
                            <div class="tab-content tab-content-vertical bg-white rounded">
                                <div class="tab-pane fade show active" id="program-info-tab-content" role="tabpanel"
                                    aria-labelledby="home-tab-vertical">

                                    <form novalidate="" method="post"
                                        action="<?php echo e(route('admin.student_appliction_update', $s_appliction->id)); ?>"
                                        data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-lg-12 mb-2 mb-2">
                                                <h4>Personal Information</h4> <hr>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('First Name:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->first_name); ?>" type="text"
                                                        name="first_name" id="address" class="form-control">
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Last Name:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->last_name); ?>" type="text"
                                                        name="last_name" id="address" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Phone:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->phone); ?>" type="text"
                                                        name="phone" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Email:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->email); ?>" type="email"
                                                        name="email" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Date of Birth:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->dob); ?>" type="date"
                                                        name="dob" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Birth Place:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->birth_place); ?>" type="text"
                                                        name="birth_place" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Passport Number:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->passport_number); ?>" type="text"
                                                        name="passport_number" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Passport Exipre Date:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->passport_exipre_date); ?>"
                                                        type="date" name="passport_exipre_date" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Nationality:')); ?></label>
                                                    <select id="continent" class="form-control form-control-lg" name="nationality">
                                                        <option value="">Select Nationality</option>
                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if($country->id == $s_appliction->nationality): ?> Selected <?php endif; ?>
                                                                value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Religion:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->religion); ?>" type="text"
                                                        name="religion" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Gender:')); ?></label>
                                                    <select id="continent" class="form-control form-control-lg" name="gender">
                                                        <option value="">Select Gender</option>
                                                        <option <?php if($s_appliction->gender == 'Male'): ?> Selected <?php endif; ?>
                                                            value="Male">Male</option>
                                                        <option <?php if($s_appliction->gender == 'Female'): ?> Selected <?php endif; ?>
                                                            value="Female">Female</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Maritial Status:')); ?></label>
                                                    <select id="continent" class="form-control form-control-lg"
                                                        name="maritial_status">
                                                        <option value="">Select Maritial Status</option>
                                                        <option <?php if($s_appliction->maritial_status == 'Single'): ?> Selected <?php endif; ?>
                                                            value="Single">Single</option>
                                                        <option <?php if($s_appliction->maritial_status == 'Married'): ?> Selected <?php endif; ?>
                                                            value="Married">Married</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('In Alcoholic:')); ?></label>
                                                    <select id="continent" class="form-control form-control-lg" name="in_alcoholic">
                                                        <option value="">Select In Alcoholic?</option>
                                                        <option <?php if($s_appliction->in_alcoholic == '0'): ?> Selected <?php endif; ?>
                                                            value="0">No</option>
                                                        <option <?php if($s_appliction->in_alcoholic == '1'): ?> Selected <?php endif; ?>
                                                            value="1">Yes</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            


                                            <div class="col-lg-12 mb-2">
                                                <h4>Language Proficiency</h4> <hr>
                                            </div>



                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Native Language:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->native_language); ?>"
                                                        type="text" name="native_language" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('English Level:')); ?></label>
                                                    <select id="continent" class="form-control form-control-lg" name="english_level">
                                                        <option value="" selected="">English level</option>
                                                        <option <?php if($s_appliction->english_level == '0'): ?> Selected <?php endif; ?>
                                                            value="0">0 - Can't speak English at all </option>
                                                        <option <?php if($s_appliction->english_level == '1'): ?> Selected <?php endif; ?>
                                                            value="1">1 - Beginner - not currently good enough to
                                                            study in English</option>
                                                        <option <?php if($s_appliction->english_level == '2'): ?> Selected <?php endif; ?>
                                                            value="2">2 - Intermediate - OK but needs some work
                                                        </option>
                                                        <option <?php if($s_appliction->english_level == '3'): ?> Selected <?php endif; ?>
                                                            value="3">3 - Fluent - very good level </option>
                                                        <option <?php if($s_appliction->english_level == '4'): ?> Selected <?php endif; ?>
                                                            value="4">4 - Native English</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            

                                            <div class="col-lg-12 mb-2">
                                                <h4>Home Address Details</h4> <hr>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Home Country:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->home_country); ?>" type="text"
                                                        name="home_country" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Home City:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->home_city); ?>" type="text"
                                                        name="home_city" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Home District:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->home_district); ?>" type="text"
                                                        name="home_district" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Home Street:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->home_street); ?>" type="text"
                                                        name="home_street" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Home Zipcode:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->home_zipcode); ?>" type="text"
                                                        name="home_zipcode" id="address" class="form-control">
                                                </div>
                                            </div>
                                            

                                            <div class="col-lg-12 mb-2">
                                                <h4>Postal Address Details</h4> <hr>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Current Country:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->current_country); ?>"
                                                        type="text" name="current_country" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Current City:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->current_city); ?>" type="text"
                                                        name="current_city" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Current District:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->current_district); ?>"
                                                        type="text" name="current_district" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Current Street:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->current_street); ?>" type="text"
                                                        name="current_street" id="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Current Zip Code:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->current_zipcode); ?>"
                                                        type="text" name="current_zipcode" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Current Contact Name:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->current_contact_name); ?>"
                                                        type="text" name="current_contact_name" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address"><?php echo e(__('Current Contact Phone:')); ?></label>
                                                    <input value="<?php echo e($s_appliction->current_contact_phone); ?>"
                                                        type="text" name="current_contact_phone" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mb-2">
                                                <h4>Education Background</h4> <hr>
                                            </div>

                                            <?php $__currentLoopData = $s_appliction->educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="address"><?php echo e(__('School:')); ?></label>
                                                        <input value="<?php echo e($item->school); ?>" type="text"
                                                            name="old_school[<?php echo e($item->id); ?>]" id="address"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="address"><?php echo e(__('Major:')); ?></label>
                                                        <input value="<?php echo e($item->major); ?>" type="text"
                                                            name="old_major[<?php echo e($item->id); ?>]" id="address"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="address"><?php echo e(__('Start Date:')); ?></label>
                                                        <input value="<?php echo e($item->start_date); ?>" type="date"
                                                            name="old_start_date[<?php echo e($item->id); ?>]" id="address"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="address"><?php echo e(__('End Date:')); ?></label>
                                                        <input value="<?php echo e($item->end_date); ?>" type="date"
                                                            name="old_end_date[<?php echo e($item->id); ?>]" id="address"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="address"><?php echo e(__('Gpa Type:')); ?></label>
                                                        <input value="<?php echo e($item->gpa_type); ?>" type="number"
                                                            name="old_gpa_type[<?php echo e($item->id); ?>]" id="address"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <div class="col-lg-12 mb-2">
                                                <h4>Work Experience</h4> <hr>
                                            </div>

                                            <?php $__currentLoopData = $s_appliction->work_experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="address"><?php echo e(__('Company Name:')); ?></label>
                                                        <input value="<?php echo e($item->company); ?>" type="text"
                                                            name="company[<?php echo e($item->id); ?>]" id="address"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="address"><?php echo e(__('Job Title:')); ?></label>
                                                        <input value="<?php echo e($item->job_title); ?>" type="text"
                                                            name="job_title[<?php echo e($item->id); ?>]" id="address"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="address"><?php echo e(__('Start Date:')); ?></label>
                                                        <input value="<?php echo e($item->start_date); ?>" type="date"
                                                            name="start_date[<?php echo e($item->id); ?>]" id="address"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="address"><?php echo e(__('End Date:')); ?></label>
                                                        <input value="<?php echo e($item->end_date); ?>" type="date"
                                                            name="end_date[<?php echo e($item->id); ?>]" id="address"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>


                                        <hr>
                                        <div class="row tabs-footer mt-15">
                                            <div class="col-lg-12">
                                                <a href="<?php echo e(route('admin.student_appliction_list')); ?>"
                                                    class="btn blue-btn btn-danger">Cancel</a>
                                                <button type="submit" class="btn blue-btn btn-primary">Save</button>
                                            </div>
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
</body>

</html>
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Backend/student_appliction/edit_personal_info.blade.php ENDPATH**/ ?>