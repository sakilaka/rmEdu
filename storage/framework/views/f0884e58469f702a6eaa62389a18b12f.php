<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('Backend.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    </style>
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
                            Dashboard
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="today-tab" data-toggle="tab" href="#today_data"
                                        role="tab" aria-controls="today_data" aria-selected="true">Today</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="week-tab" data-toggle="tab" href="#week_data"
                                        role="tab" aria-controls="week_data" aria-selected="false">This Week</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="month-tab" data-toggle="tab" href="#month_data"
                                        role="tab" aria-controls="month_data" aria-selected="false">This Month</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="year-tab" data-toggle="tab" href="#year_data"
                                        role="tab" aria-controls="year_data" aria-selected="false">This Year</a>
                                </li>
                            </ul>

                            <div class="tab-content border-0 p-0 mt-2">
                                <div class="tab-pane fade active show" id="today_data" role="tabpanel"
                                    aria-labelledby="today-tab">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Visitors</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($today['total_visitor']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-eye text-info icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.student_appliction_list')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Applications</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($today['total_application']); ?>

                                                                </h2>
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
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.u_course.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Programs</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($today['total_general_course']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-cubes text-primary icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Students</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($today['total_applicants']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-users text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.consultant.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Partners</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($today['total_consultant']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="icon-people text-info icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.event.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Events</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($today['total_event']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fa fa-podcast text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('blog.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">News & Blogs</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($today['total_blog']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-rss text-primary icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.subscriber.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Subscribers</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($today['total_subscriber']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-thumbs-up text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.manage_testimonial')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Get Enquiry</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($today['total_testimonial']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-comments text-info icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.university.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Universities</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($today['total_university']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fa fa-university text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Media Partners</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($today['total_media_partner']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-bullseye text-primary icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.review.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Reviews & Ratings</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($today['total_review']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-certificate text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="week_data" role="tabpanel"
                                    aria-labelledby="week-tab">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Visitors</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($week['total_visitor']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-eye text-info icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.student_appliction_list')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Applications</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($week['total_application']); ?>

                                                                </h2>
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
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.u_course.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Programs</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($week['total_general_course']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-cubes text-primary icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Students</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($week['total_applicants']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-users text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.consultant.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Partners</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($week['total_consultant']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="icon-people text-info icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.event.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Events</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($week['total_event']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fa fa-podcast text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('blog.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">News & Blogs</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($week['total_blog']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-rss text-primary icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.subscriber.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Subscribers</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($week['total_subscriber']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-thumbs-up text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.manage_testimonial')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Get Enquiry</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($week['total_testimonial']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-comments text-info icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.university.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Universities</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($week['total_university']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fa fa-university text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Media Partners</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($week['total_media_partner']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-bullseye text-primary icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.review.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Reviews & Ratings</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($week['total_review']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-certificate text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="month_data" role="tabpanel"
                                    aria-labelledby="month-tab">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Visitors</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($month['total_visitor']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-eye text-info icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.student_appliction_list')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Applications</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($month['total_application']); ?>

                                                                </h2>
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
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.u_course.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Programs</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0">
                                                                    <?php echo e($month['total_general_course']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-cubes text-primary icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Students</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($month['total_applicants']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-users text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.consultant.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Partners</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($month['total_consultant']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="icon-people text-info icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.event.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Events</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($month['total_event']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fa fa-podcast text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('blog.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">News & Blogs</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($month['total_blog']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-rss text-primary icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.subscriber.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Subscribers</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($month['total_subscriber']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-thumbs-up text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.manage_testimonial')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Get Enquiry</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($month['total_testimonial']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-comments text-info icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.university.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Universities</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($month['total_university']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fa fa-university text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Media Partners</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($month['total_media_partner']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-bullseye text-primary icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.review.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Reviews & Ratings</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($month['total_review']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-certificate text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="year_data" role="tabpanel"
                                    aria-labelledby="year-tab">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Visitors</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($year['total_visitor']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-eye text-info icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.student_appliction_list')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Applications</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($year['total_application']); ?>

                                                                </h2>
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
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.u_course.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Programs</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($year['total_general_course']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-cubes text-primary icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Students</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($year['total_applicants']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-users text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.consultant.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Partners</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($year['total_consultant']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="icon-people text-info icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.event.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Events</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($year['total_event']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fa fa-podcast text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('blog.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">News & Blogs</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($year['total_blog']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-rss text-primary icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.subscriber.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Subscribers</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($year['total_subscriber']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-thumbs-up text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.manage_testimonial')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Get Enquiry</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($year['total_testimonial']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-comments text-info icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.university.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Universities</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($year['total_university']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fa fa-university text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Media Partners</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($year['total_media_partner']); ?>

                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-bullseye text-primary icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 grid-margin">
                                            <div class="card"
                                                onclick="window.location.href='<?php echo e(route('admin.review.index')); ?>'"
                                                style="cursor: pointer">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-0">Reviews & Ratings</h4>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-inline-block pt-3">
                                                            <div class="d-md-flex">
                                                                <h2 class="mb-0"><?php echo e($year['total_review']); ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <i class="fas fa-certificate text-danger icon-lg"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
</body>

</html>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/index.blade.php ENDPATH**/ ?>