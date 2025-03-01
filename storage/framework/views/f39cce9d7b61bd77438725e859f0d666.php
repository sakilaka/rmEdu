<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/summernote/dist/summernote-bs4.css')); ?>">
    <title><?php echo e(env('APP_NAME')); ?> | Edit Testimonial</title>
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
                            Edit Testimonial
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="<?php echo e(route('admin.manage_testimonial')); ?>" class="btn btn-primary btn-fw">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                View All Tesimonial</a>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-md-9 m-auto grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample"
                                        action="<?php echo e(route('admin.update_testimonial', ['id' => $testimonial->id])); ?>"
                                        method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="menu_type" class=" col-form-label">Sub Category
                                                    Image</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-8 col-lg-6">
                                                        <div class="dropify-wrapper" style="border: none">
                                                            <div class="dropify-loader"></div>
                                                            <div class="dropify-errors-container">
                                                                <ul></ul>
                                                            </div>
                                                            <input type="file" class="dropify" name="image"
                                                                accept="image/*" id="thumbnail_upload">
                                                            <button type="button" class="dropify-clear">Remove</button>
                                                            <div class="dropify-preview">
                                                                <span class="dropify-render"></span>
                                                                <div class="dropify-infos">
                                                                    <div class="dropify-infos-inner">
                                                                        <p class="dropify-filename">
                                                                            <span class="file-icon"></span>
                                                                            <span class="dropify-filename-inner"></span>
                                                                        </p>
                                                                        <p class="dropify-infos-message">
                                                                            Drag and drop or click to replace
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-sm-12 col-md-4 col-lg-6 d-flex justify-content-center align-items-center">
                                                        <div class="px-3">
                                                            <img src="<?php echo e($testimonial->image_show ?? asset('frontend/images/No-image.jpg')); ?>"
                                                                alt="" class="img-fluid"
                                                                style="border-radius: 10px; max-height: 200px !important;"
                                                                id="thumbnail_preview">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="category_name" class=" col-form-label">Person Name</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input id="category_name" type="text" name="name"
                                                    class="form-control" placeholder="Enter Person Name"
                                                    value="<?php echo e($testimonial->name); ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="category_name" class=" col-form-label">Person
                                                    Designation</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input id="category_name" type="text" name="designation"
                                                    class="form-control" placeholder="e.g: CEO, MD etc..."
                                                    value="<?php echo e($testimonial->designation); ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="category" class=" col-form-label">Star</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-lg" name="star"
                                                    id="category" required>
                                                    <option value="">Select Star</option>
                                                    <option <?php if($testimonial->star == 1): ?> Selected <?php endif; ?>
                                                        value="1">1 Star</option>
                                                    <option <?php if($testimonial->star == 2): ?> Selected <?php endif; ?>
                                                        value="2">2 Star</option>
                                                    <option <?php if($testimonial->star == 3): ?> Selected <?php endif; ?>
                                                        value="3">3 Star</option>
                                                    <option <?php if($testimonial->star == 4): ?> Selected <?php endif; ?>
                                                        value="4">4 Star</option>
                                                    <option <?php if($testimonial->star == 5): ?> Selected <?php endif; ?>
                                                        value="5">5 Star</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="menu_position" class=" col-form-label">Description</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <textarea id="summernote" name="comment" style="height: 150px" required><?php echo e($testimonial->comment); ?></textarea>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary mr-2">Update</button>
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

    <script src="<?php echo e(asset('backend/assets/js/dropify.js')); ?>"></script>
    <script>
        $('#thumbnail_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#thumbnail_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
    </script>
</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/testimonial/update.blade.php ENDPATH**/ ?>