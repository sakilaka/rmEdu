<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/summernote/dist/summernote-bs4.css')); ?>">
    <title><?php echo e(env('APP_NAME')); ?> | Add Landing Page</title>
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
                            Add Landing Page
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="<?php echo e(route('admin.landing_page.index')); ?>" class="btn btn-primary btn-fw">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                View All</a>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-md-9 m-auto grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample" action="<?php echo e(route('admin.landing_page.store')); ?>"
                                        method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="title" class=" col-form-label">Title
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input id="title" type="text" name="title" class="form-control"
                                                    placeholder="Enter Title" required>
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

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <span class="col-form-label">Form
                                                    <span class="text-danger">*</span>
                                                </span>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9 d-flex align-items-center">
                                                <div class="form-check form-check-inline">
                                                    <input id="form_show" type="checkbox" name="form_show"
                                                        class="form-check-input">
                                                    <label for="form_show">Show</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="details" class=" col-form-label">
                                                    Content
                                                </label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <textarea type="text" id="summernote" name="content" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div id="form-container" style="display: none">
                                            <div class="border mt-5 p-3 rounded">
                                                <h5 style="font-size: 1.25rem" class="text-center mb-4">Form
                                                    Preview</h5>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" disabled>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="contact">Contact No.</label>
                                                        <input type="text" class="form-control" id="contact"
                                                            name="contact" disabled>
                                                    </div>
                                                </div>

                                                <h5>Academic Details</h5>

                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <label class="font-weight-bold">SSC</label>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="ssc_gpa">GPA</label>
                                                        <input type="text" class="form-control" id="ssc_gpa"
                                                            name="ssc_gpa" disabled>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="ssc_passing_year">Passing Year</label>
                                                        <input type="text" class="form-control" id="ssc_passing_year"
                                                            name="ssc_passing_year" disabled>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <label class="font-weight-bold">HSC</label>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="hsc_gpa">GPA</label>
                                                        <input type="text" class="form-control" id="hsc_gpa"
                                                            name="hsc_gpa" disabled>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="hsc_passing_year">Passing Year</label>
                                                        <input type="text" class="form-control"
                                                            id="hsc_passing_year" name="hsc_passing_year" disabled>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="ielts_score">IELTS Score</label>
                                                        <input type="text" class="form-control" id="ielts_score"
                                                            name="ielts_score" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
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

    <script src="<?php echo e(asset('backend/lib/summernote/summernote-bs4.min.js')); ?>"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Write something...',
            tabsize: 4,
            height: 150
        });
    </script>

    <script>
        function toggleForm() {
            const formContainer = document.getElementById('form-container');
            const formShow = document.getElementById('form_show');
            formContainer.style.display = formShow.checked ? 'block' : 'none';
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleForm();
            document.getElementById('form_show').addEventListener('change', toggleForm);
        });
    </script>

</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/landing_pages/create.blade.php ENDPATH**/ ?>