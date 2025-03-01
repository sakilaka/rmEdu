<?php $__env->startSection('title', '- Blogs'); ?>
<?php $__env->startSection('head'); ?>
    <style>
        .shadow-inner::before {
            border-radius: 0.75rem;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>

    <div class="content_search" style="margin-top:70px">
        <link
            href="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/css/blog.css"rel="stylesheet">
        <div class="bg-alice-blue py-3 py-lg-4">
            <div class="container-lg p-2 p-md-5">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <!--Start Category Banner-->
                        <div class="category-banner shadow-inner position-relative text-white px-4 py-5 px-sm-5 mb-4 text-center"
                            style="height:200px!important;">
                            <div class="bottom-0 end-0 overflow-hidden position-absolute start-0 top-0"
                                style="border-radius: 0.75rem;">
                                <img src="<?php echo e(@$banner->image_show); ?>" class="img-fluid wh_sm_100" alt="">
                            </div>
                            <!-- <h2 class="fw-semi-bold my-2 py-5 fs-1 position-relative" style="z-index:2"> Blogs</h2> -->
                            <div class="classic_heading mx-auto">
                                <h2 class="stydent-name mb-4 text-capitalize position-relative"
                                    style="z-index:2; color: white">
                                    <?php echo e(@$banner->title); ?>

                                </h2>
                                <h6 class="position-relative" style="z-index:2; color: white">
                                    Get the latest blogs and insights on various topics. Stay updated with fresh content!
                                </h6>
                            </div>
                        </div>
                        <!--End Category Banner-->

                        <div class="row blog_search mb-3">
                            <div class="col-lg-3 col-md-6">
                                <div class="d-block p-3">
                                    <form>
                                        <div class="input-group">

                                            <input type="text" name="search" value="<?php echo e($search); ?>"
                                                class="bg-white form-control pe-5 box" placeholder="Search "
                                                aria-label="Recipient's username" id="search_item"
                                                style="border-radius: 6px !important">
                                            <button
                                                class="bg-gray btn end-0 m-1 position-absolute px-2 rounded-2 search-brt"
                                                type="submit" id="searchblog">
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
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <form>
                                    <div class="d-block p-3">
                                        <select class="form-select rounded-0 box" aria-label="Default select example"
                                            id="on_click_blog_category" style="border-radius: 6px !important">
                                            <option value='0'>Category: All</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <button id="search_btn" type="submit" style="border: 0; background: no-repeat"
                                        href="#"></button>
                                </form>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="d-block p-3">
                                    <select class="form-select rounded-0 box" id="on_click_blog_topic"
                                        aria-label="Default select example" style="border-radius: 6px !important">
                                        <option value="0">Topic: All</option>
                                        <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($topic->id); ?>"><?php echo e($topic->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="d-block p-3">
                                    <select class="form-select rounded-0 box" aria-label="Default select example"
                                        id="on_click_blog_sort_by" style="border-radius: 6px !important">
                                        <option value="latest">Sort By: Latest</option>
                                        <option value="like">Like</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--Start offcanvas filter-->
                        
                        <!--End offcanvas filter-->
                        <div class="row g-3 blog_cat_ajax-show blog_topic_ajax-show blog_sort_by_ajax-show" id="alldata">
                            
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-4 col-md-6">
                                    <!--Start Course Card-->
                                    <div
                                        class="course-card rounded bg-white position-relative overflow-hidden shadow-none border">
                                        <!--Start Course Image-->
                                        <a href="<?php echo e(route('frontend.blog_details', $blog->id)); ?>"
                                            class="course-card_img d-block pt-4 px-4">
                                            <img src="<?php echo e($blog->image_show); ?>" class="img-fluid rounded-2 w-100"
                                                alt="">
                                        </a>
                                        <!--End Course Image-->
                                        <!--Start Course Card Body-->
                                        <div
                                            class="course-card_body bg-prussian-blue p-4 position-relative m-0 rounded-0 bg-white">
                                            <!--Start Course Title-->
                                            <div class="badge px-0 mb-2">
                                                <a href="" class="fs-14 text-dark-cerulean"
                                                    style="color: var(--header_color)"><?php echo e($blog->b_category->name ?? ''); ?>|</a>
                                                <a href="blog-topic/index.html" class="fs-14 text-dark-cerulean"></a>
                                            </div>
                                            <h3 class="course-card__course--title text-capitalize fs-6">
                                                <a href="<?php echo e(route('frontend.blog_details', $blog->id)); ?>"
                                                    class=" text-decoration-none text_ellipse blog_title"
                                                    style="color: var(--text_color)"> <?php echo e($blog->title); ?></a>
                                            </h3>
                                            <!--End Course Title-->
                                            <!--Start Course instructor-->
                                            <div class="course-card__instructor mb-3">
                                                <div class="course-card__instructor--name text-black-50 text-uppercase fw-medium fs-13 text_ellipse2"
                                                    style="color: var(--text_color)"><?php echo $blog->description; ?></div>
                                            </div>
                                            <!--End Course instructor-->
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="avatar d-flex align-items-center">
                                                        <div class="avatar-img blog me-2"
                                                            style="color: var(--text_color)">
                                                            By
                                                        </div>
                                                        <div class="fs-15 fw-semi-bold text-dark-cerulean"
                                                            style="color: var(--header_color)">
                                                            <?php echo e($blog->author); ?>

                                                            <!--  -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="d-flex justify-content-end project-card_icon w-100">
                                                        <div class="me-3" id="blog_like"
                                                            style="color: var(--text_color)">
                                                            <i class="me-1 far fa-heart"></i>
                                                            <?php echo e($blog->likers->count()); ?>

                                                        </div>
                                                        <div class="" style="color: var(--text_color)"><i
                                                                class="me-1 far fa-eye"></i><?php echo e($blog->views); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Start Course Hints-->
                                        </div>
                                        <!--End Course Card Body-->
                                    </div>
                                    <!--End Course Card-->
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="text-center my-3 blog_filter_off  removebuton_16">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="segment_route" value="">
        <input type="hidden" id="segment_id" value="">

        <script>
            // $('#status').on('change',function(){
            //     $('#search_btn').click();
            // })




            $("#on_click_blog_category").change(function(e) {
                console.log(this);
                e.preventDefault();
                let id = $(this).val();
                //var id = document.getElementsByClassName('on_click_blog_category').value

                console.log(id);
                $.ajax({

                    type: 'GET',

                    url: "<?php echo e(url('blog-category-show-ajax')); ?>/" + id,

                    // data:{id:id},

                    success: function(data) {
                        //  document.getElementById("home-proud-hide").style.visibility = "hidden";
                        $(".blog_cat_ajax-show").html(data);
                    }

                });



            });


            $("#on_click_blog_topic").change(function(e) {
                console.log(this);
                e.preventDefault();
                let id = $(this).val();
                //var id = document.getElementsByClassName('on_click_blog_category').value

                console.log(id);
                $.ajax({

                    type: 'GET',

                    url: "<?php echo e(url('blog-topic-show-ajax')); ?>/" + id,

                    // data:{id:id},

                    success: function(data) {
                        //  document.getElementById("home-proud-hide").style.visibility = "hidden";
                        $(".blog_topic_ajax-show").html(data);
                    }

                });



            });



            $("#on_click_blog_sort_by").change(function(e) {
                console.log(this);
                e.preventDefault();
                let id = $(this).val();
                //var id = document.getElementsByClassName('on_click_blog_category').value

                console.log(id);
                $.ajax({

                    type: 'GET',

                    url: "<?php echo e(url('blog-sort-by-show-ajax')); ?>/" + id,

                    // data:{id:id},

                    success: function(data) {
                        //  document.getElementById("home-proud-hide").style.visibility = "hidden";
                        $(".blog_sort_by_ajax-show").html(data);
                    }

                });



            });













            // $('#searchblog').on('click', function() {

            //     // var blog_category_id = this.value;
            //     $("#segment_route").attr('value',"blog-search");
            //     // $("#segment_id").attr('value',blog_category_id);
            // 	var enterprise_shortname = $("#enterprise_shortname").val();
            // 	var user_id = $("#user_id").val();
            // 	// var forum_id = $("#forum_id").val();
            // 	// if(blog_category_id !='cat_all'){
            // 	var segment_route = 'blog-search';
            // 	// }
            // 	// var segment_id = $("#segment_id").val();

            // 	var search_item = $("#search_item").val();
            // 	$.ajax({
            //         url: base_url + "frontend/blog_filter",
            //         type: "POST",
            //         data: {
            //             'csrf_test_name': CSRF_TOKEN,
            //             // segment_id: segment_id,
            //             segment_route: segment_route,
            //             search_item: search_item,
            //             user_id: user_id,
            //             // blog_category_id: blog_category_id,
            //             enterprise_shortname: enterprise_shortname,

            //         },
            //         success: function(r) {
            //           console.log(r);
            // 		  $("#alldata").html(r);
            // 		  $(".blog_filter_off").remove();

            //         }
            //     });
            // })

            // $('#blogcategory_filter').on('change', function() {
            //     var blog_category_id = this.value;
            // 	// alert(blog_category_id);
            //     $("#segment_route").attr('value',"blog-category");
            //     $("#segment_id").attr('value',blog_category_id);
            // 	var enterprise_shortname = $("#enterprise_shortname").val();
            // 	var user_id = $("#user_id").val();
            // 	var forum_id = $("#forum_id").val();

            // 	if(blog_category_id !='cat_all'){
            // 		var segment_route = 'category';
            // 	}
            // 	var segment_id = $("#segment_id").val();
            // 	$.ajax({
            //         url: base_url + "frontend/blog_filter",
            //         type: "POST",
            //         data: {
            //             'csrf_test_name' : CSRF_TOKEN,
            //             segment_id: segment_id,
            //             segment_route: segment_route,
            //             user_id: user_id,
            //             blog_category_id: blog_category_id,
            //             enterprise_shortname: enterprise_shortname,

            //         },
            //         success: function(r) {
            //         //   console.log(r);
            // 		  $("#alldata").html(r);
            // 		  $(".blog_filter_off").remove();

            //         }
            //     });
            // })
            // $('#blogtopic_filter').on('change', function() {
            //     var topic_id = this.value;
            // 	var enterprise_shortname = $("#enterprise_shortname").val();
            // 	$("#segment_route").attr('value',"blog-topic");
            // 	$("#segment_id").attr('value',topic_id);
            // 	var user_id = $("#user_id").val();
            // 	var forum_id = $("#forum_id").val();
            // 	if(topic_id !='topic_all'){
            // 	var segment_route = 'blogtopic';
            // 	}
            // 	var segment_id = $("#segment_id").val();
            // 	$.ajax({
            //         url: base_url + "frontend/blog_filter",
            //         type: "POST",
            //         data: {
            //             'csrf_test_name': CSRF_TOKEN,
            //             segment_id: segment_id,
            //             segment_route: segment_route,
            //             user_id: user_id,
            //             blog_category_id: topic_id,
            //             enterprise_shortname: enterprise_shortname,

            //         },
            //         success: function(r) {
            //           console.log(r);
            // 		  $("#alldata").html(r);
            // 		  $(".blog_filter_off").remove();

            //         }
            //     });
            // })
            // $('#latest_filter').on('change', function() {
            //     var topic_id = this.value;

            // 	var enterprise_shortname = $("#enterprise_shortname").val();
            // 	if(topic_id == 'like'){
            // 		$("#segment_route").attr('value',"blog-like");
            // 	}else{
            // 		$("#segment_route").attr('value',"desc");
            // 	}

            // 	var user_id = $("#user_id").val();
            // 	var forum_id = $("#forum_id").val();
            // 	// if(topic_id !='topic_all'){
            // 	// var segment_route = 'blogtopic';
            // 	// }
            // 	var segment_route = $("#segment_route").val();
            // 	var segment_id = $("#segment_id").val();
            // 	$.ajax({
            //         url: base_url + "frontend/blog_filter",
            //         type: "POST",
            //         data: {
            //             'csrf_test_name': CSRF_TOKEN,
            //             segment_id: segment_id,
            //             segment_route: segment_route,
            //             user_id: user_id,
            //             blog_category_id: topic_id,
            //             enterprise_shortname: enterprise_shortname,

            //         },
            //         success: function(r) {
            //         //   console.log(r);
            // 		  $("#alldata").html(r);
            // 		  $(".blog_filter_off").remove();

            //         }
            //     });
            // })


            // 	// load more index page
            // 	function loadmore_blog(id) {
            // 	// var course_type = $("#course_type").val();
            // 	var enterprise_shortname = $("#enterprise_shortname").val();
            // 	var user_id = $("#user_id").val();
            // 	var segment_route = $("#segment_route").val();
            // 	var segment_id = $("#segment_id").val();
            // 	var search_item = $("#search_item").val();
            // 		// $(".load").html('<img src="https://lead.academy/assets/source.gif" style="width: 40px;"/>');
            // 		// alert(search_item);
            // 		$.ajax({
            // 			type: "POST",
            // 			url: base_url + enterprise_shortname + "/loadmore-blog",
            // 			cache: false,
            // 			data: {
            // 			lastid: id,
            // 			enterprise_shortname: enterprise_shortname,
            // 			user_id: user_id,
            // 			segment_route:segment_route,
            // 			segment_id:segment_id,
            // 			search_item:search_item,
            // 			csrf_test_name: CSRF_TOKEN,
            // 			},
            // 			success: function (response) {
            // 				// console.log(response);
            // 			$("#alldata").append(response);

            // 			// $("#home_course_load" + ids).remove();
            // 			$(".removebuton_" + id).remove();

            // 			// $(".hideClass .course").each(function (index) {
            // 			// 	var p_course_id = $(this).attr("id");
            // 			// 	$("#course_subscription_" + p_course_id)
            // 			// 	.first()
            // 			// 	.hide();
            // 			// 	$("#course_subscription_" + p_course_id)
            // 			// 	.first()
            // 			// 	.removeClass("d-flex");
            // 			// });
            // 			// $(".popup-youtube").YouTubePopUp();
            // 			},
            // 		});
            // 	}
        </script>
    </div>

    <?php echo $__env->make('Frontend.layouts.parts.news-letter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rmintern/public_html/resources/views/Frontend/pages/blog.blade.php ENDPATH**/ ?>