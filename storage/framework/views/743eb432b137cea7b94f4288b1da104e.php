<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Application Details of <?php echo e(@$s_appliction->student->name); ?></title>

    <style>
        .label {
            font-size: 1.2rem !important;
        }

        p {
            font-size: 0.85rem !important;
            color: #383838 !important;
        }

        th {
            font-size: 0.9rem !important;
        }

        h4 {
            font-size: 1.4rem !important;
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


                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row p-3 border">
                                <div class="col-12 d-flex justify-content-center my-3">
                                    <h3 class="page-title">
                                        <?php echo e(@$s_appliction->student->name); ?>'s
                                        Application Details
                                    </h3>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <h4>Program Information</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Application Code:')); ?></b></label>
                                        <p><?php echo e($s_appliction->application_code); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Program Name:')); ?></b></label>
                                        <?php $__currentLoopData = $s_appliction->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p><?php echo e(@$cart->course->name); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('University Name:')); ?></b></label>
                                        <?php $__currentLoopData = $s_appliction->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p><?php echo e(@$cart->course->university->name); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Continent Name:')); ?></b></label>
                                        <?php $__currentLoopData = $s_appliction->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p><?php echo e(@$cart->course->university->continent->name); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>



                                <div class="col-lg-12 mt-3">
                                    <h4>Personal Information</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('First Name:')); ?></b></label>
                                        <p><?php echo e($s_appliction->first_name); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Middle Name:')); ?></b></label>
                                        <p><?php echo e($s_appliction->middle_name); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Last Name:')); ?></b></label>
                                        <p><?php echo e($s_appliction->last_name); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Chinese Name:')); ?></b></label>
                                        <p><?php echo e($s_appliction->chinese_name); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Phone:')); ?></b></label>
                                        <p><?php echo e($s_appliction->phone); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Email:')); ?></b></label>
                                        <p><?php echo e($s_appliction->email); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Date of Birth:')); ?></b></label>
                                        <p><?php echo e($s_appliction->dob); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Birth Place:')); ?></b></label>
                                        <p><?php echo e($s_appliction->birth_place); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Passport Number:')); ?></b></label>
                                        <p><?php echo e($s_appliction->passport_number); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Passport Exipre Date:')); ?></b></label>
                                        <p><?php echo e($s_appliction->passport_exipre_date); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Nationality:')); ?></b></label>
                                        <p><?php echo e(@$s_appliction->nationality_country->name); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Religion:')); ?></b></label>
                                        <p><?php echo e($s_appliction->religion); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Gender:')); ?></b></label>
                                        <p><?php echo e($s_appliction->gender); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Maritial Status:')); ?></b></label>
                                        <p><?php echo e($s_appliction->maritial_status); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('In Chaina:')); ?></b></label>
                                        <p>
                                            <?php if($s_appliction->in_chaina == 1): ?>
                                                No
                                            <?php else: ?>
                                                Yes
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('In Alcoholic:')); ?></b></label>
                                        <p>
                                            <?php if($s_appliction->in_alcoholic == 1): ?>
                                                No
                                            <?php else: ?>
                                                Yes
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Hobby:')); ?></b></label>
                                        <p><?php echo e($s_appliction->hobby); ?></p>
                                    </div>
                                </div>


                                <div class="col-lg-12 mt-3">
                                    <h4>Language Proficiency</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Native Language:')); ?></b></label>
                                        <p><?php echo e($s_appliction->native_language); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('English Level:')); ?></b></label>
                                        <p>
                                            <?php if($s_appliction->english_level == 0): ?>
                                                Can't speak English at all
                                            <?php elseif($s_appliction->english_level == 1): ?>
                                                Beginner - not currently good enough to study in English
                                            <?php elseif($s_appliction->english_level == 2): ?>
                                                Intermediate - OK but needs some work
                                            <?php elseif($s_appliction->english_level == 3): ?>
                                                Fluent - very good level
                                            <?php elseif($s_appliction->english_level == 4): ?>
                                                Native English
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Chinese Level:')); ?></b></label>
                                        <p>
                                            <?php if($s_appliction->chinese_level == 0): ?>
                                                Can't speak English at all
                                            <?php elseif($s_appliction->chinese_level == 1): ?>
                                                Beginner - not currently good enough to study in English
                                            <?php elseif($s_appliction->chinese_level == 2): ?>
                                                Intermediate - OK but needs some work
                                            <?php elseif($s_appliction->chinese_level == 3): ?>
                                                Fluent - very good level
                                            <?php elseif($s_appliction->chinese_level == 4): ?>
                                                Native English
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <h4>Home Address Details</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Home Country:')); ?></b></label>
                                        <p><?php echo e($s_appliction->home_country); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Home City:')); ?></b></label>
                                        <p><?php echo e($s_appliction->home_city); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Home District:')); ?></b></label>
                                        <p><?php echo e($s_appliction->home_district); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Home Street:')); ?></b></label>
                                        <p><?php echo e($s_appliction->home_street); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Home Zip Code:')); ?></b></label>
                                        <p><?php echo e($s_appliction->home_zipcode); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Home Contact Name:')); ?></b></label>
                                        <p><?php echo e($s_appliction->home_contact_name); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Home Contact Phone:')); ?></b></label>
                                        <p><?php echo e($s_appliction->home_contact_phone); ?></p>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <h4>Postal Address Details</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Current Country:')); ?></b></label>
                                        <p><?php echo e($s_appliction->current_country); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Current City:')); ?></b></label>
                                        <p><?php echo e($s_appliction->current_city); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Current District:')); ?></b></label>
                                        <p><?php echo e($s_appliction->current_district); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Current Street:')); ?></b></label>
                                        <p><?php echo e($s_appliction->current_street); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Current Zip Code:')); ?></b></label>
                                        <p><?php echo e($s_appliction->current_zipcode); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Current Contact Name:')); ?></b></label>
                                        <p><?php echo e($s_appliction->current_contact_name); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Current Contact Phone:')); ?></b></label>
                                        <p><?php echo e($s_appliction->current_contact_phone); ?></p>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <h4>Education Background</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-12">
                                    <table border="1" class="col-md-12">
                                        <thead class="text-center">
                                            <th>School</th>
                                            <th>Major</th>
                                            <th>GPA</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $s_appliction->educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <p> <?php echo e(@$item->school); ?></p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p><?php echo e(@$item->major); ?></p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p><?php echo e($item->gpa_type); ?> </p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p><?php echo e(date('d-m-Y', strtotime(@$item->start_date))); ?></p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p><?php echo e(date('d-m-Y', strtotime(@$item->end_date))); ?></p>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <h4>Work Experience</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-12">
                                    <table border="1" class="col-md-12">
                                        <thead class="text-center">
                                            <th>Company</th>
                                            <th>Job Title</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $s_appliction->work_experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <p><?php echo e(@$item->company); ?></p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p><?php echo e(@$item->job_title); ?></p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p><?php echo e(date('d-m-Y', strtotime(@$item->start_date))); ?></p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p><?php echo e(date('d-m-Y', strtotime(@$item->end_date))); ?></p>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <h4>Family Information</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Father Name:')); ?></b></label>
                                        <p><?php echo e($s_appliction->father_name); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Father Nnationlity:')); ?></b></label>
                                        <p><?php echo e($s_appliction->father_nationlity); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Father Phone:')); ?></b></label>
                                        <p><?php echo e($s_appliction->father_phone); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Father Email:')); ?></b></label>
                                        <p><?php echo e($s_appliction->father_email); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Father Workplace:')); ?></b></label>
                                        <p><?php echo e($s_appliction->father_workplace); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Father Position:')); ?></b></label>
                                        <p><?php echo e($s_appliction->father_position); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Mother Name:')); ?></b></label>
                                        <p><?php echo e($s_appliction->mother_name); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Mother Nationlity:')); ?></b></label>
                                        <p><?php echo e($s_appliction->mother_nationlity); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Mother Phone:')); ?></b></label>
                                        <p><?php echo e($s_appliction->mother_phone); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Mother Email:')); ?></b></label>
                                        <p><?php echo e($s_appliction->mother_email); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Mother Workplace:')); ?></b></label>
                                        <p><?php echo e($s_appliction->mother_workplace); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Mother Position:')); ?></b></label>
                                        <p><?php echo e($s_appliction->mother_position); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Guarantor Relationship:')); ?></b></label>
                                        <p><?php echo e($s_appliction->guarantor_relationship); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Guarantor Name:')); ?></b></label>
                                        <p><?php echo e($s_appliction->guarantor_name); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Guarantor Address:')); ?></b></label>
                                        <p><?php echo e($s_appliction->guarantor_address); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Guarantor Phone:')); ?></b></label>
                                        <p><?php echo e($s_appliction->guarantor_phone); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Guarantor Email:')); ?></b></label>
                                        <p><?php echo e($s_appliction->guarantor_email); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Guarantor Workplace:')); ?></b></label>
                                        <p><?php echo e($s_appliction->guarantor_workplace); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Guarantor Work Address:')); ?></b></label>
                                        <p><?php echo e($s_appliction->guarantor_work_address); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Study Fund:')); ?></b></label>
                                        <p><?php echo e($s_appliction->study_fund); ?></p>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <h4>Contact in Case of Emergencies</h4>
                                    <hr>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Emergency Contact Name:')); ?></b></label>
                                        <p><?php echo e($s_appliction->emergency_contact_name); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Emergency Contact Phone:')); ?></b></label>
                                        <p><?php echo e($s_appliction->emergency_contact_phone); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Emergency Contact Email:')); ?></b></label>
                                        <p><?php echo e($s_appliction->emergency_contact_email); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="address"><b><?php echo e(__('Emergency Contact Address:')); ?></b></label>
                                        <p><?php echo e($s_appliction->emergency_contact_address); ?></p>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <h4>Documents</h4>
                                    <hr>
                                </div>

                                <?php $__currentLoopData = $s_appliction->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="address"><b><?php echo e($loop->iteration); ?>.
                                                    <?php echo e(__($document->document_name)); ?></b></label>
                                            <div class="row">
                                                <div class="col-md-6 d-flex">
                                                    <button style="margin-left: 18px" type="button"
                                                        data-toggle="modal"
                                                        data-target="#certificateModal<?php echo e($k); ?>"
                                                        class="btn btn-primary"><i class="fa fa-solid fa-eye"></i>
                                                        Details</button>

                                                    <a href="<?php echo e(route('admin.application-file-download', $document->id)); ?>"
                                                        class="btn btn-primary ml-2"><i
                                                            class="fa fa-solid fa-download"></i>
                                                        Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="certificateModal<?php echo e($k); ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="audioModalLabel"
                                                        style="color: black">
                                                        <?php echo e($document->document_name); ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php if($document->extensions == 'pdf'): ?>
                                                        <iframe src="<?php echo e($document->document_file_show); ?>"
                                                            width="100%" height="500"></iframe>
                                                    <?php else: ?>
                                                        <img src="<?php echo e($document->document_file_show); ?>"
                                                            alt="image" style="height: 300px; width:450px">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/student_appliction/application_details.blade.php ENDPATH**/ ?>