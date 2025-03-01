<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Deposit - Transaction</title>
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
                            Deposit - Transaction
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
                                    <div class="col-12 col-md-6 col-lg-3">
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
                                    <div class="col-12 col-md-6 col-lg-3">
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
                                    <div class="col-12 col-md-6 col-lg-3">
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
                                                <option value="Ranji Deposit"
                                                    <?php echo e(old('category') == 'Ranji Deposit' ? 'selected' : ''); ?>>
                                                    Ranji Deposit
                                                </option>
                                                <option value="Rakin Deposit"
                                                    <?php echo e(old('category') == 'Rakin Deposit' ? 'selected' : ''); ?>>
                                                    Rakin Deposit
                                                </option>
                                                <option value="Student Deposit"
                                                    <?php echo e(old('category') == 'Student Deposit' ? 'selected' : ''); ?>>
                                                    Student Deposit
                                                </option>
                                                <option value="Worker Deposit"
                                                    <?php echo e(old('category') == 'Worker Deposit' ? 'selected' : ''); ?>>
                                                    Worker Deposit
                                                </option>
                                                <option value="Other"
                                                    <?php echo e(old('category') == 'Other Deposit' ? 'selected' : ''); ?>>Other
                                                </option>
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
                                        class="col-12 col-md-6 col-lg-3 title-container <?php echo e(old('category') == 'Other' ? '' : 'd-none'); ?>">
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
                                    <div class="col-12 col-md-6 col-lg-3">
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

                                    <!-- Refundable Field -->
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label for="is_refundable">Refundable? <span
                                                    class="text-danger">*</span></label>
                                            <select id="is_refundable"
                                                class="form-control form-control-lg <?php $__errorArgs = ['is_refundable'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="is_refundable" required>
                                                <option value="" disabled>Select Option</option>
                                                <option value="yes"
                                                    <?php echo e(old('is_refundable') == 'yes' ? 'selected' : ''); ?>>Yes</option>
                                                <option value="no"
                                                    <?php echo e(old('is_refundable') == 'no' ? 'selected' : ''); ?>>No</option>
                                            </select>
                                            <?php $__errorArgs = ['is_refundable'];
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

                                    <!-- Refundable Amount Field -->
                                    <div class="col-12 col-md-6 col-lg-3" id="refundable_amount_container"
                                        style="<?php echo e(old('is_refundable') == 'yes' ? '' : 'display:none;'); ?>">
                                        <div class="form-group">
                                            <label for="refundable_amount">Refunded Amount <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" step="0.01" id="refundable_amount"
                                                class="form-control <?php $__errorArgs = ['refundable_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="refundable_amount" placeholder="Enter Refunded Amount"
                                                value="<?php echo e(old('refundable_amount')); ?>"
                                                <?php echo e(old('is_refundable') == 'yes' ? 'required' : ''); ?>>
                                            <?php $__errorArgs = ['refundable_amount'];
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
                                    <div class="col-12 col-md-6 col-lg-3">
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
            const $isRefundableSelect = $('#is_refundable');
            const $refundableAmountContainer = $('#refundable_amount_container');
            const $refundableAmountInput = $('#refundable_amount');
            const $typeSelect = $('#category');
            const $titleContainer = $('.title-container');
            const $titleField = $('#title');

            // Handle the Refundable dropdown change
            $isRefundableSelect.on('change', function() {
                if ($(this).val() === 'yes') {
                    $refundableAmountContainer.show();
                    $refundableAmountInput.prop('required', true);
                } else {
                    $refundableAmountContainer.hide();
                    $refundableAmountInput.prop('required', false);
                }
            });

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

            // Initial setup based on current selections
            if ($isRefundableSelect.val() === 'yes') {
                $refundableAmountContainer.show();
                $refundableAmountInput.prop('required', true);
            } else {
                $refundableAmountContainer.hide();
                $refundableAmountInput.prop('required', false);
            }

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
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/transactions/deposit_form_add.blade.php ENDPATH**/ ?>