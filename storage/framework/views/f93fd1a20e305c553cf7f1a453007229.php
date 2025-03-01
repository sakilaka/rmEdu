<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Edit Menu</title>
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
                            Edit Menu
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-9 m-auto grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample" action="<?php echo e(route('admin.update_menu', $menu->id)); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="menu_type" class=" col-form-label">Menu Type</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-lg" name="menu_type"
                                                    id="menu_type" onchange="showCourseFields(this)">
                                                    <option value="header_menu"
                                                        <?php if($menu->type == 'header_menu'): ?> Selected <?php endif; ?>>Header Menu
                                                    </option>
                                                    <option value="footer_menu"
                                                        <?php if($menu->type == 'footer_menu'): ?> Selected <?php endif; ?>>Footer Menu
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="menu_name" class=" col-form-label">Menu Name</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input id="menu_name" type="text"
                                                    name="name" value="<?php echo e($menu->name); ?>" class="form-control"
                                                    placeholder="Enter menu name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="menu_position" class=" col-form-label">Menu
                                                    Position</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="number" min="1"
                                                    max="99" name="position" class="form-control"
                                                    placeholder="Enter position" value="<?php echo e($menu->position); ?>"
                                                    id="menu_position" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="page_url" class=" col-form-label">Page URL</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-lg" name="url"
                                                    id="page_url">
                                                    <option value="">Select Page</option>
                                                    <option value="about"
                                                        <?php if($menu->url == 'about'): ?> Selected <?php endif; ?>>about page
                                                    </option>
                                                    <option value="learner"
                                                        <?php if($menu->url == 'learner'): ?> Selected <?php endif; ?>>learnar page
                                                    </option>
                                                    <option value="instructor"
                                                        <?php if($menu->url == 'instructor'): ?> Selected <?php endif; ?>>consultant
                                                        page</option>
                                                    <option value="contact"
                                                        <?php if($menu->url == 'contact'): ?> Selected <?php endif; ?>>contact page
                                                    </option>
                                                    <option value="library"
                                                        <?php if($menu->url == 'library'): ?> Selected <?php endif; ?>>library page
                                                    </option>
                                                    <option value="event-list"
                                                        <?php if($menu->url == 'event-list'): ?> Selected <?php endif; ?>>event page
                                                    </option>
                                                    <option value="blogs"
                                                        <?php if($menu->url == 'blogs'): ?> Selected <?php endif; ?>>blogs page
                                                    </option>

                                                    <option value="faqs"
                                                        <?php if($menu->url == 'faqs'): ?> Selected <?php endif; ?>>faq</option>
                                                    <option value="privacy-policy"
                                                        <?php if($menu->url == 'privacy-policy'): ?> Selected <?php endif; ?>>privacy
                                                        policy</option>
                                                    <option value="refund-policy"
                                                        <?php if($menu->url == 'refund-policy'): ?> Selected <?php endif; ?>>refund
                                                        policy</option>
                                                    <option value="terms-conditions"
                                                        <?php if($menu->url == 'terms-conditions'): ?> Selected <?php endif; ?>>terms &
                                                        conditions</option>
                                                    <option value="course_list"
                                                        <?php if($menu->url == 'course_list'): ?> Selected <?php endif; ?>>admission
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="masterCourseFields" class="courseFields d-none">
                                            <div class="form-group row">
                                                <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                    <label for="column_number" class=" col-form-label">Column
                                                        Number</label>
                                                    <p>:</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="form-control form-control-lg" name="column_num"
                                                        id="column_number">
                                                        <option value="">Select Column</option>
                                                        <option value="1"
                                                            <?php if($menu->column_num == '1'): ?> Selected <?php endif; ?>>1
                                                        </option>
                                                        <option value="2"
                                                            <?php if($menu->column_num == '2'): ?> Selected <?php endif; ?>>2
                                                        </option>
                                                    </select>
                                                </div>
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

    <script>
        function showCourseFields() {
            if ($('#menu_type').val() == "header_menu") {
                $('#masterCourseFields').removeClass('d-block').addClass('d-none');
            } else {
                console.log(false);
                $('#masterCourseFields').removeClass('d-none').addClass('d-block');
            }
        }
    </script>
</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/home/menu/update.blade.php ENDPATH**/ ?>