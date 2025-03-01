<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Out - Transaction</title>
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
                            Out - Transaction
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="<?php echo e(route('admin.transactions.index')); ?>" class="btn btn-primary btn-fw">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                View All Transactions</a>
                        </nav>
                    </div>

                    <div class="row card">
                        <div class="col-md-12 p-4 form-container">
                            <?php
                                $action = '#';
                                if ($transaction_type == 'in') {
                                    $action = route('admin.transactions.in_form_update');
                                } elseif ($transaction_type == 'out') {
                                    $action = route('admin.transactions.out_form_update');
                                } elseif ($transaction_type == 'deposit') {
                                    $action = route('admin.transactions.deposit_form_update');
                                }
                            ?>
                            <form action="<?php echo e($action); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <!-- Client Name Field -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="client_name">Client Name</label>
                                            <input type="text" id="client_name"
                                                class="form-control <?php $__errorArgs = ['client_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="client_name" placeholder="Enter Client Name"
                                                value="<?php echo e(old('client_name')); ?>">
                                            <?php $__errorArgs = ['client_name'];
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

                                    <!-- Phone Number Field -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="client_phone">Phone Number</label>
                                            <input type="text" id="client_phone"
                                                class="form-control <?php $__errorArgs = ['client_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="client_phone" placeholder="Enter Phone Number"
                                                value="<?php echo e(old('client_phone')); ?>">
                                            <?php $__errorArgs = ['client_phone'];
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

                                    <!-- Type Field -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="category">Type <span class="text-danger">*</span></label>
                                            <select id="category"
                                                class="form-control form-control-lg <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="category" required>
                                                <option value="">Select Type</option>
                                                <option value="Salary"
                                                    <?php echo e(old('category') == 'Salary' ? 'selected' : ''); ?>>Salary</option>
                                                <option value="Rent"
                                                    <?php echo e(old('category') == 'Rent' ? 'selected' : ''); ?>>Rent</option>
                                                <option value="Commission"
                                                    <?php echo e(old('category') == 'Commission' ? 'selected' : ''); ?>>Commission</option>
                                                <option value="Assets Cost"
                                                    <?php echo e(old('category') == 'Assets Cost' ? 'selected' : ''); ?>>Assets Cost
                                                </option>
                                                <option value="Ranji Withdraw"
                                                    <?php echo e(old('category') == 'Ranji Withdraw' ? 'selected' : ''); ?>>Ranji
                                                    Withdraw</option>
                                                <option value="Rakin Withdraw"
                                                    <?php echo e(old('category') == 'Rakin Withdraw' ? 'selected' : ''); ?>>Rakin
                                                    Withdraw</option>
                                                <option value="Family Withdraw"
                                                    <?php echo e(old('category') == 'Family Withdraw' ? 'selected' : ''); ?>>Family
                                                    Withdraw</option>
                                                <option value="University Payment"
                                                    <?php echo e(old('category') == 'University Payment' ? 'selected' : ''); ?>>
                                                    University Payment</option>
                                                <option value="Company Payment"
                                                    <?php echo e(old('category') == 'Company Payment' ? 'selected' : ''); ?>>
                                                    Company Payment</option>
                                                <option value="Other"
                                                    <?php echo e(old('category') == 'Other Withdraw' ? 'selected' : ''); ?>>Other
                                                    Withdraw</option>
                                            </select>

                                            <?php $__errorArgs = ['category'];
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

                                    <!-- Title Field -->
                                    <div
                                        class="col-12 col-md-6 title-container <?php echo e(old('category') == 'Other' ? '' : 'd-none'); ?>">
                                        <div class="form-group">
                                            <label for="title">Title <span class="text-danger">*</span></label>
                                            <input type="text" id="title"
                                                class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="title"
                                                placeholder="Enter Title" value="<?php echo e(old('title')); ?>"
                                                <?php echo e(old('category') == 'Other' ? 'required' : ''); ?>>
                                            <?php $__errorArgs = ['title'];
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

                                    <!-- Amount Field -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="amount">Amount <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" id="amount"
                                                class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="amount" placeholder="Enter Amount" value="<?php echo e(old('amount')); ?>"
                                                required>
                                            <?php $__errorArgs = ['amount'];
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

                                    <!-- Status Field -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select id="status"
                                                class="form-control form-control-lg <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="status" required>
                                                <option value="" selected>Select Status</option>
                                                <option value="Pending"
                                                    <?php echo e(old('status') == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                                                <option value="Resolved"
                                                    <?php echo e(old('status') == 'Resolved' ? 'selected' : ''); ?>>Resolved
                                                </option>
                                            </select>
                                            <?php $__errorArgs = ['status'];
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

                                    <!-- Description Field -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Description (Optional)</label>
                                            <textarea id="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description"
                                                placeholder="Enter Description"><?php echo e(old('description')); ?></textarea>
                                            <?php $__errorArgs = ['description'];
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

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary-bg">Submit</button>
                                    </div>
                                </div>

                            </form>
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
        $('.select2').select2({
            placeholder: 'Select an option'
        });

        $(document).ready(function() {
            const $typeSelect = $('#category');
            const $titleContainer = $('.title-container');
            const $titleField = $('#title');

            // Handle the Type dropdown change
            $typeSelect.on('change', function() {
                if ($(this).val() === 'Other') {
                    $titleContainer.removeClass('d-none');
                    $titleField.prop('required', true);
                } else {
                    $titleContainer.addClass('d-none');
                    $titleField.prop('required', false);
                }
            });

            if ($typeSelect.val() === 'Other') {
                $titleContainer.removeClass('d-none');
                $titleField.prop('required', true);
            } else {
                $titleContainer.addClass('d-none');
                $titleField.prop('required', false);
            }
        });
    </script>
</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/transactions/out_form_add.blade.php ENDPATH**/ ?>