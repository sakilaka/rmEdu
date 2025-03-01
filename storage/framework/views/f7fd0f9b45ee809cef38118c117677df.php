<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('User-Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e(env('APP_NAME')); ?> | Dashboard</title>

    <style>
        .nav-tabs .nav-item:nth-child(1) {
            margin-left: 0px;
        }

        .nav-tabs .nav-item {
            line-height: 1;
            margin-left: 6px;
            font-size: 0.9rem;
        }

        .nav-tabs .nav-item .nav-link {
            border-radius: 6px !important;
        }

        .partner-social-container ul {
            list-style-type: none;
            display: flex;
            justify-content: start;
            align-items: center;
        }

        .partner-social-container ul li {
            margin-right: 0.85rem;
            background-color: rgb(228, 254, 237);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 45px;
            height: 45px;
            transition: 0.4s;
        }

        .partner-social-container ul li:hover {
            background-color: var(--button_primary_bg);
        }

        .partner-social-container ul li a {
            font-size: 18px !important;
            margin-top: 2.5px;
            text-decoration: none;
            padding: 12px;
            color: var(--button_primary_bg);
            transition: 0.4s;
        }

        .partner-social-container ul li:hover a {
            color: rgb(228, 254, 237);
        }

        @media screen and (max-width:1299px) {
            .partner-social-container-lg {
                display: inline-block;
            }

            .partner-social-container-sm {
                display: none;
            }
        }

        @media screen and (min-width:1300px) {
            .partner-social-container-lg {
                display: none;
            }

            .partner-social-container-sm {
                display: inline-block;
            }
        }

        .form-group label {
            font-size: 1.08rem;
            font-weight: 600;
            color: rgb(99, 99, 99);
        }

        .form-group p {
            font-size: 1rem;
            color: rgb(43, 43, 43);
        }
    </style>
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
                            Dashboard
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                            <div class="card" onclick="window.location.href='<?php echo e(route('user.order_list')); ?>'"
                                style="cursor: pointer">
                                <div class="card-body">
                                    <h4 class="card-title mb-0">Applications</h4>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-inline-block pt-3">
                                            <div class="d-md-flex">
                                                <h2 class="mb-0"><?php echo e($orders->count()); ?></h2>
                                            </div>
                                        </div>
                                        <div class="d-inline-block">
                                            <i class="fa fa-file-pdf text-danger icon-lg"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-0">Events</h4>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-inline-block pt-3">
                                            <div class="d-md-flex">
                                                <h2 class="mb-0"><?php echo e($event->count()); ?></h2>
                                            </div>
                                        </div>
                                        <div class="d-inline-block">
                                            <i class="fa fa-podcast text-info icon-lg"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if(Auth::user()->type == 1): ?>
                            <div class="col-sm-6 col-md-4 col-lg-5 ml-lg-auto grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-2">My Partner</h4>
                                        <?php if($consultant): ?>
                                            <div class="d-flex flex-row">
                                                <img src="<?php echo e(@$consultant->image_show); ?>" class="img-lg rounded"
                                                    alt="profile-<?php echo e(@$consultant->name); ?>">
                                                <div class="ml-3">
                                                    <h6><?php echo e(@$consultant->name); ?></h6>
                                                    <p class="text-muted"><?php echo e(@$consultant->address); ?>,
                                                        <?php echo e(@$consultant->continents->name); ?></p>
                                                    <div
                                                        class="mt-0 partner-social-container partner-social-container-sm">
                                                        <ul class="social">
                                                            <li>
                                                                <a href="<?php echo e(@$consultant->facebook_url ?? 'javascript:void(0)'); ?>"
                                                                    target="_blank" class="fab fa-facebook"
                                                                    aria-hidden="true"></a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(@$consultant->twitter_url ?? 'javascript:void(0)'); ?>"
                                                                    target="_blank" class="fab fa-twitter"
                                                                    aria-hidden="true"></a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(@$consultant->google_plus_url ?? 'javascript:void(0)'); ?>"
                                                                    target="_blank" class="fab fa-google-plus"
                                                                    aria-hidden="true"></a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(@$consultant->instagram_url ?? 'javascript:void(0)'); ?>"
                                                                    target="_blank" class="fab fa-instagram"
                                                                    aria-hidden="true"></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 partner-social-container partner-social-container-lg">
                                                <ul class="social">
                                                    <li>
                                                        <a href="<?php echo e(@$consultant->facebook_url ?? 'javascript:void(0)'); ?>"
                                                            target="_blank" class="fab fa-facebook"
                                                            aria-hidden="true"></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo e(@$consultant->twitter_url ?? 'javascript:void(0)'); ?>"
                                                            target="_blank" class="fab fa-twitter"
                                                            aria-hidden="true"></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo e(@$consultant->google_plus_url ?? 'javascript:void(0)'); ?>"
                                                            target="_blank" class="fab fa-google-plus"
                                                            aria-hidden="true"></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo e(@$consultant->instagram_url ?? 'javascript:void(0)'); ?>"
                                                            target="_blank" class="fab fa-instagram"
                                                            aria-hidden="true"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php else: ?>
                                            <p style="font-size: 1rem;">You have no partner yet.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0"><b>Personal Informations</b></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-3">
                                    <img src="<?php echo e(Auth::user()->image_show); ?>" alt="<?php echo e(Auth::user()->name); ?>"
                                        width="200" style="border-radius: 8px">
                                    <div class="mt-2">
                                        <p class="pr-3" style="font-size: 1rem !important">
                                            <?php echo e(Auth::user()->description); ?>

                                        </p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-9 mt-3 mt-lg-0">
                                    <div class="row">
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <p><?php echo e(Auth::user()?->name ?? '-'); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Email Address</label>
                                                <p><?php echo e(Auth::user()?->email ?? '-'); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Phone Number</label>
                                                <p><?php echo e(Auth::user()?->mobile ?? '-'); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Gender</label>
                                                <p>
                                                    <?php if(Auth::user()->gender == '0'): ?>
                                                        Male
                                                    <?php elseif(Auth::user()->gender == '1'): ?>
                                                        Female
                                                    <?php else: ?>
                                                        -
                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <?php if(Auth::user()->type == '1' || Auth::user()->type == '2'): ?>
                                            <div class="col-12 col-lg-4">
                                                <div class="form-group">
                                                    <label for="name">Date of Birth</label>
                                                    <p><?php echo e(date('d M, Y', strtotime(Auth::user()->dob))); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <div class="form-group">
                                                    <label for="name">NID</label>
                                                    <p><?php echo e(Auth::user()->nid ?? '-'); ?></p>
                                                </div>
                                            </div>
                                            <?php if(Auth::user()->type == 2): ?>
                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label for="name">Designation</label>
                                                        <p><?php echo e(Auth::user()->designation ?? '-'); ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label for="name">Institution</label>
                                                        <p><?php echo e(Auth::user()->institution ?? '-'); ?></p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Qualification</label>
                                                <p><?php echo e(Auth::user()->qualification ?? '-'); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Experience</label>
                                                <p><?php echo e(Auth::user()->experience ?? '-'); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Language</label>
                                                <p>
                                                    <?php if(auth()->user()->language == '1'): ?>
                                                        Bangla
                                                    <?php elseif(auth()->user()->language == '2'): ?>
                                                        English
                                                    <?php elseif(auth()->user()->language == '3'): ?>
                                                        Hindi
                                                    <?php elseif(auth()->user()->language == '4'): ?>
                                                        Arabic
                                                    <?php else: ?>
                                                        -
                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <?php if(auth()->user()->type == 1 || auth()->user()->type == 7): ?>
                                            <div class="col-12 col-lg-4">
                                                <div class="form-group">
                                                    <label for="name">Continent</label>
                                                    <p><?php echo e(auth()->user()->continents?->name ?? '-'); ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Country</label>
                                                <p>
                                                    <?php $__empty_1 = true; $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <?php if($country->id == Auth::user()->country): ?>
                                                            <?php echo e($country->name); ?>

                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <?php echo e('-'); ?>

                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Address</label>
                                                <p><?php echo e(auth()->user()->address ?? '-'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php if(Auth::user()->certificate->count() > 0): ?>
                                    <div class="col-12 mt-4 mt-lg-2">
                                        <h4 class="card-title mb-3"><b>Certificates</b></h4>

                                        <div class="row">
                                            <?php $__currentLoopData = Auth::user()->certificate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-6 col-md-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label for="address"><b><?php echo e($loop->iteration); ?>.
                                                                <?php echo e($item->certificates_name); ?></b></label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <button style="margin-left: 18px" type="button"
                                                                    data-toggle="modal"
                                                                    data-target="#certificateModal<?php echo e($k); ?>"
                                                                    class="btn btn-primary"><i class="fa fa-eye"></i>
                                                                    View
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Modal -->
                                                <div class="modal fade" id="certificateModal<?php echo e($k); ?>"
                                                    tabindex="-1" role="dialog" aria-labelledby="audioModalLabel"
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
                                                                <?php if($item->extensions == 'pdf'): ?>
                                                                    <iframe src="<?php echo e($item->certificates_file_show); ?>"
                                                                        width="100%" height="500"></iframe>
                                                                <?php else: ?>
                                                                    <img src="<?php echo e($item->certificates_file_show); ?>"
                                                                        alt="image"
                                                                        style="height: 300px; width:450px">
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo $__env->make('User-Backend.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('User-Backend.components.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/User-Backend/index.blade.php ENDPATH**/ ?>