<?php $__env->startSection('title', '- All Universities'); ?>
<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/css/application-style.css"
        rel="stylesheet">
    <link href="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/css/tippy.css"
        rel="stylesheet">
    <link href="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/css/wnoty.css"
        rel="stylesheet">

    <link href="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/css/application.css"
        rel="stylesheet">
    <link
        href="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/css/application-bootstrap.css"
        rel="stylesheet">
    <link href="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/css/flatpickr.css"
        rel="stylesheet">
    <link href="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/css/dropzone.css"
        rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
    <!-- new header addedd from here -->
    <div style='background: #254991;' class='py-4'>
        <div class='container d-flex align-items-center justify-content-between'>
            <img src="<?php echo e(asset('/public/upload/users/' . auth()->user()->image)); ?>" width='60px' height='60px'
                class='rounded-pill border border-white'>
            <h4 class='text-white ' style='font-size: 25px;'>International Student
                Service System</h4>
            <a class='btn btn-danger btn-sm px-3' style='font-size: 14px;' href='<?php echo e(route('user.logout')); ?>'>Log out</a>
        </div>
    </div>
    <!-- end here new header -->

    <div class="container d-lg-flex p-0" style="flex-flow: row-reverse; margin-top:2rem;">

        <div class="col-lg-4">
            <div class="center">
                <div class="applicationList_wrapper mb-4">
                    <h4 class="text-center mb-4">Application Summary</h4>
                    <span class="arrow d-lg-none active" (click)="toggleOpen($event)">
                        <span></span>
                        <span></span>
                    </span>
                    <div class="d-none d-lg-block app-summary">
                        <hr>
                        <div class="app_summary">
                            <div class="mt-2 mb2 d-flex justify-content-between">Application ID
                                <strong style="font-size: 1rem;" class="badge badge-warning"
                                    id="application-id"><?php echo e($application->application_code); ?></strong>
                            </div>
                            <div class="mt-2 mb2 application-fee d-flex justify-content-between">
                                <span class="service_type"> Application Fee <span
                                        data-tippy-content="This is the university application fee required to process your application."><i
                                            class="far fa-question-circle"></i></span></span>
                                <div>
                                    <strong id="orig-app-fee"
                                        style="color: grey; text-decoration: line-through; display: none;"> $<span
                                            style="font-size: 1rem; text-decoration:line-through;"
                                            class="badge p-0"><?php echo e($application->application_fee); ?></span> USD</strong>
                                    <strong> $<span style="font-size: 1rem;color:black;" class="badge p-0"
                                            id="application-fee"><?php echo e($application->application_fee); ?></span> USD</strong>
                                </div>
                            </div>
                            <div class="mt-2 mb2 service-fee-container justify-content-between d-none">
                                <span class="service-fee"> Service Fee <span
                                        data-tippy-content="This is the service fee to cover the processing of your application to the university on China Admissions platform."><i
                                            class="far fa-question-circle"></i></span></span>
                                <strong><span style="font-size: 1rem;" class="badge p-0"
                                        id="service-fee">Free</span></strong>
                            </div>
                            <div class="mt-2 mb2 opt-service-fee-container justify-content-between d-none"><span
                                    class="opt-service-fee">Optional Service Fee</span>
                                <strong><span style="font-size: 1rem;" class="badge p-0" id="opt-service-fee">$990
                                        USD</span></strong>
                            </div>
                            <div class="mt-2 mb2 total-fee d-flex justify-content-between"><span class=""> Total
                                    Fee</span>
                                <strong>$<span style="font-size: 1rem;color:black;" class="badge p-0"
                                        id="total-fee"><?php echo e($application->total_fee); ?></span> USD</strong>
                            </div>
                            <hr>
                        </div>

                        <div class="program">
                            <?php $__currentLoopData = $application->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class=" d-md-flex item p-4" id="prog-250787">
                                    <div style="position: absolute;right: 5px;z-index: 999;top: -5px;">
                                        <div class="delete-container">
                                            <button type="button" title="Delete program" data-code="<?php echo e($cart->id); ?>"
                                                class="delete-prog-btn close" aria-label="Delete program"
                                                data-toggle="modal" data-target="#delete_program">
                                                <span style="font-size:16px">
                                                    <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="uniLogo d-inline-block">
                                            <img src="<?php echo e($cart?->course?->university?->image_show); ?>"
                                                style="width:50px;height:50px">

                                        </div>
                                        <div class="d-md-flex flex-column justify-content-between mainContentArea">
                                            <div class="">
                                                <a href="<?php echo e(url('courses/details/' . $cart->course?->id)); ?>" class="title"
                                                    style="font-size: 1.2rem;">
                                                    <?php echo e($cart->course?->name); ?>

                                                </a>
                                                <div class="status">
                                                    <div class="d-flex justify-content-between">Deadline:

                                                        <div class="d-flex flex-column">
                                                            <strong
                                                                data-tippy-content="- Note: Submitting earlier increases your chances of being accepted. If you leave your application to close the deadline it increases your risk of being rejected because the university is very busy and there may not be enough time for your documents to be corrected if there are problems.">
                                                                <i class="far fa-question-circle"></i>
                                                                <?php echo e(date('M d, Y', strtotime($cart->course?->application_deadline))); ?>

                                                            </strong>

                                                        </div>

                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        Start:<strong>
                                                            <?php echo e(date('M d, Y', strtotime($cart->course?->next_start_date))); ?>

                                                        </strong>
                                                    </div>
                                                </div>

                                                <div class="status">
                                                    <div class="">Current Status:</div>
                                                    <div class=""> <strong>
                                                            <?php if($application->status == 0): ?>
                                                                Applicationn Started
                                                            <?php elseif($application->status == 1): ?>
                                                                Application Completed
                                                            <?php endif; ?>
                                                        </strong></div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="mt-2 mb2 d-flex flex-column">
                            <?php
                                $partner_ref_id = session('partner_ref_id') ?? request()->query('partner_ref_id');

                                if ($partner_ref_id) {
                                    $route = route('frontend.apply_now', ['partner_ref_id' => $partner_ref_id]);
                                } else {
                                    $route = route('frontend.university_course_list');
                                }
                            ?>

                            <button class="btn-add-prog btn mb-4"
                                onclick="window.location.href='<?php echo e($route); ?>'">Add
                                another program
                                <i class="fa fa-plus" aria-hidden="true"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="block applicationStatus_wrapper mr-md-2 ml-md-2 main position-relative mb-md-5 col-lg-8 loading d-none">

            <div class="d-flex align-items-center justify-content-center h-100">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>


        <div class="mr-md-2 ml-md-2  main position-relative mb-md-5 col-lg-8">
            <div class="m-auto col-12 p-0" style="max-width: 800px;">
                <div class="missing-docs container d-none">
                    <div class="alert alert-warning alert-dismissible fade show m-2" role="alert">
                        <strong style="color:#363636;font-weight:700"> Your application is missing some required documents.
                            Please click <a href="#" style="color: #d71f27;font-weight:700"
                                onclick="setActivePanel(2);setActiveStep(2)">here</a> to upload.</strong> <br>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>

                <div class="states d-none">
                    <!--State 1-->
                    <div class="block applicationStatus_wrapper d-none">
                        <div class="topPart green">
                            <div class="currentStatus">Current Status</div>
                            <h1 class=""><strong class="status-current-step">Application Started</strong></h1>
                            <br><strong>Next Step: <span class="status-next-step"></span></strong>
                            <!-- class: onStep1 / onStep2 / onStep3 is how you control the circle current stage -->
                            <div class="stepsWrapper onStep1">
                                <div class="movingDots"></div>
                                <div class="line"></div>
                                <div class="steps passed">
                                    <div class="circle"></div>
                                    <div class="name">1. Application</div>
                                </div>
                                <div class="steps">
                                    <div class="circle"></div>
                                    <div class="name">2. University Review</div>
                                </div>
                                <div class="steps">
                                    <div class="circle"></div>
                                    <div class="name">3. Registration Confirmation</div>
                                </div>
                            </div>

                        </div>

                        <div class="contentWrapper">
                            <hr>
                            <p class="nameOfSection">
                            </p>
                            <h3>Notes from China Admissions<br> Applications Officer:</h3>
                            <p></p>
                            <h2 class="notes"></h2>
                            <div class="button red solid sml" onclick="window.location.href = '/survey/contact/'">
                                Upload additional Files</div>
                        </div>
                    </div>

                    <!--State 2-->
                    <div class="block applicationStatus_wrapper d-none step-2">
                        <div class="topPart green">
                            <div class="currentStatus">Current Status</div>
                            <h1 class=""><strong class="status-current-step">Application Started</strong></h1>
                            <br><strong>Next Step: <span class="status-next-step"></span></strong>
                            <!-- class: onStep1 / onStep2 / onStep3 is how you control the circle current stage -->
                            <div class="stepsWrapper onStep1">
                                <div class="movingDots"></div>
                                <div class="line"></div>
                                <div class="steps passed">
                                    <div class="circle"></div>
                                    <div class="name">1. Application</div>
                                </div>
                                <div class="steps">
                                    <div class="circle"></div>
                                    <div class="name">2. University Review</div>
                                </div>
                                <div class="steps">
                                    <div class="circle"></div>
                                    <div class="name">3. Registration Confirmation</div>
                                </div>
                            </div>

                        </div>

                        <div class="contentWrapper">
                            <hr>
                            <p class="nameOfSection">
                            </p>
                            <h3>Notes from China Admissions<br> Applications Officer:</h3>
                            <p></p>
                            <h2 class="">
                                Thank you for your application.
                                <hr>
                                <div class="mt-2">
                                    <div id="video_392645" preload="none"
                                        class="swarm-fluid smartvideo-player vjs-swarmify-theme fitvidsignore dimensions-video_392645 vjs-paused vjs-controls-enabled vjs-user-inactive"
                                        src="" style=""><video
                                            src="blob:https://apply.china-admissions.com/f2f1ad8e-740d-48b0-b245-84672f1b2b7c"
                                            class="vjs-tech" preload="none" id="video_392645_html5_api">
                                        </video>
                                        <div></div>
                                        <div class="vjs-poster" tabindex="-1"
                                            data-background-image="https://video-node.swarmcdn.com/8391afc9-113c-49fc-baa4-f9a6ad26b160/e975e2f50d7a9f952aa60736d39311f8dd77b8d060ff8de5779f70afd4a0c9af.jpg">
                                        </div>
                                        <div class="vjs-loading-spinner"></div>
                                        <div class="vjs-swarmify-disabled" role="button" aria-live="polite"
                                            tabindex="0" aria-label="disabled">
                                            <div class="vjs-control-content"><span class="vjs-control-text">Need
                                                    Text</span></div>
                                        </div>
                                        <div class="vjs-swarmify-play-button" role="button" aria-live="polite"
                                            tabindex="0" aria-label="play video"><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 294 336"
                                                class="swarmify-play-button hexagon">
                                                <defs>
                                                    <path id="h" d="M158 0l136.83 79v158L158 316 21.168 237V79z">
                                                    </path>
                                                    <path id="t" d="M53.499 7.951l51.961 90H1.539z"></path>
                                                </defs>
                                                <g stroke-linejoin="round" fill-rule="evenodd" stroke-linecap="round">
                                                    <g id="hex" transform="translate(-11 10)">
                                                        <use xlink:href="#h" height="100%" width="100%"></use>
                                                        <path stroke-width="10"
                                                            d="M158-5.774l141.83 81.888v163.77L158 321.774l-141.83-81.88V76.124L158-5.77z">
                                                        </path>
                                                    </g>
                                                    <g transform="rotate(-30 289.199 -57.894)" id="tri">
                                                        <use xlink:href="#t" height="100%" width="100%"></use>
                                                        <path stroke-width="4"
                                                            d="M53.499 3.951l55.424 96H-1.927l55.429-96z"></path>
                                                    </g>
                                                </g>
                                            </svg><svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 294 336"
                                                class="swarmify-play-button rectangle">
                                                <defs>
                                                    <path id="h" d="M158 0l136.83 79v158L158 316 21.168 237V79z">
                                                    </path>
                                                    <path id="t" d="M53.499 7.951l51.961 90H1.539z"></path>
                                                </defs>
                                                <g stroke-linejoin="round" fill-rule="evenodd" stroke-linecap="round">
                                                    <g id="hex">
                                                        <rect width="280" height="174" x="50%" y="50%"
                                                            transform="translate(-140,-87)" id="svg_3"
                                                            stroke-width="10"></rect>
                                                    </g>
                                                    <g transform="rotate(-30 289.199 -57.894)" id="tri">
                                                        <use xlink:href="#t" height="100%" width="100%"></use>
                                                        <path stroke-width="4"
                                                            d="M53.499 3.951l55.424 96H-1.927l55.429-96z"></path>
                                                    </g>
                                                </g>
                                            </svg><svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 294 336"
                                                class="swarmify-play-button circle">
                                                <defs>
                                                    <path id="h" d="M158 0l136.83 79v158L158 316 21.168 237V79z">
                                                    </path>
                                                    <path id="t" d="M53.499 7.951l51.961 90H1.539z"></path>
                                                </defs>
                                                <g stroke-linejoin="round" fill-rule="evenodd" stroke-linecap="round">
                                                    <g id="hex">
                                                        <circle cx="50%" cy="50%" r="125" id="svg_3"
                                                            stroke-width="10"></circle>
                                                    </g>
                                                    <g transform="rotate(-30 289.199 -57.894)" id="tri">
                                                        <use xlink:href="#t" height="100%" width="100%"></use>
                                                        <path stroke-width="4"
                                                            d="M53.499 3.951l55.424 96H-1.927l55.429-96z"></path>
                                                    </g>
                                                </g>
                                            </svg></div>
                                        <div class="vjs-swarmify-watermark vjs-swarmify-watermark-bottom-right"
                                            role="button" aria-live="polite" tabindex="0" aria-label="watermark"><a
                                                rel="noopener" target="_blank"
                                                href="https://swarmify.com/player/learn-more/?utm_campaign=wtrmrk&amp;utm_medium=player&amp;utm_source=apply.china-admissions.com"><img
                                                    src="https://assets.swarmcdn.com/cross/images/swarmify_logo_grey.png"
                                                    loading="lazy" width="2265" height="567"
                                                    alt="Swarmify Video Hosting"></a></div>
                                        <div class="vjs-control-bar" style="">
                                            <div class="vjs-play-control vjs-control " role="button" aria-live="polite"
                                                tabindex="0">
                                                <div class="vjs-control-content"><span
                                                        class="vjs-control-text">Play</span></div>
                                            </div>
                                            <div class="vjs-current-time vjs-time-controls vjs-control"
                                                style="display: none;">
                                                <div class="vjs-current-time-display" aria-live="off"><span
                                                        class="vjs-control-text">Current Time</span> 0:00</div>
                                            </div>
                                            <div class="vjs-time-divider" style="display: none;">
                                                <div><span>/</span></div>
                                            </div>
                                            <div class="vjs-duration vjs-time-controls vjs-control"
                                                style="display: none;">
                                                <div class="vjs-duration-display" aria-live="off"><span
                                                        class="vjs-control-text">Duration Time</span> 0:00</div>
                                            </div>
                                            <div class="vjs-remaining-time vjs-time-controls vjs-control"
                                                style="display: block;">
                                                <div class="vjs-remaining-time-display" aria-live="off"><span
                                                        class="vjs-control-text">Remaining Time</span> -0:00</div>
                                            </div>
                                            <div class="vjs-live-controls vjs-control">
                                                <div class="vjs-live-display" aria-live="off"><span
                                                        class="vjs-control-text">Stream Type</span>LIVE</div>
                                            </div>
                                            <div class="vjs-progress-control vjs-control">
                                                <div role="slider" aria-valuenow="NaN" aria-valuemin="0"
                                                    aria-valuemax="100" tabindex="0"
                                                    class="vjs-progress-holder vjs-slider" aria-label="video progress bar"
                                                    aria-valuetext="0:00">
                                                    <div class="vjs-load-progress"><span
                                                            class="vjs-control-text"><span>Loaded</span>: 0%</span></div>
                                                    <div class="vjs-play-progress" style="width: 0%;"><span
                                                            class="vjs-control-text"><span>Progress</span>: 0%</span></div>
                                                    <div class="vjs-seek-handle vjs-slider-handle" aria-live="off"
                                                        style="left: 0%;"><span class="vjs-control-text">0:00</span></div>
                                                </div>
                                            </div>
                                            <div class="vjs-fullscreen-control vjs-control " role="button"
                                                aria-live="polite" tabindex="0">
                                                <div class="vjs-control-content"><span
                                                        class="vjs-control-text">Fullscreen</span></div>
                                            </div>
                                            <div class="vjs-swarmify-signal-icon vjs-menu-button vjs-control swarm-on"
                                                style="display: none;">
                                                <div class="signal-popup vjs-menu"><a rel="noopener" target="_blank"
                                                        href="https://swarmify.com/player/learn-more/">
                                                        <div class="vjs-menu-content">
                                                            <div class="signal-title">Video Acceleration:</div>
                                                            <div class="signal-on-text">On</div>
                                                            <div class="signal-off-text">Off</div><br>
                                                        </div>
                                                    </a></div>
                                            </div>
                                            <div class="vjs-volume-control vjs-control">
                                                <div role="slider" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100" tabindex="0" class="vjs-volume-bar vjs-slider"
                                                    aria-label="volume level" aria-valuetext="100%">
                                                    <div class="vjs-volume-level" style="width: 100%;"><span
                                                            class="vjs-control-text"></span></div>
                                                    <div class="vjs-volume-handle vjs-slider-handle" style="left: 100%;">
                                                        <span class="vjs-control-text">00:00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vjs-mute-control vjs-control vjs-vol-3" role="button"
                                                aria-live="polite" tabindex="0">
                                                <div><span class="vjs-control-text">Mute</span></div>
                                            </div>
                                            <div class="vjs-playback-rate vjs-menu-button vjs-control"
                                                aria-haspopup="true" role="button">
                                                <div class="vjs-control-content"><span class="vjs-control-text">Playback
                                                        Rate</span></div>
                                                <div class="vjs-playback-rate-value">1x</div>
                                                <div class="vjs-menu">
                                                    <ul class="vjs-menu-content">
                                                        <li class="vjs-menu-item" role="button" aria-live="polite"
                                                            tabindex="0" aria-selected="false">2x</li>
                                                        <li class="vjs-menu-item" role="button" aria-live="polite"
                                                            tabindex="0" aria-selected="false">1.5x</li>
                                                        <li class="vjs-menu-item" role="button" aria-live="polite"
                                                            tabindex="0" aria-selected="false">1.25x</li>
                                                        <li class="vjs-menu-item vjs-selected" role="button"
                                                            aria-live="polite" tabindex="0" aria-selected="true">1x
                                                        </li>
                                                        <li class="vjs-menu-item" role="button" aria-live="polite"
                                                            tabindex="0" aria-selected="false">0.75x</li>
                                                        <li class="vjs-menu-item" role="button" aria-live="polite"
                                                            tabindex="0" aria-selected="false">0.5x</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="vjs-subtitles-button vjs-menu-button vjs-control " role="button"
                                                aria-live="polite" tabindex="0" aria-haspopup="true"
                                                aria-label="Subtitles Menu" style="display: none;">
                                                <div class="vjs-control-content"><span
                                                        class="vjs-control-text">Subtitles</span>
                                                    <div class="vjs-menu">
                                                        <ul class="vjs-menu-content">
                                                            <li class="vjs-menu-item vjs-selected" role="button"
                                                                aria-live="polite" tabindex="0" aria-selected="true">
                                                                subtitles off</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vjs-captions-button vjs-menu-button vjs-control " role="button"
                                                aria-live="polite" tabindex="0" aria-haspopup="true"
                                                aria-label="Captions Menu" style="display: none;">
                                                <div class="vjs-control-content"><span
                                                        class="vjs-control-text">Captions</span>
                                                    <div class="vjs-menu">
                                                        <ul class="vjs-menu-content">
                                                            <li class="vjs-menu-item vjs-selected" role="button"
                                                                aria-live="polite" tabindex="0" aria-selected="true">
                                                                captions off</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vjs-chapters-button vjs-menu-button vjs-control " role="button"
                                                aria-live="polite" tabindex="0" aria-haspopup="true"
                                                aria-label="Chapters Menu" style="display: none;">
                                                <div class="vjs-control-content"><span
                                                        class="vjs-control-text">Chapters</span>
                                                    <div class="vjs-menu">
                                                        <ul class="vjs-menu-content">
                                                            <li class="vjs-menu-title">Chapters</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vjs-error-display">
                                            <div></div>
                                        </div>
                                    </div>

                                </div>
                                <p class="text-justify mt-2">For the next step: <br><br>
                                    1) Please watch the video to learn more about the process and <br>
                                    <br>
                                    2) Please send us an email at <a
                                        href="mailto:apply@china-admissions.com">apply@china-admissions.com</a> with
                                    your application ID
                                    and we will give you the update for the next steps.
                                </p>

                            </h2>


                        </div>
                    </div>

                    <!--State 3-->
                    <div class="block applicationStatus_wrapper d-none step-3">
                        <div class="topPart pink">
                            <div class="currentStatus">Current Status</div>
                            <h1 class=""><strong class="status-current-step">Application Started</strong></h1>
                            <br><strong>Next Step: <span class="status-next-step"></span></strong>
                            <!-- class: onStep1 / onStep2 / onStep3 is how you control the circle current stage -->
                            <div class="stepsWrapper onStep1">
                                <div class="movingDots"></div>
                                <div class="line"></div>
                                <div class="steps notPassed">
                                    <div class="circle"></div>
                                    <div class="name">1. Application</div>
                                </div>
                                <div class="steps">
                                    <div class="circle"></div>
                                    <div class="name">2. University Review</div>
                                </div>
                                <div class="steps">
                                    <div class="circle"></div>
                                    <div class="name">3. Registration Confirmation</div>
                                </div>
                            </div>

                        </div>

                        <div class="contentWrapper">
                            <hr>
                            <p class="nameOfSection">
                            </p>
                            <h3>Notes from China Admissions<br> Applications Officer:</h3>
                            <p></p>
                            <h2 class="notes"></h2>
                            <div class="button red solid sml" onclick="showForms()">
                                Complete your application</div>
                        </div>
                    </div>

                    <!--State 4-->
                    <div class="block applicationStatus_wrapper d-none step-4">
                        <div class="topPart green">
                            <div class="currentStatus">Current Status</div>
                            <h1 class=""><strong class="status-current-step">Application Started</strong></h1>
                            <br><strong>Next Step: <span class="status-next-step"></span></strong>
                            <!-- class: onStep1 / onStep2 / onStep3 is how you control the circle current stage -->
                            <div class="stepsWrapper onStep2">
                                <div class="movingDots"></div>
                                <div class="line"></div>
                                <div class="steps passed">
                                    <div class="circle"></div>
                                    <div class="name">1. Application</div>
                                </div>
                                <div class="steps">
                                    <div class="circle"></div>
                                    <div class="name">2. University Review</div>
                                </div>
                                <div class="steps">
                                    <div class="circle"></div>
                                    <div class="name">3. Registration Confirmation</div>
                                </div>
                            </div>

                        </div>

                        <div class="contentWrapper">
                            <hr>
                            <p class="nameOfSection">
                            </p>
                            <h3>Notes from China Admissions<br> Applications Officer:</h3>
                            <p></p>
                            <h2 class="notes"></h2>

                        </div>
                    </div>

                    <!--State 5-->
                    <div class="block applicationStatus_wrapper d-none step-5">
                        <div class="topPart green">
                            <div class="currentStatus">Current Status</div>
                            <h1 class=""><strong class="status-current-step">Application Started</strong></h1>
                            <br><strong>Next Step: <span class="status-next-step"></span></strong>
                            <!-- class: onStep1 / onStep2 / onStep3 is how you control the circle current stage -->
                            <div class="stepsWrapper onStep2">
                                <div class="movingDots"></div>
                                <div class="line"></div>
                                <div class="steps passed">
                                    <div class="circle"></div>
                                    <div class="name">1. Application</div>
                                </div>
                                <div class="steps passed">
                                    <div class="circle"></div>
                                    <div class="name">2. University Review</div>
                                </div>
                                <div class="steps">
                                    <div class="circle"></div>
                                    <div class="name">3. Registration Confirmation</div>
                                </div>
                            </div>

                        </div>

                        <div class="contentWrapper">
                            <hr>
                            <p class="nameOfSection">
                            </p>
                            <h3>Notes from China Admissions<br> Applications Officer:</h3>
                            <p></p>
                            <h2 class="notes"></h2>
                            <div class="button red solid sml" onclick="confirmArriEmail()"> Confirm Your Arrival</div>

                        </div>
                    </div>

                    <!--State 6-->
                    <div class="block applicationStatus_wrapper d-none step-6">
                        <div class="topPart pink">
                            <div class="currentStatus">Current Status</div>
                            <h1 class=""><strong class="status-current-step">Application Started</strong></h1>
                            <br><strong>Next Step: <span class="status-next-step"></span></strong>
                            <!-- class: onStep1 / onStep2 / onStep3 is how you control the circle current stage -->
                            <div class="stepsWrapper onStep2">
                                <div class="movingDots"></div>
                                <div class="line"></div>
                                <div class="steps passed">
                                    <div class="circle"></div>
                                    <div class="name">1. Application</div>
                                </div>
                                <div class="steps notPassed">
                                    <div class="circle"></div>
                                    <div class="name">2. University Review</div>
                                </div>
                                <div class="steps">
                                    <div class="circle"></div>
                                    <div class="name">3. Contact China Admissions</div>
                                </div>
                            </div>

                        </div>

                        <div class="contentWrapper">
                            <hr>
                            <p class="nameOfSection">
                            </p>
                            <h3>Notes from China Admissions<br> Applications Officer:</h3>
                            <p></p>
                            <h2 class="notes"></h2>
                            <div class="button red solid sml">Contact Us</div>

                        </div>
                    </div>

                    <!--State 7-->
                    <div class="block applicationStatus_wrapper d-none step-7">
                        <div class="topPart green">
                            <div class="currentStatus">Current Status</div>
                            <h1 class=""><strong class="status-current-step">Application Started</strong></h1>
                            <br><strong>Next Step: <span class="status-next-step"></span></strong>
                            <!-- class: onStep1 / onStep2 / onStep3 is how you control the circle current stage -->
                            <div class="stepsWrapper onStep3">
                                <div class="movingDots"></div>
                                <div class="line"></div>
                                <div class="steps passed">
                                    <div class="circle"></div>
                                    <div class="name">1. Application</div>
                                </div>
                                <div class="steps passed">
                                    <div class="circle"></div>
                                    <div class="name">2. University Review</div>
                                </div>
                                <div class="steps">
                                    <div class="circle"></div>
                                    <div class="name">3. Registration Confirmation</div>
                                </div>
                            </div>

                        </div>

                        <div class="contentWrapper">
                            <hr>
                            <p class="nameOfSection">
                            </p>
                            <h3>Notes from China Admissions<br> Applications Officer:</h3>
                            <p></p>
                            <h2 class="notes"></h2>
                            <div class="button red solid sml" onclick="confirmRegEmail()">Confirm Registration</div>
                        </div>
                    </div>

                    <!--State 8-->
                    <div class="block applicationStatus_wrapper d-none step-8">
                        <div class="topPart green">
                            <div class="currentStatus">Current Status</div>
                            <h1 class=""><strong class="status-current-step">Application Started</strong></h1>
                            <br><strong>Next Step: <span class="status-next-step"></span></strong>
                            <!-- class: onStep1 / onStep2 / onStep3 is how you control the circle current stage -->
                            <div class="stepsWrapper onStep3">
                                <div class="movingDots"></div>
                                <div class="line"></div>
                                <div class="steps passed">
                                    <div class="circle"></div>
                                    <div class="name">1. Application</div>
                                </div>
                                <div class="steps passed">
                                    <div class="circle"></div>
                                    <div class="name">2. University Review</div>
                                </div>
                                <div class="steps passed">
                                    <div class="circle"></div>
                                    <div class="name">3. Registration Confirmation</div>
                                </div>
                            </div>

                        </div>

                        <div class="contentWrapper">
                            <hr>
                            <p class="nameOfSection">
                            </p>
                            <h3>Notes from China Admissions<br> Applications Officer:</h3>
                            <p></p>
                            <h2 class="notes"></h2>
                            <div class="button red solid sml" onclick="leaveFeedback()">Leave Your Feedback</div>
                        </div>
                    </div>
                </div>



                <div class="content__inner application_forms">
                    <div class="container">
                        <!--content title-->
                        <!--<h3 class="text-center mb-4">Your Application</h3>-->
                    </div>
                    <div class="container overflow-hidden">
                        <!--multisteps-form-->
                        <div class="multisteps-form">

                            <!--progress bar-->
                            <div class="row">
                                <div class="col-12 ml-auto mr-auto mb-4">
                                    <div class="multisteps-form__progress">
                                        <button class="multisteps-form__progress-btn js-active" type="button"
                                            title="Your information">
                                            Your Information
                                        </button>
                                        <button class="multisteps-form__progress-btn" type="button" title="Family">Your
                                            Family
                                        </button>
                                        <!--<button id="services-nav" class="multisteps-form__progress-btn" type="button"-->
                                        <!--    title="Choose Service">Choose Service-->
                                        <!--</button>-->
                                        <button class="multisteps-form__progress-btn confirm-nav" type="button"
                                            title="Upload Documents">Upload Documents
                                        </button>
                                        <button id="payment-nav"
                                            class="multisteps-form__progress-btn payment-nav disabled" type="button"
                                            title="Final Step">Final Step
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!--form panels-->
                            <div class="row">
                                <div class="col-12  m-auto p-0">
                                    <div class="multisteps-form__form" style="height: 2126px;">

                                        <!--about you panel-->
                                        <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active"
                                            data-animation="scaleIn">
                                            <form action="" id="aboutyou" enctype="multipart/form-data">

                                                <div class="form-group mt-2">
                                                    <input type="file" id="photo" name="photo"
                                                    data-name="photo"
                                                        class="form-control" accept='image/*'
                                                        onchange="previewImage(event)">
                                                    <div class="invalid-feedback">
                                                        This field is required.
                                                    </div>
                                                </div>

                                                

                                                <div class="mt-3">
                                                    <img id="imagePreview"
                                                        style="display: none; width: 150px; height: 150px; object-fit: cover; border: 2px solid #ddd; border-radius: 8px;">
                                                </div>



                                                <h5 class="multisteps-form__title">About you</h5>
                                                <div class="multisteps-form__content">
                                                    <div class="form-row ">
                                                        <div class="col-12 col-sm-6">
                                                            <div class=" form-label-group mt-2">

                                                                <input type="text" id="first_name" name="first_name"
                                                                    data-name="first_name" required=""
                                                                    placeholder="First name (Given Name)"
                                                                    class="form-control" maxlength=""
                                                                    value="<?php echo e(auth()->user()->name ?? $application->first_name); ?>">
                                                                <label for="first_name" class="form-control-placeholder">
                                                                    First name (Given Name)</label>

                                                                <div class="invalid-feedback">
                                                                    This field is required.
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!--<div class="col-12 col-sm-6">-->
                                                        <!--    <div class=" form-label-group mt-2">-->

                                                        <!--        <input type="text" id="middle_name" name="middle_name"-->
                                                        <!--            data-name="middle_name" placeholder="Middle name"-->
                                                        <!--            class="form-control" maxlength=""-->
                                                        <!--            value="<?php echo e($application->middle_name); ?>">-->
                                                        <!--        <label for="middle_name" class="form-control-placeholder">-->
                                                        <!--            Middle name</label>-->

                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                        <div class="col-12 col-sm-6">
                                                            <div class=" form-label-group mt-2">

                                                                <input type="text" id="last_name" name="last_name"
                                                                    data-name="last_name" required=""
                                                                    placeholder="Last name (Family name)"
                                                                    class="form-control" maxlength=""
                                                                    value="<?php echo e($application->last_name); ?>">
                                                                <label for="last_name" class="form-control-placeholder">
                                                                    Last name (Family name)</label>

                                                                <div class="invalid-feedback">
                                                                    This field is required.
                                                                </div>

                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12 col-sm-6">
                                                            <div class=" form-label-group mt-2">

                                                                <input type="text" id="date_of_birth"
                                                                    name="date_of_birth" data-name="date_of_birth"
                                                                    date-field="" data-date="Y-m-d" required=""
                                                                    placeholder="Date of birth"
                                                                    class="form-control flatpickr-input" maxlength=""
                                                                    value="<?php echo e(auth()->user()->dob ?? $application->dob); ?>">
                                                                <label for="date_of_birth"
                                                                    class="form-control-placeholder">
                                                                    Date of birth</label>

                                                                <div class="invalid-feedback">
                                                                    This field is required.
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class=" form-label-group mt-2">

                                                                <input type="text" id="place_of_birth"
                                                                    name="place_of_birth" data-name="place_of_birth"
                                                                    placeholder="Place of birth" class="form-control"
                                                                    maxlength=""
                                                                    value="<?php echo e($application->birth_place); ?>">
                                                                <label for="place_of_birth"
                                                                    class="form-control-placeholder">
                                                                    Place of birth</label>

                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class=" form-label-group mt-2">

                                                                <input type="text" id="email" name="email"
                                                                    data-name="email" required="" placeholder="Email"
                                                                    class="form-control" maxlength=""
                                                                    value="<?php echo e(auth()->user()->email ?? $application->email); ?>">
                                                                <label for="email"
                                                                    class="form-control-placeholder">Email</label>

                                                                <div class="invalid-feedback">
                                                                    This field is required.
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class='col-12 col-sm-6'>
                                                            <div class="form-label-group mt-2">
                                                                <!-- Phone input field -->
                                                                <input type="tel" id="phone" name="phone"
                                                                    class="form-control iti" required
                                                                    placeholder="Phone Number">
                                                                <label for="phone"
                                                                    class="form-control-placeholder mar">Phone
                                                                    Number</label>
                                                                <div class="invalid-feedback">This field is required.</div>
                                                            </div>
                                                        </div>





                                                        <div class="col-12 col-sm-6">
                                                            <div class=" form-label-group mt-2">

                                                                <input type="text" id="passport_no" name="passport_no"
                                                                    data-name="passport_no" placeholder="Passport number"
                                                                    class="form-control" maxlength=""
                                                                    value="<?php echo e($application->passport_number); ?>">
                                                                <label for="passport_no" class="form-control-placeholder">
                                                                    Passport number</label>

                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-6">
                                                            <div class=" form-label-group mt-2">

                                                                <input type="text" id="passport_expiration_date"
                                                                    name="passport_expiration_date"
                                                                    data-name="passport_expiration_date" date-field=""
                                                                    data-date="Y-m-d" placeholder="Passport expiry date"
                                                                    class="form-control flatpickr-input" maxlength=""
                                                                    value="<?php echo e($application->passport_exipre_date); ?>">
                                                                <label for="passport_expiration_date"
                                                                    class="form-control-placeholder">
                                                                    Passport expiry date</label>

                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-label-group mt-2">
                                                                <select id="nationality_selection"
                                                                    class="custom-select d-block w-100"
                                                                    name="applicants_nationality" required=""
                                                                    tabindex="0" aria-hidden="false">
                                                                    <option value="">Select Country</option>
                                                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option
                                                                            <?php if($country->id == $application->nationality): ?> selected <?php endif; ?>
                                                                            value="<?php echo e($country->id); ?>">
                                                                            <?php echo e($country->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <label for="nationality_selection">Nationality</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-6">
                                                            <div class=" form-label-group mt-2">
                                                                <select class="custom-select d-block w-100" id="religion"
                                                                    name="religion" data-name="religion"
                                                                    placeholder="Religion" value="" required="">
                                                                    <option
                                                                        <?php if($application->religion == 'Islam'): ?> selected <?php endif; ?>
                                                                        value="Islam">Islam</option>
                                                                    <option
                                                                        <?php if($application->religion == 'Jainism'): ?> selected <?php endif; ?>
                                                                        value="Jainism">Jainism</option>
                                                                    <option
                                                                        <?php if($application->religion == 'Judaism'): ?> selected <?php endif; ?>
                                                                        value="Judaism">Judaism</option>
                                                                    <option
                                                                        <?php if($application->religion == 'Shinto'): ?> selected <?php endif; ?>
                                                                        value="Shinto">Shinto</option>
                                                                    <option
                                                                        <?php if($application->religion == 'Sikhism'): ?> selected <?php endif; ?>
                                                                        value="Sikhism">Sikhism</option>
                                                                    <option
                                                                        <?php if($application->religion == 'Taoism'): ?> selected <?php endif; ?>
                                                                        value="Taoism">Taoism</option>
                                                                    <option
                                                                        <?php if($application->religion == 'Zoroastrianism'): ?> selected <?php endif; ?>
                                                                        value="Zoroastrianism">Zoroastrianism</option>
                                                                    <option
                                                                        <?php if($application->religion == "Baha'i"): ?> selected <?php endif; ?>
                                                                        value="Baha'i">Baha'i</option>
                                                                    <option
                                                                        <?php if($application->religion == 'Buddhism'): ?> selected <?php endif; ?>
                                                                        value="Buddhism">Buddhism</option>
                                                                    <option
                                                                        <?php if($application->religion == 'Christianity'): ?> selected <?php endif; ?>
                                                                        value="Christianity">Christianity</option>
                                                                    <option
                                                                        <?php if($application->religion == 'Confucianism'): ?> selected <?php endif; ?>
                                                                        value="Confucianism">Confucianism</option>
                                                                    <option
                                                                        <?php if($application->religion == 'Hinduism'): ?> selected <?php endif; ?>
                                                                        value="Hinduism">Hinduism</option>
                                                                </select>
                                                                
                                                                <label for="religion" class="form-control-placeholder">
                                                                    Religion</label>

                                                            </div>
                                                        </div>

                                                        <div id="msg-nationality"
                                                            class="invalid-feedback col-12 col-sm-12"
                                                            style="display: none;"></div>

                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-label-group mt-2">
                                                                <select class="custom-select d-block w-100" id="gender"
                                                                    name="gender" placeholder="Gender" value=""
                                                                    required="">
                                                                    <option
                                                                        <?php if($application->gender == 'Male'): ?> selected <?php endif; ?>
                                                                        value="Male">Male</option>
                                                                    <option
                                                                        <?php if($application->gender == 'Female'): ?> selected <?php endif; ?>
                                                                        value="Female">Female</option>
                                                                </select>
                                                                <label for="gender">Gender</label>
                                                            </div>
                                                        </div>



                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-label-group mt-2">
                                                                <select class="custom-select d-block w-100"
                                                                    id="marital_status" name="marital_status"
                                                                    placeholder="Marital status" value=""
                                                                    required="">
                                                                    <option
                                                                        <?php if($application->maritial_status == 'Single'): ?> selected <?php endif; ?>
                                                                        value="Single">Single</option>
                                                                    <option
                                                                        <?php if($application->maritial_status == 'Married'): ?> selected <?php endif; ?>
                                                                        value="Married">Married</option>
                                                                </select>
                                                                <label for="marital_status">Marital status</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-label-group mt-2">
                                                                <select class="custom-select d-block w-100" id="edu"
                                                                    name="" placeholder="Highest Level"
                                                                    value="" required="">
                                                                    <option value="yes">yes</option>
                                                                    <option value="no">No</option>
                                                                </select>
                                                                <label for="edu">Highest Level of Education
                                                                    Completed/to be Completed</label>
                                                            </div>
                                                        </div>

                                                        
                                                        <!--<div class="col-12 col-sm-6">-->
                                                        <!--    <div class="form-label-group mt-2">-->
                                                        <!--        <select class="custom-select d-block w-100"-->
                                                        <!--            id="addict_to_alcohol_drugs"-->
                                                        <!--            name="addict_to_alcohol_drugs"-->
                                                        <!--            placeholder="Are you addicted to alcohol or drugs">-->
                                                        <!--            <option-->
                                                        <!--                <?php if($application->in_alcoholic == 0): ?>
    selected
    <?php endif; ?>-->
                                                        <!--                value="false">No</option>-->
                                                        <!--            <option-->
                                                        <!--                <?php if($application->in_alcoholic == 1): ?>
    selected
    <?php endif; ?>-->
                                                        <!--                value="true">Yes</option>-->
                                                        <!--        </select>-->
                                                        <!--        <label for="addict_to_alcohol_drugs">Are you addicted to-->
                                                        <!--            alcohol or drugs</label>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                        <div id="msg-in-china" class="invalid-feedback col-12 col-sm-12">
                                                            Please make sure to upload a copy of your current visa.
                                                            China Admissions can not help in any kind of visa Issue.
                                                            If your visa is expiring in 60 days or before the start of the
                                                            program, you can’t apply using China Admissions.
                                                            In this case, please apply to the university directly.
                                                        </div>
                                                        <!--<div class="col-12">-->
                                                        <!--    <div class=" form-label-group mt-2">-->

                                                        <!--        <textarea cols="" rows="3" id="hobbies_interests" name="hobbies_interests"-->
                                                        <!--            placeholder="Hobbies or interests" class="form-control"><?php echo e($application->hobby); ?></textarea>-->
                                                        <!--        <label for="hobbies_interests"-->
                                                        <!--            class="form-control-placeholder">Hobbies or-->
                                                        <!--            interests</label>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                    </div>

                                                    <h5 class="multisteps-form__title">Language Proficiency</h5>
                                                    <div class="form-row ">

                                                        <div class="col-12 mt-2">
                                                            <div class=" form-label-group mt-2">

                                                                <input type="text" id="language_native"
                                                                    name="language_native" data-name="language_native"
                                                                    placeholder="Native language" class="form-control"
                                                                    maxlength=""
                                                                    value="<?php echo e($application->native_language); ?>">
                                                                <label for="language_native"
                                                                    class="form-control-placeholder"> Native
                                                                    language</label>

                                                            </div>
                                                        </div>

                                                        <div class="col-12 mt-2">
                                                            <div class="form-label-group mt-2">
                                                                <select class="custom-select d-block w-100"
                                                                    id="english_level" name="english_level"
                                                                    placeholder="English level" value=""
                                                                    required="">
                                                                    <option value="" selected="">English level
                                                                    </option>
                                                                    <option
                                                                        <?php if($application->english_level == 0): ?> selected <?php endif; ?>
                                                                        value="0"> 0 - None
                                                                    </option>
                                                                    <option
                                                                        <?php if($application->english_level == 1): ?> selected <?php endif; ?>
                                                                        value="1">1 - Poor</option>
                                                                    <option
                                                                        <?php if($application->english_level == 2): ?> selected <?php endif; ?>
                                                                        value="2">2 - fair</option>
                                                                    <option
                                                                        <?php if($application->english_level == 3): ?> selected <?php endif; ?>
                                                                        value="3">3 - Good
                                                                    </option>
                                                                    <option
                                                                        <?php if($application->english_level == 4): ?> selected <?php endif; ?>
                                                                        value="4">4 - Excellent</option>

                                                                </select>
                                                                <label for="english_level">English level</label>
                                                            </div>

                                                        </div>

                                                        

                                                        <div class="col-12 mt-2">
                                                            <div class="form-label-group mt-2">
                                                                <select class="custom-select d-block w-100"
                                                                    id="english_level" name="language_proficiency_english"
                                                                    placeholder="English level" value=""
                                                                    required="" onchange="checkOther(this)">
                                                                    <option value="" selected="">English level
                                                                    </option>
                                                                    <option
                                                                        <?php if($application->english_level == 0): ?> selected <?php endif; ?>
                                                                        value="0"> 0 - None
                                                                    </option>
                                                                    <option
                                                                        <?php if($application->english_level == 1): ?> selected <?php endif; ?>
                                                                        value="1">1 - IELTS</option>
                                                                    <option
                                                                        <?php if($application->english_level == 2): ?> selected <?php endif; ?>
                                                                        value="2">2 - TOEFL</option>
                                                                    <option
                                                                        <?php if($application->english_level == 3): ?> selected <?php endif; ?>
                                                                        value="3">3 - GRE
                                                                    </option>
                                                                    <option
                                                                        <?php if($application->english_level == 4): ?> selected <?php endif; ?>
                                                                        value="4">4 - Duolingo</option>
                                                                    <option
                                                                        <?php if($application->english_level == 5): ?> selected <?php endif; ?>
                                                                        value="5">5 - TOEIC</option>
                                                                    <option
                                                                        <?php if($application->english_level == 6): ?> selected <?php endif; ?>
                                                                        value="6">6 - PTE</option>
                                                                    <option
                                                                        <?php if($application->english_level == 7): ?> selected <?php endif; ?>
                                                                        value="7">7 - Native Language</option>
                                                                    <option
                                                                        <?php if($application->english_level == 8): ?> selected <?php endif; ?>
                                                                        value="8">8 - PTE</option>
                                                                    <option
                                                                        <?php if($application->english_level == 9): ?> selected <?php endif; ?>
                                                                        value="9">9 - other</option>

                                                                </select>
                                                                <label for="certificate_of_english">Certificate of English
                                                                    Proficiency</label>
                                                            </div>

                                                            <div class="form-group mt-3" id="otherEnglishLevel"
                                                                style="display: none;">
                                                                <label for="other_english_level">Please specify your
                                                                    English level:</label>
                                                                <input type="text" id="other_english_level"
                                                                    name="other_english_level" class="form-control"
                                                                    value="<?php echo e(old('other_english_level', $application->other_english_level ?? '')); ?>">
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            </form>

                                            <div class="address">
                                                <form action="" id="home_address">
                                                    <h5 class="multisteps-form__title">Home Address Details</h5>
                                                    <div class="multisteps-form__content">
                                                        <div class="form-row ">
                                                            <input type="hidden" name="id" value="1">
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    

                                                                        <select id="home_country"
                                                                    class="custom-select d-block w-100"
                                                                    name="country" required=""
                                                                    tabindex="0" aria-hidden="false">
                                                                    <option value="">Select Country</option>
                                                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option
                                                                            <?php if($country->id == $application->home_country): ?> selected <?php endif; ?>
                                                                            value="<?php echo e($country->id); ?>">
                                                                            <?php echo e($country->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>

                                                                    <label for="country"
                                                                        class="form-control-placeholder">
                                                                        Country</label>

                                                                    <div class="invalid-feedback">
                                                                        This field is required.
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="home_city" name="city"
                                                                        data-name="city" placeholder="City/Province"
                                                                        class="form-control" maxlength=""
                                                                        value="<?php echo e($application->home_city); ?>">
                                                                    <label for="city"
                                                                        class="form-control-placeholder">
                                                                        City/Province</label>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="home_district"
                                                                        name="district" data-name="district"
                                                                        required="" placeholder="District"
                                                                        class="form-control" maxlength=""
                                                                        value="<?php echo e($application->home_district); ?>">
                                                                    <label for="district"
                                                                        class="form-control-placeholder">
                                                                        District</label>

                                                                    <div class="invalid-feedback">
                                                                        This field is required.
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="home_street" name="street"
                                                                        data-name="street" required=""
                                                                        placeholder="Street" class="form-control"
                                                                        maxlength=""
                                                                        value="<?php echo e($application->home_street); ?>">
                                                                    <label for="street"
                                                                        class="form-control-placeholder">
                                                                        Street</label>

                                                                    <div class="invalid-feedback">
                                                                        This field is required.
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="home_zipcode"
                                                                        name="zipcode" data-name="zipcode" required=""
                                                                        placeholder="Postal/Zip Code" class="form-control"
                                                                        maxlength=""
                                                                        value="<?php echo e($application->home_zipcode); ?>">
                                                                    <label for="zipcode"
                                                                        class="form-control-placeholder">
                                                                        Postal/Zip Code</label>

                                                                    <div class="invalid-feedback">
                                                                        This field is required.
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <!--<div class="col-12 col-sm-6">-->
                                                            <!--    <div class=" form-label-group mt-2">-->

                                                            <!--        <input type="text" id="home_contact"-->
                                                            <!--            name="contact" data-name="contact"-->
                                                            <!--            placeholder="Receiver's name" class="form-control"-->
                                                            <!--            maxlength=""-->
                                                            <!--            value="<?php echo e($application->home_contact_name); ?>">-->
                                                            <!--        <label for="contact"-->
                                                            <!--            class="form-control-placeholder">-->
                                                            <!--            Receiver's name</label>-->

                                                            <!--    </div>-->
                                                            <!--</div>-->
                                                            <!--<div class="col-12 col-sm-6">-->
                                                            <!--    <div class=" form-label-group mt-2">-->

                                                            <!--        <input type="text" id="home_phone" name="phone"-->
                                                            <!--            data-name="phone" required=""-->
                                                            <!--            placeholder="Receiver's Phone Number"-->
                                                            <!--            class="form-control" maxlength=""-->
                                                            <!--            value="<?php echo e($application->home_contact_phone); ?>">-->
                                                            <!--        <label for="phone"-->
                                                            <!--            class="form-control-placeholder">-->
                                                            <!--            Receiver's Phone Number</label>-->

                                                            <!--        <div class="invalid-feedback">-->
                                                            <!--            This field is required.-->
                                                            <!--        </div>-->

                                                            <!--    </div>-->
                                                            <!--</div>-->
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>

                                            <div class="address">
                                                <form action="" id="post_address">
                                                    <h5 class="multisteps-form__title">Postal Address Details</h5>
                                                    <p>(We will send your documents to your postal address. Please make sure
                                                        your address is valid.)</p>
                                                    Same as
                                                    <div class="form-group form-check">

                                                        <input type="checkbox" name="same_home_address"
                                                            class="form-check-input" id="postalAddressCheck"
                                                            value="1">
                                                        <label class="form-check-label" for="postalAddressCheck"
                                                            style="color:var(--secondary_background)">Home Address</label>
                                                    </div>
                                                    <div class="multisteps-form__content">
                                                        <div class="form-row ">
                                                            <input type="hidden" name="id" value="1">
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    

                                                                        <select id="nationality_selection"
                                                                    class="custom-select d-block w-100"
                                                                    name="country" id="post_country" required=""
                                                                    tabindex="0" aria-hidden="false">
                                                                    <option value="">Select Country</option>
                                                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option
                                                                            <?php if($country->id == $application->current_country): ?> selected <?php endif; ?>
                                                                            value="<?php echo e($country->id); ?>">
                                                                            <?php echo e($country->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                    <label for="country"
                                                                        class="form-control-placeholder">
                                                                        Country</label>

                                                                    <div class="invalid-feedback">
                                                                        This field is required.
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="post_city"
                                                                        name="city" data-name="city"
                                                                        placeholder="City/Province" class="form-control"
                                                                        maxlength=""
                                                                        value="<?php echo e($application->current_city); ?>">
                                                                    <label for="city"
                                                                        class="form-control-placeholder">
                                                                        City/Province</label>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="post_district"
                                                                        name="district" data-name="district"
                                                                        required="" placeholder="District"
                                                                        class="form-control" maxlength=""
                                                                        value="<?php echo e($application->current_district); ?>">
                                                                    <label for="district"
                                                                        class="form-control-placeholder">
                                                                        District</label>

                                                                    <div class="invalid-feedback">
                                                                        This field is required.
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="post_street"
                                                                        name="street" data-name="street"
                                                                        required="" placeholder="Street"
                                                                        class="form-control" maxlength=""
                                                                        value="<?php echo e($application->current_street); ?>">
                                                                    <label for="street"
                                                                        class="form-control-placeholder">
                                                                        Street</label>

                                                                    <div class="invalid-feedback">
                                                                        This field is required.
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="post_zipcode"
                                                                        name="zipcode" data-name="zipcode"
                                                                        required="" placeholder="Postal/Zip Code"
                                                                        class="form-control" maxlength=""
                                                                        value="<?php echo e($application->current_zipcode); ?>">
                                                                    <label for="zipcode"
                                                                        class="form-control-placeholder">
                                                                        Postal/Zip Code</label>

                                                                    <div class="invalid-feedback">
                                                                        This field is required.
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            
                                                            
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>


                                            <div id="education">
                                                <!-- Repeater Heading -->
                                                <div
                                                    class="align-items-center d-flex justify-content-between repeater-heading">

                                                    <div class="d-flex flex-column">
                                                        <h5 class="multisteps-form__title">Education
                                                            Background
                                                        </h5>
                                                        <button type="button"
                                                            class="btn btn-primary-bg repeater-add-btn">
                                                            Add Education Background
                                                        </button>
                                                    </div>

                                                </div>
                                                <div class="items" data-index="0" data-group="education_fields">
                                                    <!-- Repeater Item Content -->
                                                    <div class="item-content">
                                                        <div class="form-row  education_fields ">
                                                            <form action=""
                                                                class="form-row  education_form_fields needs-validation"
                                                                novalidate="">
                                                                <input type="hidden"
                                                                    name="education-fields[0][undefined]" value=""
                                                                    id="education-fields_0_undefined">

                                                                <div class="col-12 col-sm-6">
                                                                    <div class=" form-label-group mt-2"
                                                                        style="margin-left:5px;">

                                                                        <input type="text"
                                                                            id="education-fields_0_month_started"
                                                                            name="education-fields[0][month_started]"
                                                                            data-name="month_started" date-field=""
                                                                            data-date="Y-m-d" required=""
                                                                            placeholder="Started"
                                                                            class="form-control flatpickr-input"
                                                                            maxlength="" value="">
                                                                        <label for="education-fields_0_month_started"
                                                                            class="form-control-placeholder">
                                                                            Year attended(from)</label>

                                                                        <div class="invalid-feedback">
                                                                            This field is required.
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-sm-6">
                                                                    <div class=" form-label-group mt-2"
                                                                        style="margin-left:5px;">

                                                                        <input type="text"
                                                                            id="education-fields_0_month_finished"
                                                                            name="education-fields[0][month_finished]"
                                                                            data-name="month_finished" date-field=""
                                                                            data-date="Y-m-d" placeholder="Finished"
                                                                            class="form-control flatpickr-input"
                                                                            maxlength="" value="">
                                                                        <label for="education-fields_0_month_finished"
                                                                            class="form-control-placeholder">
                                                                            year attended(to)</label>

                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-sm-6">
                                                                    <div class=" form-label-group mt-2"
                                                                        style="margin-left:5px;">

                                                                        <input type="text"
                                                                            id="education-fields_0_school"
                                                                            name="education-fields[0][school]"
                                                                            data-name="school" required=""
                                                                            placeholder="School or University"
                                                                            class="form-control" maxlength=""
                                                                            value="">
                                                                        <label for="education-fields_0_school"
                                                                            class="form-control-placeholder">
                                                                            School Name(Full name)</label>

                                                                        <div class="invalid-feedback">
                                                                            This field is required.
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-label-group mt-2" style="margin-left:5px;">
                                                                        <select data-name="country" name="education-fields[0][country]" id="education-fields_0_country" class="form-control">
                                                                            <option value="">Please choose</option>
                                                                            <?php foreach ($countries as $country) : ?>
                                                                                <option value="<?= htmlspecialchars($country->name); ?>">
                                                                                    <?= htmlspecialchars($country->name); ?>
                                                                                </option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                        <label for="education-fields_0_country" class="form-control-placeholder">
                                                                            Country of the institute
                                                                        </label>
                                                                    </div>
                                                                </div>
                             
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-label-group mt-2" style="margin-left:5px;">
                                                                        <select data-name="education_level" name="education-fields[0][education_level]" id="education-fields_0_education_level" class="form-control">
                                                                            <option value="SSC">SSC</option>
                                                                            <option value="HSC">HSC</option>
                                                                            <option value="Bachelor">Bachelor</option>
                                                                            <option value="Masters">Masters</option>
                                                                        </select>
                                                                        <label for="education-fields_0_education_level">Education Level</label>
                                                                    </div>
                                                                </div>
                                                                

                                                                <div class="col-12 col-sm-6">
                                                                    <div class=" form-label-group mt-2"
                                                                        style="margin-left:5px;">

                                                                        <input type="text"
                                                                            id="education-fields_0_field"
                                                                            name="education-fields[0][field]"
                                                                            data-name="field" required=""
                                                                            placeholder="Country Name"
                                                                            class="form-control" maxlength=""
                                                                            value="">
                                                                        <label for="education-fields_0_field"
                                                                            class="form-control-placeholder">
                                                                            Field of study</label>

                                                                        <div class="invalid-feedback">
                                                                            This field is required.
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- Repeater Remove Btn -->
                                                    <div class="pull-right repeater-remove-btn mt-2">
                                                        <button type="button" class="btn btn-secondary remove-btn"
                                                            onclick="$(this).parents('.items').remove()">
                                                            Remove
                                                        </button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <!-- Repeater Items -->

                                                <div id="education-template" class="d-none">
                                                    <div class="form-row form-data">
                                                        <form action=""
                                                            class=" form-row  education_form_fields-before needs-validation"
                                                            novalidate="">
                                                            <input type="hidden" name="id" id="id">
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="school"
                                                                        name="school" data-name="school"
                                                                        required=""
                                                                        placeholder="School or university"
                                                                        class="form-control" maxlength="">
                                                                    <label for="school"
                                                                        class="form-control-placeholder">
                                                                        School</label>

                                                                    <div class="invalid-feedback">
                                                                        This field is required.
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="major"
                                                                        name="major" data-name="major"
                                                                        placeholder="Major" class="form-control"
                                                                        maxlength="">
                                                                    <label for="major"
                                                                        class="form-control-placeholder">
                                                                        Major</label>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="month_started"
                                                                        name="month_started" data-name="month_started"
                                                                        date-field="" data-date="Y-m-d"
                                                                        required="" placeholder="Started"
                                                                        class="form-control flatpickr-input"
                                                                        maxlength="" readonly="readonly">
                                                                    <label for="month_started"
                                                                        class="form-control-placeholder">
                                                                        Started</label>

                                                                    <div class="invalid-feedback">
                                                                        This field is required.
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="month_finished"
                                                                        name="month_finished" data-name="month_finished"
                                                                        date-field="" data-date="Y-m-d"
                                                                        placeholder="Finished"
                                                                        class="form-control flatpickr-input"
                                                                        maxlength="" readonly="readonly">
                                                                    <label for="month_finished"
                                                                        class="form-control-placeholder">
                                                                        Finished</label>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-label-group mt-2 mt-2">
                                                                    <select class="custom-select d-block w-100"
                                                                        id="gpa" name="gpa"
                                                                        placeholder="gpa" value=""
                                                                        required="">
                                                                        <option value="0">Very Low (Grade E Average,
                                                                            40% or less, GPA 1.5 orless)</option>

                                                                        <option value="1"> Below average - (Grade D
                                                                            Average, 45%- 55%, GPA 1.5-2)</option>
                                                                        <option value="2"> Average level - (Grade
                                                                            C-B, 55% - 60%, GPA 2-2.5%)
                                                                        </option>
                                                                        <option value="3"> Above average - (Grade
                                                                            B-A, 60-70%, GPA 2.5-3)
                                                                        </option>
                                                                        <option value="4"> Exceptional - (Grade A,
                                                                            70%+, GPA 3+)</option>
                                                                    </select>
                                                                    <label for="gpa">GPA</label>
                                                                </div>

                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="country"
                                                                        name="country" data-name="country"
                                                                        placeholder="Country name" class="form-control"
                                                                        maxlength="">
                                                                    <label for="country"
                                                                        class="form-control-placeholder">
                                                                        Country</label>

                                                                </div>
                                                            </div>
                                                            <div class="pull-right repeater-remove-btn mt-2">
                                                                <button type="button"
                                                                    class="btn btn-secondary remove-btn"
                                                                    onclick="deleteSchool($(this))">
                                                                    Remove
                                                                </button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>

                                            </div>

                                            <div id="education-data" class="pl-1 pr-1">
                                                <?php if($application->educations->count() > 0): ?>
                                                    <?php $__currentLoopData = $application->educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="form-row form-data">
                                                            <form action=""
                                                                class="form-row  education_form_fields-before needs-validation"
                                                                novalidate="">
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo e($education->id); ?>" id="id">
                                                                <div class="col-12 col-sm-6">
                                                                    <div class=" form-label-group mt-2">

                                                                        <input type="text" id="school"
                                                                            name="school" data-name="school"
                                                                            required=""
                                                                            placeholder="School or university"
                                                                            class="form-control" maxlength=""
                                                                            value="<?php echo e($education->school); ?>">
                                                                        <label for="school"
                                                                            class="form-control-placeholder">
                                                                            School</label>

                                                                        <div class="invalid-feedback">
                                                                            This field is required.
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class=" form-label-group mt-2">

                                                                        <input type="text" id="major"
                                                                            name="major" data-name="major"
                                                                            placeholder="Major" class="form-control"
                                                                            maxlength=""
                                                                            value="<?php echo e($education->major); ?>">
                                                                        <label for="major"
                                                                            class="form-control-placeholder">
                                                                            Major</label>

                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class=" form-label-group mt-2">

                                                                        <input type="text" id="month_started"
                                                                            name="month_started"
                                                                            data-name="month_started" date-field=""
                                                                            data-date="Y-m-d" required=""
                                                                            placeholder="Started"
                                                                            class="form-control flatpickr-input"
                                                                            maxlength=""
                                                                            value="<?php echo e($education->start_date); ?>">
                                                                        <label for="month_started"
                                                                            class="form-control-placeholder">
                                                                            Started</label>

                                                                        <div class="invalid-feedback">
                                                                            This field is required.
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class=" form-label-group mt-2">

                                                                        <input type="text" id="month_finished"
                                                                            name="month_finished"
                                                                            data-name="month_finished" date-field=""
                                                                            data-date="Y-m-d" placeholder="Finished"
                                                                            class="form-control flatpickr-input"
                                                                            maxlength=""
                                                                            value="<?php echo e($education->end_date); ?>">
                                                                        <label for="month_finished"
                                                                            class="form-control-placeholder">
                                                                            Finished</label>

                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class=" form-label-group mt-2">

                                                                        <input type="text" id="gpa"
                                                                            name="gpa" data-name="gpa"
                                                                            placeholder="GPA" class="form-control"
                                                                            maxlength=""
                                                                            value="<?php echo e($education->gpa_type); ?>">
                                                                        <label for="gpa"
                                                                            class="form-control-placeholder">
                                                                            GPA</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class=" form-label-group mt-2">

                                                                        <input type="text" id="country"
                                                                            name="country" data-name="country"
                                                                            required="" placeholder="Country name"
                                                                            class="form-control" maxlength=""
                                                                            value="<?php echo e($education->country); ?>">
                                                                        <label for="country"
                                                                            class="form-control-placeholder">
                                                                            Country</label>

                                                                        <div class="invalid-feedback">
                                                                            This field is required.
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="pull-right repeater-remove-btn mt-2"
                                                                    style="margin-left: 5px">
                                                                    <button type="button"
                                                                        class="btn btn-secondary remove-btn"
                                                                        onclick="deleteSchool($(this))">
                                                                        Remove
                                                                    </button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                <?php endif; ?>
                                            </div>

                                            <div id="workexperience">
                                                <!-- Repeater Heading -->
                                                <div
                                                    class="align-items-center d-flex justify-content-between repeater-heading">
                                                    <div class="d-flex flex-column">
                                                        <h5 class="multisteps-form__title">Work Experience
                                                        </h5>
                                                        <button type="button"
                                                            class="btn btn-primary-bg repeater-add-btn">
                                                            Add Work Experience
                                                        </button>

                                                    </div>


                                                </div>
                                                <div class="clearfix"></div>
                                                <!-- Repeater Items -->

                                                <div id="workexperience-template" class="d-none">
                                                    <div class="form-row form-data">
                                                        <form action=""
                                                            class=" form-row   workexperience_form_fields-before">
                                                            <input type="hidden" name="id">
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="employer"
                                                                        name="employer" data-name="employer"
                                                                        placeholder="Employer" class="form-control"
                                                                        maxlength="">
                                                                    <label for="employer"
                                                                        class="form-control-placeholder">
                                                                        Employer</label>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="job_title"
                                                                        name="job_title" data-name="job_title"
                                                                        placeholder="Job title" class="form-control"
                                                                        maxlength="">
                                                                    <label for="job_title"
                                                                        class="form-control-placeholder">
                                                                        Job title</label>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="month_started"
                                                                        name="month_started" data-name="month_started"
                                                                        date-field="" data-date="Y-m-d"
                                                                        placeholder="Started"
                                                                        class="form-control flatpickr-input"
                                                                        maxlength="" readonly="readonly">
                                                                    <label for="month_started"
                                                                        class="form-control-placeholder">
                                                                        Started</label>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="month_finished"
                                                                        name="month_finished" data-name="month_finished"
                                                                        date-field="" data-date="Y-m-d"
                                                                        placeholder="Finished"
                                                                        class="form-control flatpickr-input"
                                                                        maxlength="" readonly="readonly">
                                                                    <label for="month_finished"
                                                                        class="form-control-placeholder">
                                                                        Finished</label>

                                                                </div>
                                                            </div>
                                                            <div class="pull-right repeater-remove-btn mt-2">
                                                                <button type="button"
                                                                    class="btn btn-secondary remove-btn"
                                                                    onclick="$(this).parents('.workexperience_form_fields-before').remove()">
                                                                    Remove
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="items" data-group="work_data" data-index="0">
                                                    <!-- Repeater Item Content -->
                                                    <div class="item-content">
                                                        <div class="form-row workexperience-fields">
                                                            <form action=""
                                                                class="form-row work_form_fields was-validated">
                                                                <div class="col-12 col-sm-6">
                                                                    <div class=" form-label-group mt-2"
                                                                        style="margin-left: 5px">

                                                                        <input type="text"
                                                                            id="workexperience-fields_0_employer"
                                                                            name="workexperience-fields[0][employer]"
                                                                            data-name="employer" placeholder="Employer"
                                                                            class="form-control" maxlength=""
                                                                            value="">
                                                                        <label for="workexperience-fields_0_employer"
                                                                            class="form-control-placeholder">
                                                                            Employer</label>

                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class=" form-label-group mt-2"
                                                                        style="margin-left: 5px">

                                                                        <input type="text"
                                                                            id="workexperience-fields_0_job_title"
                                                                            name="workexperience-fields[0][job_title]"
                                                                            data-name="job_title"
                                                                            placeholder="Job Title" class="form-control"
                                                                            maxlength="" value="">
                                                                        <label for="workexperience-fields_0_job_title"
                                                                            class="form-control-placeholder">
                                                                            Job title</label>

                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class=" form-label-group mt-2"
                                                                        style="margin-left: 5px">

                                                                        <input type="text"
                                                                            id="workexperience-fields_0_month_started"
                                                                            name="workexperience-fields[0][month_started]"
                                                                            data-name="month_started" date-field=""
                                                                            data-date="Y-m-d" placeholder="Started"
                                                                            class="form-control flatpickr-input"
                                                                            maxlength="" value="">
                                                                        <label for="workexperience-fields_0_month_started"
                                                                            class="form-control-placeholder">
                                                                            Started</label>

                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class=" form-label-group mt-2"
                                                                        style="margin-left: 5px">

                                                                        <input type="text"
                                                                            id="workexperience-fields_0_month_finished"
                                                                            name="workexperience-fields[0][month_finished]"
                                                                            data-name="month_finished" date-field=""
                                                                            data-date="Y-m-d" placeholder="Finished"
                                                                            class="form-control flatpickr-input"
                                                                            maxlength="" value="">
                                                                        <label
                                                                            for="workexperience-fields_0_month_finished"
                                                                            class="form-control-placeholder">
                                                                            Finished</label>

                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                    <!-- Repeater Remove Btn -->
                                                    <div class="pull-right repeater-remove-btn mt-2">
                                                        <button type="button" class="btn btn-secondary remove-btn"
                                                            onclick="$(this).parents('.items').remove()">
                                                            Remove
                                                        </button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>

                                            <div id="workexperience-data" class="pl-1 pr-1">
                                                <?php $__currentLoopData = $application->work_experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work_experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="form-row form-data">
                                                        <form action=""
                                                            class=" form-row   workexperience_form_fields-before">
                                                            <input type="hidden" id="id" name="id"
                                                                value="<?php echo e($work_experience->id); ?>">
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="employer"
                                                                        name="employer" data-name="employer"
                                                                        placeholder="Employer" class="form-control"
                                                                        maxlength=""
                                                                        value="<?php echo e($work_experience->company); ?>">
                                                                    <label for="employer"
                                                                        class="form-control-placeholder">
                                                                        Employer</label>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="job_title"
                                                                        name="job_title" data-name="job_title"
                                                                        placeholder="Job title" class="form-control"
                                                                        maxlength=""
                                                                        value="<?php echo e($work_experience->job_title); ?>">
                                                                    <label for="job_title"
                                                                        class="form-control-placeholder">
                                                                        Job title</label>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="month_started"
                                                                        name="month_started" data-name="month_started"
                                                                        date-field="" data-date="Y-m-d"
                                                                        placeholder="Started"
                                                                        class="form-control flatpickr-input"
                                                                        maxlength=""
                                                                        value="<?php echo e($work_experience->start_date); ?>">
                                                                    <label for="month_started"
                                                                        class="form-control-placeholder">
                                                                        Started</label>

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class=" form-label-group mt-2">

                                                                    <input type="text" id="month_finished"
                                                                        name="month_finished" data-name="month_finished"
                                                                        date-field="" data-date="Y-m-d"
                                                                        placeholder="Finished"
                                                                        class="form-control flatpickr-input"
                                                                        maxlength=""
                                                                        value="<?php echo e($work_experience->end_date); ?>">
                                                                    <label for="month_finished"
                                                                        class="form-control-placeholder">
                                                                        Finished</label>

                                                                </div>
                                                            </div>
                                                            <div class="pull-right repeater-remove-btn mt-2"
                                                                style="margin-left: 5px">
                                                                <button type="button"
                                                                    class="btn btn-secondary remove-btn"
                                                                    onclick="$(this).parents('.workexperience_form_fields-before').remove()">
                                                                    Remove
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>

                                            <div class="button-row d-flex mt-4">

                                                <button id="financialsupport-step"
                                                    class="btn btn-primary-bg ml-auto js-btn-next f-step-none ml-auto"
                                                    type="button" title="Next">Next
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </button>

                                            </div>
                                        </div>

                                        <?php echo $__env->make('Frontend.university.apply-parts.family-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        
                                        <?php echo $__env->make('Frontend.university.apply-parts.document-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php echo $__env->make('Frontend.university.apply-parts.payment-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        <div class="d-none" id="view-application">
                                            <form action="/view/" method="post">
                                                <input type="hidden" name="code">
                                                <input type="hidden" name="email">
                                                <input type="hidden" name="csrfmiddlewaretoken"
                                                    value="D2ErfFCeK4gtXZUv3v4SjLY9WSVz4gQZq25sUGHqf5RqPokv5UyB0HdnCvAiyHUo">
                                            </form>
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
    <div class="tooltip-container no-display" role="alertdialog" id="tooltipText" aria-hidden="true"
        aria-live="polite"></div>
    

    <!-- Modal -->
    <?php echo $__env->make('Frontend.university.apply-parts.upload-modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="modal fade" id="delete_program" tabindex="-1" role="dialog" aria-labelledby="delete_program"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Program</h5>
                    
                </div>
                <div class="modal-body scroll-modal">
                    Are you sure you want to delete this program?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-delete-program-modal"
                        data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary-bg delete-prog" data-code="">Confirm</button>
                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('cus_sc'); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modalElement = document.getElementById('delete_program');

            var cancelButton = modalElement.querySelector('.close-delete-program-modal');

            function closeModal() {
                $('#delete_program').modal('hide');
            }

            cancelButton.addEventListener('click', closeModal);
        });
    </script>

    
    
    <script src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/application.js">
    </script>

    <script src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/wnoty.js"></script>

    <script>
        var base_url = "<?php echo e(url('/')); ?>";
        var application_id = "<?php echo e($application->id); ?>";
        var date = "<?php echo e(date('Y-m-d')); ?>";
    </script>


    <script
        src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/application_details.js">
    </script>
    <script src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/new_application_d.js">
    </script>

    <script>
        $(document).ready(function() {
            <?php $__currentLoopData = $application->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($document->document_name == 'Guarantor’s Passport'): ?>
                    $('.docguarantorpassword').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'Academic Study Plan or Project Proposal'): ?>
                    $('.docacademicstudeorprojectproposal').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'your Personal Statement Letter'): ?>
                    $('.docPersonalStatementLetter').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'International Students Application Form for Undergraduates'): ?>
                    $('.docInternationalSAU').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'Mental Health Report'): ?>
                    $('.docMentalHealthReport').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'Second Recommendation Letter'): ?>
                    $('.docsecondrecommendationletter').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'First Recommendation Letter'): ?>
                    $('.docfirstrecommendationletter').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'English Language Certificate'): ?>
                    $('.docenglish_language_certificate').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'Your Highest Academic Transcript (In English)'): ?>
                    $('.dochighest_academic_transcript').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'No Criminal Record Certificate'): ?>
                    $('.docnocriminalcertificate').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'Medical Examination Form'): ?>
                    $('.docmedicalexamform').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'Your Graduation Certificate (in English)'): ?>
                    $('.docgraduationcertificate').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'Your Photograph'): ?>
                    $('.docphotograph').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'Your Passport Copy'): ?>
                    $('.docpassportcopy').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'your Curriculum Vitae'): ?>
                    $('.docCurriculumVita').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'your Certificate from the Financial Guarantor'): ?>
                    $('.docCertificateFinancialGuarantor').hide();
                <?php endif; ?>
                <?php if($document->document_name == 'your Current Visa Page'): ?>
                    $('.docCurrentVisaPage').hide();
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($application->educations->count() > 0): ?>
                $("#education").createRepeater({
                    showFirstItemToDefault: false,
                });
            <?php else: ?>
                $("#education").createRepeater({
                    showFirstItemToDefault: true,
                });
            <?php endif; ?>
            <?php if($application->work_experiences->count() > 0): ?>
                $("#workexperience").createRepeater({
                    showFirstItemToDefault: false,
                });
            <?php else: ?>
                $("#workexperience").createRepeater({
                    showFirstItemToDefault: true,
                });
            <?php endif; ?>
            <?php if($application->nationality_country): ?>

                var nationality_option = new Option("<?php echo e($application->nationality_country->name); ?>",
                    "<?php echo e($application->nationality); ?>", true, true);
                $('#nationality').append(nationality_option).trigger('change');
            <?php endif; ?>

            $('.flatpickr-input').flatpickr();
            // $('#date_of_birth').flatpickr();
            // $('#passport_expiration_date').flatpickr();
            $(document.body).on("addToCart", function() {
                //show modal layer
                getCart();
                $('#cart-modal').modal("show");
            });
            $(".show-cart").click(function(e) {
                e.preventDefault();
                if (is_cart_empty && total_programs > 0) {
                    window.location = "/account"

                } else {
                    getCart();
                    $('#cart-modal').modal("show");
                }

            });

            //remove program from cart
            $('body').on('click', '.delete', function() {
                var program_id = $(this).find("button").data("program");
                $.ajax({
                    type: "post",
                    url: "/api/program_cart/del/?id=" + program_id,
                    headers: {
                        "Authorization": "Bearer " + Cookies.get("jwt")
                    },
                    success: function(response) {
                        $("#prog-" + program_id).remove();
                        getCart();
                    }
                });
            });
            var post_country = '';
            var post_city = '';
            var post_street = '';
            var post_district = '';
            var post_street = '';
            var post_zipcode = '';
            var post_contact = '';
            var post_phone = '';
            $('#postalAddressCheck').on('click', function() {
                console.log(postalAddressCheck);
                if (this.checked) {
                    post_country = $('#post_country').val();
                    post_city = $('#post_city').val();
                    post_street = $('#post_street').val();
                    post_zipcode = $('#post_zipcode').val();
                    post_district = $('#post_district').val();
                    post_contact = $('#post_contact').val();
                    post_phone = $('#post_phone').val();

                    $('#post_country').val($('#home_country').val());
                    $('#post_district').val($('#home_district').val());
                    $('#post_city').val($('#home_city').val());
                    $('#post_street').val($('#home_street').val());
                    $('#post_zipcode').val($('#home_zipcode').val());
                    $('#post_contact').val($('#home_contact').val());
                    $('#post_phone').val($('#home_phone').val());
                } else {
                    $('#post_country').val(post_country);
                    $('#post_district').val(post_district);
                    $('#post_city').val(post_city);
                    $('#post_street').val(post_street);
                    $('#post_zipcode').val(post_zipcode);
                    $('#post_contact').val(post_contact);
                    $('#post_phone').val(post_phone);
                }

            });
            //Apply to programs
            $(document.body).on("click", ".next-step", function() {
                $(".spinner").removeClass("d-none");
                $(".next-arrow").addClass("d-none");

                var data = {
                    "comments": "",
                    "optional_service": 'none'
                }
                $.ajax({
                    type: "post",
                    headers: {
                        Authorization: "Bearer " + Cookies.get("jwt")
                    },
                    url: "/api/program_cart/apply/",
                    data: JSON.stringify(data),
                    dataType: "json",
                    success: function(response) {
                        $(".spinner").addClass("d-none");
                        $(".next-arrow").removeClass("d-none");
                        if (response.code == 0) {
                            location.href = "/account/application/details/?code=" + response
                                .data.code
                        } else {
                            $.wnoty({
                                type: "error",
                                message: response.msg,
                                autohide: false
                            });
                        }
                    }
                });
            });
        });

        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function() {
                var preview = document.getElementById('imagePreview');
                preview.src = reader.result;
                preview.style.display = 'block';
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var input = document.querySelector("#phone");

            // Initialize intl-tel-input
            var iti = window.intlTelInput(input, {
                initialCountry: "auto",
                geoIpLookup: function(callback) {
                    fetch('https://ipinfo.io/json')
                        .then((resp) => resp.json())
                        .then((resp) => {
                            const countryCode = (resp && resp.country) ? resp.country : "us";
                            callback(countryCode);
                        });
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
            });

            // Add 'has-value' class if there's already a value in the phone input
            input.addEventListener('input', function() {
                if (input.value) {
                    input.classList.add('has-value');
                } else {
                    input.classList.remove('has-value');
                }
            });

            // Add the 'has-value' class on page load if the input has a value
            if (input.value) {
                input.classList.add('has-value');
            }
        });


        // other 

        function checkOther(select) {
            var otherField = document.getElementById('otherEnglishLevel');
            if (select.value == '9') {
                otherField.style.display = 'block';
            } else {
                otherField.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var select = document.getElementById('english_level');
            if (select.value == '9') {
                document.getElementById('otherEnglishLevel').style.display = 'block';
            }
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/university/apply.blade.php ENDPATH**/ ?>