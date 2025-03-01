<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | All University</title>
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
                            All University
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="<?php echo e(route('admin.university.create')); ?>" class="btn btn-primary btn-fw">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add University</a>
                        </nav>
                    </div>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="order-listing" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>University</th>
                                        <th>Continent</th>
                                        <th>Country</th>
                                        <th>Address</th>
                                        
                                        
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="odd">
                                            <td class="text-left"><?php echo e($loop->iteration); ?></td>
                                            <td>
                                                <img src="<?php echo e($university->image_show); ?>" alt="" width="30px"
                                                    height="30px">
                                            </td>
                                            <td
                                                style="white-space: nowrap; 
                                                        overflow: hidden; 
                                                        text-overflow: ellipsis; 
                                                        max-width: 250px;">
                                                <a href="<?php echo e(route('frontend.university_details', ['id' => $university->id])); ?>"
                                                    data-toggle="tooltip" data-placement="top"
                                                    data-original-title="<?php echo e($university->name); ?>" target="_blank"
                                                    style="color: var(--primary_background)">
                                                    <?php echo e($university->name); ?>

                                                </a>
                                            </td>
                                            <td><?php echo e($university->continent->name ?? ''); ?></td>
                                            <td><?php echo e($university->country->name ?? ''); ?></td>
                                            <td data-toggle="tooltip" data-placement="top"
                                                data-original-title="<?php echo e($university->address); ?>">
                                                <?php echo e(Illuminate\Support\Str::limit($university->address, 30, '...')); ?>

                                            </td>
                                            
                                            
                                            <td class="text-center">
                                                <?php if($university->status == 1): ?>
                                                    <a href="<?php echo e(route('admin.university.status', $university->id)); ?>">
                                                        <span class="badge badge-success">Active</span>
                                                    </a>
                                                <?php elseif($university->status == 0): ?>
                                                    <a href="<?php echo e(route('admin.university.status', $university->id)); ?>">
                                                        <span class="badge badge-danger">Inactive</span>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-right">
                                                <a href="<?php echo e(route('admin.university.edit', $university->id)); ?>"
                                                    class="btn text-primary">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <input type="hidden" value="<?php echo e($university->id); ?>">
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
                                    <form action="<?php echo e(route('admin.university.delete')); ?>" method="POST"
                                        id="deleteForm">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="university_id" id="modal_item_id" value="">
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
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Backend/university/index.blade.php ENDPATH**/ ?>