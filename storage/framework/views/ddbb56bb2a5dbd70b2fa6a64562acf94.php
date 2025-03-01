<?php $__env->startSection('head'); ?>
    <style>
        .cities-card-top {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 1fr;
            gap: 0px 0px;
            grid-template-areas:
                ". . . ";
        }

        .cities-card-top .card {
            width: 23.5rem;
        }

        .cities-card-top {
            display: block;
        }

        .cities-card-top .card {
            width: 100%;
        }

        .cities-card-top .card {
            min-width: 19em !important;
        }

        .ca-card-title {
            font-weight: 700;
            color: #484848;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }


        .uni-showcase * {
            text-align: center;
        }

        .uni-showcase a {
            display: inline-block;
            margin-top: 20px;
        }

        .uni-showcase img {
            max-width: 100%;
            height: auto;
        }

        .uni-showcase .unibox p {
            display: none;
        }

        .btn-txt:hover {
            text-decoration: none;
        }
    </style>

    <link rel="stylesheet"
        href="<?php echo e(asset('frontend/application/modules/frontend/views/themes/default/assets/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
    <!-- Hero Section -->
    <?php echo $__env->make('Frontend.layouts.parts.hero-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Hero Section -->

    <!-- Section 2 -->
    <?php echo $__env->make('Frontend.layouts.parts.section-2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Section 2 -->

    <!-- Seach by City -->
    <?php echo $__env->make('Frontend.layouts.parts.find-university', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End of Seach by City -->

    <!-- University showcase -->
    <?php echo $__env->make('Frontend.layouts.parts.section-3-university-showcase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End of University Showcase -->

    <!--Start Counter-->
    <?php echo $__env->make('Frontend.layouts.parts.counter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--End Counter-->

    <!-- start of University apply steps -->
    <?php echo $__env->make('Frontend.layouts.parts.universities-apply', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End of University apply steps -->

    <!--Start Course Content-->
    <?php echo $__env->make('Frontend.layouts.parts.courses-filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--End Course Content-->


    

    

    <?php echo $__env->make('Frontend.layouts.parts.news-letter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('Frontend.layouts.parts.footer_showcase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/owl.carousel.min.js">
    </script>
    <script src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/main.js"></script>
    <script src="<?php echo e(asset('frontend/application/modules/frontend/views/themes/default/assets/js/axios.min.js')); ?>"></script>

    <script>
        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function checkCookie() {
            var cname = getCookie("cname");
            if (cname != "") {
                alert("Welcome again " + cname);
            }
        }

        function readmoreshowhide1(sl) {
            $(".moreText-" + sl).toggleClass("opened");
            //var set_lang = $('#set_language').val();
            var elem = $("#toggle-" + sl).text();


            // alert(elem);
            // return false;

            if (elem == "Read More") {
                //Stuff to do when btn is in the read more state
                // $("#toggle-" + sl).text('');

                // $("#toggle-" + sl).text('');
                $("#toggle-" + sl).text("Read More");
                $("#text").slideDown();

            } else {
                //Stuff to do when btn is in the read less state
                // $("#toggle-" + sl).text("Read More");

                // $("#toggle-" + sl).text('');

                $("#toggle-" + sl).text("Read Less");
                $("#text").slideUp();

            }

        }

        function readmoreshowhide(sl) {
            $(".moreText-" + sl).toggleClass("opened");
            var set_lang = $('#set_language').val();
            var elem = $("#toggle-" + sl).text();
            if (elem == "আরও পড়ুন") {
                //Stuff to do when btn is in the read more state
                $("#toggle-" + sl).text("সংক্ষিপ্ত করুন");
                $("#text").slideDown();
            } else if (elem == "সংক্ষিপ্ত করুন") {
                //Stuff to do when btn is in the read less state
                $("#toggle-" + sl).text("আরও পড়ুন");
                $("#text").slideUp();
            } else if (elem == "Read More") {
                //Stuff to do when btn is in the read less state
                $("#toggle-" + sl).text("Read Less");
                $("#text").slideUp();
            } else if (elem == "Read Less") {
                //Stuff to do when btn is in the read less state
                $("#toggle-" + sl).text("Read More");
                $("#text").slideUp();
            } else {
                $("#toggle-" + sl).text(set_lang === 'bn' ? "সংক্ষিপ্ত করুন" : "Read Less");
                $("#text").slideUp();
            }

        }


        // showhide(sl);
    </script>

    <script>
        $(".course_price_cart").change(function(e) {
            // $(".course_price_cart").click(function(e){
            e.preventDefault();
            let id = $(this).val();
            console.log(id);

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Home Sub Category
        $(".home_on_click_subcategory").click(function(e) {
            e.preventDefault();
            var id = $(this).attr('home_subcat_id');
            $.ajax({

                type: 'GET',

                url: "<?php echo e(url('home_course-type-ajax')); ?>/" + id,

                // data:{id:id},

                success: function(data) {
                    //  document.getElementById("home-proud-hide").style.visibility = "hidden";
                    $(".popular_ajax-show").html(data);
                }

            });



        });
        $('.change_cart_val').on('change', function() {
            console.log(this.id);
            if (this.id == "course_subcribe" + $(this).attr('course_id')) {
                $('.course_subcribe' + $(this).attr('course_id')).show();
                $('.course_cart_price' + $(this).attr('course_id')).hide();
            } else {
                $('.course_subcribe' + $(this).attr('course_id')).hide();
                $('.course_cart_price' + $(this).attr('course_id')).show();
            }
            //if($(th)
        });
    </script>

    <script src="<?php echo e(asset('backend/lib/select2/js/select2.min.js')); ?>"></script>
    <script>
        $('.select2_form_select').select2();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rmintern/public_html/resources/views/Frontend/index.blade.php ENDPATH**/ ?>