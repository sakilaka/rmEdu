<?php $__env->startSection('title', '- Events'); ?>
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>


    <div class="content_search" style="margin-top:70px">
        <link href="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/css/blog.css"
            rel="stylesheet">

        <div class="bg-alice-blue py-3 py-lg-4">
            <div class="container-lg p-2 p-md-5">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <!--Start Category Banner-->
                        <div class="category-banner mb-4 position-relative px-4 px-sm-5 py-5 text-center text-white hero-header"
                            style="height:200px!important;">
                            <div class="bottom-0 end-0 overflow-hidden position-absolute start-0 top-0"
                                style="border-radius: 0.75rem">
                                <img src="<?php echo e(@$banner->image_show); ?>" class="img-fluid wh_sm_100" alt="">
                            </div>
                            <!-- <h2 class="fw-semi-bold my-2 py-5 fs-1">Lead Academy Live</h2> -->
                            <div class="eventPage_heading mx-auto">
                                <h2 class="stydent-name mb-4 text-capitalize position-relative" style="z-index:2">
                                    <?php echo e(@$banner->title); ?></h2>
                                <h6 class="position-relative" style="z-index:2"><?php echo @$banner->details; ?> </h6>
                            </div>
                        </div>
                        <!--End Category Banner-->

                        <div class="row blog_search mb-4 g-3">

                            <div class="col-xl-5 col-md-6">
                                <div class="d-block p-3">
                                    <Form>
                                        <div class="input-group course-search">
                                            <input type="text" class="bg-white form-control pe-5 box"
                                                placeholder="Search For Event" name="name" value="<?php echo e($name); ?>"
                                                aria-label="Recipient's username" id="search_item"
                                                style="border-radius: 6px !important">
                                            <button
                                                class="bg-gray btn end-0 m-1 position-absolute px-2 rounded-2 search-brt"
                                                type="submit" id="searchevent">
                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.74112 10.7266C9.57692 10.7266 11.8758 8.56674 11.8758 5.90242C11.8758 3.2381 9.57692 1.07825 6.74112 1.07825C3.90532 1.07825 1.60645 3.2381 1.60645 5.90242C1.60645 8.56674 3.90532 10.7266 6.74112 10.7266Z"
                                                        stroke="#07477D" stroke-width="1.28367" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M13.1592 11.9326L10.3672 9.30945" stroke="#07477D"
                                                        stroke-width="1.28367" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>

                                            </button>
                                        </div>
                                    </Form>
                                </div>
                            </div>


                            <div class="col-xl-4 col-md-6">
                                <div class="d-block p-3">
                                    <select id="event_category" class="form-select box on_click_eventcategory"
                                        aria-label="Default select example" style="border-radius: 6px !important">
                                        <option value="0">Category: All</option>
                                        <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>">
                                                <?php echo e($category->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="d-block p-3">
                                    <select id="event_release" class="form-select rounded-0 box on_click_eventrelease"
                                        aria-label="Default select example" style="border-radius: 6px !important">
                                        <option value='allevent'>Event: All</option>
                                        <option value="0">Passed Event</option>
                                        <option value="1">Upcoming event</option>
                                        <option value="2">Live event</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 event_cat_ajax-show show-events-data event_relese_ajax-show">

                            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                    <!--Start Course Card-->
                                    <div class="course-card rounded-3 bg-white position-relative overflow-hidden">
                                        <div class="position-relative">
                                            <!--Start Course Image-->
                                            <a href="<?php echo e(route('frontend.event.details', $event->id)); ?>" class="">
                                                <img src="<?php echo e($event->image_show ?? ''); ?>" class="img-fluid w-100 imgdiv"
                                                    alt="" style="object-fit: contain">
                                            </a>
                                            <!--End Course Image-->
                                            <div class="end-0 p-2 position-absolute start-0 top-1">
                                                <!-- $todaydate<strtotime($start_date->meeting_date) && time() < strtotime($event->event_start_time) -->
                                                <span class="fw-semi-bold mb-1 py-1 px-2 text-white rounded"
                                                    style="background-color: var(--secondary_background);">
                                                    <?php if(@$event->release_id == '0'): ?>
                                                        Passed Event
                                                    <?php elseif(@$event->release_id == '1'): ?>
                                                        Upcoming Event
                                                    <?php else: ?>
                                                        Live Event
                                                    <?php endif; ?>
                                                </span>
                                                
                                            </div>
                                            <!--Start Course Card Body-->
                                            <div
                                                class="course-card_body bg-prussian-blue text-white p-3 top_shadow position-relative">
                                                <!--Start Course Title-->
                                                <h3 class="course-card__course--title text-uppercase fs-6 mb-3">
                                                    <a href="<?php echo e(route('frontend.event.details', $event->id)); ?>"
                                                        class="text-decoration-none"
                                                        style="color: var(--primary_background)"><?php echo e($event->name); ?></a>
                                                </h3>
                                                <!--End Course Title-->
                                                <!--Start Course Hints-->
                                                <table class="course-card__hints table table-borderless table-sm"
                                                    style="color: var(--product_text_color)">
                                                    <tbody>

                                                        <tr>
                                                            <td class="ps-0">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="course-card__hints--icon me-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12.354" height="17.188"
                                                                            viewBox="0 0 12.354 17.188">
                                                                            <path data-name="Path 9"
                                                                                d="M72.537,15.308A.537.537,0,0,1,72,14.771V2.216A2.218,2.218,0,0,1,74.216,0h9.6a.537.537,0,0,1,.537.537V12.891a.537.537,0,1,1-1.074,0V1.074H74.216a1.143,1.143,0,0,0-1.141,1.141V14.771A.537.537,0,0,1,72.537,15.308Z"
                                                                                transform="translate(-72)"
                                                                                fill="var(--primary_background)" />
                                                                            <path data-name="Path 10"
                                                                                d="M83.817,372.834h-9.4a2.417,2.417,0,1,1,0-4.834h9.4a.537.537,0,1,1,0,1.074h-9.4a1.343,1.343,0,0,0,0,2.686h9.4a.537.537,0,1,1,0,1.074Z"
                                                                                transform="translate(-72 -355.646)"
                                                                                fill="var(--primary_background)" />
                                                                            <path data-name="Path 11"
                                                                                d="M137.937,425.074h-9.4a.537.537,0,1,1,0-1.074h9.4a.537.537,0,0,1,0,1.074Z"
                                                                                transform="translate(-126.12 -409.766)"
                                                                                fill="var(--primary_background)" />
                                                                            <path data-name="Path 12"
                                                                                d="M144.537,13.428a.537.537,0,0,1-.537-.537V.537a.537.537,0,1,1,1.074,0V12.891A.537.537,0,0,1,144.537,13.428Z"
                                                                                transform="translate(-141.582)"
                                                                                fill="var(--primary_background)" />
                                                                        </svg>
                                                                    </div>
                                                                    <div class="fw-bold">
                                                                        <?php echo e(date('d F', strtotime($event->startdate))); ?>-<?php echo e(date('d F', strtotime($event->enddate))); ?>

                                                                        

                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="ps-0">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="course-card__hints--icon me-2">
                                                                        <svg data-name="clock (1)"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16.706" height="16.706"
                                                                            viewBox="0 0 16.706 16.706">
                                                                            <path data-name="Path 13"
                                                                                d="M8.353,0a8.353,8.353,0,1,0,8.353,8.353A8.363,8.363,0,0,0,8.353,0Zm0,15.662a7.309,7.309,0,1,1,7.309-7.309,7.317,7.317,0,0,1-7.309,7.309Z"
                                                                                fill="var(--primary_background)" />
                                                                            <path data-name="Path 14"
                                                                                d="M208.838,83.118h-1.044v5.437l3.285,3.285.738-.738-2.979-2.979Z"
                                                                                transform="translate(-199.963 -79.985)"
                                                                                fill="var(--primary_background)" />
                                                                        </svg>
                                                                    </div>
                                                                    <div class="course-card__hints--text fw-bold">
                                                                        <?php echo e(date('h:i A', strtotime($event->startdate))); ?>-<?php echo e(date('h:i A', strtotime($event->enddate))); ?>

                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="ps-0">
                                                                <div class="d-flex align-items-center">

                                                                    <div class="course-card__hints--icon me-3">
                                                                        <svg id="document"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="17.26" height="14.926"
                                                                            viewBox="0 0 17.26 14.926">
                                                                            <path id="Path_148" data-name="Path 148"
                                                                                d="M16.065,17.081H1.2a1.2,1.2,0,0,0-1.2,1.2V28.364a1.2,1.2,0,0,0,1.2,1.2h8.67l-.262,1.6a.69.69,0,0,0,1.041.75l1.871-.985a.393.393,0,0,1,.248,0l1.871.985a.834.834,0,0,0,.388.1.656.656,0,0,0,.387-.123.726.726,0,0,0,.266-.728l-.262-1.6h.651a1.2,1.2,0,0,0,1.2-1.2V18.277A1.2,1.2,0,0,0,16.065,17.081ZM12.64,27.511a2.084,2.084,0,1,1,2.084-2.084A2.086,2.086,0,0,1,12.64,27.511Zm.6,2.5a1.383,1.383,0,0,0-1.2,0l-1.323.7.42-2.565a3.1,3.1,0,0,0,3.007,0l.164,1v.005l.256,1.56Zm2.994-1.651a.173.173,0,0,1-.171.171h-.819l-.187-1.142s0-.009,0-.013a3.108,3.108,0,1,0-4.831,0l0,.013-.187,1.142H1.2a.173.173,0,0,1-.171-.171V18.277a.173.173,0,0,1,.171-.171H16.065a.173.173,0,0,1,.171.171Z"
                                                                                transform="translate(0 -17.081)"
                                                                                fill="var(--primary_background)" />
                                                                            <path id="Path_149" data-name="Path 149"
                                                                                d="M43.246,60.243H31.631a.512.512,0,0,0,0,1.025H43.246a.512.512,0,0,0,0-1.025Z"
                                                                                transform="translate(-28.993 -57.295)"
                                                                                fill="var(--primary_background)" />
                                                                            <path id="Path_150" data-name="Path 150"
                                                                                d="M36.55,100.911H31.631a.512.512,0,0,0,0,1.025H36.55a.512.512,0,0,0,0-1.025Z"
                                                                                transform="translate(-28.993 -95.184)"
                                                                                fill="var(--primary_background)" />
                                                                        </svg>
                                                                    </div>
                                                                    <div class="course-card__hints--text fs-12 fw-bold">
                                                                        <?php echo e(@$event->organization_name); ?></div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <!--End Course Hints-->
                                            </div>
                                            <!--End Course Card Body-->
                                        </div>
                                        <div class="course-card_footer g-2 p-3">

                                            <input type="hidden" name="course_id" id="course_id_LEO094W9R9"
                                                value="LEO094W9R9">
                                            <input type="hidden" name="course_name" id="course_name_LEO094W9R9"
                                                value="Web Development with Mern Stack">
                                            <input type="hidden" name="slug" id="slug_LEO094W9R9" value="">
                                            <input type="hidden" name="qty" id="qty" value="1">
                                            <input type="hidden" name="price" id="price_LEO094W9R9" value="0">
                                            <input type="hidden" name="old_price" id="old_price_LEO094W9R9"
                                                value="0">
                                            <input type="hidden" name="picture" id="picture_LEO094W9R9"
                                                value="<?php echo e(asset('frontend')); ?>/assets/uploads/course/1699527091-f-Live-class-thumb.png">
                                            <input type="hidden" name="is_course_type" id="iscourse_type"
                                                value="4">

                                            

                                            <div class="d-flex justify-content-between align-items-stretch">

                                                <?php
                                                    $check_event = 0;
                                                    if (auth()->check()) {
                                                        $save = \App\Models\EventCart::where('event_id', $event->id)
                                                            ->where('user_id', auth()->user()->id)
                                                            ->first();
                                                        if ($save) {
                                                            $check_event = 1;
                                                        }
                                                    }
                                                ?>
                                                


                                                <div class="flex-grow-1">
                                                    <a type="button"
                                                        class="align-items-center btn btn-primary-bg d-flex justify-content-between px-2 w-100"
                                                        href="<?php echo e(route('frontend.event.details', $event->id)); ?>">

                                                        <svg width="16" height="17" viewBox="0 0 16 17"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                                            <rect width="15.5325" height="15.5325"
                                                                transform="matrix(-1 0 0 1 15.8613 0.721741)"
                                                                fill="url(#pattern0)" />
                                                            <defs>
                                                                <pattern id="pattern0"
                                                                    patternContentUnits="objectBoundingBox" width="1"
                                                                    height="1">
                                                                    <use xlink:href="#image0_228_160"
                                                                        transform="scale(0.00653595)" />
                                                                </pattern>
                                                                <image id="image0_228_160" width="153" height="153"
                                                                    xlink:href="data:image/png;base64,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" />
                                                            </defs>
                                                        </svg>
                                                        <span class="w-100"
                                                            style="color: var(--button2_text_color)">Details</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Course Card-->
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($events->count() == 0): ?>
                                <div class="text-center">
                                    <h2>Data Not Found !</h2>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if($events->lastPage() != 1): ?>
                            <div class="text-center my-3 loadbutton_filter_off  removebuton_86">
                                <button type="button" class="btn btn-lg btn-dark-cerulean" id="showMoreEvent">
                                    Load more <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56"
                                        height="15.666" viewBox="0 0 28.56 15.666">
                                        <path id="right-arrow_3_" data-name="right-arrow (3)"
                                            d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                                            transform="translate(0 -107.5)" fill="var(--primary_background)"></path>
                                    </svg>
                                </button>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>


        <input type="hidden" id="segment_route" value="">
        <input type="hidden" id="segment_id" value="">




    </div>

    
    <?php echo $__env->make('Frontend.layouts.parts.news-letter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });


        //Event Relete Show
        $(".on_click_eventrelease").change(function(e) {
            e.preventDefault();
            let id = $(this).val();
            let cat_id = $("#event_category").val();
            let s_val = $('#search_item').val();
            console.log(id)
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('event-relese-show-ajax')); ?>/" + id + "?cat_id=" + cat_id + '&search=' +
                    s_val,
                success: function(data) {
                    $(".event_relese_ajax-show").html(data);
                }

            });

        });



        $(".on_click_eventcategory").change(function(e) {
            console.log(this);
            e.preventDefault();
            let id = $(this).val();
            //var id = document.getElementsByClassName('on_click_eventcategory').value

            console.log(id);
            $.ajax({

                type: 'GET',

                url: "<?php echo e(url('event-category-show-ajax')); ?>/" + id,

                // data:{id:id},

                success: function(data) {
                    //  document.getElementById("home-proud-hide").style.visibility = "hidden";
                    $(".event_cat_ajax-show").html(data);
                }

            });



        });



        //events lode more
        var curPageNum = "<?php echo e($events->currentPage()); ?>";
        var lastPage = "<?php echo e($events->lastPage()); ?>";
        let pageN = curPageNum;
        // console.log(department);
        $('#showMoreEvent').on('click', function() {
            // console.log(searchval);
            if (parseInt(lastPage) > parseInt(curPageNum)) {
                pageN = parseInt(curPageNum) + 1;
                let url = '<?php echo e(url('get-events-all')); ?>' + "?page=" + pageN;
                axios.get(url)
                    .then(res => {
                        // console.log(res);
                        curPageNum = parseInt(curPageNum) + 1;

                        $('.show-events-data').append(res.data);
                        if (parseInt(lastPage) == parseInt(curPageNum)) {
                            $(this).parent().hide();
                        }

                    });
            } else {
                $(this).parent().hide();
            }

        });




        function makeTimer() {
            var countdowntime = "<?php echo e(date('d F Y H:i:s', strtotime($event->eventstarttime))); ?>";


            var endTime = new Date(countdowntime);
            endTime = (Date.parse(endTime) / 1000);

            var now = new Date();
            now = (Date.parse(now) / 1000);

            if (now < endTime) {

                var timeLeft = endTime - now;

                var days = Math.floor(timeLeft / 86400);
                var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
                var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

                if (hours < "10") {
                    hours = "0" + hours;
                }
                if (minutes < "10") {
                    minutes = "0" + minutes;
                }
                if (seconds < "10") {
                    seconds = "0" + seconds;
                }
                $("#days").html(days + "<p class='timeText fs-6 mb-0'>days</p>");
                // $("#days").html(days + "<p class='timeText fs-6 mb-0'>days</p>");
                $("#hours").html(hours + "<p class='timeText fs-6 mb-0'>Hours</p>");
                $("#minutes").html(minutes + "<p class='timeText fs-6 mb-0'>Mins</p>");
                if (days == '0' && hours == '00' && minutes == '00' && seconds == '01') {
                    $("#seconds").html("00" + "<p class='timeText fs-6 mb-0'>Sec</p>");
                } else {
                    $("#seconds").html(seconds + "<p class='timeText fs-6 mb-0'>Sec</p>");
                }
            }

        }
        setInterval(function() {
            makeTimer();

        }, 1000);
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/pages/eventlist.blade.php ENDPATH**/ ?>