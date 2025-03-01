<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | All Students Appliction List</title>

    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/rowGroup.min.css')); ?>">
    <style>
        .fs-09 {
            font-size: 0.9rem !important
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
                            All Students Appliction List
                        </h3>

                        <nav aria-label="breadcrumb">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary-bg" data-toggle="modal"
                                    data-target="#manage_fields_modal">Manage Fields</button>

                                <button class="btn btn-primary-bg ml-3" data-toggle="modal"
                                    data-target="#manage_filters_modal">Manage Filters</button>

                                <select name="study_fund" class="form-control form-control-lg ml-3"
                                    id="study_fund_type">
                                    <option value="">Select Fund Type</option>
                                    <option value="all" <?php if($study_fund_type && $study_fund_type == 'all'): ?> selected <?php endif; ?>>
                                        All
                                    </option>
                                    <option value="Self finance" <?php if($study_fund_type && $study_fund_type == 'Self finance'): ?> selected <?php endif; ?>>Self
                                        finance
                                    </option>
                                    <option
                                        value="Chinese Government Scholarship"<?php if($study_fund_type && $study_fund_type == 'Chinese Government Scholarship'): ?> selected <?php endif; ?>>
                                        Chinese Govt. Scholarship
                                    </option>
                                    <option
                                        value="Part scholarship part self financed"<?php if($study_fund_type && $study_fund_type == 'Part scholarship part self financed'): ?> selected <?php endif; ?>>
                                        Part scholarship part...
                                    </option>
                                </select>

                                <?php if(isset($table_manipulate_data['application_status']) && $table_manipulate_data['application_status'] == 'on'): ?>
                                    <select name="status_filter" id="status_filter"
                                        class="ml-3 form-control form-control-lg">
                                        <option value="">Select Status</option>
                                        <?php
                                            $statusLabels = [
                                                0 => 'Not Complete',
                                                1 => 'Processing',
                                                2 => 'Approved',
                                                3 => 'Cancel',
                                                4 => 'Not Submitted',
                                                5 => 'Submitted',
                                                6 => 'Pending',
                                                7 => 'E-documents Qualified',
                                                8 => 'Waiting Processing',
                                                9 => 'Processing',
                                                10 => 'More Documents Needed',
                                                11 => 'Re-Submitted',
                                                12 => 'Rejected',
                                                13 => 'Transferred',
                                                14 => 'Accepted',
                                                15 => 'E-offer Delivered',
                                                16 => 'Offer Delivered',
                                            ];
                                        ?>
                                        <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($status); ?>"><?php echo e($status); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </nav>
                    </div>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="application_table" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-left">SL</th>
                                        <?php if(isset($table_manipulate_data['application_code']) && $table_manipulate_data['application_code'] == 'on'): ?>
                                            <th>Code</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['student_name']) && $table_manipulate_data['student_name'] == 'on'): ?>
                                            <th>Student</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['passport_number']) && $table_manipulate_data['passport_number'] == 'on'): ?>
                                            <th>Passport</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['program_name']) && $table_manipulate_data['program_name'] == 'on'): ?>
                                            <th>Program Name</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['universityOne']) && $table_manipulate_data['universityOne'] == 'on'): ?>
                                            <th>University One</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['universityTwo']) && $table_manipulate_data['universityTwo'] == 'on'): ?>
                                            <th>University Two</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['universityThree']) && $table_manipulate_data['universityThree'] == 'on'): ?>
                                            <th>University Three</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['statusOne']) && $table_manipulate_data['statusOne'] == 'on'): ?>
                                            <th>Status One</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['statusTwo']) && $table_manipulate_data['statusTwo'] == 'on'): ?>
                                            <th>Status Two</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['statusThree']) && $table_manipulate_data['statusThree'] == 'on'): ?>
                                            <th>Status Three</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['university_name']) && $table_manipulate_data['university_name'] == 'on'): ?>
                                            <th>University</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['application_status']) && $table_manipulate_data['application_status'] == 'on'): ?>
                                            <th>Status</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['admission_notice']) && $table_manipulate_data['admission_notice'] == 'on'): ?>
                                            <th>Admission notice</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['payment_receipt']) && $table_manipulate_data['payment_receipt'] == 'on'): ?>
                                            <th>Payment receipt</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['country']) && $table_manipulate_data['country'] == 'on'): ?>
                                            <th>Country</th>
                                        <?php endif; ?>

                                        <?php if(isset($table_manipulate_data['email']) && $table_manipulate_data['email'] == 'on'): ?>
                                            <th>Student Email</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['paid_status']) && $table_manipulate_data['paid_status'] == 'on'): ?>
                                            <th
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 80px;">
                                                Paid Status
                                            </th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['final_destination']) && $table_manipulate_data['final_destination'] == 'on'): ?>
                                            <th>Final destination</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['action']) && $table_manipulate_data['action'] == 'on'): ?>
                                            <th class="text-right">Action</th>
                                        <?php endif; ?>
                                        <?php if(isset($table_manipulate_data['partner_name']) && $table_manipulate_data['partner_name'] == 'on'): ?>
                                            <th>Partner</th>
                                        <?php endif; ?>

                                        <?php if(isset($table_manipulate_data['application_fee']) && $table_manipulate_data['application_fee'] == 'on'): ?>
                                            <th>Application fee</th>
                                        <?php endif; ?>




                                        <?php if(isset($table_manipulate_data['applied_by']) && $table_manipulate_data['applied_by'] == 'on'): ?>
                                            <th>Applied by</th>
                                        <?php endif; ?>



                                        <?php if(isset($table_manipulate_data['apply_date']) && $table_manipulate_data['apply_date'] == 'on'): ?>
                                            <th
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 80px;">
                                                Apply Date
                                            </th>
                                        <?php endif; ?>



                                    </tr>
                                </thead>

                                <?php
                                    $sl_count = 1;
                                ?>
                                <tbody>
                                    <?php if(!collect($table_manipulate_filter_data)->contains('is_selected', true)): ?>

                                        <?php $__currentLoopData = $applictions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr role="row">
                                                <td class="text-left"><?php echo e($sl_count); ?></td>
                                                <?php if(isset($table_manipulate_data['application_code']) && $table_manipulate_data['application_code'] == 'on'): ?>
                                                    <td><?php echo e($item->application_code ?? ''); ?></td>
                                                <?php endif; ?>
                                                <?php if(isset($table_manipulate_data['student_name']) && $table_manipulate_data['student_name'] == 'on'): ?>
                                                    <?php
                                                        $studentName =
                                                            $item->first_name == null
                                                                ? 'No name'
                                                                : $item->first_name . ' ' . $item->last_name;
                                                    ?>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="<?php echo e($studentName ?? ''); ?>">
                                                            <?php echo e($studentName ?? ''); ?>

                                                        </span>
                                                    </td>
                                                <?php endif; ?>

                                                

                                                <?php if(isset($table_manipulate_data['passport_number']) && $table_manipulate_data['passport_number'] == 'on'): ?>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="<?php echo e($item->passport_number ?? ''); ?>">
                                                            <?php echo e($item->passport_number ?? ''); ?>

                                                        </span>
                                                    </td>
                                                <?php endif; ?>

                                                <?php if(isset($table_manipulate_data['program_name']) && $table_manipulate_data['program_name'] == 'on'): ?>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        <?php $__currentLoopData = $item->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <span data-toggle="tooltip" data-placement="left"
                                                                data-original-title="<?php echo e($cart->course->name ?? ''); ?>">
                                                                <?php echo e($cart->course->name ?? ''); ?>

                                                            </span>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                <?php endif; ?>
                                                <?php if(isset($table_manipulate_data['universityOne']) && $table_manipulate_data['universityOne'] == 'on'): ?>
                                                    <td
                                                        style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        `` <?php echo e($item->universityOne ?? ''); ?>

                                                    </td>
                                                <?php endif; ?>
                                                <?php if(isset($table_manipulate_data['universityTwo']) && $table_manipulate_data['universityTwo'] == 'on'): ?>
                                                    <td
                                                        style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        `` <?php echo e($item->universitytwo ?? ''); ?>

                                                    </td>
                                                <?php endif; ?>
                                                <?php if(isset($table_manipulate_data['universityThree']) && $table_manipulate_data['universityThree'] == 'on'): ?>
                                                    <td
                                                        style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        `` <?php echo e($item->universitythree ?? ''); ?>

                                                    </td>
                                                <?php endif; ?>
                                                <?php if(isset($table_manipulate_data['statusOne']) && $table_manipulate_data['statusOne'] == 'on'): ?>
                                                    <td
                                                        style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        `` <?php echo e($item->statusOne ?? ''); ?>

                                                    </td>
                                                <?php endif; ?>
                                                <?php if(isset($table_manipulate_data['statusTwo']) && $table_manipulate_data['statusTwo'] == 'on'): ?>
                                                    <td
                                                        style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        `` <?php echo e($item->statusTwo ?? ''); ?>

                                                    </td>
                                                <?php endif; ?>
                                                <?php if(isset($table_manipulate_data['statusThree']) && $table_manipulate_data['statusThree'] == 'on'): ?>
                                                    <td
                                                        style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        `` <?php echo e($item->statusThree ?? ''); ?>

                                                    </td>
                                                <?php endif; ?>

                                                <?php if(isset($table_manipulate_data['university_name']) && $table_manipulate_data['university_name'] == 'on'): ?>
                                                    <td
                                                        style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        <?php $__currentLoopData = $item->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <span data-toggle="tooltip" data-placement="top"
                                                                data-original-title="<?php echo e($cart->course->university->name ?? ''); ?>">
                                                                <?php echo e($cart->course->university->name ?? ''); ?>

                                                            </span>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                <?php endif; ?>

                                                <?php if(isset($table_manipulate_data['application_status']) && $table_manipulate_data['application_status'] == 'on'): ?>
                                                    <td data-field="status">
                                                        <form
                                                            action="<?php echo e(route('studentApplication.updateStatus', $item->id)); ?>"
                                                            method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('PUT'); ?>

                                                            <select name="status" class="form-control"
                                                                onchange="this.form.submit()">
                                                                <?php
                                                                    $statusLabels = [
                                                                        0 => [
                                                                            'label' => 'Not Complete',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        1 => [
                                                                            'label' => 'Processing',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        2 => [
                                                                            'label' => 'Approved',
                                                                            'badge' => 'badge-success',
                                                                        ],
                                                                        3 => [
                                                                            'label' => 'Cancel',
                                                                            'badge' => 'badge-danger',
                                                                        ],
                                                                        4 => [
                                                                            'label' => 'Not Submitted',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        5 => [
                                                                            'label' => 'Submitted',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        6 => [
                                                                            'label' => 'Pending',
                                                                            'badge' => 'badge-warning',
                                                                        ],
                                                                        7 => [
                                                                            'label' => 'E-documents Qualified',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        8 => [
                                                                            'label' => 'Waiting Processing',
                                                                            'badge' => 'badge-warning',
                                                                        ],
                                                                        9 => [
                                                                            'label' => 'Processing',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        10 => [
                                                                            'label' => 'More Documents Needed',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        11 => [
                                                                            'label' => 'Re-Submitted',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        12 => [
                                                                            'label' => 'Rejected',
                                                                            'badge' => 'badge-danger',
                                                                        ],
                                                                        13 => [
                                                                            'label' => 'Transferred',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        14 => [
                                                                            'label' => 'Accepted',
                                                                            'badge' => 'badge-success',
                                                                        ],
                                                                        15 => [
                                                                            'label' => 'E-offer Delivered',
                                                                            'badge' => 'badge-success',
                                                                        ],
                                                                        16 => [
                                                                            'label' => 'Offer Delivered',
                                                                            'badge' => 'badge-success',
                                                                        ],
                                                                    ];
                                                                ?>

                                                                <?php $__currentLoopData = $statusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($key); ?>"
                                                                        <?php echo e($item->status == $key ? 'selected' : ''); ?>>
                                                                        <?php echo e($status['label']); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </form>
                                                    </td>
                                                <?php endif; ?>


                                                
                                                <?php if(isset($table_manipulate_data['admission_notice']) && $table_manipulate_data['admission_notice'] == 'on'): ?>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="<?php echo e($item->application_notice ?? ''); ?>">
                                                            <?php if($item->application_notice): ?>
                                                                <p class="my-2">
                                                                    <a href="<?php echo e(asset('upload/application/' . $item->application_notice)); ?>"
                                                                        target="_blank">
                                                                        View Current File
                                                                    </a>
                                                                </p>
                                                            <?php else: ?>
                                                                <p class="my-2">No file uploaded.</p>
                                                            <?php endif; ?>
                                                        </span>
                                                    </td>
                                                <?php endif; ?>

                                                
                                                <?php if(isset($table_manipulate_data['payment_receipt']) && $table_manipulate_data['payment_receipt'] == 'on'): ?>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="<?php echo e($item->payment_receipt ?? ''); ?>">
                                                            <?php if($item->payment_receipt): ?>
                                                                <p class="my-2">
                                                                    <a href="<?php echo e(asset('upload/payment/' . $item->payment_receipt)); ?>"
                                                                        target="_blank">
                                                                        View Current File
                                                                    </a>
                                                                </p>
                                                            <?php else: ?>
                                                                <p class="my-2">No file uploaded.</p>
                                                            <?php endif; ?>
                                                        </span>
                                                    </td>
                                                <?php endif; ?>

                                                

                                                <?php if(isset($table_manipulate_data['country']) && $table_manipulate_data['country'] == 'on'): ?>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="<?php echo e($item->home_country ?? ''); ?>">
                                                            <?php echo e($item->home_country ?? ''); ?>

                                                        </span>
                                                    </td>
                                                <?php endif; ?>

                                                <?php if(isset($table_manipulate_data['email']) && $table_manipulate_data['email'] == 'on'): ?>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="<?php echo e($item->email ?? ''); ?>">
                                                            <?php echo e($item->email ?? ''); ?>

                                                        </span>
                                                    </td>
                                                <?php endif; ?>


                                                <?php if(isset($table_manipulate_data['paid_status']) && $table_manipulate_data['paid_status'] == 'on'): ?>
                                                    <td>
                                                        <?php if($item->payment_status == 1): ?>
                                                            <span class="badge badge-success">Paid</span>
                                                        <?php elseif($item->payment_status == 0): ?>
                                                            <span class="badge badge-danger">Unpaid</span>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php endif; ?>


                                                <?php if(isset($table_manipulate_data['final_destination']) && $table_manipulate_data['final_destination'] == 'on'): ?>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="<?php echo e($item->final_destination ?? ''); ?>">
                                                            <?php echo e($item->final_destination ?? ''); ?>

                                                        </span>
                                                    </td>
                                                <?php endif; ?>


                                                <?php if(isset($table_manipulate_data['action']) && $table_manipulate_data['action'] == 'on'): ?>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v text-primary"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <div class="d-flex">
                                                                    <a href="#"
                                                                        class="btn text-primary assign-application-modal-trigger"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        data-original-title="Assign Application to Partner"
                                                                        data-application-id="<?php echo e($item->id); ?>">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="<?php echo e(route('admin.student_appliction_details', $item->id)); ?>"
                                                                        class="btn text-primary" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        data-original-title="View">
                                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="<?php echo e(route('admin.application-form-download', $item->id)); ?>"
                                                                        class="btn text-primary" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        data-original-title="Download Application">
                                                                        <i class="fa fa-download"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="<?php echo e(route('admin.application-all-document-download', $item->id)); ?>"
                                                                        class="btn text-primary" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        data-original-title="Download Application File">
                                                                        <i class="fa fa-cloud" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="<?php echo e(route('admin.student_appliction_invoice', $item->id)); ?>"
                                                                        class="btn text-primary" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        data-original-title="Invoice">
                                                                        <i class="fa fa-solid fa-receipt"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="<?php echo e(route('admin.student_appliction_edit', $item->id)); ?>"
                                                                        class="btn text-primary" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        data-original-title="Edit">
                                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                                    </a>
                                                                    <input type="hidden"
                                                                        value="<?php echo e($item->id); ?>">
                                                                    <a data-toggle="modal"
                                                                        data-target="#delete_modal_box"
                                                                        class="btn text-primary delete-item"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        data-original-title="Delete">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                <?php endif; ?>


                                                <?php if(isset($table_manipulate_data['partner_name']) && $table_manipulate_data['partner_name'] == 'on'): ?>
                                                    <?php
                                                        $partner = $item->partner($item->partner_ref_id);
                                                    ?>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="<?php echo e($partner ? $partner->name : ''); ?>">
                                                            <?php echo e($partner ? $partner->name : ''); ?>

                                                        </span>
                                                    </td>
                                                <?php endif; ?>

                                                

                                                




                                                

                                                <?php if(isset($table_manipulate_data['application_fee']) && $table_manipulate_data['application_fee'] == 'on'): ?>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="<?php echo e($item->application_fee ?? ''); ?>">
                                                            <?php echo e($item->application_fee ?? ''); ?>

                                                        </span>
                                                    </td>
                                                <?php endif; ?>








                                                <?php if(isset($table_manipulate_data['applied_by']) && $table_manipulate_data['applied_by'] == 'on'): ?>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="<?php echo e($item->applied_by ?? ''); ?>">
                                                            <?php echo e($item->applied_by ?? ''); ?>

                                                        </span>
                                                    </td>
                                                <?php endif; ?>




                                                <?php if(isset($table_manipulate_data['apply_date']) && $table_manipulate_data['apply_date'] == 'on'): ?>
                                                    <td class="text-center">
                                                        <?php echo e(date('d M, Y', strtotime($item->created_at))); ?>


                                                    </td>
                                                <?php endif; ?>






                                                <?php
                                                    $sl_count++;
                                                ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php
                                            $groupedApplicationIds = [];
                                        ?>

                                        <?php $__currentLoopData = $table_manipulate_filter_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($filter['is_selected'] != false): ?>
                                                <?php
                                                    $filter_type = $filter['filter_parent'];
                                                    $filter_id = $filter['filter_child'];
                                                    $filter_name = $filter['filter_name'];
                                                ?>
                                                <tr class="group-header dtrg-group" data-toggle="collapse"
                                                    data-target=".group-<?php echo e(Str::slug($filter_type . '-' . $filter_id)); ?>">
                                                    <td colspan="100%">
                                                        <span class="group-icon"></span>
                                                        <span><?php echo e($filter_name); ?></span>
                                                    </td>
                                                </tr>
                                                <?php $__currentLoopData = $applictions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $show_application = false;
                                                        foreach ($item->carts as $cart_item) {
                                                            if (
                                                                ($filter_type == 'degree' &&
                                                                    $cart_item->course->degree_id == $filter_id) ||
                                                                ($filter_type == 'department' &&
                                                                    $cart_item->course->department_id == $filter_id) ||
                                                                ($filter_type == 'university' &&
                                                                    $cart_item->course->university_id == $filter_id)
                                                            ) {
                                                                $show_application = true;
                                                                break;
                                                            } elseif (
                                                                $filter_type == 'partner' &&
                                                                $item->partner_ref_id == $filter_id
                                                            ) {
                                                                $show_application = true;
                                                                break;
                                                            }
                                                        }
                                                    ?>
                                                    <?php if($show_application): ?>
                                                        <?php
                                                            $groupedApplicationIds[] = $item->id;
                                                        ?>
                                                        <tr
                                                            class="collapse group-<?php echo e(Str::slug($filter_type . '-' . $filter_id)); ?>">
                                                            <td class="text-left"><?php echo e($sl_count); ?></td>
                                                            <?php if(isset($table_manipulate_data['application_code']) && $table_manipulate_data['application_code'] == 'on'): ?>
                                                                <td><?php echo e($item->application_code ?? ''); ?></td>
                                                            <?php endif; ?>
                                                            <?php if(isset($table_manipulate_data['student_name']) && $table_manipulate_data['student_name'] == 'on'): ?>
                                                                <?php
                                                                    $studentName = $item->student
                                                                        ? $item->student->name
                                                                        : $item->first_name . ' ' . $item->last_name;
                                                                ?>
                                                                <td
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                                    <span data-toggle="tooltip" data-placement="left"
                                                                        data-original-title="<?php echo e($studentName ?? ''); ?>">
                                                                        <?php echo e($studentName ?? ''); ?>

                                                                    </span>
                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if(isset($table_manipulate_data['partner_name']) && $table_manipulate_data['partner_name'] == 'on'): ?>
                                                                <?php
                                                                    $partner = $item->partner($item->partner_ref_id);
                                                                ?>
                                                                <td
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                                    <span data-toggle="tooltip" data-placement="left"
                                                                        data-original-title="<?php echo e($partner ? $partner->name : ''); ?>">
                                                                        <?php echo e($partner ? $partner->name : ''); ?>

                                                                    </span>
                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if(isset($table_manipulate_data['program_name']) && $table_manipulate_data['program_name'] == 'on'): ?>
                                                                <td
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    <?php $__currentLoopData = $item->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(
                                                                            ($filter_type == 'degree' && $cart->course->degree_id == $filter_id) ||
                                                                                ($filter_type == 'department' && $cart->course->department_id == $filter_id) ||
                                                                                ($filter_type == 'university' && $cart->course->university_id == $filter_id)): ?>
                                                                            <span data-toggle="tooltip"
                                                                                data-placement="left"
                                                                                data-original-title="<?php echo e($cart->course->name ?? ''); ?>">
                                                                                <?php echo e($cart->course->name ?? ''); ?>

                                                                            </span>
                                                                            <?php break; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if(isset($table_manipulate_data['universityOne']) && $table_manipulate_data['universityOne'] == 'on'): ?>
                                                                <td
                                                                    style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    `` <?php echo e($item->universityOne ?? ''); ?>

                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if(isset($table_manipulate_data['universityTwo']) && $table_manipulate_data['universityTwo'] == 'on'): ?>
                                                                <td
                                                                    style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    `` <?php echo e($item->universitytwo ?? ''); ?>

                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if(isset($table_manipulate_data['universityThree']) && $table_manipulate_data['universityThree'] == 'on'): ?>
                                                                <td
                                                                    style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    `` <?php echo e($item->universitythree ?? ''); ?>

                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if(isset($table_manipulate_data['statusOne']) && $table_manipulate_data['statusOne'] == 'on'): ?>
                                                                <td
                                                                    style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    `` <?php echo e($item->statusOne ?? ''); ?>

                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if(isset($table_manipulate_data['statusTwo']) && $table_manipulate_data['statusTwo'] == 'on'): ?>
                                                                <td
                                                                    style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    `` <?php echo e($item->statusTwo ?? ''); ?>

                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if(isset($table_manipulate_data['statusThree']) && $table_manipulate_data['statusThree'] == 'on'): ?>
                                                                <td
                                                                    style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    `` <?php echo e($item->statusThree ?? ''); ?>

                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if(isset($table_manipulate_data['university_name']) && $table_manipulate_data['university_name'] == 'on'): ?>
                                                                <td
                                                                    style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    <?php $__currentLoopData = $item->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <span data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            data-original-title="<?php echo e($cart->course->university->name ?? ''); ?>">
                                                                            <?php echo e($cart->course->university->name ?? ''); ?>

                                                                        </span>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if(isset($table_manipulate_data['apply_date']) && $table_manipulate_data['apply_date'] == 'on'): ?>
                                                                <td class="text-center">
                                                                    <?php echo e(date('d M, Y', strtotime($item->created_at))); ?>

                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if(isset($table_manipulate_data['paid_status']) && $table_manipulate_data['paid_status'] == 'on'): ?>
                                                                <td>
                                                                    <?php if($item->payment_status == 1): ?>
                                                                        <span class="badge badge-success">Paid</span>
                                                                    <?php elseif($item->payment_status == 0): ?>
                                                                        <span class="badge badge-danger">Unpaid</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if(isset($table_manipulate_data['application_status']) && $table_manipulate_data['application_status'] == 'on'): ?>
                                                                <td data-field="status">
                                                                    <?php
                                                                        $statusLabels = [
                                                                            0 => [
                                                                                'label' => 'Not Complete',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            1 => [
                                                                                'label' => 'Processing',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            2 => [
                                                                                'label' => 'Approved',
                                                                                'badge' => 'badge-success',
                                                                            ],
                                                                            3 => [
                                                                                'label' => 'Cancel',
                                                                                'badge' => 'badge-danger',
                                                                            ],
                                                                            4 => [
                                                                                'label' => 'Not Submitted',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            5 => [
                                                                                'label' => 'Submitted',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            6 => [
                                                                                'label' => 'Pending',
                                                                                'badge' => 'badge-warning',
                                                                            ],
                                                                            7 => [
                                                                                'label' => 'E-documents Qualified',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            8 => [
                                                                                'label' => 'Waiting Processing',
                                                                                'badge' => 'badge-warning',
                                                                            ],
                                                                            9 => [
                                                                                'label' => 'Processing',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            10 => [
                                                                                'label' => 'More Documents Needed',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            11 => [
                                                                                'label' => 'Re-Submitted',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            12 => [
                                                                                'label' => 'Rejected',
                                                                                'badge' => 'badge-danger',
                                                                            ],
                                                                            13 => [
                                                                                'label' => 'Transferred',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            14 => [
                                                                                'label' => 'Accepted',
                                                                                'badge' => 'badge-success',
                                                                            ],
                                                                            15 => [
                                                                                'label' => 'E-offer Delivered',
                                                                                'badge' => 'badge-success',
                                                                            ],
                                                                            16 => [
                                                                                'label' => 'Offer Delivered',
                                                                                'badge' => 'badge-success',
                                                                            ],
                                                                        ];
                                                                    ?>
                                                                    <span
                                                                        class="badge <?php echo e($statusLabels[$item->status]['badge']); ?>">
                                                                        <?php echo e($statusLabels[$item->status]['label']); ?>

                                                                    </span>
                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if(isset($table_manipulate_data['action']) && $table_manipulate_data['action'] == 'on'): ?>
                                                                <td class="text-right">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#"
                                                                            class="action-icon dropdown-toggle"
                                                                            data-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="fa fa-ellipsis-v text-primary"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <div class="d-flex">
                                                                                <a href="#"
                                                                                    class="btn text-primary assign-application-modal-trigger"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    data-original-title="Assign Application to Partner"
                                                                                    data-application-id="<?php echo e($item->id); ?>">
                                                                                    <i class="fa fa-plus"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                <a href="<?php echo e(route('admin.student_appliction_details', $item->id)); ?>"
                                                                                    class="btn text-primary"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    data-original-title="View">
                                                                                    <i class="fa fa-eye"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                <a href="<?php echo e(route('admin.application-form-download', $item->id)); ?>"
                                                                                    class="btn text-primary"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    data-original-title="Download Application">
                                                                                    <i class="fa fa-download"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                <a href="<?php echo e(route('admin.application-all-document-download', $item->id)); ?>"
                                                                                    class="btn text-primary"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    data-original-title="Download Application File">
                                                                                    <i class="fa fa-cloud"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                <a href="<?php echo e(route('admin.student_appliction_invoice', $item->id)); ?>"
                                                                                    class="btn text-primary"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    data-original-title="Invoice">
                                                                                    <i class="fa fa-solid fa-receipt"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                <a href="<?php echo e(route('admin.student_appliction_edit', $item->id)); ?>"
                                                                                    class="btn text-primary"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    data-original-title="Edit">
                                                                                    <i class="fa fa-edit"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                <input type="hidden"
                                                                                    value="<?php echo e($item->id); ?>">
                                                                                <a data-toggle="modal"
                                                                                    data-target="#delete_modal_box"
                                                                                    class="btn text-primary delete-item"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    data-original-title="Delete">
                                                                                    <i class="fa fa-trash"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            <?php endif; ?>
                                                            <?php $sl_count++; ?>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php
                                            $ungroupedApplications = $applictions->whereNotIn(
                                                'id',
                                                $groupedApplicationIds,
                                            );
                                        ?>

                                        <?php if($ungroupedApplications->isNotEmpty()): ?>
                                            <tr class="group-header dtrg-group" data-toggle="collapse"
                                                data-target=".group-other-applications">
                                                <td colspan="100%">
                                                    <span class="group-icon"></span>
                                                    <span>Other Applications</span>
                                                </td>
                                            </tr>
                                            <?php $__currentLoopData = $ungroupedApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="collapse group-other-applications">
                                                    <td class="text-left"><?php echo e($sl_count); ?></td>
                                                    <?php if(isset($table_manipulate_data['application_code']) && $table_manipulate_data['application_code'] == 'on'): ?>
                                                        <td><?php echo e($item->application_code ?? ''); ?></td>
                                                    <?php endif; ?>
                                                    <?php if(isset($table_manipulate_data['student_name']) && $table_manipulate_data['student_name'] == 'on'): ?>
                                                        <td
                                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                            <span data-toggle="tooltip" data-placement="left"
                                                                data-original-title="<?php echo e($item->student->name ?? ''); ?>">
                                                                <?php echo e($item->student->name ?? ''); ?>

                                                            </span>
                                                        </td>
                                                    <?php endif; ?>
                                                    <?php if(isset($table_manipulate_data['partner_name']) && $table_manipulate_data['partner_name'] == 'on'): ?>
                                                        <?php
                                                            $partner = $item->partner($item->partner_ref_id);
                                                        ?>
                                                        <td
                                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                            <span data-toggle="tooltip" data-placement="left"
                                                                data-original-title="<?php echo e($partner ? $partner->name : ''); ?>">
                                                                <?php echo e($partner ? $partner->name : ''); ?>

                                                            </span>
                                                        </td>
                                                    <?php endif; ?>
                                                    <?php if(isset($table_manipulate_data['program_name']) && $table_manipulate_data['program_name'] == 'on'): ?>
                                                        <td
                                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                            <?php $__currentLoopData = $item->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <span data-toggle="tooltip" data-placement="left"
                                                                    data-original-title="<?php echo e($cart->course->name ?? ''); ?>">
                                                                    <?php echo e($cart->course->name ?? ''); ?>

                                                                </span>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                    <?php endif; ?>
                                                    <?php if(isset($table_manipulate_data['university_name']) && $table_manipulate_data['university_name'] == 'on'): ?>
                                                        <td
                                                            style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                            <?php $__currentLoopData = $item->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <span data-toggle="tooltip" data-placement="top"
                                                                    data-original-title="<?php echo e($cart->course->university->name ?? ''); ?>">
                                                                    <?php echo e($cart->course->university->name ?? ''); ?>

                                                                </span>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                    <?php endif; ?>
                                                    <?php if(isset($table_manipulate_data['apply_date']) && $table_manipulate_data['apply_date'] == 'on'): ?>
                                                        <td class="text-center">
                                                            <?php echo e(date('d M, Y', strtotime($item->created_at))); ?>

                                                        </td>
                                                    <?php endif; ?>
                                                    <?php if(isset($table_manipulate_data['paid_status']) && $table_manipulate_data['paid_status'] == 'on'): ?>
                                                        <td>
                                                            <?php if($item->payment_status == 1): ?>
                                                                <span class="badge badge-success">Paid</span>
                                                            <?php elseif($item->payment_status == 0): ?>
                                                                <span class="badge badge-danger">Unpaid</span>
                                                            <?php endif; ?>
                                                        </td>
                                                    <?php endif; ?>
                                                    <?php if(isset($table_manipulate_data['application_status']) && $table_manipulate_data['application_status'] == 'on'): ?>
                                                        <td data-field="status">
                                                            <?php
                                                                $statusLabels = [
                                                                    0 => [
                                                                        'label' => 'Not Complete',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    1 => [
                                                                        'label' => 'Processing',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    2 => [
                                                                        'label' => 'Approved',
                                                                        'badge' => 'badge-success',
                                                                    ],
                                                                    3 => [
                                                                        'label' => 'Cancel',
                                                                        'badge' => 'badge-danger',
                                                                    ],
                                                                    4 => [
                                                                        'label' => 'Not Submitted',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    5 => [
                                                                        'label' => 'Submitted',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    6 => [
                                                                        'label' => 'Pending',
                                                                        'badge' => 'badge-warning',
                                                                    ],
                                                                    7 => [
                                                                        'label' => 'E-documents Qualified',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    8 => [
                                                                        'label' => 'Waiting Processing',
                                                                        'badge' => 'badge-warning',
                                                                    ],
                                                                    9 => [
                                                                        'label' => 'Processing',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    10 => [
                                                                        'label' => 'More Documents Needed',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    11 => [
                                                                        'label' => 'Re-Submitted',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    12 => [
                                                                        'label' => 'Rejected',
                                                                        'badge' => 'badge-danger',
                                                                    ],
                                                                    13 => [
                                                                        'label' => 'Transferred',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    14 => [
                                                                        'label' => 'Accepted',
                                                                        'badge' => 'badge-success',
                                                                    ],
                                                                    15 => [
                                                                        'label' => 'E-offer Delivered',
                                                                        'badge' => 'badge-success',
                                                                    ],
                                                                    16 => [
                                                                        'label' => 'Offer Delivered',
                                                                        'badge' => 'badge-success',
                                                                    ],
                                                                ];
                                                            ?>
                                                            <span
                                                                class="badge <?php echo e($statusLabels[$item->status]['badge']); ?>">
                                                                <?php echo e($statusLabels[$item->status]['label']); ?>

                                                            </span>
                                                        </td>
                                                    <?php endif; ?>

                                                    <?php if(isset($table_manipulate_data['action']) && $table_manipulate_data['action'] == 'on'): ?>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="action-icon dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v text-primary"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <div class="d-flex">
                                                                        <a href="#"
                                                                            class="btn text-primary assign-application-modal-trigger"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            data-original-title="Assign Application to Partner"
                                                                            data-application-id="<?php echo e($item->id); ?>">
                                                                            <i class="fa fa-plus"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <a href="<?php echo e(route('admin.student_appliction_details', $item->id)); ?>"
                                                                            class="btn text-primary"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            data-original-title="View">
                                                                            <i class="fa fa-eye"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <a href="<?php echo e(route('admin.application-form-download', $item->id)); ?>"
                                                                            class="btn text-primary"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            data-original-title="Download Application">
                                                                            <i class="fa fa-download"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <a href="<?php echo e(route('admin.application-all-document-download', $item->id)); ?>"
                                                                            class="btn text-primary"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            data-original-title="Download Application File">
                                                                            <i class="fa fa-cloud"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <a href="<?php echo e(route('admin.student_appliction_invoice', $item->id)); ?>"
                                                                            class="btn text-primary"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            data-original-title="Invoice">
                                                                            <i class="fa fa-solid fa-receipt"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <a href="<?php echo e(route('admin.student_appliction_edit', $item->id)); ?>"
                                                                            class="btn text-primary"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            data-original-title="Edit">
                                                                            <i class="fa fa-edit"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <input type="hidden"
                                                                            value="<?php echo e($item->id); ?>">
                                                                        <a data-toggle="modal"
                                                                            data-target="#delete_modal_box"
                                                                            class="btn text-primary delete-item"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            data-original-title="Delete">
                                                                            <i class="fa fa-trash"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    <?php endif; ?>
                                                    <?php $sl_count++; ?>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                
                <div id="delete_modal_box" class="modal fade delete-modal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img src="<?php echo e(asset('backend/assets/images/warning.png')); ?>" alt=""
                                    width="50" height="46">
                                <h5 class="mt-3 mb-4">Are you sure want to delete this?</h5>
                                <div class="m-t-20 flex">
                                    <form action="<?php echo e(route('admin.student_appliction_delete')); ?>" method="POST"
                                        id="deleteForm">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="s_appliction_id" id="modal_item_id"
                                            value="">
                                    </form>
                                    <div class="mt-3">
                                        <a href="#" class="btn btn-success" data-dismiss="modal">Cancel</a>
                                        <a class="btn btn-danger"
                                            onclick="document.getElementById('deleteForm').submit()">Confirm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="modal fade" id="assign_application_to_partner_modal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel-2" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="<?php echo e(route('admin.assign_application_to_partner')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="modal-header">
                                    <h5 class="modal-title">Assign Application To Partner</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="application_id" value="">
                                        <select name="partner_id" class="form-control form-control-lg" required>
                                            <option value="">Select Partner</option>
                                            <option value="none">None</option>
                                            <?php $__currentLoopData = $all_partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    if (!empty($partner->continent_id)) {
                                                        $partner_continent = App\Models\Continent::find(
                                                            $partner->continent_id,
                                                        );
                                                    }
                                                ?>
                                                <option value="<?php echo e($partner->id); ?>"><?php echo e($partner->name); ?> -
                                                    <?php echo e($partner_continent->name ?? ''); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div>
                                        <p style="font-size: 1rem;">Assign an application to specific partner.</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" type="button" class="btn btn-light"
                                        data-dismiss="modal">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Assign</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                

                <div class="modal fade" id="manage_fields_modal" tabindex="-1" role="dialog"
                    aria-labelledby="manage-fields-modal" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="<?php echo e(route('admin.student_appliction_list.table_manipulate')); ?>"
                                method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="modal-header">
                                    <h5 class="modal-title">Select fields to manipulate data table</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="application_code"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['application_code']) && $table_manipulate_data['application_code'] == 'on'): ?> checked <?php endif; ?>>
                                                                Application Code
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="partner_name"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['partner_name']) && $table_manipulate_data['partner_name'] == 'on'): ?> checked <?php endif; ?>>
                                                                Partner
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="program_name"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['program_name']) && $table_manipulate_data['program_name'] == 'on'): ?> checked <?php endif; ?>>
                                                                Program Name
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="apply_date"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['apply_date']) && $table_manipulate_data['apply_date'] == 'on'): ?> checked <?php endif; ?>>
                                                                Apply Date
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="application_status"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['application_status']) && $table_manipulate_data['application_status'] == 'on'): ?> checked <?php endif; ?>>
                                                                Application Status
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="passport_number"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['passport_number']) && $table_manipulate_data['passport_number'] == 'on'): ?> checked <?php endif; ?>>
                                                                Passport Number
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="admission_notice"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['admission_notice']) && $table_manipulate_data['admission_notice'] == 'on'): ?> checked <?php endif; ?>>
                                                                Admission Notice
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="application_fee"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['application_fee']) && $table_manipulate_data['application_fee'] == 'on'): ?> checked <?php endif; ?>>
                                                                Application fee
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="payment_receipt"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['payment_receipt']) && $table_manipulate_data['payment_receipt'] == 'on'): ?> checked <?php endif; ?>>
                                                                Payment receipt
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="country"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['country']) && $table_manipulate_data['country'] == 'on'): ?> checked <?php endif; ?>>
                                                                Country
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="student_name"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['student_name']) && $table_manipulate_data['student_name'] == 'on'): ?> checked <?php endif; ?>>
                                                                Student Name
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="email"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['email']) && $table_manipulate_data['email'] == 'on'): ?> checked <?php endif; ?>>
                                                                Student Email
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="university_name"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['university_name']) && $table_manipulate_data['university_name'] == 'on'): ?> checked <?php endif; ?>>
                                                                University Name
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="universityOne"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['universityOne']) && $table_manipulate_data['universityOne'] == 'on'): ?> checked <?php endif; ?>>
                                                                University 1
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="universityTwo"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['universityTwo']) && $table_manipulate_data['universityTwo'] == 'on'): ?> checked <?php endif; ?>>
                                                                University 2
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="universityThree"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['universityThree']) && $table_manipulate_data['universityThree'] == 'on'): ?> checked <?php endif; ?>>
                                                                University 2
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="statusOne"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['statusOne']) && $table_manipulate_data['statusOne'] == 'on'): ?> checked <?php endif; ?>>
                                                                Status 1
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="statusTwo"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['statusTwo']) && $table_manipulate_data['statusTwo'] == 'on'): ?> checked <?php endif; ?>>
                                                                Status 2
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="statusThree"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['statusThree']) && $table_manipulate_data['statusThree'] == 'on'): ?> checked <?php endif; ?>>
                                                                Status 3
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="paid_status"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['paid_status']) && $table_manipulate_data['paid_status'] == 'on'): ?> checked <?php endif; ?>>
                                                                Paid Status
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="final_destination"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['final_destination']) && $table_manipulate_data['final_destination'] == 'on'): ?> checked <?php endif; ?>>
                                                                Final Destination
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="applied_by"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['applied_by']) && $table_manipulate_data['applied_by'] == 'on'): ?> checked <?php endif; ?>>
                                                                Applied By
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="action"
                                                                    class="form-check-input"
                                                                    <?php if(isset($table_manipulate_data['action']) && $table_manipulate_data['action'] == 'on'): ?> checked <?php endif; ?>>
                                                                Action
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-muted" style="font-size: 1rem;">Select desired fields to show
                                            in data-table.</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" type="button" class="btn btn-light"
                                        data-dismiss="modal">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                
                <div class="modal fade" id="manage_filters_modal" tabindex="-1" role="dialog"
                    aria-labelledby="manage-fields-modal" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Manage filters to manipulate data table</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <form
                                        action="<?php echo e(route('admin.student_appliction_list.table_manipulate_filter')); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="data_filter_type" value="add_filter">

                                        <div class="card-header" data-toggle="collapse"
                                            data-target="#add_new_filter">
                                            <h5 class="text-dark" style="font-size: 1rem;">
                                                <i class="fa fa-solid fa-plus"></i>
                                                Add New Filter
                                            </h5>
                                        </div>
                                        <div class="collapse" id="add_new_filter">
                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <input type="hidden" name="filter_name" class="form-control">
                                                </div>

                                                <div class="col-12 mt-3">
                                                    <p class="text-muted" style="font-size: 1rem">Available Filters
                                                    </p>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <select name="filter_parent"
                                                                class="form-control form-control-lg"
                                                                id="filter_parent" required>
                                                                <option value="">Select Filter Type</option>
                                                                <option value="partner">Partner</option>
                                                                <option value="degree">Degree</option>
                                                                <option value="department">Department</option>
                                                                <option value="university">University</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select name="filter_child"
                                                                class="form-control form-control-lg" id="filter_child"
                                                                required>
                                                                <option value="">Select Type First</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mt-3 text-right">
                                                    <button class="btn btn-primary" type="submit">Add Filter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="mt-2">
                                    <form
                                        action="<?php echo e(route('admin.student_appliction_list.table_manipulate_filter')); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="data_filter_type" value="manage_filter">

                                        <div class="card-header" data-toggle="collapse" data-target="#manage_filter">
                                            <h5 class="text-dark" style="font-size: 1rem;">
                                                <i class="fa fa-solid fa-plus"></i>
                                                Manage Filters
                                            </h5>
                                        </div>
                                        <div class="collapse" id="manage_filter">
                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Filter Name</th>
                                                                <th class="text-right" style="padding-right: 2rem">
                                                                    Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label fs-09">
                                                                            <input type="checkbox" name="filter_id[]"
                                                                                class="form-check-input"
                                                                                value="none"
                                                                                <?php echo e(!collect($table_manipulate_filter_data)->contains('is_selected', true) ? 'checked' : ''); ?>>
                                                                            None
                                                                            <i class="input-helper"></i>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td class="text-right" style="padding-right: 2rem">
                                                                </td>
                                                            </tr>
                                                            <?php if(!empty($table_manipulate_filter_data)): ?>
                                                                <?php $__currentLoopData = $table_manipulate_filter_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <label class="form-check-label fs-09">
                                                                                    <input type="checkbox"
                                                                                        name="filter_id[]"
                                                                                        class="form-check-input"
                                                                                        value="<?php echo e($filter['id']); ?>"
                                                                                        <?php echo e($filter['is_selected'] ? 'checked' : ''); ?>>
                                                                                    <?php echo e($filter['filter_name']); ?>

                                                                                    <i class="input-helper"></i>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-right"
                                                                            style="padding-right: 2rem">
                                                                            <a
                                                                                href="<?php echo e(route('admin.student_appliction_list.delete_filter_item', ['id' => $filter['id']])); ?>">
                                                                                <i class="fa fa-trash text-danger"
                                                                                    style="font-size: 16px"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-12 mt-3 text-right">
                                                    <button class="btn btn-primary" type="submit">Update
                                                        Filter</button>
                                                </div>
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
    <script src="<?php echo e(asset('backend/assets/js/data-table_rowGroup.min.js')); ?>"></script>

    <script>
        var table = $('#application_table').DataTable({
            "aLengthMenu": [
                [15, 25, 50, -1],
                [15, 25, 50, "All"]
            ],
            "dom": 'Bfrtip',
            "buttons": [
                'excel', 'pdf', 'print'
            ],
            "iDisplayLength": 15,
            "language": {
                search: ""
            }
        });

        $('#application_table').each(function() {
            var datatable = $(this);
            // SEARCH - Add the placeholder for Search and Turn this into in-line form control
            var search_input = datatable.closest('.dataTables_wrapper').find(
                'div[id$=_filter] input');
            search_input.attr('placeholder', 'Search...');
            search_input.removeClass('form-control-sm');

            // LENGTH - Inline-Form control
            var length_sel = datatable.closest('.dataTables_wrapper').find(
                'div[id$=_length] select');
            length_sel.removeClass('form-control-sm');
        });
    </script>

    <script>
        $('#application_table tbody').on('click', 'tr.group-header', function() {
            var group = $(this).data('group');
            var rows = $('#application_table tbody tr.group-' + group);

            if ($(this).hasClass('expanded')) {
                $(this).removeClass('expanded').addClass('collapsed');
                $(this).find('span.group-icon').html(
                    '&#9662;'); // group icon to ▼

                rows.hide();
            } else {
                $(this).removeClass('collapsed').addClass('expanded');
                $(this).find('span.group-icon').html(
                    '&#9656;'); // group icon to ▶
                rows.show();
            }
        });

        $('#application_table tbody tr.group-header').each(function() {
            $(this).removeClass('collapsed').addClass('expanded');
            $(this).find('span.group-icon').html(
                '&#9656;'); // group icon to ▶
        });
    </script>

    <script>
        $('.assign-application-modal-trigger').click(function() {
            var applicationId = $(this).data('application-id');

            $('input[name="application_id"]').val(applicationId);
            $('#assign_application_to_partner_modal').modal('show');
        });

        $('#assign_application_to_partner_modal').on('hidden.bs.modal', function() {
            $('input[name="application_id"]').val('');
        });
    </script>

    <?php if(isset($table_manipulate_data['application_status']) && $table_manipulate_data['application_status'] == 'on'): ?>
        <script>
            document.getElementById('status_filter').addEventListener('change', function() {
                var selectedStatus = this.value;
                var tableRows = document.querySelectorAll('#application_table tbody tr:not(.group-header)');

                tableRows.forEach(function(row) {
                    var statusCell = row.querySelector('td[data-field="status"]');

                    var statusSpan = statusCell.querySelector('span');

                    if (selectedStatus == '') {
                        row.style.display = '';
                        return;
                    }

                    if (statusSpan.textContent.trim() === selectedStatus) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        </script>
    <?php endif; ?>

    <script>
        var studyFundSelect = document.getElementById('study_fund_type');

        studyFundSelect.addEventListener('change', function() {
            var selectedValue = studyFundSelect.value;

            if (selectedValue !== '') {
                var form = document.createElement('form');

                form.action = '<?php echo e(route('admin.student_appliction_list.study_type_filter')); ?>';
                form.method = 'POST';

                var csrfToken = document.querySelector('meta[name="_token"]').getAttribute('content');
                var csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = csrfToken;

                form.appendChild(csrfInput);

                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'study_fund';
                input.value = selectedValue;

                form.appendChild(input);
                document.body.appendChild(form);

                form.submit();
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#filter_parent').on('change', function() {
                var parentValue = $(this).val();

                if (parentValue) {
                    $.ajax({
                        url: '<?php echo e(route('admin.student_appliction_list.get_filter_items')); ?>',
                        type: 'GET',
                        data: {
                            filter: parentValue
                        },
                        success: function(response) {
                            $('#filter_child').empty();
                            $('#filter_child').append(
                                '<option value="">Select Filter</option>');
                            $.each(response, function(index, item) {
                                $('#filter_child').append('<option value="' + item.id +
                                    '" data-filter-name="' + item.name + '">' + item
                                    .name + '</option>');
                            });
                        },
                        error: function() {
                            alert('Error retrieving data. Please try again.');

                            $('#filter_child').empty();
                            $('#filter_child').append(
                                '<option value="">Select Type First</option>');
                        }
                    });
                } else {
                    $('#filter_child').empty();
                    $('#filter_child').append('<option value="">Select Type First</option>');
                }
            });

            $(document).on('change', 'select[name="filter_child"]', function() {
                let filter_name = $(this).find('option:selected').data('filter-name');
                $('input[name="filter_name"]').val(filter_name);
            });

            function updateNoneCheckbox() {
                var allUnchecked = !$('input[name="filter_id[]"]:checked').length;
                $('input[name="filter_id[]"][value="none"]').prop('checked', allUnchecked);
            }

            $(document).on('change', 'input[name="filter_id[]"]:not([value="none"])', function() {
                $('input[name="filter_id[]"][value="none"]').prop('checked', false);
            });

            $(document).on('change', 'input[name="filter_id[]"][value="none"]', function() {
                $(this).prop('checked', true);
                $('input[name="filter_id[]"]:not([value="none"])').prop('checked', false);
            });

            $(document).on('change', 'input[name="filter_id[]"]', function() {
                updateNoneCheckbox();
            });

            $('input[name="filter_id[]"]:not([value="none"])').trigger('change');
        });
    </script>
</body>

</html>
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Backend/student_appliction/index.blade.php ENDPATH**/ ?>