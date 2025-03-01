<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | FAQ Page</title>
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
                            FAQ Page
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

                                    <form novalidate="" method="post" action="<?php echo e(route('admin.faq_setup')); ?>"
                                        data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <h4 class="text-muted">Banner Section</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold text-muted">
                                                                Banner Image
                                                            </label>
                                                            <div class="dropify-wrapper" style="border: none">
                                                                <div class="dropify-loader"></div>
                                                                <div class="dropify-errors-container">
                                                                    <ul></ul>
                                                                </div>
                                                                <input type="file" class="dropify upload_image"
                                                                    name="banner_image" accept="image/*">
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
                                                            <img src="<?php echo e($faq_content->banner_image_show ?? asset('frontend/images/No-image.jpg')); ?>"
                                                                alt="" class="img-fluid"
                                                                style="border-radius: 10px; max-height: 200px !important;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Banner Title<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="title1" class="form-control"
                                                        placeholder="Enter Banner Title"
                                                        value="<?php echo e($faq_content->title1 ?? ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Page Title<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="title2" class="form-control"
                                                        placeholder="Enter Page Title"
                                                        value="<?php echo e($faq_content->title2 ?? ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Banner Description<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <textarea name="description1" class="form-control" style="height: 150px" placeholder="Enter Description"><?php echo e($faq_content->description1 ?? ''); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Page Description<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <textarea name="description2" class="form-control" style="height: 150px" placeholder="Enter Description"><?php echo e($faq_content->description2 ?? ''); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <h4 class="text-muted">FAQ Section</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="mg-t-10 mg-sm-t-0 add-question-data-show">
                                                        <?php if($faqs->count() == 0): ?>
                                                            <div class="row">
                                                                <div class="col-sm-5 mt-3">
                                                                    <label class=" form-control-label">Question:<span
                                                                            class="tx-danger"></span></label>
                                                                    <div class="mg-t-10 mg-sm-t-0">
                                                                        <input value="" type="text"
                                                                            name="home_content_ques[]"
                                                                            class="form-control"
                                                                            placeholder="Enter Question">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-7 mt-3 d-flex align-items-center ">
                                                                    <div style="width: 97%;">
                                                                        <label class=" form-control-label">Answer:<span
                                                                                class="tx-danger"></span></label>
                                                                        <div class="mg-t-10 mg-sm-t-0">
                                                                            <input type="text" value=""
                                                                                name="home_content_ans[]"
                                                                                class="form-control"
                                                                                placeholder="Enter Answer ">
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label class=" form-control-label"></label>
                                                                        <a id="plus-btn-data-question"
                                                                            href="javascript:void(0)"
                                                                            class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php else: ?>
                                                            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="row">
                                                                    <div class="col-sm-5 mt-3">
                                                                        <label
                                                                            class=" form-control-label">Question:<span
                                                                                class="tx-danger"></span></label>
                                                                        <div class="mg-t-10 mg-sm-t-0">
                                                                            <input type="text"
                                                                                value="<?php echo e($faq->question); ?>"
                                                                                name="home_content_old_ques[<?php echo e($faq->id); ?>]"
                                                                                class="form-control"
                                                                                placeholder="Enter Question">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-sm-7 mt-3 d-flex align-items-center ">
                                                                        <div style="width: 97%;">
                                                                            <label
                                                                                class=" form-control-label">Answer:<span
                                                                                    class="tx-danger"></span></label>
                                                                            <div class="mg-t-10 mg-sm-t-0">
                                                                                <input value="<?php echo e($faq->answer); ?>"
                                                                                    type="text"
                                                                                    name="home_content_old_ans[<?php echo e($faq->id); ?>]"
                                                                                    class="form-control"
                                                                                    placeholder="Enter Answer ">
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <label class=" form-control-label"></label>
                                                                            <?php if($k == 0): ?>
                                                                                <a id="plus-btn-data-question"
                                                                                    href="javascript:void(0)"
                                                                                    class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                                        class="fas fa-plus"></i></a>
                                                                            <?php else: ?>
                                                                                <a faq_id="<?php echo e($faq->id); ?>"
                                                                                    href="javascript:void(0)"
                                                                                    class="minus-btn-question-old-data px-1 p-0 m-0 ml-2"><i
                                                                                        class="fas fa-minus-circle"></i></a>
                                                                            <?php endif; ?>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </div>
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
        $('#plus-btn-data-question').on('click', function() {
            var out = `
            <div class="row">
                <div class="col-sm-5 mt-3">
                    <label class=" form-control-label">Question:<span
                            class="tx-danger"></span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                        <input value="" type="text"
                            name="home_content_ques[]"
                            class="form-control"
                            placeholder="Enter Question">
                    </div>
                </div>
                <div class="col-sm-7 mt-3 d-flex align-items-center ">
                    <div style="width: 97%;">
                        <label class=" form-control-label">Answer:<span
                                class="tx-danger"></span></label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <input type="text" value=""
                                name="home_content_ans[]"
                                class="form-control"
                                placeholder="Enter Answer ">
                        </div>
                    </div>
                    <div>
                        <label class=" form-control-label"></label>
                        <a id="plus-btn-data-question"
                            href="javascript:void(0)"
                            class="minus-btn-question-data px-1 p-0 m-0 ml-2"><i
                                class="fas fa-minus-circle"></i></a>
                    </div>
                </div>
            </div>
            `;
            $('.add-question-data-show').append(out);
        });

        $(document).on('click', '.minus-btn-question-data', function() {
            $(this).parent().parent().parent().remove();
        });
        $(document).on('click', '.minus-btn-question-old-data', function() {

            $(this).parent().parent().parent().parent().append(
                "<input type='hidden' name='old_delete_faq_data[]' value='" + $(this).attr('faq_id') + "'>");
            $(this).parent().parent().parent().remove();
        });
    </script>
</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/setting/page/faq.blade.php ENDPATH**/ ?>