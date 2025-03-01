<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | All Inquiries</title>

    <link rel="stylesheet"
        href="<?php echo e(asset('frontend/application/modules/frontend/views/themes/default/assets/css/select2.min.css')); ?>">
    <style>
        .select2-container--default .select2-selection--single {
            padding: 5px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 7px;
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
                            All Inquiries
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="<?php echo e(route('frontend.inquiry_form_show')); ?>"
                                class="btn btn-primary btn-fw">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add Inquiry</a>
                        </nav>
                    </div>

                    <form id="filter-form" method="POST" action="<?php echo e(route('admin.inquiry.index.filter')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row justify-content-end mb-2">
                            <!-- Budget Input -->
                            <div class="col-md-3 col-lg-2 mt-1 px-0 ml-2">
                                <input type="number" name="budget" class="form-control" placeholder="Enter Budget"
                                    style="padding: 8px 12px" value="<?php echo e(old('budget', request('budget'))); ?>">
                            </div>

                            <!-- Country Select -->
                            <div class="col-md-3 col-lg-2 mt-1 px-0 ml-2">
                                <select name="country" class="country-select2 form-control form-control-lg">
                                    <option value="">Select Country</option>
                                    <option value="all" <?php echo e(request('country') == 'all' ? 'selected' : ''); ?>>All
                                    </option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->id); ?>"
                                            <?php echo e(request('country') == $country->id ? 'selected' : ''); ?>>
                                            <?php echo e($country->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <!-- Program Select -->
                            <div class="col-md-3 col-lg-2 mt-1 px-0 ml-2">
                                <select name="program" class="program-select2 form-control form-control-lg">
                                    <option value="all" <?php echo e(request('program') == 'all' ? 'selected' : ''); ?>>All
                                    </option>
                                    <option value="" <?php echo e(request('program') == '' ? 'selected' : ''); ?>>Select
                                        Program</option>
                                    <option value="Bachelor’s"
                                        <?php echo e(request('program') == 'Bachelor’s' ? 'selected' : ''); ?>>Bachelor’s
                                    </option>
                                    <option value="Master’s"
                                        <?php echo e(request('program') == 'Master’s' ? 'selected' : ''); ?>>Master’s</option>
                                    <option value="PhD" <?php echo e(request('program') == 'PhD' ? 'selected' : ''); ?>>PhD
                                    </option>
                                </select>
                            </div>

                            <!-- Interest Select -->
                            <div class="col-md-3 col-lg-2 mt-1 px-0 ml-2">
                                <select name="interest" class="interest-select2 form-control form-control-lg">
                                    <option value="all" <?php echo e(request('interest') == 'all' ? 'selected' : ''); ?>>All
                                    </option>
                                    <option value="" <?php echo e(request('interest') == '' ? 'selected' : ''); ?>>Select
                                        Interest</option>
                                    <option value="Poor" <?php echo e(request('interest') == 'Poor' ? 'selected' : ''); ?>>Poor
                                    </option>
                                    <option value="Mid" <?php echo e(request('interest') == 'Mid' ? 'selected' : ''); ?>>Mid
                                    </option>
                                    <option value="High" <?php echo e(request('interest') == 'High' ? 'selected' : ''); ?>>High
                                    </option>
                                    <option value="Max" <?php echo e(request('interest') == 'Max' ? 'selected' : ''); ?>>Max
                                    </option>
                                </select>
                            </div>
                        </div>
                    </form>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="order-listing" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th>SL</th>
                                        <th>Unique ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="odd">
                                            <td class="text-left"><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e(strtoupper($inquiry->unique_inquiry_code)); ?></td>
                                            <td><?php echo e($inquiry->name); ?></td>
                                            <td><?php echo e($inquiry->email ?? ''); ?></td>
                                            <td><?php echo e($inquiry->mobile ?? ''); ?></td>
                                            <td class="text-right">
                                                <a href="<?php echo e(route('admin.inquiry.view', ['unique_id' => $inquiry->unique_inquiry_code])); ?>"
                                                    class="btn text-primary">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="<?php echo e(route('admin.inquiry.edit', ['unique_id' => $inquiry->unique_inquiry_code])); ?>"
                                                    class="btn text-primary">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <input type="hidden" value="<?php echo e($inquiry->id); ?>">
                                                <a data-toggle="modal" data-target="#delete_modal_box"
                                                    class="btn text-primary delete-item">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <form action="<?php echo e(route('admin.inquiry.delete')); ?>" method="POST" id="deleteForm">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="inquiry_id" id="modal_item_id" value="">
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

                <?php echo $__env->make('Backend.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('Backend.components.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('backend/lib/select2/js/select2.min.js')); ?>"></script>
    <script>
        $('.country-select2').select2({
            placeholder: 'Select a country'
        });
        $('.program-select2').select2({
            placeholder: 'Select a program'
        });
        $('.interest-select2').select2({
            placeholder: 'Select an interest'
        });

        $(document).ready(function() {
            $('#filter-form').on('change', 'input, select', function() {
                $(this).closest('form').submit();
            });
        });
    </script>
</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/inquiry/index.blade.php ENDPATH**/ ?>