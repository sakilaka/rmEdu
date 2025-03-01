<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | All University FAQ</title>
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
                            All University FAQ
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="<?php echo e(route('admin.university.index')); ?>" class="btn btn-primary btn-fw">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                View All University</a>
                        </nav>
                    </div>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="order-listing" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th>SL</th>
                                        <th>University Name</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>Date</th>
                                        <th>User Question</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $faq_questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $faq_question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="odd">
                                            <td class="text-left"><?php echo e($loop->iteration); ?></td>
                                            <td
                                                style="font-size: 0.9rem; 
                                                        white-space: nowrap; 
                                                        overflow: hidden; 
                                                        text-overflow: ellipsis; 
                                                        max-width: 150px;">
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="<?php echo e($faq_question->university->name ?? ''); ?>">
                                                    <?php echo e($faq_question->university->name ?? ''); ?>

                                                </span>
                                            </td>
                                            <td> <?php echo e($faq_question->name); ?> </td>
                                            <td> <?php echo e($faq_question->email); ?> </td>
                                            <td> <?php echo e(date('d M, Y', strtotime($faq_question->created_at))); ?></td>
                                            <td
                                                style="font-size: 0.9rem; 
                                                        white-space: nowrap; 
                                                        overflow: hidden; 
                                                        text-overflow: ellipsis; 
                                                        max-width: 250px;">
                                                <span data-toggle="tooltip" data-placement="top"
                                                    data-original-title="<?php echo e($faq_question->question); ?>">
                                                    <?php echo e($faq_question->question); ?>

                                                </span>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn text-primary" data-toggle="modal"
                                                    data-target="#exampleModal<?php echo e($k); ?>">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <input type="hidden" value="<?php echo e($faq_question->id); ?>">
                                                <a data-toggle="modal" data-target="#delete_modal_box"
                                                    class="btn text-primary delete-item">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        
                                        <div class="modal fade" id="exampleModal<?php echo e($k); ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            <?php echo e($faq_question->university->name ?? ''); ?> FAQ</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="<?php echo e(route('admin.university_faq_answer', $faq_question->id)); ?>"
                                                        method="POST">
                                                        <?php echo csrf_field(); ?>

                                                        <div class="modal-body">
                                                            <h6>
                                                                <span class="font-weight-bold">User Name</span>:
                                                                <?php echo e($faq_question->name); ?>

                                                            </h6>
                                                            <h6>
                                                                <span class="font-weight-bold">User Email</span>:
                                                                <?php echo e($faq_question->email); ?>

                                                            </h6>
                                                            <h6>
                                                                <span class="font-weight-bold">University Name</span>:
                                                                <?php echo e($faq_question->university->name ?? ''); ?>

                                                            </h6>
                                                            <h6>
                                                                <span class="font-weight-bold">Date</span>:
                                                                <?php echo e(date('d-m-Y', strtotime($faq_question->created_at))); ?>

                                                            </h6>
                                                            <h6>
                                                                <span class="font-weight-bold">Question</span>:
                                                                <?php echo e($faq_question->question); ?>

                                                            </h6>

                                                            <label class="font-weight-bold">Answer:</label>
                                                            <br>
                                                            <textarea type="text" name="answer" rows="5" class="form-control col-md-12" required><?php echo e($faq_question->answer); ?></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Submit
                                                                Answer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
                                    <form action="<?php echo e(route('admin.university_faq_answer_delete')); ?>" method="POST"
                                        id="deleteForm">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="university_faq_answer_id" id="modal_item_id"
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

                <?php echo $__env->make('Backend.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('Backend.components.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/university/faq_question.blade.php ENDPATH**/ ?>