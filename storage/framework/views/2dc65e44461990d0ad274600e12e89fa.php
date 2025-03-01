<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('User-Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Manage Application</title>
</head>

<body>
    <div class="container-scroller">
        <?php echo $__env->make('User-Backend.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid page-body-wrapper">
            <?php echo $__env->make('User-Backend.components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            Manage Application
                        </h3>

                        <nav aria-label="breadcrumb">
                            <div class="d-flex justify-content-between">
                                <select name="payment_status_filter" id="payment_status_filter"
                                    class="ml-3 form-control form-control-lg">
                                    <option value="">Select Payment Status</option>
                                    <?php
                                        $paymentStatusLabels = [
                                            0 => 'Unpaid',
                                            1 => 'Paid',
                                        ];
                                    ?>
                                    <?php $__currentLoopData = $paymentStatusLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($status); ?>"><?php echo e($status); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

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
                            </div>
                        </nav>
                    </div>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="order-listing" class="table dataTable-export table-striped dataTable no-footer"
                                role="grid" aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-left">SL</th>
                                        <th>Appliction ID</th>
                                        <th>User Name</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Application Date</th>
                                        <th class="text-center">Paid Status</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="odd">
                                            <td class="text-left"><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($application->application_code); ?></td>
                                            <td><?php echo e($application->first_name . ' ' . $application->middle_name . ' ' . $application->last_name); ?>

                                            </td>
                                            <td><?php echo e($application->phone); ?></td>
                                            <td><?php echo e(date('d M, Y', strtotime($application->created_at))); ?></td>
                                            <td>
                                                <?php if($application->payment_status == 1): ?>
                                                    <span class="badge badge-success">Paid</span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">Unpaid</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="">
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
                                                <span class="badge <?php echo e($statusLabels[$application->status]['badge']); ?>">
                                                    <?php echo e($statusLabels[$application->status]['label']); ?>

                                                </span>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false"><i
                                                            class="fa fa-ellipsis-v text-primary"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="d-flex">
                                                            <a href="<?php echo e(route('frontend.application-details', ['id' => $application->id])); ?>""
                                                                class="btn text-primary" data-toggle="tooltip"
                                                                data-placement="top" data-original-title="View">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="<?php echo e(route('consultent.application-form-download', ['id' => $application->id])); ?>"
                                                                class="btn text-primary" data-toggle="tooltip"
                                                                data-placement="top"
                                                                data-original-title="Download Application">
                                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="<?php echo e(route('frontend.consultant_application-all-document-download', $application->id)); ?>"
                                                                class="btn text-primary" data-toggle="tooltip"
                                                                data-placement="top"
                                                                data-original-title="Download Application File">
                                                                <i class="fa fa-cloud" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="<?php echo e(route('consultent.student_appliction_edit', ['id' => $application->id])); ?>"
                                                                class="btn text-primary" data-toggle="tooltip"
                                                                data-placement="top" data-original-title="Edit">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <?php echo $__env->make('User-Backend.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('User-Backend.components.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        document.getElementById('payment_status_filter').addEventListener('change', function() {
            var selectedStatus = this.value;
            var tableRows = document.querySelectorAll('#order-listing tbody tr');

            tableRows.forEach(function(row) {
                var statusCell = row.cells[5];
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

        document.getElementById('status_filter').addEventListener('change', function() {
            var selectedStatus = this.value;
            var tableRows = document.querySelectorAll('#order-listing tbody tr');

            tableRows.forEach(function(row) {
                var statusCell = row.cells[6];
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
</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/User-Backend/partner_application_manage/partner_manage_application.blade.php ENDPATH**/ ?>