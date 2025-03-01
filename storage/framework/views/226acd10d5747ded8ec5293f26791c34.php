<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Partner Page</title>
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
                            Partner Page
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

                                    <form novalidate="" method="post"
                                        action="<?php echo e(route('admin.instructor_page_setup')); ?>" data-validate="parsley"
                                        id="DataEntry_formId" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <h4 class="text-muted">First Section</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Top Title<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="top_title" class="form-control"
                                                        placeholder="Enter Top Title"
                                                        value="<?php echo e(@$instructor->top_title ?? ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Button<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="button1" class="form-control"
                                                        placeholder="Enter Button Text"
                                                        value="<?php echo e(@$instructor->button1 ?? ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label class="font-weight-bold text-muted"> Description<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <textarea name="description1" class="form-control" style="height: 65px" placeholder="Enter Description"><?php echo e(@$instructor->description1 ?? ''); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 form-group">
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
                                                            <img src="<?php echo e(@$instructor->image1_show ?? asset('frontend/images/No-image.jpg')); ?>"
                                                                alt="" class="img-fluid"
                                                                style="border-radius: 10px; max-height: 200px !important;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label class="font-weight-bold text-muted">Video URL<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="videolink1" class="form-control"
                                                        placeholder="Enter Video URL"
                                                        value="<?php echo e(@$instructor->videolink1 ?? ''); ?>">
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
                                            <div class="col-sm-12 form-group">
                                                <label class="font-weight-bold text-muted">Description<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <textarea name="text1" class="form-control" style="height: 65px" placeholder="Enter Description"><?php echo e(@$instructor->text1); ?></textarea>
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
                                            <div class="col-sm-12 form-group">
                                                <label class="font-weight-bold text-muted">Title<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input name="text2" class="form-control"
                                                        placeholder="Enter Title" value="<?php echo e(@$instructor->text2); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <h4 class="text-muted">Fourth Section</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label class="font-weight-bold text-muted">Title<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="text3"
                                                        value="<?php echo e(@$instructor->text3); ?>" class="form-control"
                                                        placeholder="Enter Title">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="mg-t-10 mg-sm-t-0 add-data">
                                                        <?php if(@$instructor->instructorcontents->count() == 0): ?>
                                                            <div class="d-flex align-items-center mt-2">
                                                                <div class="d-flex align-items-center select-add-section"
                                                                    style="width: 100%;">
                                                                    <input type="text" name="content_name[]"
                                                                        class="form-control"
                                                                        placeholder="Enter Content" required>
                                                                </div>

                                                                <div class="ml-3 border rounded"
                                                                    style="position:relative;width: 110px;">
                                                                    <img class="display-upload-img rounded"
                                                                        style="width: 100%;height: 48px;"
                                                                        src="<?php echo e(asset('frontend/images/No-image.jpg')); ?>"
                                                                        alt="">
                                                                    <input type="file" name="contentimage[]"
                                                                        class="form-control content-upload-img"
                                                                        style="position: absolute;top: 0;opacity: 0;height: 100%;"
                                                                        required>
                                                                </div>

                                                                <a id="plus-btn-data" href="javascript:void(0)"
                                                                    class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                        class="fas fa-plus"></i></a>
                                                            </div>
                                                        <?php else: ?>
                                                            <?php $__currentLoopData = @$instructor->instructorcontents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j => $instructorcontent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="d-flex align-items-center mt-2">

                                                                    <div class="d-flex align-items-center select-add-section"
                                                                        style="width: 100%;">
                                                                        <input type="text"
                                                                            name="old_content_name[<?php echo e(@$instructorcontent->id); ?>]"
                                                                            value="<?php echo e(@$instructorcontent->content_name); ?>"
                                                                            class="form-control"
                                                                            placeholder="Enter Content" required>
                                                                    </div>

                                                                    <div class="ml-3 border rounded"
                                                                        style="position:relative;width: 110px;">
                                                                        <img class="display-upload-img rounded"
                                                                            style="width: 100%;height: 48px;"
                                                                            src="<?php echo e(@$instructorcontent->contentimage_show); ?>"
                                                                            alt="">
                                                                        <input type="file"
                                                                            name="old_contentimage[<?php echo e(@$instructorcontent->id); ?>]"
                                                                            class="form-control content-upload-img"
                                                                            style="position: absolute;top: 0;opacity: 0;height: 100%;"
                                                                            required>
                                                                    </div>

                                                                    <?php if($j == @$instructor->instructorcontents->count() - 1): ?>
                                                                        <a id="plus-btn-data"
                                                                            href="javascript:void(0)"
                                                                            class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-plus"></i></a>
                                                                    <?php else: ?>
                                                                        <a facilitiyitem_id="<?php echo e(@$instructorcontent->id); ?>"
                                                                            href="javascript:void(0)"
                                                                            class="minus-btn-data-old px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-minus-circle"></i></a>
                                                                    <?php endif; ?>

                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <h4 class="text-muted">Fifth Section</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Text 1<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input name="ptext2" class="form-control"
                                                        placeholder="Enter Text" value="<?php echo e(@$instructor->ptext1); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Text 2<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input name="ptext2" class="form-control"
                                                        placeholder="Enter Text" value="<?php echo e(@$instructor->ptext2); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Text 3<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input name="ptext2" class="form-control"
                                                        placeholder="Enter Text" value="<?php echo e(@$instructor->ptext3); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Text 4<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input name="ptext2" class="form-control"
                                                        placeholder="Enter Text" value="<?php echo e(@$instructor->ptext4); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-12 mb-2">
                                                <h4 class="text-muted">Sixth Section</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Title<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input name="text4" class="form-control"
                                                        placeholder="Enter Title" value="<?php echo e(@$instructor->text4); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 form-group">
                                                <label class="font-weight-bold text-muted">Email<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input name="email" class="form-control"
                                                        placeholder="Enter Email" value="<?php echo e(@$instructor->email); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label class="font-weight-bold text-muted">Bottom Text<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <input name="button2" class="form-control"
                                                        placeholder="Enter Bottom Text" value="<?php echo e(@$instructor->button2); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>


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
        $('#plus-btn-data').on('click', function() {

            let myVar = `
					<div class="d-flex align-items-center mt-2">
						<div class="d-flex align-items-center select-add-section"
							style="width: 100%;">
							<input type="text" name="content_name[]" class="form-control"
								placeholder="Enter Content" required>
						</div>

						<div class="ml-3 border rounded"
							style="position:relative;width: 110px;">
							<img class="display-upload-img rounded"
								style="width: 100%;height: 48px;"
								src="<?php echo e(asset('frontend/images/No-image.jpg')); ?>"
								alt="" required>
							<input type="file" name="contentimage[]"
								class="form-control content-upload-img"
								style="position: absolute;top: 0;opacity: 0;height: 100%;">
						</div>

						<a href="javascript:void(0)"
							class="minus-btn-data px-1 p-0 m-0 ml-2"><i
								class="fas fa-minus-circle"></i></a>
					</div>
				`;

            $('.add-data').prepend(myVar);
        });

        $(document).on('click', '.minus-btn-data', function() {
            $(this).parent().remove();
        });
        $('.minus-btn-data-old').on('click', function() {
            $(this).parent().parent().append('<input type="hidden" name="delete_facilitiyitem[]" value="' + $(this)
                .attr('facilitiyitem_id') + '">');
            $(this).parent().remove();
        });

        $(document).on('change', '.content-upload-img', function() {
            var files = $(this).get(0).files;
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            var arg = this;
            reader.addEventListener("load", function(e) {
                var image = e.target.result;
                $(arg).parent().find('.display-upload-img').attr('src', image);
            });
        });
    </script>
</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/setting/page/instructor.blade.php ENDPATH**/ ?>