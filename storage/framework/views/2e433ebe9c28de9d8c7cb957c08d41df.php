<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(env('APP_NAME')); ?> | Edit Profile</title>
    <?php echo $__env->make('User-Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/summernote/dist/summernote-bs4.css')); ?>">
</head>

<body>
    <div class="container-scroller">
        <?php echo $__env->make('User-Backend.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid page-body-wrapper">
            <?php echo $__env->make('User-Backend.components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            Edit Profile
                        </h3>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0"><b>Personal Information</b></h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('user.profile_info_update', Auth::user()->id)); ?>" method="POST"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="menu_type" class=" col-form-label">Profile Photo</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-8 col-lg-6">
                                                        <div class="dropify-wrapper" style="border: none">
                                                            <div class="dropify-loader"></div>
                                                            <div class="dropify-errors-container">
                                                                <ul></ul>
                                                            </div>
                                                            <input type="file" class="dropify" name="new_image"
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
                                                            <img src="<?php echo e(Auth::user()->image_show ?? asset('frontend/images/No-image.jpg')); ?>"
                                                                alt="" class="img-fluid"
                                                                style="border-radius: 10px; max-height: 200px !important;"
                                                                id="thumbnail_preview">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Full Name</label>
                                            <input type="text" class="form-control" value="<?php echo e(Auth::user()->name); ?>"
                                                name="name" placeholder="Username" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Email Address</label>
                                            <input type="email" class="form-control" value="<?php echo e(Auth::user()->email); ?>"
                                                name="email" placeholder="Email Address" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Mobile Number</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo e(Auth::user()->mobile); ?>" name="mobile"
                                                placeholder="Mobile Number" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Gender</label>
                                            <select class="form-control form-control-lg" name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option <?php if(Auth::user()->gender == '0'): ?> Selected <?php endif; ?>
                                                    value="0">Male</option>
                                                <option <?php if(Auth::user()->gender == '1'): ?> Selected <?php endif; ?>
                                                    value="1">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Date of Birth</label>
                                            <input type="date" class="form-control" value="<?php echo e(Auth::user()->dob); ?>"
                                                name="dob" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label">NID Number</label>
                                            <input type="text" class="form-control" value="<?php echo e(Auth::user()->nid); ?>"
                                                name="nid" placeholder="NID" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Qualification</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo e(Auth::user()->qualification); ?>" name="qualification"
                                                placeholder="Qualification" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Experience</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo e(Auth::user()->experience); ?>" name="experience"
                                                placeholder="Experience" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Language</label>
                                            <select class="form-select form-control form-control-lg" name="language">
                                                <option value="">Select one language</option>
                                                <option <?php if(Auth::user()->language == '1'): ?> Selected <?php endif; ?>
                                                    value="1">Bangla</option>
                                                <option <?php if(Auth::user()->language == '2'): ?> Selected <?php endif; ?>
                                                    value="2">English</option>
                                                <option <?php if(Auth::user()->language == '3'): ?> Selected <?php endif; ?>
                                                    value="3">Hindi</option>
                                                <option <?php if(Auth::user()->language == '4'): ?> Selected <?php endif; ?>
                                                    value="4">Arabic</option>
                                            </select>
                                        </div>
                                    </div>

                                    <?php if(Auth::user()->type == 1 || Auth::user()->type == 7): ?>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Continent</label>
                                                <select class="form-control form-control-lg" name="continent_id"
                                                    required>
                                                    <option value="">Select Continent</option>
                                                    <?php $__currentLoopData = $continents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $continent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if(@$continent->id == @Auth::user()->continents->id): ?> Selected <?php endif; ?>
                                                            value="<?php echo e(@$continent->id); ?>"><?php echo e(@$continent->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Country</label>
                                            <select class="form-select form-control form-control-lg" name="country">
                                                <option value="">Select Country</option>
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(Auth::user()->country == $country->id): ?> Selected <?php endif; ?>
                                                        value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Address</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo e(Auth::user()->address); ?>" name="address"
                                                placeholder="Address" />
                                        </div>
                                    </div>

                                    <?php if(Auth::user()->type == 7): ?>
                                        <div class="col-md-12">
                                            <h4 class="card-title"><b>Social</b></h4>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Facebook</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e(Auth::user()->facebook_url); ?>" name="facebook_url"
                                                    placeholder="https://www.facebook.com/your_profile_link" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Twitter/X</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e(Auth::user()->twitter_url); ?>" name="twitter_url"
                                                    placeholder="https://twitter.com/your_profile_link" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Google Plus</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e(Auth::user()->google_plus_url); ?>"
                                                    name="google_plus_url"
                                                    placeholder="https://www.google.com/your_profile_link" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Instagram</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e(Auth::user()->instagram_url); ?>" name="instagram_url"
                                                    placeholder="https://www.instagram.com/your_profile_link" />
                                            </div>
                                        </div>
                                    <?php elseif(Auth::user()->type == 5): ?>
                                        <div class="col-md-12">
                                            <h4 class="card-title"><b>Bank Info</b></h4>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Bank Name</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e(Auth::user()->bank_name); ?>" name="bank_name"
                                                    placeholder="Bank Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Bank Code/IFSC</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e(Auth::user()->bank_code_ifsc); ?>" name="bank_code_ifsc"
                                                    placeholder="Bank Code/IFSC" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Account Number</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e(Auth::user()->bank_account_number); ?>"
                                                    name="bank_account_number" placeholder="Account Number" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Account Holder Name</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e(Auth::user()->bank_ac_holder_name); ?>"
                                                    name="bank_ac_holder_name" placeholder="Account Holder Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label">PayPal ID</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e(Auth::user()->paypal_id_num); ?>" name="paypal_id_num"
                                                    placeholder="PayPal ID" />
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">About</label>
                                            <textarea type="text" class="form-control " name="description" placeholder="Details" rows="5"><?php echo Auth::user()->description; ?></textarea>
                                        </div>
                                    </div>

                                    <?php if(Auth::user()->type == 2 || Auth::user()->type == 1): ?>
                                        <div class="col-md-12">
                                            <h4 class="card-title">Certificates</h4>

                                            <div class="mg-t-10 mg-sm-t-0 add-data-content">
                                                <?php if(Auth::user()->certificate->count() == 0): ?>
                                                    <div class="d-flex align-items-center mt-2 row">
                                                        <div class="col-md-7">
                                                            <div class="form-group">
                                                                <label class="col-form-label"><b>Certificate
                                                                        Name:</b></label>
                                                                <input type="text" name="certificates_name[]"
                                                                    value="<?php echo e(old('$certificates_name')); ?>"
                                                                    class="form-control"
                                                                    placeholder="Certificate Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="col-form-label"><b>Certificate
                                                                        File:</b></label>
                                                                <input type="file" name="certificates_file[]"
                                                                    accept="image/jpeg,image/gif,image/png,application/pdf"
                                                                    value="<?php echo e(old('$certificates_file')); ?>"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <a id="plus-btn-data-content" href="javascript:void(0)"
                                                                class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i
                                                                    class="fas fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = Auth::user()->certificate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="d-flex align-items-center mt-2 row">
                                                            <div class="col-md-7">
                                                                <div class="form-group">
                                                                    <label class="col-form-label"><b>Certificate
                                                                            Name:</b></label>
                                                                    <input type="text"
                                                                        name="old_certificates_name[<?php echo e($item->id); ?>]"
                                                                        value="<?php echo e($item->certificates_name); ?>"
                                                                        class="form-control"
                                                                        placeholder="Certificate Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="col-form-label"><b>Certificate
                                                                            File:</b></label>
                                                                    <input type="file"
                                                                        accept="image/jpeg,image/gif,image/png,application/pdf"
                                                                        name="old_certificates_file[<?php echo e($item->id); ?>]"
                                                                        value="<?php echo e($item->certificates_file); ?>"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mt-lg-3 row">
                                                                <div class="col-6 d-flex justify-content-center align-items-center">
                                                                    
                                                                    <div class="form-group mb-0">
                                                                        <a class="btn btn-primary" data-toggle="modal"
                                                                            data-target="#certificateModal<?php echo e($k); ?>">
                                                                            &nbsp;<i class="fa fa-eye"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 d-flex justify-content-center align-items-center">
                                                                    <?php if($k == Auth::user()->certificate->count() - 1): ?>
                                                                        <div class="form-group mb-0">
                                                                            <a id="plus-btn-data-content"
                                                                                href="javascript:void(0)"
                                                                                class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i
                                                                                    class="fas fa-plus"></i></a>
                                                                        </div>
                                                                    <?php else: ?>
                                                                        <div class="form-group mb-0">
                                                                            <a audio_file_id="<?php echo e($item->id); ?>"
                                                                                href="javascript:void(0)"
                                                                                class="minus-btn-data-old-audio px-1 p-0 m-0 ml-2"><i
                                                                                    class="fas fa-minus-circle"></i></a>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal -->
                                                        <div class="modal fade"
                                                            id="certificateModal<?php echo e($k); ?>" tabindex="-1"
                                                            role="dialog" aria-labelledby="audioModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="audioModalLabel"
                                                                            style="color: black">
                                                                            <?php echo e($item->certificates_name); ?></h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <?php if($item->extension == 'pdf'): ?>
                                                                            <iframe
                                                                                src="<?php echo e($item->certificates_file_show); ?>"
                                                                                width="100%"
                                                                                height="500"></iframe>
                                                                        <?php else: ?>
                                                                            <img src="<?php echo e($item->certificates_file_show); ?>"
                                                                                alt="image"
                                                                                style="height: 300px; width:450px">
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card mt-5">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Change Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('user.password_change', Auth::user()->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="current_password">Current Password</label>
                                            <div class="input-group">
                                                <input type="password" id="current_password" name="current_password"
                                                    class="form-control" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button"
                                                        onclick="togglePassword('current_password')">
                                                        <i class="fa fa-eye" id="current_password_eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="new_password">New Password</label>
                                            <div class="input-group">
                                                <input type="password" id="new_password" name="new_password"
                                                    class="form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button"
                                                        onclick="togglePassword('new_password')">
                                                        <i class="fa fa-eye" id="new_password_eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="new_password_confirmation">Confirm
                                                Password</label>
                                            <div class="input-group">
                                                <input type="password" id="new_password_confirmation"
                                                    name="new_password_confirmation" class="form-control" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button"
                                                        onclick="togglePassword('new_password_confirmation')">
                                                        <i class="fa fa-eye" id="new_password_confirmation_eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php echo $__env->make('User-Backend.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('User-Backend.components.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('backend/assets/js/dropify.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/lib/summernote/summernote-bs4.min.js')); ?>"></script>
    <script>
        $('.summernote').summernote({
            placeholder: 'Write something...',
            tabsize: 4,
            height: 150
        });
    </script>

    <script>
        //Audio Contents start
        $(document).ready(function() {
            $(document).on('click', '#plus-btn-data-content', function() {
                var myvar = '<div class="d-flex align-items-center mt-2 row">' +
                    '<div class="col-md-7">' +
                    '<div class="form-group">' +
                    '<label class="col-form-label"><b>Certificate Name:</b></label>' +
                    '<input type="text" name="certificates_name[]" class="form-control" placeholder="Certificate Name">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<div class="form-group">' +
                    '<label class="col-form-label"><b>Certificate File:</b></label>' +
                    '<input type="file" name="certificates_file[]" accept="image/jpeg,image/gif,image/png,application/pdf" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-1">' +
                    '<a href="javascript:void(0)" class="minus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>' +
                    '</div>' +
                    '</div>';

                $('.add-data-content').prepend(myvar);
            });

            $(document).on('click', '.minus-btn-data-content', function() {
                $(this).parent().parent().remove();
            });
        });

        $(document).on('click', '.minus-btn-data-old-audio', function() {
            $(this).parent().parent().parent().append(
                '<input type="hidden" name="delete_certificates_file[]" value="' + $(this).attr(
                    'audio_file_id') + '">');
            $(this).parent().parent().remove();
        });
        //Audio Contents end
    </script>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const eyeIcon = document.getElementById(inputId + '_eye');

            if (input.type === "password") {
                input.type = "text";
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                input.type = "password";
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

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
<?php /**PATH /home/rmintern/public_html/resources/views/User-Backend/profile/profile_edit.blade.php ENDPATH**/ ?>