<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | About Page</title>
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
                            About Page
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <?php echo $__env->make('Backend.setting.page.other_pages_nav_tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="col-10">
                            <div class="tab-content tab-content-vertical bg-white rounded">
                                <div class="tab-pane fade show active" id="program-info-tab-content" role="tabpanel"
                                    aria-labelledby="home-tab-vertical">

                                    <form novalidate="" method="post" action="<?php echo e(route('admin.about_page_setup')); ?>"
                                        data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <h4 class="text-muted">About Section</h4>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label class="font-weight-bold text-muted">About Title</label>
                                                <div class="">
                                                    <input type="text" name="about_text" class="form-control"
                                                        placeholder="Enter About Title"
                                                        value="<?php echo e($about_content->about_text ?? ''); ?>">
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label class="font-weight-bold text-muted">About Description</label>
                                                <div class="">
                                                    <textarea type="text" name="description1" class="form-control" style="height: 120px"><?php echo e($about_content->description1 ?? ''); ?></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-12 mt-4 form-group">
                                                <label class="font-weight-bold text-muted">
                                                    About Title 2
                                                </label>
                                                <div class="">
                                                    <input type="text" class="col-sm-12 form-control"
                                                        name="about_text2" placeholder="Enter About Title"
                                                        value="<?php echo e($about_content->video_url); ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label class="font-weight-bold text-muted">About Description 2</label>
                                                <div class="">
                                                    <textarea type="text" name="description2" class="form-control" style="height: 120px"><?php echo e($about_content->description2 ?? ''); ?></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-12 mt-4 form-group">
                                                <label class="font-weight-bold text-muted">
                                                    About Title 3
                                                </label>
                                                <div class="">
                                                    <input type="text" class="col-sm-12 form-control"
                                                        name="about_text3" placeholder="Enter About Title"
                                                        value="<?php echo e($about_content->video_url); ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label class="font-weight-bold text-muted">About Description 3</label>
                                                <div class="">
                                                    <textarea type="text" name="description3" class="form-control" style="height: 120px"><?php echo e($about_content->description2 ?? ''); ?></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold text-muted">Video
                                                                Thumbnail</label>
                                                            <div class="dropify-wrapper" style="border: none">
                                                                <div class="dropify-loader"></div>
                                                                <div class="dropify-errors-container">
                                                                    <ul></ul>
                                                                </div>
                                                                <input type="file" class="dropify upload_image"
                                                                    name="video_thumbnail" accept="image/*">
                                                                <button type="button"
                                                                    class="dropify-clear">Remove</button>
                                                                <div class="dropify-preview">
                                                                    <span class="dropify-render"></span>
                                                                    <div class="dropify-infos">
                                                                        <div class="dropify-infos-inner">
                                                                            <p class="dropify-filename">
                                                                                <span class="file-icon"></span>
                                                                                <span
                                                                                    class="dropify-filename-inner"></span>
                                                                            </p>
                                                                            <p class="dropify-infos-message">
                                                                                Drag and drop or click to replace
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-sm-6 d-flex justify-content-center align-items-center">
                                                        <div class="px-3">
                                                            <img src="<?php echo e($about_content->video_thumbnail_show ?? asset('frontend/images/No-image.jpg')); ?>"
                                                                alt="" class="img-fluid"
                                                                style="border-radius: 10px; max-height: 200px !important;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 mt-4 form-group">
                                                <label class="font-weight-bold text-muted">
                                                    Video URL
                                                </label>
                                                <div class="">
                                                    <input type="text" class="col-sm-12 form-control"
                                                        name="video_url" placeholder="Enter Video URL"
                                                        value="<?php echo e($about_content->video_url); ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <h4 class="text-muted">Features</h4>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <div class="col-sm-12">
                                                <div class="show-add-tagline-feature">
                                                    <?php if($faqs->count() == 0): ?>
                                                        <div class="d-flex mt-3">
                                                            <div class="px-3 border border-secondary rounded"
                                                                style="width: 97%; background-color:#f8f9ff;">
                                                                <div class="row mt-3">
                                                                    <div class="col-sm-12">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="font-weight-bold text-muted">
                                                                                        Image
                                                                                    </label>
                                                                                    <div class="dropify-wrapper"
                                                                                        style="border: none">
                                                                                        <div class="dropify-loader">
                                                                                        </div>
                                                                                        <div
                                                                                            class="dropify-errors-container">
                                                                                            <ul></ul>
                                                                                        </div>
                                                                                        <input type="file"
                                                                                            class="dropify upload_image"
                                                                                            name="image[]"
                                                                                            accept="image/*">
                                                                                        <button type="button"
                                                                                            class="dropify-clear">Remove</button>
                                                                                        <div class="dropify-preview">
                                                                                            <span
                                                                                                class="dropify-render"></span>
                                                                                            <div class="dropify-infos">
                                                                                                <div
                                                                                                    class="dropify-infos-inner">
                                                                                                    <p
                                                                                                        class="dropify-filename">
                                                                                                        <span
                                                                                                            class="file-icon"></span>
                                                                                                        <span
                                                                                                            class="dropify-filename-inner"></span>
                                                                                                    </p>
                                                                                                    <p
                                                                                                        class="dropify-infos-message">
                                                                                                        Drag and
                                                                                                        drop or
                                                                                                        click to
                                                                                                        replace
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-6 d-flex justify-content-center align-items-center">
                                                                                <div
                                                                                    class="px-3">
                                                                                    <img src="<?php echo e(asset('frontend/images/No-image.jpg')); ?>"
                                                                                        alt=""
                                                                                        class="img-fluid"
                                                                                        style="border-radius: 10px; max-height: 200px !important;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12 form-group">
                                                                        <label class="font-weight-bold text-muted">
                                                                            URL
                                                                        </label>
                                                                        <input value="" type="text"
                                                                            name="url[]" class="form-control"
                                                                            placeholder="Enter URL">
                                                                    </div>
                                                                    <div class="col-md-12 form-group">
                                                                        <label class="font-weight-bold text-muted">
                                                                            Description
                                                                        </label>
                                                                        <textarea value="" type="text" name="description[]" class="form-control"
                                                                            placeholder="Enter Short Description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <a id="plus-btn-feature" href="javascript:void(0)"
                                                                class="px-1 p-0 m-0 ml-2">
                                                                <i class="fas fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    <?php else: ?>
                                                        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="d-flex mt-3">
                                                                <div class="px-3 border border-secondary rounded"
                                                                    style="width: 97%; background-color:#f8f9ff;">
                                                                    <div class="row mt-3">
                                                                        <div class="col-sm-12">
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            class="font-weight-bold text-muted">
                                                                                            Image
                                                                                        </label>
                                                                                        <div class="dropify-wrapper"
                                                                                            style="border: none">
                                                                                            <div
                                                                                                class="dropify-loader">
                                                                                            </div>
                                                                                            <div
                                                                                                class="dropify-errors-container">
                                                                                                <ul></ul>
                                                                                            </div>
                                                                                            <input type="file"
                                                                                                class="dropify upload_image"
                                                                                                name="old_image[<?php echo e($faq->id); ?>]"
                                                                                                accept="image/*">
                                                                                            <button type="button"
                                                                                                class="dropify-clear">Remove</button>
                                                                                            <div
                                                                                                class="dropify-preview">
                                                                                                <span
                                                                                                    class="dropify-render"></span>
                                                                                                <div
                                                                                                    class="dropify-infos">
                                                                                                    <div
                                                                                                        class="dropify-infos-inner">
                                                                                                        <p
                                                                                                            class="dropify-filename">
                                                                                                            <span
                                                                                                                class="file-icon"></span>
                                                                                                            <span
                                                                                                                class="dropify-filename-inner"></span>
                                                                                                        </p>
                                                                                                        <p
                                                                                                            class="dropify-infos-message">
                                                                                                            Drag and
                                                                                                            drop or
                                                                                                            click to
                                                                                                            replace
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-6 d-flex justify-content-center align-items-center">
                                                                                    <div
                                                                                        class="px-3">
                                                                                        <img src="<?php echo e($faq->image_show ?? asset('frontend/images/No-image.jpg')); ?>"
                                                                                            alt=""
                                                                                            class="img-fluid"
                                                                                            style="border-radius: 10px; max-height: 200px !important;">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12 form-group">
                                                                            <label class="font-weight-bold text-muted">
                                                                                URL
                                                                            </label>
                                                                            <input value="<?php echo e($faq->url); ?>"
                                                                                type="text"
                                                                                name="old_url[<?php echo e($faq->id); ?>]"
                                                                                class="form-control"
                                                                                placeholder="Enter URL">
                                                                        </div>
                                                                        <div class="col-md-12 form-group">
                                                                            <label class="font-weight-bold text-muted">
                                                                                Description
                                                                            </label>
                                                                            <textarea value="" type="text" name="old_description[<?php echo e($faq->id); ?>]" class="form-control"
                                                                                placeholder="Enter Short Description"><?php echo e($faq->description); ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <?php if($k == $faqs->count() - 1): ?>
                                                                    <a id="plus-btn-feature" href="javascript:void(0)"
                                                                        class="px-1 p-0 m-0 ml-2"><i
                                                                            class="fas fa-plus"></i></a>
                                                                <?php else: ?>
                                                                    <a about_id="<?php echo e($faq->id); ?>"
                                                                        href="javascript:void(0)"
                                                                        class="minus-btn-learn-old-data-feature px-1 p-0 m-0 ml-2"><i
                                                                            class="fas fa-minus-circle"></i></a>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row tabs-footer mt-3">
                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="btn blue-btn btn-primary">Save</button>
                                            </div>
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

    <script src="<?php echo e(asset('backend/assets/js/dropify.js')); ?>"></script>
    <script>
        $('.upload_image').on('change', function(e) {
            var upload_area = $(this);
            var fileInput = upload_area[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    upload_area.parents('.col-sm-6').siblings('.col-sm-6').find('img').attr('src', e.target
                        .result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
    </script>

    <script>
        $('#plus-btn-feature').on('click', function() {
            var feature = `
                <div class="d-flex mt-3">
                    <div class="px-3 border border-secondary rounded"
                        style="width: 97%; background-color:#f8f9ff;">
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label
                                                class="font-weight-bold text-muted">
                                                Image
                                            </label>
                                            <div class="dropify-wrapper"
                                                style="border: none">
                                                <div class="dropify-loader">
                                                </div>
                                                <div
                                                    class="dropify-errors-container">
                                                    <ul></ul>
                                                </div>
                                                <input type="file"
                                                    class="dropify upload_image"
                                                    name="image[]"
                                                    accept="image/*">
                                                <button type="button"
                                                    class="dropify-clear">Remove</button>
                                                <div class="dropify-preview">
                                                    <span
                                                        class="dropify-render"></span>
                                                    <div class="dropify-infos">
                                                        <div
                                                            class="dropify-infos-inner">
                                                            <p
                                                                class="dropify-filename">
                                                                <span
                                                                    class="file-icon"></span>
                                                                <span
                                                                    class="dropify-filename-inner"></span>
                                                            </p>
                                                            <p
                                                                class="dropify-infos-message">
                                                                Drag and
                                                                drop or
                                                                click to
                                                                replace
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-6 d-flex justify-content-center align-items-center">
                                        <div
                                            class="px-3">
                                            <img src="<?php echo e(asset('frontend/images/No-image.jpg')); ?>"
                                                alt=""
                                                class="img-fluid"
                                                style="border-radius: 10px; max-height: 200px !important;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label class="font-weight-bold text-muted">
                                    URL
                                </label>
                                <input value=""
                                    type="text"
                                    name="url[]"
                                    class="form-control"
                                    placeholder="Enter URL">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="font-weight-bold text-muted">
                                    Description
                                </label>
                                <textarea value="" type="text" name="description[]" class="form-control"
                                    placeholder="Enter Short Description"></textarea>
                            </div>
                        </div>
                    </div>

                    <a id="plus-btn-feature" href="javascript:void(0)"
                        class="px-1 p-0 m-0 ml-2">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            `;

            $('.show-add-tagline-feature').prepend(feature);

            // initiate dropify
            $('.upload_image').dropify();
            $('.upload_image').on('change', function(e) {
                var upload_area = $(this);
                var fileInput = upload_area[0];

                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        upload_area.parents('.col-sm-6').siblings('.col-sm-6').find('img').attr('src', e
                            .target
                            .result);
                    };

                    reader.readAsDataURL(fileInput.files[0]);
                }
            });
        });
        $(document).on('click', '.minus-btn-data-feature', function() {
            $(this).parent().remove();
        });

        $(document).on('click', '.minus-btn-learn-old-data-feature', function() {
            $(this).parent().parent().parent().parent().append(
                "<input type='hidden' name='old_delete_about_data[]' value='" + $(this).attr('about_id') + "'>");
            $(this).parent().remove();
        });
    </script>
</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/setting/page/about.blade.php ENDPATH**/ ?>