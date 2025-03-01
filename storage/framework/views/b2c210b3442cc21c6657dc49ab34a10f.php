<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Theme Color</title>
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
                            <?php echo e(__('Theme Color')); ?>

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
                                        action="<?php echo e(route('backend.theme-options-color-save')); ?>" data-validate="parsley"
                                        id="DataEntry_formId" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Header Background Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="header_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['header_color'] == '' ? '#07477D' : $datalist['header_color']); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Header Banner Background Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="header_banner_bg"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['header_banner_bg'] == '' ? '#102f25' : $datalist['header_banner_bg']); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Header Text Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="header_text_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['header_text_color'] == '' ? '#07477D' : $datalist['header_text_color']); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Menu Background Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="menu_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['menu_color'] == '' ? '#212529' : $datalist['menu_color']); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Footer Color')); ?><span class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="footer_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['footer_color'] ?: '#07477D'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Footer Text Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="footer_text_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['footer_text_color'] ?: '#fff'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Currency Background Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="currency_background_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['currency_background_color'] ?: '#07477D'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Currency Frontend Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="currency_frontend_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['currency_frontend_color'] ?: '#07477D'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Category Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="category_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['category_color'] ?: '#07477D'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Button Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="button2_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['button2_color'] ?: '#07477D'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Button Text Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="button2_text_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['button2_text_color'] ?: '#07477D'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Button Hover Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="button2_hover_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['button2_hover_color'] ?: '#0a58ca'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Button Border Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="button2_border_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['button2_border_color'] ?: '#07477D'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Button Hover Border Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="button2_hover_border_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['button2_hover_border_color'] ?: '#07477D'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Text Color')); ?><span class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="text_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['text_color'] ?: '#fff'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Product Text Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="product_text_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['product_text_color'] ?: '#fff'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Dashboard Theme Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="theme_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['theme_color'] ?: '#1d2939'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Dashboard Theme Text Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="theme_text_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['theme_text_color'] ?: '#adb5bd'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Dashboard Theme Hover Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="theme_hover_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['theme_hover_color'] ?: '#18222f'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Seller Dashboard Background Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="seller_background_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['seller_background_color'] ?: '#1d2939'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Seller Dashboard Frontend Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="seller_frontend_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['seller_frontend_color'] ?: '#1d2939'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Seller Dashboard Text Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="seller_text_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['seller_text_color'] ?: '#adb5bd'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Package-1 Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="package1_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['package1_color'] ?: '#2D3B68'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Package-2 Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="package2_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['package2_color'] ?: '#223764'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Package Button Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="button1_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['button1_color'] ?: '#1bbc9d'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Package Button Hover Color')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="button1_hover_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['button1_hover_color'] ?: '#1bbc9d'); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted"><?php echo e(__('Footer News Letter')); ?><span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="footer_news_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="<?php echo e($datalist['footer_news_color'] ?: '#25171c'); ?>">
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
    <script src="<?php echo e(asset('backend/assets/js/form-addons.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/formpickers.js')); ?>"></script>

</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/setting/appearance/themeoption.blade.php ENDPATH**/ ?>