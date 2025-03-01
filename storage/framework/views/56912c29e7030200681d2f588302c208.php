<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Footer</title>
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
                            <?php echo e(__('Footer')); ?>

                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <?php echo $__env->make('Backend.setting.appearance.theme_options_appearance_nav_tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="col-10">
                            <div class="tab-content tab-content-vertical bg-white rounded">
                                <div class="tab-pane fade show active" id="program-info-tab-content" role="tabpanel"
                                    aria-labelledby="home-tab-vertical">

                                    <form novalidate="" method="post"
                                        action="<?php echo e(route('backend.theme-options-footer-save')); ?>"
                                        data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Address')); ?></label>
                                                    <input value="<?php echo e($results['address1']); ?>" type="text"
                                                        name="address1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Google Map')); ?></label>
                                                    <input value="<?php echo e($results['address2']); ?>" type="text"
                                                        name="address2" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Email 1')); ?></label>
                                                    <input value="<?php echo e($results['email1']); ?>" type="text"
                                                        name="email1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Email 2')); ?></label>
                                                    <input value="<?php echo e($results['email2']); ?>" type="text"
                                                        name="email2" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Phone 1')); ?></label>
                                                    <input value="<?php echo e($results['phone1']); ?>" type="text"
                                                        name="phone1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Phone 2')); ?></label>
                                                    <input value="<?php echo e($results['phone2']); ?>" type="text"
                                                        name="phone2" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Description')); ?></label>
                                                    <input value="<?php echo e($results['description']); ?>" type="text"
                                                        name="description" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Payment Gateway Icons')); ?></label>
                                                    <div class="mg-t-10 mg-sm-t-0 add-data">
                                                        <?php if(@$results->paywiths->count() == 0): ?>
                                                            <div class="d-flex align-items-center mt-2">
                                                                <div class="d-flex align-items-center select-add-section"
                                                                    style="width: 40%;">
                                                                    <input type="text" name="pay_name[]"
                                                                        class="form-control"
                                                                        placeholder="Pay With Name" required>
                                                                </div>

                                                                <div class="ml-3 border rounded"
                                                                    style="position:relative;width: 110px;">
                                                                    <img class="display-upload-img"
                                                                        style="width: 100%;height: 48px;"
                                                                        src="<?php echo e(asset('frontend/images/No-image.jpg')); ?>"
                                                                        alt="">
                                                                    <input type="file" name="pay_image[]"
                                                                        class="form-control upload-img"
                                                                        style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                                                </div>

                                                                <a id="plus-btn-data" href="javascript:void(0)"
                                                                    class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                        class="fas fa-plus"></i></a>
                                                            </div>
                                                        <?php else: ?>
                                                            <?php $__currentLoopData = @$results->paywiths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j => $paywith): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="d-flex align-items-center mt-2">

                                                                    <div class="d-flex align-items-center select-add-section"
                                                                        style="width: 40%;">
                                                                        <input type="text"
                                                                            name="old_pay_name[<?php echo e(@$paywith->id); ?>]"
                                                                            value="<?php echo e(@$paywith->pay_name); ?>"
                                                                            class="form-control"
                                                                            placeholder="Pay With Name" required>
                                                                    </div>

                                                                    <div class="ml-3 border rounded"
                                                                        style="position:relative;width: 110px;">
                                                                        <img class="display-upload-img"
                                                                            style="width: 100%;height: 48px;"
                                                                            src="<?php echo e(@$paywith->pay_image_show); ?>"
                                                                            alt="">
                                                                        <input type="file"
                                                                            name="old_pay_image[<?php echo e(@$paywith->id); ?>]"
                                                                            class="form-control upload-img"
                                                                            style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                                                    </div>

                                                                    <?php if($j == @$results->paywiths->count() - 1): ?>
                                                                        <a id="plus-btn-data"
                                                                            href="javascript:void(0)"
                                                                            class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-plus"></i></a>
                                                                    <?php else: ?>
                                                                        <a facilitiyitem_id="<?php echo e(@$paywith->id); ?>"
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

                                        <div class="row tabs-footer mt-15">
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

    <script>
        $('#plus-btn-data').on('click', function() {

            let myVar = `
					<div class="d-flex align-items-center mt-2">
						<div class="d-flex align-items-center select-add-section"
							style="width: 40%;">
							<input type="text" name="pay_name[]" class="form-control"
								placeholder="Pay With Name" required>
						</div>

						<div class="ml-3 border rounded"
							style="position:relative;width: 110px;">
							<img class="display-upload-img"
								style="width: 100%;height: 48px;"
								src="<?php echo e(asset('frontend/images/No-image.jpg')); ?>"
								alt="">
							<input type="file" name="pay_image[]"
								class="form-control upload-img"
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

        $('.upload-img').on('change', function() {
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
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/setting/appearance/theme-options-footer.blade.php ENDPATH**/ ?>