<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Edit Country</title>
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
                            Edit Country
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-12 m-auto grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample" action="<?php echo e(route('country.update', $country->id)); ?>"
                                        method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="form-group row">
                                            <div class="col-sm-2 d-flex justify-content-between align-items-center">
                                                <label for="menu_type" class=" col-form-label">Country Image</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-10">
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
                                                            <img src="<?php echo e($country->image_show ?? asset('frontend/images/No-image.jpg')); ?>"
                                                                alt="<?php echo e($country->name); ?>" class="img-fluid"
                                                                style="border-radius: 10px; max-height: 200px !important;"
                                                                id="thumbnail_preview">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-2 d-flex justify-content-between align-items-center">
                                                <label for="continent" class=" col-form-label">Type</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-10">
                                                <select id="continent" class="form-control form-control-lg"
                                                    name="continent_id" required>
                                                    <option value="">Select Continent</option>
                                                    <?php $__currentLoopData = $continents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $continent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if($continent->id == $country->continent_id): ?> Selected <?php endif; ?>
                                                            value="<?php echo e($continent->id); ?>"><?php echo e($continent->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-2 d-flex justify-content-between align-items-center">
                                                <label for="country_name" class=" col-form-label">Country Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-10">
                                                <input id="country_name" type="text" name="name"
                                                    class="form-control" value="<?php echo e($country->name); ?>"
                                                    placeholder="Enter Country Name" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-2 d-flex justify-content-between align-items-center">
                                                <label for="country_name" class=" col-form-label">
                                                    Content
                                                </label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-10">
                                                <textarea name="contents" class="form-control editor"><?php echo e($country->contents); ?></textarea>
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
    <?php echo $__env->make('Backend.components.ckeditor5-config', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/medical_tourism/country/update.blade.php ENDPATH**/ ?>