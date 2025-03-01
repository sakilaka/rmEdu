@extends('Frontend.layouts.master-layout')

@section('head')
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
        href="{{ asset('frontend/application/modules/frontend/views/themes/default/assets/css/select2.min.css') }}">
@endsection

@section('main_content')
    <!-- Hero Section -->
    @include('Frontend.layouts.parts.hero-section')
    <!-- Hero Section -->

    <!-- Section 2 -->
    @include('Frontend.layouts.parts.section-2')
    <!-- Section 2 -->

    <!-- Seach by City -->
    @include('Frontend.layouts.parts.find-university')
    <!-- End of Seach by City -->

    <!-- University showcase -->
    @include('Frontend.layouts.parts.section-3-university-showcase')
    <!-- End of University Showcase -->

    <!--Start Counter-->
    @include('Frontend.layouts.parts.counter')
    <!--End Counter-->

    <!-- start of University apply steps -->
    @include('Frontend.layouts.parts.universities-apply')
    <!-- End of University apply steps -->

    <!--Start Course Content-->
    @include('Frontend.layouts.parts.courses-filter')
    <!--End Course Content-->


    {{--  <link href="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/css/owl.carousel.min.css"
        rel="stylesheet">
    <link
        href="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/css/owl.theme.default.min.css"
        rel="stylesheet">
    <style>
        /* Collabration Text */

        .coll_text {
            padding-top: 50px;
            font-family: 'Times New Roman', Times, serif;
        }

        #counter .logo-holder {
            width: 100%;
            display: block;
        }

        #counter .logo-holder img {
            height: 40px;
            max-width: inherit;
            width: auto;
            float: left;
            margin-right: 15px;
        }

        #counter .logo-holder h3 {
            display: inline-block;
            background: linear-gradient(90deg, #EA7D26 18.98%, #EDAC1F 81.39%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-emphasis-color: transparent;
            font-weight: 600;
            padding-top: 15px;
        }

        #counter .logo-holder .justify-content-center {
            display: inline-flex;
            margin-bottom: 5px;
            margin-top: 10px;
        }

        .logo-container ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: inline-block;
        }

        .logo-container {
            padding: 0px 50px;
        }

        .logo-container .logo-holder {
            background: #fff;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
            display: flex;
            height: 120px;
        }

        .logo-container .logo-holder img {
            max-height: 60px;
            max-width: 50%;
            width: auto;
            margin: auto;
        }

        .owl-dots {
            position: absolute;
            bottom: -30px;
            left: 50%;
            -webkit-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }

        .owl-dots .owl-dot {
            background: #C4C4C4;
            border-radius: 50%;
            width: 10px;
            height: 10px;
            float: left;
            margin-right: 10px;
        }

        .owl-dots .owl-dot.active {
            background: #494CA2;
        }

        .s_img1,
        .s_img2,
        .s_img3,
        .s_img4 {
            width: 30%;
        }

        .s_text1 {
            background: linear-gradient(90deg, #EA7D26 18.98%, #EDAC1F 81.39%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-emphasis-color: transparent;
            font-weight: 600;
        }


        /* Collabration Text */
    </style> --}}

    {{-- @include('Frontend.layouts.parts.testimonials') --}}

    @include('Frontend.layouts.parts.news-letter')

    @include('Frontend.layouts.parts.footer_showcase')
@endsection
@section('script')
    <script src="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/js/owl.carousel.min.js">
    </script>
    <script src="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/js/main.js"></script>
    <script src="{{ asset('frontend/application/modules/frontend/views/themes/default/assets/js/axios.min.js') }}"></script>

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

                url: "{{ url('home_course-type-ajax') }}/" + id,

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

    <script src="{{ asset('backend/lib/select2/js/select2.min.js') }}"></script>
    <script>
        $('.select2_form_select').select2();
    </script>
@endsection
