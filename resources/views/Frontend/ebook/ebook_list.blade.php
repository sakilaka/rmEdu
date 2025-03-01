@extends('Frontend.layouts.master-layout')
@section('title','- E-Books')
@section('head')
<style>
    .ebook-title2 a{
        display: block;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        font-weight: 700;
        font-size: 15px;
        letter-spacing: -0.04em;
        line-height: 21px;
        height: 41px;

    }
</style>
@endsection
@section('main_content')
@include('Frontend.layouts.parts.header-menu')
{{-- <div class="container"> --}}

<div class="content_search" style="margin-top:70px">
    <link href="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/css/blog.css" rel="stylesheet">

<div class="bg-alice-blue py-3 py-lg-4">
    <div class="container-lg p-2 p-md-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!--Start Category Banner-->
                <div
                    class="category-banner mb-4 position-relative px-4 px-sm-5 py-5 text-center text-white hero-header" style="height:200px!important;">
                    <div class="bottom-0 end-0 overflow-hidden position-absolute start-0 top-0">
                        <img src="{{ @$banner->image_show }}"
                            class="img-fluid wh_sm_100" alt="">
                    </div>
                    <!-- <h2 class="fw-semi-bold my-2 py-5 fs-1">Lead Academy Live</h2> -->
                    <div class="eventPage_heading mx-auto">
                        <h2 class="stydent-name mb-4 text-capitalize position-relative" style="z-index:2; color: var(--header_text_color)">
                            {{ @$banner->title }}
                        </h2>
                        <h6 class="position-relative" style="z-index:2; color: var(--header_text_color)">
                            {!! @$banner->details !!}
                        </h6>
                    </div>
                </div>
                <!--End Category Banner-->
                <div class="row blog_search mb-4 g-3">

                    <div class="col-xl-6 col-md-6">
                        <div class="bg-white border d-block p-3">
                            <Form>
                            <div class="input-group course-search">
                                <input type="text" class="bg-white form-control pe-5 box"
                                    placeholder="Search For E-book" value="{{ $title }}" name="title" aria-label="Recipient's username" id="search_item">
                                <button class="bg-gray btn end-0 m-1 position-absolute px-2 rounded-2 search-brt"
                                    type="submit" id="searchevent">
                                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.74112 10.7266C9.57692 10.7266 11.8758 8.56674 11.8758 5.90242C11.8758 3.2381 9.57692 1.07825 6.74112 1.07825C3.90532 1.07825 1.60645 3.2381 1.60645 5.90242C1.60645 8.56674 3.90532 10.7266 6.74112 10.7266Z"
                                            stroke="#07477D" stroke-width="1.28367" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M13.1592 11.9326L10.3672 9.30945" stroke="#07477D"
                                            stroke-width="1.28367" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </button>
                            </div>
                        </Form>
                        </div>
                    </div>


                    <div class="col-xl-6 col-md-6">
                        <div class="bg-white border d-block p-3">
                            <select id="event_category" class="form-select rounded-0 box on_click_eventcategory" aria-label="Default select example">
                                <option value="0">Category: All</option>
                                @foreach ($categorys as $category)
                                  <option class=""  value="{{ $category->id }}">
                                    {{ $category->name }}
                                    </option>
                                 @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- <div class="col-xl-3 col-md-6">
                        <div class="bg-white border d-block p-3">
                            <select id="event_release" class="form-select rounded-0 box on_click_eventrelease" aria-label="Default select example">
                                <option value='allevent'> All</option>
                                <option   value="0">Passed Event</option>
                                <option  value="1">Upcoming event</option>
                                <option  value="2">Live event</option>
                            </select>
                        </div>
                    </div> --}}
                </div>

        <div class="row g-3 event_cat_ajax-show show-events-data event_relese_ajax-show">

            @foreach ($ebooks as $event)

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <!--Start Course Card-->
                        <div class="course-card rounded-3 bg-white position-relative overflow-hidden">
                            <div class="position-relative">
                                <!--Start Course Image-->
                                <a href="{{ route('frontend.ebook_details',$event->id) }}"
                                    class="">
                                    <img src="{{ $event->image_show ?? ''}}"
                                        class="img-fluid w-100 imgdiv" alt="">
                                </a>
                                <!--End Course Image-->
                                {{-- <div class="end-0 p-2 position-absolute start-0 top-0">
                                    <!-- $todaydate<strtotime($start_date->meeting_date) && time() < strtotime($event->event_start_time) -->
                                    <button class="btn btn-info fw-semi-bold mb-1">@if(@$event->release_id=='0' ) Passed Event @elseif(@$event->release_id=='1' )  Upcoming Event @else Live Event @endif</button> <br>
                                    <a href="{{ route('frontend.ebook_details',$event->id) }}" class="btn btn-dark fw-semi-bold mb-1" style="color: var(--product_text_color)">{{ $event->name}}</a>
                                 </div> --}}
                                <!--Start Course Card Body-->
                                <div
                                    class="course-card_body bg-prussian-blue text-white p-3 top_shadow position-relative">
                                    <!--Start Course Title-->
                                    <h3 class="course-card__course--title text-uppercase fs-6 mb-1">
                                        <a href="{{ route('frontend.ebook_details',$event->id) }}" class="text-decoration-none" style="color: var(--product_text_color)">{{ $event->title}}</a>
                                    </h3>
                                    <p class=" text-uppercase fs-6 ebook-title2">
                                        <a href="{{ route('frontend.ebook_details',$event->id) }}" class="text-decoration-none" style="color: var(--product_text_color)">{{ $event->headline}}</a>
                                    </p>

                                    <!--End Course Title-->
                                    <!--Start Course Hints-->
                                    <table class="course-card__hints table table-borderless table-sm" style="color: var(--product_text_color)">
                                        <tbody>
                                            <tr>
                                                <td class="ps-0">
                                                    <div class="d-flex align-items-center">
                                                        <div class="course-card__hints--icon me-2">
                                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="3"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-share-2">
                                                            <circle cx="18" cy="5" r="3"></circle>
                                                            <circle cx="6" cy="12" r="3"></circle>
                                                            <circle cx="18" cy="19" r="3"></circle>
                                                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                                          </svg>
                                                        </div>
                                                        <div class="course-card__hints--text fw-bold"> By {{ $event->user->name ?? ''}} </div>
                                                    </div>
                                                </td>
                                            </tr>


                                                </tr>

                                        </tbody>
                                    </table>






                                    <div class="align-items-center d-flex fs-12 justify-content-between pt-1 text-white w-100">
                                    {{-- <div class="d-flex align-items-center">
                                        <div class="course-card__hints--icon me-3">
                                            <svg id="clock_1_" data-name="clock (1)"
                                                xmlns="http://www.w3.org/2000/svg" width="16.706"
                                                height="16.706" viewBox="0 0 16.706 16.706">
                                                <path id="Path_13" data-name="Path 13"
                                                    d="M8.353,0a8.353,8.353,0,1,0,8.353,8.353A8.363,8.363,0,0,0,8.353,0Zm0,15.662a7.309,7.309,0,1,1,7.309-7.309,7.317,7.317,0,0,1-7.309,7.309Z"
                                                    fill="#B5C5DB" />
                                                <path id="Path_14" data-name="Path 14"
                                                    d="M208.838,83.118h-1.044v5.437l3.285,3.285.738-.738-2.979-2.979Z"
                                                    transform="translate(-199.963 -79.985)" fill="#B5C5DB" />
                                            </svg>
                                        </div>
                                        <div class="course-card__hints--text fs-12 fw-bold" style="color: var(--product_text_color)"> {{ @$course->course_hours }} </div>
                                    </div> --}}
                                    {{-- @php
                                        $students =\App\Models\EbookParticipant::leftJoin('ebooks','ebooks.id','ebook_participants.ebook_id')
                                        ->where('ebooks.user_id',$event->user_id)->get();
                                    @endphp --}}
                                    <div class="course-like d-flex align-items-center">
                                        {{-- <i class="fa fa-solid fa-microphone"style="color:#B5C5DB;"></i>&nbsp;&nbsp; --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#e2e5e9" d="M192 0C139 0 96 43 96 96V256c0 53 43 96 96 96s96-43 96-96V96c0-53-43-96-96-96zM64 216c0-13.3-10.7-24-24-24s-24 10.7-24 24v40c0 89.1 66.2 162.7 152 174.4V464H120c-13.3 0-24 10.7-24 24s10.7 24 24 24h72 72c13.3 0 24-10.7 24-24s-10.7-24-24-24H216V430.4c85.8-11.7 152-85.3 152-174.4V216c0-13.3-10.7-24-24-24s-24 10.7-24 24v40c0 70.7-57.3 128-128 128s-128-57.3-128-128V216z"/></svg>
                                        <div class="d-block">
                                            <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">
                                                &nbsp;{{ $event->audio->count() }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="course-like d-flex align-items-center">
                                        {{-- <i class="fa fa-solid fa-video" style="color:#B5C5DB"></i>&nbsp;&nbsp; --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#d6dce6" d="M0 128C0 92.7 28.7 64 64 64H320c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2V384c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1V320 192 174.9l14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z"/></svg>
                                        <div class="d-block">
                                            <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">
                                                &nbsp;{{ $event->video->count() }}
                                            </div>
                                        </div>
                                    </div>

                                    <!--Start Star Rating-->
                                    <div class="star-rating__wrap d-flex align-items-center ">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#FFD43B" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></svg>
                                        {{-- <i class="fas fa-star me-1 text-warning" style="color:#B5C5DB"></i> --}}
                                        <div class="d-block">
                                            @php
                                            $avg_round = round($event->reviews->avg('ratting'),1);
                                            @endphp
                                            <div class="reviews fs-12 fw-bold" style="color: var(--product_text_color)">&nbsp;{{  $avg_round }} </div>
                                        </div>
                                    </div>
                                </div>
                                    <!--End Course Hints-->
                                </div>
                                <!--End Course Card Body-->
                            </div>
                            <div class="course-card_footer g-2 p-3">

                                <input type="hidden" name="course_id"
                                    id="course_id_LEO094W9R9"
                                    value="LEO094W9R9">
                                <input type="hidden" name="course_name"
                                    id="course_name_LEO094W9R9"
                                    value="Web Development with Mern Stack">
                                <input type="hidden" name="slug" id="slug_LEO094W9R9"
                                    value="">
                                <input type="hidden" name="qty" id="qty" value="1">
                                <input type="hidden" name="price"
                                    id="price_LEO094W9R9"
                                    value="0">
                                <input type="hidden" name="old_price"
                                    id="old_price_LEO094W9R9"
                                    value="0">
                                <input type="hidden" name="picture"
                                    id="picture_LEO094W9R9"
                                    value="{{ asset('frontend') }}/assets/uploads/course/1699527091-f-Live-class-thumb.png">
                                <input type="hidden" name="is_course_type" id="iscourse_type" value="4">

                                 {{-- <div class="d-block mb-3 mt-2">
                                    <h5><b>{{ format_price(@$event->fee) }}</b></h5>
                                    <input type="hidden" id="course_type" value="4">
                                </div> --}}

                                <div class="form-check d-flex align-items-center ps-0">
                                    {{-- <input course_id="{{ $course->id }}" id="course_cart_price{{ $course->id }}" class="me-1 active change_cart_val" name="course_price_type[{{ $course->id }}]" style="width:21px;height:21px" type="radio" checked> --}}
                                    <label
                                        class="align-items-center d-flex form-check-label fw-bold justify-content-between"
                                        style="width:100%"
                                        for="">
                                        <span class="course_price_cart" > Ebook Price <span class="text-success"></span></span>
                                        <span class="align-items-center d-flex  rounded text-center">

                                            @if($event->discount > 0)
                                                @if ($event->discount_type=="0")
                                                    @php
                                                        $new_price=$event->fee -($event->fee *$event->discount/100);
                                                    @endphp
                                                    <span class="d-block fs-16 fw-bold me-2 text-success2">{{ format_price($new_price)}}</span>
                                                    <del class="fs-12 fw-bold text-muted2">{{ format_price($event->fee) }}</del>
                                                @else
                                                    @php
                                                        $new_price=$event->fee - $event->discount;
                                                    @endphp
                                                    <span class="d-block fs-16 fw-bold me-2 text-success2">{{ format_price($new_price) }}</span>
                                                    <del class="fs-12 fw-bold text-muted2">{{ format_price($event->fee) }}</del>
                                                @endif
                                            @else
                                            <span class="d-block fs-16 fw-bold me-2 text-success2"> {{ format_price($event->fee) }}</span>
                                            @endif


                                            {{-- <span class="d-block fs-16 fw-bold me-2 text-success2">BDT{{ $course->discount }}</span> --}}
                                            {{-- <del class="fs-12 fw-bold text-muted2">{{ $course->fee }}</del> --}}
                                         </span>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-between align-items-stretch">
                                    @php
                                    $ebook_count=0;
                                    $check_ebook = 0;
                                    if(auth()->check()){
                                        $save = \App\Models\EbookParticipant::where('ebook_id',$event->id)->where('user_id',auth()->user()->id)->first();
                                        if($save){
                                            $check_ebook = 1;
                                        }
                                    }
                                    @endphp
                                    @if ($check_ebook ==0)

                                    <div class="flex-grow-1 me-1">
                                        <a href="javascript:void(0)">
                                        <button type="button"
                                            class="align-items-center btn btn-dark-cerulean d-flex justify-content-between px-2 w-100">
                                            <svg width="30" height="17" viewBox="0 0 30 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect x="0.516113" y="0.831177" width="15.5325" height="15.5325"
                                                    fill="url(#pattern0)" />
                                                <rect x="27.1436" y="3.05023" width="2.21893" height="11.0946"
                                                    fill="#5482A7" />
                                                <defs>
                                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox"
                                                        width="1" height="1">
                                                        <use xlink:href="#image0_1_3" transform="scale(0.00653595)" />
                                                    </pattern>
                                                    <image id="image0_1_3" width="153" height="153"
                                                        xlink:href="data:image/png;base64,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" />
                                                </defs>
                                            </svg>

                                            <span class="w-100 addebookcart" CarId="{{ $event->id }}" style="color: var(--button2_text_color)">Add To Cart</span>
                                        </button>
                                    </a>
                                  </div>
                                  @endif


                                    <div class="flex-grow-1">
                                        <a type="button"
                                            class="align-items-center btn btn-dark-cerulean d-flex justify-content-between px-2 w-100"
                                            href="{{ route('frontend.ebook_details',$event->id) }}">

                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="15.5325" height="15.5325"
                                                    transform="matrix(-1 0 0 1 15.8613 0.721741)"
                                                    fill="url(#pattern0)" />
                                                <defs>
                                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox"
                                                        width="1" height="1">
                                                        <use xlink:href="#image0_228_160"
                                                            transform="scale(0.00653595)" />
                                                    </pattern>
                                                    <image id="image0_228_160" width="153" height="153"
                                                        xlink:href="data:image/png;base64,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" />
                                                </defs>
                                            </svg>
                                            <span class="w-100" style="color: var(--button2_text_color)">Details</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Course Card-->
                    </div>
                    @endforeach
                    @if($ebooks->count() == 0)
                    <div class="text-center">
                        <h2>Data Not Found !</h2>
                    </div>
                    @endif
                </div>

                {{-- @if($ebooks->lastPage() != 1)
                <div class="text-center my-3 loadbutton_filter_off  removebuton_86">
                    <button type="button" class="btn btn-lg btn-dark-cerulean" id="showMoreEvent">
                        Load more                        <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56" height="15.666"
                            viewBox="0 0 28.56 15.666">
                            <path id="right-arrow_3_" data-name="right-arrow (3)"
                                d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                                transform="translate(0 -107.5)" fill="#fff"></path>
                        </svg>
                    </button>
                </div>
                @endif --}}

            </div>
        </div>
    </div>
</div>


<input type="hidden" id="segment_route" value="">
<input type="hidden" id="segment_id" value="">




</div>

{{-- </div> --}}
@include('Frontend.layouts.parts.news-letter')

@endsection


@section('script')
<script src="{{ asset('frontend/application/modules/frontend/views/themes/default/assets/js/axios.min.js') }}"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script>

$.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});


//Event Relete Show
$(".on_click_eventrelease").change(function(e){
  e.preventDefault();
  let id = $(this).val();
  let cat_id =$("#event_category").val();
  let s_val = $('#search_item').val();
  console.log(id)
  $.ajax({
    type:'GET',
     url:"{{ url('event-relese-show-ajax') }}/"+id+"?cat_id="+cat_id+'&search='+s_val,
    success:function(data){
      $(".event_relese_ajax-show").html(data);
    }

  });

});



$(".on_click_eventcategory").change(function(e){
    console.log(this);
  e.preventDefault();
  let id = $(this).val();
 //var id = document.getElementsByClassName('on_click_eventcategory').value

  console.log(id);
  $.ajax({

    type:'GET',

     url:"{{ url('ebook-category-show-ajax') }}/"+id,

    // data:{id:id},

    success:function(data){
    //  document.getElementById("home-proud-hide").style.visibility = "hidden";
      $(".event_cat_ajax-show").html(data);
    }

  });



});






</script>

@endsection



