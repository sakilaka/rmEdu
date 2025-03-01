<?php $__env->startSection('title', '- Student Register'); ?>
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
    <br>
    <br>
    <br>
    <div class="py-5">
        <div class="container-lg">
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="border-md mx-0 rounded-3 row">
                        <div class="border-end-md col-md-6 p-sm-5 px-5">
                            <?php
                                $home_content = \App\Models\HomeContentSetup::first();
                            ?>
                            <h2 class="h3 mb-4 fw-bold text-uppercase align-items-center" style="text-align:center">
                                <?php echo e($home_content->register_title); ?> </h2>
                            <h4 class="mb-0" style="font-size:20px ;text-align:center">
                                <?php echo e($home_content->register_des); ?> </h4>
                            <br>
                            
                            <center class="text-center">
                                <a href="<?php echo e(route('frontend.consultant_register')); ?>">
                                    <strong>
                                        Become a Partner </strong></a>
                            </center>
                            <img class="d-block img-fluid mx-auto" style="margin-top:50px; height:380px; width:330px;"
                                src="<?php echo e($home_content->register_image_show); ?>" width="344" alt="image">
                        </div>
                        <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                            <!-- <a class="btn btn-outline-dark-cerulean btn-lg w-100 mb-3" href="#"><i class="fab fa-google me-1"></i>Sign in with Google</a>
                                <a class="btn btn-outline-dark-cerulean btn-lg w-100 mb-3" href="#"><i class="fab fa-facebook me-1"></i>Sign in with Facebook</a>
                                <div class="d-flex align-items-center py-2 mb-2">
                                    <hr class="w-100">
                                    <div class="px-3">Or</div>
                                    <hr class="w-100">
                                </div> -->

                            <!--  -->

                            <h4>Student Sign up</h4>
                            <form action="<?php echo e(route('frontend.set_register')); ?>" class="myform" id="student"
                                enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <?php echo csrf_field(); ?>

                                
                                <div class="mb-3">
                                    <label class="form-label mb-1" for="user_name">
                                        Full name </label>
                                    <input class="form-control form-control-lg" type="text" id="user_name" name="name"
                                        placeholder="Enter your full name" autofocus required="">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label mb-1" for="user_mobile">

                                        Mobile
                                    </label>
                                    <input class="form-control form-control-lg" type="number" id="user_mobile"
                                        name="mobile" placeholder="Enter your Mobile Number" onkeyup="mobilecheck(4)"
                                        required="">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label mb-1" for="user_email">
                                        Email address </label>
                                    <input class="form-control form-control-lg" type="email" id="user_email"
                                        name="email" onkeyup="mailcheck(4)" placeholder="Enter your email" required="">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label mb-1" for="user_mobile">Gender</label>
                                    <select class="form-control form-control-lg" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label mb-1" for="user_mobile">Qualification</label>
                                    <input class="form-control form-control-lg" type="text" id="user_mobile"
                                        name="qualification" placeholder="Enter your Qualification"
                                        onkeyup="mobilecheck(4)">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label mb-1" for="user_mobile">Experience</label>
                                    <input class="form-control form-control-lg" type="text" id="user_mobile"
                                        name="experience" placeholder="Enter your Experience" onkeyup="mobilecheck(4)">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label mb-1" for="user_mobile">Language</label>
                                    <select class="form-select form-control-lg" name="language">
                                        <option value="">select one language</option>
                                        <option value="1">Bangla</option>
                                        <option value="2">English</option>
                                        <option value="3">Hindi</option>
                                        <option value="4">Arabic</option>
                                    </select>
                                    
                                </div>
                                <div class="mb-3">
                                    <label class="form-label mb-1" for="user_mobile">Continent</label>
                                    <select class="form-control form-control-lg" name="continent_id" required>
                                        <option value="">Select Continent</option>
                                        <?php $__currentLoopData = $continents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $continent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($continent->id); ?>"><?php echo e($continent->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label mb-1" for="user_mobile">Country</label>
                                    <select name="country" id="" class="form-control form-control-lg">
                                        <option value="">Select Country</option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>



                                <div class="mb-3 position-relative">
                                    <label class="form-label mb-1" for="user_password">
                                        Password <!-- <small class="fs-sm text-muted">(min. 8 char)</small> -->
                                    </label>
                                    <input class="form-control form-control-lg" type="password" id="user_password"
                                        name="password" placeholder="Enter password" required="">
                                    <span style="position: absolute;    right: 10px;    top: 36px;    font-size: 20px;">
                                        <a href="javascript:void(0)" onclick="viewpassword(1)">
                                            <div class="change-icon-1">
                                                <i class="fas fa-eye"></i>
                                            </div>
                                        </a>
                                    </span>

                                    <div id="pswd_info" style="display: none">
                                        
                                        
                                        <!-- <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                                            <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                                            <li id="number" class="invalid">At least <strong>one number</strong></li> -->
                                        <p id="length" class="invalid">Be at least <strong>8 characters</strong></p>
                                        
                                        
                                    </div>
                                </div>


                                <div class="mb-3 position-relative">
                                    <label class="form-label mb-1" for="user_cpassword">
                                        Confirm Password </label>
                                    <input class="form-control form-control-lg" type="password" id="user_cpassword"
                                        name="user_cpassword" placeholder="Confirm Password" required="">
                                    <span style="position: absolute; right: 10px; top: 36px; font-size: 20px;">
                                        <a href="javascript:void(0)" onclick="viewpassword(2)">
                                            <div class="change-icon-2">
                                                <i class="fas fa-eye"></i>
                                            </div>
                                        </a>
                                    </span>
                                    <!-- <div id="confirm-pswd_info">
                                        <h6>Password must be following requirements:</h6>
                                        <ul class="ps-0">
                                            <!-- <li id="confirm-letter" class="invalid">At least <strong>one letter</strong></li>
                                            <li id="confirm-capital" class="invalid">At least <strong>one capital letter</strong></li>
                                            <li id="confirm-number" class="invalid">At least <strong>one number</strong></li>
                                            <li id="confirm-length" class="invalid">Be at least <strong>8 characters</strong></li>
                                        </ul>
                                    </div> -->

                                    <div id="confirm-pswd_info" style="display: none">
                                        
                                        
                                        <!-- <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                                            <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                                            <li id="number" class="invalid">At least <strong>one number</strong></li> -->
                                        <p id="length" class="invalid">Be at least <strong>8 characters</strong></p>
                                        
                                    </div>


                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="user_terms" name="user_terms"
                                        checked value="1" required="">
                                    <label class="form-check-label" for="agree-to-terms">
                                        By joining, I read and agree to the<a target="_blank"
                                            href="<?php echo e(route('frontend.terms_conditions')); ?>"
                                            class="text-decoration-underline"> Terms & Conditions</a>,
                                        <a href="<?php echo e(route('frontend.privacy_policy')); ?>" target="_blank"
                                            class="text-decoration-underline">Privacy policy</a>,
                                        <a target="_blank" href="<?php echo e(route('frontend.refund_policy')); ?>"
                                            class="text-decoration-underline">and Return and Refund Policy.</a> </label>
                                    <!-- <br>
                                        <div class="loadotpmodal mt-2">
                                                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">OTP Modal</button>
                                                                            </div> -->

                                </div>

                                <div class="form-check mb-4">
                                    <div class="g-recaptcha" data-sitekey="6LeAHywoAAAAALCmCuXotxQ5u6fMFpiRw8TR4Jtp">
                                    </div>
                                </div>
                                <input type="hidden" name="type" id="user_type" value="1">
                                <!-- <button class="btn btn-dark-cerulean btn-lg w-100 registerbtn" onclick="register_save(4)" type="button"> -->
                                <button type="submit" class="btn btn-primary-bg btn-lg w-100 registerbtn">
                                    Sign up </button>
                            </form>



                            










                            <div class="mt-sm-4 text-center">
                                Already have an account? <strong>
                                    <a href="<?php echo e(route('frontend.signin')); ?>"class="text-decoration-underline">Sign in</a>
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('Frontend.layouts.parts.news-letter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            // $('input[type=password]').keyup(function() {
            $('#user_password').keyup(function() {
                // keyup code here

                // set password variable
                var pswd = $("#user_password").val();
                //validate the length

                if (pswd.length < 8) {
                    $('#length').removeClass('valid').addClass('invalid');
                    var error = 0;
                } else {
                    $('#length').removeClass('invalid').addClass('valid');
                    var error = 1;
                }
                //validate letter
                // if (pswd.match(/[A-z]/)) {
                //     $('#letter').removeClass('invalid').addClass('valid');
                //     var error1 = 1;
                // } else {
                //     $('#letter').removeClass('valid').addClass('invalid');
                //     var error1 = 0;
                // }

                //validate capital letter
                // if (pswd.match(/[A-Z]/)) {
                //     $('#capital').removeClass('invalid').addClass('valid');
                //     var error2 = 1;
                // } else {
                //     $('#capital').removeClass('valid').addClass('invalid');
                //     var error2 = 0;
                // }

                //validate number
                // if (pswd.match(/\d/)) {
                //     $('#number').removeClass('invalid').addClass('valid');
                //     var error3 = 1;
                // } else {
                //     $('#number').removeClass('valid').addClass('invalid');
                //     var error3 = 0;
                // }
                if (error == 1) {
                    $('#pswd_info').hide();
                    $('.registerbtn').prop('disabled', false);
                    $('#user_password').css({
                        "border": ""
                    });
                } else {
                    $('#pswd_info').show();
                    $('#user_password').css({
                        "border": "1px solid red"
                    });
                    $('.registerbtn').prop('disabled', true);
                }
                // alert(error+'_'+error1+'_'+error2+'_'+error3);

            }).focus(function() {
                $('#pswd_info').show();
                if (error == 1) {
                    $('#pswd_info').hide();
                    $('.registerbtn').prop('disabled', false);
                    $('#user_password').css({
                        "border": ""
                    });
                } else {
                    $('#pswd_info').show();
                    $('#user_password').css({
                        "border": "1px solid red"
                    });
                    $('.registerbtn').prop('disabled', true);
                }
            }).blur(function() {
                $('#pswd_info').hide();
                if (error == 1) {
                    $('#pswd_info').hide();
                    $('.registerbtn').prop('disabled', false);
                    $('#user_password').css({
                        "border": ""
                    });
                } else {
                    $('#pswd_info').show();
                    $('#user_password').css({
                        "border": "1px solid red"
                    });
                    $('.registerbtn').prop('disabled', true);
                }
            });

            // ============= its for confirm-password ================
            $('#user_cpassword').keyup(function() {
                // set password variable
                var pswd = $("#user_cpassword").val();
                //validate the length

                if (pswd.length < 8) {
                    $('#confirm-length').removeClass('valid').addClass('invalid');
                    var error = 0;
                } else {
                    $('#confirm-length').removeClass('invalid').addClass('valid');
                    var error = 1;
                }
                //validate letter
                // if (pswd.match(/[A-z]/)) {
                //     $('#confirm-letter').removeClass('invalid').addClass('valid');
                //     var error1 = 1;
                // } else {
                //     $('#confirm-letter').removeClass('valid').addClass('invalid');
                //     var error1 = 0;
                // }

                //validate capital letter
                // if (pswd.match(/[A-Z]/)) {
                //     $('#confirm-capital').removeClass('invalid').addClass('valid');
                //     var error2 = 1;
                // } else {
                //     $('#confirm-capital').removeClass('valid').addClass('invalid');
                //     var error2 = 0;
                // }

                //validate number
                // if (pswd.match(/\d/)) {
                //     $('#confirm-number').removeClass('invalid').addClass('valid');
                //     var error3 = 1;
                // } else {
                //     $('#confirm-number').removeClass('valid').addClass('invalid');
                //     var error3 = 0;
                // }
                if (error == 1) {
                    $('#confirm-pswd_info').hide();
                    $('.registerbtn').prop('disabled', false);
                    $('#user_cpassword').css({
                        "border": ""
                    });
                } else {
                    $('#confirm-pswd_info').show();
                    $('#user_cpassword').css({
                        "border": "1px solid red"
                    });
                    $('.registerbtn').prop('disabled', true);
                }
                // alert(error+'_'+error1+'_'+error2+'_'+error3);

            }).focus(function() {
                $('#confirm-pswd_info').show();
                if (error == 1) {
                    $('#confirm-pswd_info').hide();
                    $('.registerbtn').prop('disabled', false);
                    $('#user_cpassword').css({
                        "border": ""
                    });
                } else {
                    $('#confirm-pswd_info').show();
                    $('#user_cpassword').css({
                        "border": "1px solid red"
                    });
                    $('.registerbtn').prop('disabled', true);
                }
            }).blur(function() {
                $('#confirm-pswd_info').hide();
                if (error == 1) {
                    $('#confirm-pswd_info').hide();
                    $('.registerbtn').prop('disabled', false);
                    $('#user_cpassword').css({
                        "border": ""
                    });
                } else {
                    $('#confirm-pswd_info').show();
                    $('#user_cpassword').css({
                        "border": "1px solid red"
                    });
                    $('.registerbtn').prop('disabled', true);
                }
            });

            $("#user_cpassword").on('keyup', function() {
                var pswd = $("#user_password").val();
                var password_confirm = $("#user_cpassword").val();
                if (pswd != password_confirm) {
                    $('#user_cpassword').css({
                        "border": "1px solid red"
                    });
                    $('.registerbtn').prop('disabled', true);
                } else {
                    $('#user_cpassword').css({
                        "border": "1px solid #45c203"
                    });
                }

            });


            var input = document.querySelector("#user_mobile");
            var utilslink = 'application/modules/frontend/views/themes/default/assets/js/index.html';

            window.intlTelInput(input, {

                // allowDropdown: false,
                // autoHideDialCode: false,
                // autoPlaceholder: "off",
                // dropdownContainer: document.body,
                // excludeCountries: ["us"],
                // formatOnDisplay: false,
                // geoIpLookup: function(callback) {
                //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                //     var countryCode = (resp && resp.country) ? resp.country : "";
                //     callback(countryCode);
                //   });
                // },
                // hiddenInput: "full_number",
                // initialCountry: "auto",
                // localizedCountries: { 'de': 'Deutschland' },
                // nationalMode: false,
                // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                // placeholderNumberType: "MOBILE",
                preferredCountries: ['bd'],
                // separateDialCode: true,
                // Change the country selection
                // instance.selectCountry("gb"),
                utilsScript: utilslink + "utils.js",
            });

            $("body").on("click", ".registerbtn", function() {
                var fd = new FormData();
                var g_recaptcha_response = $("#g-recaptcha-response").val();
                fd.append("g_recaptcha_response", g_recaptcha_response);

                if (g_recaptcha_response == '') {
                    swal({
                            title: "Please, select this captcha!!",
                            type: "warning",
                            showCancelButton: false,
                            confirmButtonColor: '#14AD54',
                            cancelButtonColor: '#07477D',
                            confirmButtonText: 'OK',
                            cancelButtonText: "Go To Signin",
                            closeOnConfirm: true,
                            closeOnCancel: false
                        },
                        function(isConfirm) {
                            if (isConfirm === false) {
                                swal("Please Signin");
                            } else {
                                swal("Please Signin");
                            }
                        });
                    return false;
                }
            });
        });


        ("use strict");

        function mobilecheck(type) {
            var mobi = $("#user_mobile").val();
            var mobile = encodeURIComponent(mobi);

            $.ajax({
                url: base_url + enterprise_shortname + "/mobile-check",
                type: "post",
                data: {
                    csrf_test_name: CSRF_TOKEN,
                    mobile: mobi,
                    usertype: type
                },
                success: function(data) {
                    // console.log(data);
                    if (data == 1 && mobi !== "") {
                        $("#user_mobile").focus().val("");
                        // toastrErrorMsg("This email already exists!");
                        swal({
                                title: "" + mobile +
                                    " \n This mobile number already registered. \n Please signin",
                                type: "warning",
                                showCancelButton: false,
                                confirmButtonColor: '#14AD54',
                                cancelButtonColor: '#07477D',
                                confirmButtonText: 'OK',
                                cancelButtonText: "Go To Signin",
                                closeOnConfirm: true,
                                closeOnCancel: false
                            },
                            function(isConfirm) {
                                if (isConfirm === false) {
                                    swal("Please Signin");
                                    // location.href(base_url + enterprise_shortname + '/signin');
                                } else {
                                    // swal("Oh no...","press CANCEL please!");
                                    swal("Please Signin");
                                }
                            });
                        /* lead inhouse by @Salehin 26062022 */
                        return false;
                    }
                },
            });
        }


        ("use strict");

        function mailcheck(type) {
            var email = $("#user_email").val();
            var email = encodeURIComponent(email);
            $.ajax({
                url: base_url + enterprise_shortname + "/email-check",
                type: "post",
                data: {
                    csrf_test_name: CSRF_TOKEN,
                    email: email,
                    usertype: type
                },
                success: function(data) {
                    // console.log(data);
                    if (data == 1) {
                        $("#user_email").focus().val("");
                        // toastrErrorMsg("This email already exists!");
                        swal({
                            title: "" + decodeURIComponent(email) +
                                " \n This email already registered \n Please signin",
                            type: "warning",
                            showCancelButton: false,
                            confirmButtonColor: '#14AD54',
                            confirmButtonText: 'OK',
                            // cancelButtonText: "No",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        });
                        return false;
                    }
                },
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/auth/register.blade.php ENDPATH**/ ?>