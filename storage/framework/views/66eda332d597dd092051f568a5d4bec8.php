<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | All Student</title>
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
                            All Student
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="<?php echo e(route('admin.student.create')); ?>" class="btn btn-primary btn-fw">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add Student</a>
                        </nav>
                    </div>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="order-listing" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>NID</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="odd">
                                            <td class="text-left"><?php echo e($loop->iteration); ?></td>
                                            <td
                                                style="font-size: 0.9rem; 
                                                        white-space: nowrap; 
                                                        overflow: hidden; 
                                                        text-overflow: ellipsis; 
                                                        max-width: 200px;">

                                                <img src="<?php echo e($student->image_show); ?>" width="40px"
                                                    height="40px">&nbsp;&nbsp;
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="<?php echo e($student->name); ?>">
                                                    <?php echo e($student->name); ?>

                                                </span>
                                            </td>
                                            <td><?php echo e($student->mobile); ?></td>
                                            <td
                                                style="font-size: 0.9rem; 
                                                        white-space: nowrap; 
                                                        overflow: hidden; 
                                                        text-overflow: ellipsis; 
                                                        max-width: 150px;">
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="<?php echo e($student->email); ?>">
                                                    <?php echo e($student->email); ?>

                                                </span>
                                            </td>
                                            <td>
                                                <?php if($student->gender == '0'): ?>
                                                    Male
                                                <?php else: ?>
                                                    Female
                                                <?php endif; ?>
                                            </td>
                                            <td
                                                style="font-size: 0.9rem; 
                                                        white-space: nowrap; 
                                                        overflow: hidden; 
                                                        text-overflow: ellipsis; 
                                                        max-width: 150px;">
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="<?php echo e($student->address); ?>">
                                                    <?php echo e($student->address); ?>

                                                </span>
                                            </td>
                                            <td
                                                style="font-size: 0.9rem; 
                                                        white-space: nowrap; 
                                                        overflow: hidden; 
                                                        text-overflow: ellipsis; 
                                                        max-width: 80px;">
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="<?php echo e($student->nid); ?>">
                                                    <?php echo e($student->nid); ?>

                                                </span>
                                            </td>

                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false"><i
                                                            class="fa fa-ellipsis-v text-primary"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="d-flex">
                                                            <a href="#" class="btn text-primary assign-student-modal-trigger"
                                                                data-toggle="tooltip" data-placement="top"
                                                                data-original-title="Assign Student to Partner"
                                                                data-student-id="<?php echo e($student->id); ?>">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="<?php echo e(route('admin.student_details', $student->id)); ?>"
                                                                class="btn text-primary" data-toggle="tooltip"
                                                                data-placement="top" data-original-title="View">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="<?php echo e(route('admin.student.edit', $student->id)); ?>"
                                                                class="btn text-primary" data-toggle="tooltip"
                                                                data-placement="top" data-original-title="Edit">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                            </a>
                                                            <input type="hidden" value="<?php echo e($student->id); ?>">
                                                            <a data-toggle="modal" data-target="#delete_modal_box"
                                                                class="btn text-primary delete-item"">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
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

                
                <div id="delete_modal_box" class="modal fade delete-modal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img src="<?php echo e(asset('backend/assets/images/warning.png')); ?>" alt=""
                                    width="50" height="46">
                                <h5 class="mt-3 mb-4">Are you sure want to delete this?</h5>
                                <div class="m-t-20 flex">
                                    <form action="<?php echo e(route('admin.student.delete')); ?>" method="POST" id="deleteForm">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="student_id" id="modal_item_id" value="">
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

                
                <div class="modal fade" id="assign_student_to_partner_modal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel-2" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="<?php echo e(route('admin.assign_student_to_partner')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="modal-header">
                                    <h5 class="modal-title">Assign Student To Partner</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="student_id" value="">
                                        <select name="partner_id" class="form-control form-control-lg" required>
                                            <option value="">Select Partner</option>
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
                                        <p style="font-size: 1rem;">Assign a student to specific partner.</p>
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

                <?php echo $__env->make('Backend.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('Backend.components.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        $('.assign-student-modal-trigger').click(function() {
            var studentId = $(this).data('student-id');

            $('input[name="student_id"]').val(studentId);
            $('#assign_student_to_partner_modal').modal('show');
        });

        $('#assign_student_to_partner_modal').on('hidden.bs.modal', function() {
            $('input[name="student_id"]').val('');
        });
    </script>
</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/all_users/student/index.blade.php ENDPATH**/ ?>