<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | View Inquiry - <?php echo e(strtoupper($inquiry['unique_inquiry_code'])); ?></title>

    <style>
        .card label {
            font-weight: bold;
        }

        .card p,
        .card label {
            font-size: 1rem !important;
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
                            View Inquiry - <?php echo e(strtoupper($inquiry['unique_inquiry_code'])); ?>

                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="<?php echo e(route('admin.inquiry.index')); ?>" target="_blank" class="btn btn-primary btn-fw">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                View All Inquiry</a>
                        </nav>
                    </div>

                    <div class="card">
                        <div class="row p-4">

                            <!-- Full Name Display -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <p class="form-control-static"><?php echo e($inquiry['name'] ?? 'N/A'); ?></p>
                                </div>
                            </div>

                            <!-- Date of Birth Display -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <p class="form-control-static"><?php echo e($inquiry['date_of_birth'] ?? 'N/A'); ?></p>
                                </div>
                            </div>

                            <!-- Email Display -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <p class="form-control-static"><?php echo e($inquiry['email'] ?? 'N/A'); ?></p>
                                </div>
                            </div>

                            <!-- Phone Number Display -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <p class="form-control-static"><?php echo e($inquiry['mobile'] ?? 'N/A'); ?></p>
                                </div>
                            </div>

                            <!-- Country Display -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Country</label>
                                    <p class="form-control-static">
                                        <?php if(isset($inquiry['country']) && is_array(json_decode($inquiry['country'], true))): ?>
                                            <?php $__currentLoopData = json_decode($inquiry['country'], true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($inquiry->getCountry($countryId) ?? 'N/A'); ?>

                                                <?php if(!$loop->last): ?>
                                                    ,
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>

                            <!-- Applying Degree Display -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Applying Degree</label>
                                    <p class="form-control-static"><?php echo e($inquiry['applying_degree'] ?? 'N/A'); ?></p>
                                </div>
                            </div>

                            <!-- Subject Display -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <p class="form-control-static"><?php echo e($inquiry['subject'] ?? 'N/A'); ?></p>
                                </div>
                            </div>

                            <!-- University Field -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>University</label>
                                    <p class="form-control-static"><?php echo e($inquiry['university'] ?? 'N/A'); ?></p>
                                </div>
                            </div>

                            <div class="col-12 mt-4 d-flex justify-content-between">
                                <div>
                                    <h5 class="fw-bold">Educational Informations</h5>
                                </div>
                            </div>

                            <!-- Education Details Table -->
                            <div class="col-12">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Degree</th>
                                            <th>GPA/CGPA</th>
                                            <th>Year/Session</th>
                                            <th>Institution</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = old('education_details', json_decode($inquiry['education_details'], true) ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($education['name'] ?? 'N/A'); ?></td>
                                                <td><?php echo e($education['gpa'] ?? 'N/A'); ?></td>
                                                <td><?php echo e($education['year'] ?? 'N/A'); ?></td>
                                                <td><?php echo e($education['institution'] ?? 'N/A'); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="5" class="text-center">No education details available.
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-12 col-md-3 mt-4">
                                <label>Available Documents</label>
                                <?php
                                    $available_docs = json_decode($inquiry['documents'], true);
                                    $doc_names = [];

                                    if (!empty($available_docs)) {
                                        foreach ($available_docs as $key => $doc) {
                                            if ($doc) {
                                                $doc_names[] = ucfirst(str_replace('-', ' ', $key));
                                            }
                                        }
                                    }
                                ?>

                                <?php if(!empty($doc_names)): ?>
                                    <p><?php echo implode(',<br>', $doc_names); ?></p>
                                <?php else: ?>
                                    <p>No documents available.</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-12 col-md-3 mt-4">
                                <?php
                                    $available_docs_input = json_decode($inquiry['documents_input'], true);
                                ?>

                                <?php if(!empty($available_docs_input)): ?>
                                <label>Available Documents Score</label>
                                    <?php $__currentLoopData = $available_docs_input; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $input): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="mb-0">
                                            <span><?php echo e(strtoupper(str_replace('-', ' ', $key))); ?></span>
                                            :
                                            <span><?php echo e($input); ?></span>
                                        </p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>

                            <div class="col-12 col-md-6">
                                <!-- Program -->
                                <div class="mt-4">
                                    <div class="form-group">
                                        <label for="program">Program</label>
                                        <p><?php echo e($inquiry['program'] ?? 'N/A'); ?></p>
                                    </div>
                                </div>

                                <!-- Budget -->
                                <div class="mt-2">
                                    <div class="form-group">
                                        <label for="budget">Budget</label>
                                        <p><?php echo e($inquiry['budget'] ?? 'N/A'); ?></p>
                                    </div>
                                </div>

                                <!-- Interest -->
                                <div class="mt-2">
                                    <div class="form-group">
                                        <label for="interest">Interest</label>
                                        <p><?php echo e($inquiry['interest'] ?? 'N/A'); ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 mt-2">
                                <!-- Counselor Name -->
                                <div class="form-group">
                                    <label for="counselor-name">Counselor Name</label>
                                    <p><?php echo e($inquiry['counselor_name'] ?? 'N/A'); ?></p>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 mt-2">
                                <!-- Reference -->
                                <div class="form-group">
                                    <label for="reference">Reference</label>
                                    <p><?php echo e($inquiry['reference'] ?? 'N/A'); ?></p>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 mt-2">
                                <!-- Note -->
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <p><?php echo e($inquiry['note'] ?? 'N/A'); ?></p>
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
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/inquiry/view.blade.php ENDPATH**/ ?>