<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Learner Page</title>
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
                            Learner Page
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

                                    <form novalidate="" method="post" action="<?php echo e(route('admin.learner_page_setup')); ?>"
                                        data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <h4 class="text-muted">First Section</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label class="font-weight-bold text-muted">Top Title:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="top_title" class="form-control"
                                                        placeholder="Enter Top Title"
                                                        value="<?php echo e(@$learner->top_title ?? ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="font-weight-bold text-muted">Button:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="button1" class="form-control"
                                                        placeholder="Enter Button Text"
                                                        value="<?php echo e(@$learner->button1 ?? ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label class="font-weight-bold text-muted"> Description:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <textarea name="description1" class="form-control" style="height: 65px" placeholder="Enter Description"><?php echo e(@$learner->description1 ?? ''); ?></textarea>
                                                </div>
                                            </div>
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
                                                                    name="image1" accept="image/*">
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
                                                            <img src="<?php echo e(@$learner->image1_show ?? asset('frontend/images/No-image.jpg')); ?>"
                                                                alt="" class="img-fluid"
                                                                style="border-radius: 10px; max-height: 200px !important;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <h4 class="text-muted">Second Section</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 form-group">
                                                <label class="font-weight-bold text-muted">Top Left Content:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <textarea name="tleftcontent" class="form-control" style="height: 90px" placeholder="Enter Top Left Content"><?php echo e(@$learner->tleftcontent); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 form-group">
                                                <label class="font-weight-bold text-muted">Middle Content:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <textarea name="tmiddlecontent" class="form-control" style="height: 90px" placeholder="Enter Top  Middle Content"><?php echo e(@$learner->tmiddlecontent); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 form-group">
                                                <label class="font-weight-bold text-muted">Top Right Content:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <textarea name="trightcontent" class="form-control" style="height: 90px" placeholder="Enter Top Right Content"><?php echo e(@$learner->trightcontent); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 form-group">
                                                <label class="font-weight-bold text-muted">Bottom Left Content:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <textarea name="bleftcontent" class="form-control" style="height: 90px" placeholder="Enter Bottom Left Content"><?php echo e(@$learner->bleftcontent); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 form-group">
                                                <label class="font-weight-bold text-muted">Bottom Middle Content:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <textarea name="bmiddlecontent" class="form-control" style="height: 90px" placeholder="Enter Bottom Middle Content"><?php echo e(@$learner->bmiddlecontent); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 form-group">
                                                <label class="font-weight-bold text-muted">Bottom Right Content:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <textarea name="brightcontent" class="form-control" style="height: 90px" placeholder="Enter Bottom Right Content"><?php echo e(@$learner->brightcontent); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <h4 class="text-muted">Third Section</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Top Left Text:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="tlefttext"
                                                        value="<?php echo e(@$learner->tlefttext); ?>" class="form-control"
                                                        placeholder="Enter Top Left Text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Top Right Text:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="trighttext"
                                                        value="<?php echo e(@$learner->trighttext); ?>" class="form-control"
                                                        placeholder="Enter Top Right Text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label class="font-weight-bold text-muted">Middle Text:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="middletext"
                                                        value="<?php echo e(@$learner->middletext); ?>" class="form-control"
                                                        placeholder="Enter Middle Text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Bottom Left Text:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="blefttext"
                                                        value="<?php echo e(@$learner->blefttext); ?>" class="form-control"
                                                        placeholder="Enter Bottom Left Text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Bottom Right Text:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="brighttext"
                                                        value="<?php echo e(@$learner->brighttext); ?>" class="form-control"
                                                        placeholder="Enter Bottom Right Text">
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
</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/setting/page/learner.blade.php ENDPATH**/ ?>