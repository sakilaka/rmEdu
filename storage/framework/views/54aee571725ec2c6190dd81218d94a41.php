<?php $__env->startSection('title', '- Inquery Form'); ?>
<?php $__env->startSection('head'); ?>
    <?php
        $header_logo = \App\Models\Tp_option::where('option_name', 'theme_logo')->first();
        $header_logo = $header_logo->header_image == '' ? $header_logo->no_image : $header_logo->header_image_show;
    ?>
    <style>
        .form-container {
            border-radius: 8px;
            background-color: rgba(245, 246, 255, 0.8);
            background-image: url('<?php echo e($header_logo); ?>');
            background-repeat: no-repeat;
            background-position: top;
            background-size: 50% auto;
            background-blend-mode: overlay;
        }
    </style>

    <link rel="stylesheet"
        href="<?php echo e(asset('frontend/application/modules/frontend/views/themes/default/assets/css/select2.min.css')); ?>">

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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>


    <div class="content_search" style="margin-top:70px">
        <div class="" style="margin-top: 7rem; margin-bottom:3rem">
            <div class="container-lg">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="row mx-0 align-items-center justify-content-center">

                            <?php if(session()->has('success') && session('status') === 'submitted'): ?>
                                <div class="mt-5 pt-5 d-flex flex-column justify-content-center align-items-center">
                                    <img src="<?php echo e(asset('frontend/images/done.png')); ?>" alt="" width="80px">
                                    <h5 class="text-center mt-3"><?php echo e(session('success')); ?></h5>

                                    <a href="<?php echo e(route('home')); ?>" class="mt-2 btn btn-primary-bg">
                                        Explore Now
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="col-md-10 p-4 p-sm-5 mt-5 border form-container">
                                    <h2 class="h3 mb-4 mb-sm-5 text-center" style="font-weight: bold">
                                        General Inquiry Form
                                    </h2>
                                    <form action="<?php echo e(route('frontend.store_inquiry_form_data')); ?>" method="POST"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">

                                            <h5 class="fw-bold">Basic Informations</h5>
                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                        class="form-control form-control-lg <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="name" placeholder="Enter Full Name"
                                                        value="<?php echo e(old('name')); ?>" required>
                                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>Date Of Birth
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="date" max="<?php echo e(now()->toDateString()); ?>"
                                                        class="form-control form-control-lg <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="dob" value="<?php echo e(old('dob')); ?>" required>
                                                    <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="email" placeholder="Enter Email Address"
                                                        value="<?php echo e(old('email')); ?>">
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>Phone Number
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                        class="form-control form-control-lg <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="phone" placeholder="Enter Contact Number"
                                                        value="<?php echo e(old('phone')); ?>" required>
                                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select name="country[]" id="country"
                                                        class="form-control select2 <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        multiple>
                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($country->id); ?>"
                                                                <?php echo e(in_array($country->id, old('country', [])) ? 'selected' : ''); ?>>
                                                                <?php echo e($country->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>Applying Degree</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg <?php $__errorArgs = ['degree'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="degree" placeholder="Enter Degree"
                                                        value="<?php echo e(old('degree')); ?>">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>Subject</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="subject" placeholder="Enter Subject"
                                                        value="<?php echo e(old('subject')); ?>">
                                                    <p class="text-muted" style="font-style: italic;">Separate Subjects With
                                                        Comma (,)</p>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label>University</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg <?php $__errorArgs = ['university'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="university" placeholder="Enter University Name"
                                                        value="<?php echo e(old('university')); ?>">
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
                                                <?php $__empty_1 = true; $__currentLoopData = old('education', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <div class="education-item mt-4">
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="fw-bold">Education #<?php echo e($loop->iteration); ?></h6>
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-danger remove-education-btn">Remove</a>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label>Degree</label>
                                                                    <select class="form-control form-control-lg"
                                                                        name="education[<?php echo e($index); ?>][name]">
                                                                        <option value="" disabled>Select a degree
                                                                        </option>
                                                                        <option value="SSC"
                                                                            <?php echo e(old('education.' . $index . '.name') == 'SSC' ? 'selected' : ''); ?>>
                                                                            SSC</option>
                                                                        <option value="HSC"
                                                                            <?php echo e(old('education.' . $index . '.name') == 'HSC' ? 'selected' : ''); ?>>
                                                                            HSC</option>
                                                                        <option value="Diploma"
                                                                            <?php echo e(old('education.' . $index . '.name') == 'Diploma' ? 'selected' : ''); ?>>
                                                                            Diploma</option>
                                                                        <option value="Bachelor"
                                                                            <?php echo e(old('education.' . $index . '.name') == 'Bachelor' ? 'selected' : ''); ?>>
                                                                            Bachelor</option>
                                                                        <option value="Masters"
                                                                            <?php echo e(old('education.' . $index . '.name') == 'Masters' ? 'selected' : ''); ?>>
                                                                            Masters</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label>GPA/CGPA</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="education[<?php echo e($index); ?>][gpa]"
                                                                        placeholder="Enter GPA/CGPA Score"
                                                                        value="<?php echo e(old('education.' . $index . '.gpa')); ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label>Year/Session</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="education[<?php echo e($index); ?>][year]"
                                                                        placeholder="Enter Year/Session"
                                                                        value="<?php echo e(old('education.' . $index . '.year')); ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label>Institution</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="education[<?php echo e($index); ?>][institution]"
                                                                        placeholder="Enter Institution Name"
                                                                        value="<?php echo e(old('education.' . $index . '.institution')); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <div class="education-item mt-4">
                                                        <?php
                                                            $random = rand();
                                                        ?>
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
                                                                        name="education[<?php echo e($random); ?>][name]">
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
                                                                        name="education[<?php echo e($random); ?>][gpa]"
                                                                        placeholder="Enter GPA/CGPA Score">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label>Year/Session</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="education[<?php echo e($random); ?>][year]"
                                                                        placeholder="Enter Year/Session">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 mt-2">
                                                                <div class="form-group">
                                                                    <label>Institution</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="education[<?php echo e($random); ?>][institution]"
                                                                        placeholder="Enter Institution Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
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
                                                                <?php echo e(old('documents.passport') ? 'checked' : ''); ?>>
                                                            <label class="form-check-label"
                                                                for="passport">Passport</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[police-clearance]" id="police-clearance"
                                                                value="Police Clearance"
                                                                <?php echo e(old('documents.police-clearance') ? 'checked' : ''); ?>>
                                                            <label class="form-check-label" for="police-clearance">Police
                                                                Clearance</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[english-proficiency]"
                                                                id="english-proficiency" value="English Proficiency"
                                                                <?php echo e(old('documents.english-proficiency') ? 'checked' : ''); ?>>
                                                            <label class="form-check-label"
                                                                for="english-proficiency">English
                                                                Proficiency</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[ielts]" id="ielts" value="IELTS"
                                                                <?php echo e(old('documents.ielts') ? 'checked' : ''); ?>>
                                                            <label class="form-check-label" for="ielts">IELTS</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[toefl]" id="toefl" value="TOEFL"
                                                                <?php echo e(old('documents.toefl') ? 'checked' : ''); ?>>
                                                            <label class="form-check-label" for="toefl">TOEFL</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[pte]" id="pte" value="PTE"
                                                                <?php echo e(old('documents.pte') ? 'checked' : ''); ?>>
                                                            <label class="form-check-label" for="pte">PTE</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[gre]" id="gre" value="GRE"
                                                                <?php echo e(old('documents.gre') ? 'checked' : ''); ?>>
                                                            <label class="form-check-label" for="gre">GRE</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[duolingo]" id="duolingo"
                                                                value="Duolingo"
                                                                <?php echo e(old('documents.duolingo') ? 'checked' : ''); ?>>
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
                                                                <?php echo e(old('documents.health-certificate') ? 'checked' : ''); ?>>
                                                            <label class="form-check-label"
                                                                for="health-certificate">Health
                                                                Certificate</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[ssc]" id="ssc"
                                                                value="S.S.C Certificate"
                                                                <?php echo e(old('documents.ssc') ? 'checked' : ''); ?>>
                                                            <label class="form-check-label" for="ssc">S.S.C
                                                                Certificate</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[hsc]" id="hsc"
                                                                value="H.S.C Certificate"
                                                                <?php echo e(old('documents.hsc') ? 'checked' : ''); ?>>
                                                            <label class="form-check-label" for="hsc">H.S.C
                                                                Certificate</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[bsc]" id="bsc"
                                                                value="B.SC Certificate"
                                                                <?php echo e(old('documents.bsc') ? 'checked' : ''); ?>>
                                                            <label class="form-check-label" for="bsc">B.SC
                                                                Certificate</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[msc]" id="msc"
                                                                value="M.SC Certificate"
                                                                <?php echo e(old('documents.msc') ? 'checked' : ''); ?>>
                                                            <label class="form-check-label" for="msc">M.SC
                                                                Certificate</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[study-plan]" id="study-plan"
                                                                value="Study Plan"
                                                                <?php echo e(old('documents.study-plan') ? 'checked' : ''); ?>>
                                                            <label class="form-check-label" for="study-plan">Study
                                                                Plan</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input doc-checkbox" type="checkbox"
                                                                name="documents[bank-statement]" id="bank-statement"
                                                                value="Bank Statement"
                                                                <?php echo e(old('documents.bank-statement') ? 'checked' : ''); ?>>
                                                            <label class="form-check-label" for="bank-statement">Bank
                                                                Statement</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="document-input-container row">
                                                    <?php $__currentLoopData = old('documents_input', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $input): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-md-6 document-input-item mt-3"
                                                            id="<?php echo e(strtoupper($index)); ?>-input">
                                                            <label for="<?php echo e(strtoupper($index)); ?>-input"
                                                              class="fw-bold"><?php echo e(strtoupper($index)); ?></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter <?php echo e(strtoupper($index)); ?> Score"
                                                                name="documents_input[<?php echo e($index); ?>]"
                                                                id="<?php echo e(strtoupper($index)); ?>-input"
                                                                value="<?php echo e($input); ?>">
                                                            <a href="javascript:void(0)"
                                                                class="text-danger remove-document-input"
                                                                data-doc="<?php echo e(strtoupper($index)); ?>">Remove</a>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-4">
                                                <div class="form-group">
                                                    <label for="program">Program</label>
                                                    <select id="program" class="form-control form-control-lg"
                                                        name="program">
                                                        <option value="" disabled>Select Program</option>
                                                        <option value="Bachelor’s"
                                                            <?php echo e(old('program') == 'Bachelor’s' ? 'selected' : ''); ?>>
                                                            Bachelor’s</option>
                                                        <option value="Master’s"
                                                            <?php echo e(old('program') == 'Master’s' ? 'selected' : ''); ?>>
                                                            Master’s</option>
                                                        <option value="PhD"
                                                            <?php echo e(old('program') == 'PhD' ? 'selected' : ''); ?>>PhD
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-4">
                                                <div class="form-group">
                                                    <label for="budget">Budget</label>
                                                    <input type="number" id="budget"
                                                        class="form-control form-control-lg" name="budget"
                                                        placeholder="Enter Budget" value="<?php echo e(old('budget')); ?>">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label for="counselor-name">Counselor Name</label>
                                                    <textarea id="counselor-name" class="form-control form-control-lg" name="counselor_name" rows="3"
                                                        placeholder="Enter Counselor Name"><?php echo e(old('counselor_name')); ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label for="reference">Reference</label>
                                                    <textarea id="reference" class="form-control form-control-lg" name="reference" rows="3"
                                                        placeholder="Enter Reference"><?php echo e(old('reference')); ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-2">
                                                <div class="form-group">
                                                    <label for="note">Note</label>
                                                    <textarea id="note" class="form-control form-control-lg" name="note" rows="3"
                                                        placeholder="Enter Note"><?php echo e(old('note')); ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-5 text-center">
                                                <button type="submit" class="btn btn-primary-bg">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php echo $__env->make('Frontend.layouts.parts.news-letter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('backend/lib/select2/js/select2.min.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rmintern/public_html/resources/views/Frontend/pages/inquiry_form.blade.php ENDPATH**/ ?>