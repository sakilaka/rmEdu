@extends('user.layouts.master-layout')
@section('head')
@section('title','- My Favorite List')

@endsection
@section('main_content')

    

<!-- Main content -->    

<div class="content_search" >
  <div class="bg-alice-blue py-3 py-lg-4">
  <div class="container-lg">

    <div class="right_section">
      <div>
          <h4><b>My Favorite Program List</b></h4>
      </div>
  </div>
      <!--Start breadcrumb-->

      <!--End breadcrumb-->
      <div class="row mt-3">
          <div class="col-md-12 sticky-content">
              <div id="alldata">
                  <div class="row  gx-3 gy-4">
                    @foreach ($saves as $save)
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 hideClass" id="50">
                            <!--Start Course Card-->
                            <div
                                class="course-card course-card-shadow rounded-6 bg-white position-relative overflow-hidden">
                                <div class="position-relative overflow-hidden bg-prussian-blue">
                                    <!--Start Course Image-->
                                    <a href="{{ route('frontend.course.details',$save->course->id) }}"
                                        class="course-card_img">
                                        <img src="{{ $save->course->university->image_show ?? ''}}"
                                            class="img-fluid w-100" style="height: 140px" alt="">
                                    </a>
                                    <!--End Course Image-->
                                    <div
                                        class="align-items-center top-0 d-flex fs-12 position-absolute px-3 py-2 start-0 text-white w-100 z-index-2">
                                        <input type="hidden" value="CO09ICCG850"
                                            id="course_id">
                                        <input type="hidden" value="" id="student_id">
                                        <input type="hidden" value="" id="user_type">

                                    @php
                                    $is_save = 0;
                                    if(auth()->check()){
                                        $save = \App\Models\CourseSave::where('course_id',$save->course->id)->where('user_id',auth()->user()->id)->first();
                                        if($save){
                                            $is_save = 1;
                                        }
                                    }
                                    @endphp

                                    <a href="javascript:void(0)" @if($is_save == 1) style="color: #00a662;" @endif class="text-center add-save" c_id="{{ $save->course->id }}">
                                        <i class="far fa-bookmark ml-4" style="cursor: pointer;font-size: 30px;"></i>

                                    </a>
                                    </div>
                

                                    <!--Start Course Card Body-->
                                    <div class="bg-prussian-blue course-card_body course_middle px-3 py-2 text-white py-12">
                                        <!--Start Course Title-->
                                        <h3 class="course-card__course--title  mb-0">
                                            <!-- <a href=""
                                                class="text-decoration-none text-white"></a> -->
                                                <a href="{{ route('frontend.course.details',$save->course->id) }}"
                                                        class="text-decoration-none text-white" style="height:20px;">{{ $save->course->name }}</a></h3>
                                        <!--End Course Title-->
                                        <div class="course-card__instructor d-flex align-items-center">
                                            <div class="card__instructor--name my-0">
                                                <a class="text-capitalize instructor-name"
                                                    href="{{ route('frontend.course.details',$save->course->id) }}"></a>
                                            </div>
                                        </div>
                                        <!--Start Course Hints-->
                                        <table class="course-card__hints table table-borderless table-sm text-white mb-0">
                                            <tbody>
                                                <tr style="height:1px">
                                                    <td width="80" class="ps-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="course-card__hints--icon me-3">
                                                                <div class="d-flex align-items-center" >
                                                                    <div class="bar-custom me-2">
                                                                        <span class="fill"></span>
                                                                        <span></span>
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="course-card__hints--text fs-12 fw-bold" style="color: var(--product_text_color)"> {{ @$save->course->university->name }}</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                                <tr style="height:1px">
                                                    <td width="80" class="ps-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="course-card__hints--icon me-3">
                                                                <div class="d-flex align-items-center" >
                                                                    <div class="bar-custom me-2">
                                                                        <span class="fill"></span>
                                                                        <span></span>
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="course-card__hints--text fs-12 fw-bold" style="color: var(--product_text_color)">Department: {{ @$save->course->department->name }}</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr style="height:1px">
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
                                                                        fill="var(--button2_color)" />
                                                                    <path id="Path_149" data-name="Path 149"
                                                                        d="M43.246,60.243H31.631a.512.512,0,0,0,0,1.025H43.246a.512.512,0,0,0,0-1.025Z"
                                                                        transform="translate(-28.993 -57.295)"
                                                                        fill="var(--button2_color)" />
                                                                    <path id="Path_150" data-name="Path 150"
                                                                        d="M36.55,100.911H31.631a.512.512,0,0,0,0,1.025H36.55a.512.512,0,0,0,0-1.025Z"
                                                                        transform="translate(-28.993 -95.184)"
                                                                        fill="var(--button2_color)" />
                                                                </svg>
                                                            </div>
                                                            <div class="course-card__hints--text fs-12 fw-bold" style="color: var(--product_text_color)">Degree: {{ @$save->course->degree->name }}</div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <!--End Course Hints-->
                                    </div>
                                    <!--End Course Card Body-->
                                    <!--Start Course Card Hover Content-->

                                </div>
                                <div class="course-card_footer g-2 px-3 py-12">
                                <!-- before purchase  -->
                                    <!-- add to cart  -->
                                    <input type="hidden" name="course_id" id="course_id_CO09ICCG850" value="CO09ICCG850">
                                    <input type="hidden" name="course_name" id="course_name_CO09ICCG850" value="Fast Track Spoken English &amp; Fluency">
                                    <input type="hidden" name="slug" id="slug_CO09ICCG850" value="fast-track-spoken-english-&amp;-fluency">
                                    <input type="hidden" name="qty" id="qty" value="1">
                                    <input type="hidden" name="price" id="price_CO09ICCG850" value="1200">
                                    <input type="hidden" name="old_price" id="old_price_CO09ICCG850" value="2000">
                                    <input type="hidden" name="picture" id="picture_CO09ICCG850" value="{{ asset('frontend') }}/assets/uploads/course/Thumb1681378103-f-Spoken-English-Mini-thumb.png">
                                    <input type="hidden" name="is_course_type" id="iscourse_type" value="0">
                                    <input type="hidden" name="affiliator_id" id="affiliator_id" value="">
                                    <input type="hidden" name="course_price" id="course_price" value="1200">
                                    <input type="hidden" name="student_discount" id="student_discount" value="">
                                    <!-- add to cart  -->
                                    <div class="d-block">
                        
                                        <div class="form-check d-flex align-items-center ps-0">
                                            {{-- <input class="me-1 active" style="width:21px;height:21px" type="radio" checked> --}}
                                            <label
                                                class="align-items-center d-flex form-check-label fw-bold justify-content-between"
                                                style="width:100%"
                                                for="flexRadioDefault2_CO09ICCG850">
                                                <span class="course_price_cart"> Tuition Fee <span class="text-success"></span></span>
                                                <span class="align-items-center d-flex  rounded text-center">
                                                    <span class="d-block fs-16 fw-bold me-2 text-success2">${{ $save->course->year_fee }}</span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-stretch mt-2">
                                            <div class="flex-grow-1">
                                                <a href="{{ route('frontend.course.details',$save->course->id) }}"
                                                    class="btn btn-dark-cerulean w-100 btn-details fw-bold fs-13" style="height: 23px;">
                                                    <span class="shopping me-1 shopping_icon position-relative">
                                                        <img class="me-1"
                                                            src="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/img/details.png"
                                                            style="width: 14px;">
                                                    </span>
                                                    <span class="text-center w-100 fw-bold fs-13" style="color: var(--button2_text_color)">Details</span>
                                                </a>
                                            </div>
                        
                                            <div class="flex-grow-1 me-2 w-sub" style="margin-left: 20px">
                        
                                                <a href="{{ route('apply_cart', $save->course->id) }} "
                                                    class="btn btn-dark-cerulean w-100 btn-cart-2 fs-10" style="height: 23px;">
                                                    <span class="shopping me-1 shopping_icon position-relative">
                                                        <img src="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/img/cart.png"
                                                            style="width: 14px;">
                                                    </span>
                                                    <span class="text-center w-100 fw-bold fs-13" style="color: var(--button2_text_color)!important">
                                                        Apply Now
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--Start End Card Hover Content-->
                            </div>
                            <!--End Course Card-->
                        </div>
                    @endforeach
                 </div>
              </div>
          </div>
      </div>

  </div>
</div>

<script type="text/javascript">
("use strict");
function all_course_load(ids) {
  var enterprise_shortname = $("#enterprise_shortname").val();
  $.ajax({
      type: "POST",
      url: base_url + enterprise_shortname + "/load-more-allcourse",
      cache: false,
      data: {
          lastid: ids,
          enterprise_shortname: enterprise_shortname,
          csrf_test_name: CSRF_TOKEN,
      },
      success: function(response) {
          $("#alldata").append(response);
          $("#load" + ids).remove();
          $(".removebuton_" + ids).remove();
          $(".hideClass .course").each(function(index) {
              var p_course_id = $(this).attr('id');
              $("#course_subscription_" + p_course_id).first().hide();
              $('#course_subscription_' + p_course_id).first().removeClass('d-flex');
          });
          $(".popup-youtube").YouTubePopUp();
      },
  });
}
</script></div>
<!--======== main content close ==========--><!-- Main content -->    

@endsection
