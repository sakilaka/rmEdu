<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Event Participants</title>
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
                            Event Participants
                        </h3>
                    </div>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="order-listing" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th>SL</th>
                                        <th>Order</th>
                                        <th>Student Name</th>
                                        <th>Student Mobile</th>
                                        <th>Student Email</th>
                                        <th>Course Amount</th>
                                        <th>Payment</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="odd">
                                            <td class="text-left"><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($event->order_number); ?></td>
                                            <td><?php echo e($event->name); ?></td>
                                            <td><?php echo e($event->mobile); ?></td>
                                            <td><?php echo e($event->email); ?></td>
                                            <td><?php echo e($event->total_amount); ?></td>
                                            <td>
                                                <?php if($event->payment_status == 'paid'): ?>
                                                    <span class="badge badge-success">Paid</span>
                                                <?php elseif($event->payment_status == 'unpaid'): ?>
                                                    <span class="badge badge-danger">Unpaid</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($event->status == 'new'): ?>
                                                    <span class="badge badge-info">New</span>
                                                <?php elseif($event->status == 'process'): ?>
                                                    <span class="badge badge-warning">Process</span>
                                                <?php elseif($event->status == 'delivered'): ?>
                                                    <span class="badge badge-success">Delivered</span>
                                                <?php elseif($event->status == 'cancel'): ?>
                                                    <span class="badge badge-danger">Cancel</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-right">
                                                <input type="hidden" value="<?php echo e($event->id); ?>">
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
                                    <form action="<?php echo e(route('event.status.change.index')); ?>" method="POST"
                                        id="deleteForm">
                                        <?php echo csrf_field(); ?>
                                        <h4 class="tx-success  tx-semibold mg-b-20 mt-2">Change Status</h4>
                                        <select class="form-control form-control-lg" name="status">
                                            <option value="">Select Status type</option>
                                            <option value="new">New</option>
                                            <option value="process">Process</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="cancel">Cancel</option>
                                        </select>
                                        <input type="hidden" name="eventstatus_id" id="modal_data_id">
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
</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/order/eventorder/index.blade.php ENDPATH**/ ?>