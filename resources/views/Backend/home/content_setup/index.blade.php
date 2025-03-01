<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/summernote/dist/summernote-bs4.css') }}">
    <title>{{ env('APP_NAME') }} | Home Content Setup</title>
</head>

<body>
    <div class="container-scroller">
        @include('Backend.components.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('Backend.components.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            {{ __('Home Content Setup') }}
                        </h3>
                    </div>

                    <div class="row">
                        <div class="card card-body col-md-12">
                            <div class="rounded">
                                <div class="card-header" data-toggle="collapse" data-target="#collapseContent">
                                    <h5 class="card-title mb-0 py-2">
                                        <i class="fa fa-solid fa-plus"></i>
                                        Banner Section
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseContent">
                                    <form action="{{ route('backend.home_banner_section.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mt-4 mb-4">
                                            <div class="row col-sm-12 col-md-6">
                                                <div class="col-sm-12 col-md-6">
                                                    <label class="form-control-label">Banner Image:</label>
                                                    <div class="dropify-wrapper" style="border: none">
                                                        <div class="dropify-loader"></div>
                                                        <div class="dropify-errors-container">
                                                            <ul></ul>
                                                        </div>
                                                        <input type="file" class="dropify" name="banner_image"
                                                            accept="image/*" id="banner_image_upload">
                                                        <button type="button" class="dropify-clear">Remove</button>
                                                        <div class="dropify-preview">
                                                            <span class="dropify-render"></span>
                                                            <div class="dropify-infos">
                                                                <div class="dropify-infos-inner">
                                                                    <p class="dropify-filename">
                                                                        <span class="file-icon"></span>
                                                                        <span class="dropify-filename-inner"></span>
                                                                    </p>
                                                                    <p class="dropify-infos-message">
                                                                        Drag and drop or click to replace
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                                                    <div class="px-3 border border-secondary rounded">
                                                        <img src="{{ $home_content->banner_image_show ?? asset('frontend/images/No-image.jpg') }}"
                                                            alt="" class="img-fluid"
                                                            style="border-radius: 10px; max-height: 200px !important;"
                                                            id="banner_image_preview">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row col-sm-12 col-md-6 mt-4">
                                                <div class="col-sm-12">
                                                    <label class="form-control-label">Banner Video:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <input type="file" class="form-control" name="banner_video"
                                                            value="{{ $home_content->banner_video }}" />
                                                        <div class="ml-2">
                                                            <a class="btn btn-primary" data-toggle="modal"
                                                                data-target="#videoModal">
                                                                <i class="fa fa-solid fa-play text-white"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog"
                                                aria-labelledby="videoModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="videoModalLabel">Banner Video
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <video controls height="350px" width="460px">
                                                                <source src="{{ $home_content->banner_video_show }}"
                                                                    type="video/mp4" autoplay>
                                                            </video>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4 mb-4">
                                            <div class="col-sm-12">
                                                <label class=" form-control-label">Banner Text:<span
                                                        class="tx-danger"></span></label>
                                                <div class="mg-t-10 mg-sm-t-0">
                                                    <textarea name="banner_text" class="form-control summernote">{{ $home_content->banner_text ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>

                                        @if ($faqs->count() == 0)
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <label class=" form-control-label">Button Text:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input value="" type="text"
                                                            name="home_content_ques[]" class="form-control"
                                                            placeholder="Enter Text">
                                                    </div>
                                                </div>
                                                <div class="col-sm-7 d-flex align-items-center ">
                                                    <div style="width: 97%;">
                                                        <label class=" form-control-label">Button URL:<span
                                                                class="tx-danger"></span></label>
                                                        <div class="mg-t-10 mg-sm-t-0">
                                                            <input type="text" value=""
                                                                name="home_content_ans[]" class="form-control"
                                                                placeholder="Enter URL ">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class=" form-control-label"></label>
                                                        <a id="plus-btn-data-question" href="javascript:void(0)"
                                                            class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div><!-- row -->
                                        @else
                                            <div class="add-question-data-show">
                                                @foreach ($faqs as $k => $faq)
                                                    <div class="row">
                                                        <div class="col-sm-5 mt-3">
                                                            <label class=" form-control-label">Button Text:<span
                                                                    class="tx-danger"></span></label>
                                                            <div class="mg-t-10 mg-sm-t-0">
                                                                <input type="text" value="{{ $faq->question }}"
                                                                    name="home_content_old_ques[{{ $faq->id }}]"
                                                                    class="form-control" placeholder="Enter Question">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 mt-3 d-flex align-items-center ">
                                                            <div style="width: 97%;">
                                                                <label class=" form-control-label">Button URL:<span
                                                                        class="tx-danger"></span></label>
                                                                <div class="mg-t-10 mg-sm-t-0">
                                                                    <input value="{{ $faq->answer }}" type="text"
                                                                        name="home_content_old_ans[{{ $faq->id }}]"
                                                                        class="form-control"
                                                                        placeholder="Enter Answer ">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <label class=" form-control-label"></label>
                                                                @if ($k == 0)
                                                                    <a id="plus-btn-data-question"
                                                                        href="javascript:void(0)"
                                                                        class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                            class="fas fa-plus"></i></a>
                                                                @else
                                                                    <a faq_id="{{ $faq->id }}"
                                                                        href="javascript:void(0)"
                                                                        class="minus-btn-question-old-data px-1 p-0 m-0 ml-2"><i
                                                                            class="fas fa-minus-circle"></i></a>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="row mt-4">
                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
                                                <button type="submit" class="btn btn-primary ">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="mt-3 rounded">
                                <div class="card-header" data-toggle="collapse"
                                    data-target="#collapseContent_hero_slider">
                                    <h5 class="card-title mb-0 py-2">
                                        <i class="fa fa-solid fa-plus"></i>
                                        Hero Section
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseContent_hero_slider">
                                    <form action="{{ route('backend.home_hero_slider_section.update') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">

                                            <div class="row mt-4">
                                                <div class="col-sm-12">
                                                    <label class=" form-control-label">Hero Slider Title 1:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->hero_slider_title_1 ?? '' }}"
                                                            name="hero_slider_title_1" class="form-control"
                                                            placeholder="Enter Title" required>
                                                    </div>
                                                </div>

                                                <div class="row col-sm-12 mt-3">
                                                    <div class="col-12">
                                                        <label class=" form-control-label">Hero Slider 1 Button
                                                            Text:<span class="tx-danger"></span></label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        @php
                                                            $heroSliderBtnText1 = json_decode(
                                                                $home_content->hero_slider_btn_text_1,
                                                            );
                                                        @endphp
                                                        <input type="text"
                                                            value="{{ $heroSliderBtnText1->hero_slider_btn_text_1_first ?? '' }}"
                                                            name="hero_slider_btn_text_1_first" class="form-control"
                                                            placeholder="Enter First Button Text">
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <input type="text"
                                                            value="{{ $heroSliderBtnText1->hero_slider_btn_url_1_first ?? '' }}"
                                                            name="hero_slider_btn_url_1_first" class="form-control"
                                                            placeholder="Enter First Button URL">
                                                    </div>
                                                    <div class="col-12 col-md-6 mt-2">
                                                        <input type="text"
                                                            value="{{ $heroSliderBtnText1->hero_slider_btn_text_1_second ?? '' }}"
                                                            name="hero_slider_btn_text_1_second" class="form-control"
                                                            placeholder="Enter Second Button Text">
                                                    </div>
                                                    <div class="col-12 col-md-6 mt-2">
                                                        <input type="text"
                                                            value="{{ $heroSliderBtnText1->hero_slider_btn_url_1_second ?? '' }}"
                                                            name="hero_slider_btn_url_1_second" class="form-control"
                                                            placeholder="Enter Second Button URL">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 mt-3">
                                                    <label class="form-control-label">Hero Slider Background Image
                                                        1:</label>
                                                    <div class="dropify-wrapper" style="border: none">
                                                        <div class="dropify-loader"></div>
                                                        <div class="dropify-errors-container">
                                                            <ul></ul>
                                                        </div>
                                                        <input type="file" class="dropify" name="hero_slider_bg_1"
                                                            accept="image/*" id="hero_slider_bg_1_upload">
                                                        <button type="button" class="dropify-clear">Remove</button>
                                                        <div class="dropify-preview">
                                                            <span class="dropify-render"></span>
                                                            <div class="dropify-infos">
                                                                <div class="dropify-infos-inner">
                                                                    <p class="dropify-filename">
                                                                        <span class="file-icon"></span>
                                                                        <span class="dropify-filename-inner"></span>
                                                                    </p>
                                                                    <p class="dropify-infos-message">
                                                                        Drag and drop or click to replace
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                                                    <div class="px-3 mt-3">
                                                        <img src="{{ $home_content->hero_slider_bg_1 ? asset('upload/home_content/hero_slider/' . $home_content->hero_slider_bg_1) : asset('frontend/images/No-image.jpg') }}"
                                                            alt="" class="img-fluid"
                                                            style="border-radius: 10px; max-height: 200px !important;"
                                                            id="hero_slider_bg_1_preview">
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="my-5">

                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                    <label class=" form-control-label">Hero Slider Title 2:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->hero_slider_title_2 ?? '' }}"
                                                            name="hero_slider_title_2" class="form-control"
                                                            placeholder="Enter Title" required>
                                                    </div>
                                                </div>

                                                <div class="row col-sm-12 mt-3">
                                                    <div class="col-12">
                                                        <label class=" form-control-label">Hero Slider 2 Button
                                                            Text:<span class="tx-danger"></span></label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        @php
                                                            $heroSliderBtnText2 = json_decode(
                                                                $home_content->hero_slider_btn_text_2,
                                                            );
                                                        @endphp
                                                        <input type="text"
                                                            value="{{ $heroSliderBtnText2->hero_slider_btn_text_2_first ?? '' }}"
                                                            name="hero_slider_btn_text_2_first" class="form-control"
                                                            placeholder="Enter First Button Text">
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <input type="text"
                                                            value="{{ $heroSliderBtnText2->hero_slider_btn_url_2_first ?? '' }}"
                                                            name="hero_slider_btn_url_2_first" class="form-control"
                                                            placeholder="Enter First Button URL">
                                                    </div>
                                                    <div class="col-12 col-md-6 mt-2">
                                                        <input type="text"
                                                            value="{{ $heroSliderBtnText2->hero_slider_btn_text_2_second ?? '' }}"
                                                            name="hero_slider_btn_text_2_second" class="form-control"
                                                            placeholder="Enter Second Button Text">
                                                    </div>
                                                    <div class="col-12 col-md-6 mt-2">
                                                        <input type="text"
                                                            value="{{ $heroSliderBtnText2->hero_slider_btn_url_2_second ?? '' }}"
                                                            name="hero_slider_btn_url_2_second" class="form-control"
                                                            placeholder="Enter Second Button URL">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 mt-3">
                                                    <label class="form-control-label">Hero Slider Background Image
                                                        2:</label>
                                                    <div class="dropify-wrapper" style="border: none">
                                                        <div class="dropify-loader"></div>
                                                        <div class="dropify-errors-container">
                                                            <ul></ul>
                                                        </div>
                                                        <input type="file" class="dropify" name="hero_slider_bg_2"
                                                            accept="image/*" id="hero_slider_bg_2_upload">
                                                        <button type="button" class="dropify-clear">Remove</button>
                                                        <div class="dropify-preview">
                                                            <span class="dropify-render"></span>
                                                            <div class="dropify-infos">
                                                                <div class="dropify-infos-inner">
                                                                    <p class="dropify-filename">
                                                                        <span class="file-icon"></span>
                                                                        <span class="dropify-filename-inner"></span>
                                                                    </p>
                                                                    <p class="dropify-infos-message">
                                                                        Drag and drop or click to replace
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                                                    <div class="px-3 mt-3">
                                                        <img src="{{ $home_content->hero_slider_bg_2 ? asset('upload/home_content/hero_slider/' . $home_content->hero_slider_bg_2) : asset('frontend/images/No-image.jpg') }}"
                                                            alt="" class="img-fluid"
                                                            style="border-radius: 10px; max-height: 200px !important;"
                                                            id="hero_slider_bg_2_preview">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="mt-3 rounded">
                                <div class="card-header" data-toggle="collapse"
                                    data-target="#university_location_section">
                                    <h5 class="card-title mb-0 py-2">
                                        <i class="fa fa-solid fa-plus"></i>
                                        University Location Section
                                    </h5>
                                </div>
                                <div class="collapse" id="university_location_section">
                                    <form action="{{ route('backend.home_location_section.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row mt-4">
                                                <div class="col-sm-12 ">
                                                    <label class=" form-control-label">University Location Title:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->university_location_title ?? '' }}"
                                                            name="university_location_title" class="form-control"
                                                            placeholder="Enter Location Title" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <label class=" form-control-label mt-4">
                                                Location:
                                                <span class="tx-danger"></span>
                                            </label>
                                            <div class="col-sm-12 mt-3">
                                                <div class="mg-t-10 mg-sm-t-0 add-data-content">
                                                    @if ($home_content_locations->count() == 0)
                                                        <div class="d-flex align-items-center mt-2 row">
                                                            <div class="col-11 row">
                                                                <div class="col-sm-12 col-md-6 mt-3">
                                                                    <label class="form-control-label">
                                                                        Image:</label>
                                                                    <div class="dropify-wrapper" style="border: none">
                                                                        <div class="dropify-loader"></div>
                                                                        <div class="dropify-errors-container">
                                                                            <ul></ul>
                                                                        </div>
                                                                        <input type="file" class="dropify"
                                                                            name="location_image[]" accept="image/*"
                                                                            id="location_image_upload" required>
                                                                        <button type="button"
                                                                            class="dropify-clear">Remove</button>
                                                                        <div class="dropify-preview">
                                                                            <span class="dropify-render"></span>
                                                                            <div class="dropify-infos">
                                                                                <div class="dropify-infos-inner">
                                                                                    <p class="dropify-filename">
                                                                                        <span class="file-icon"></span>
                                                                                        <span
                                                                                            class="dropify-filename-inner"></span>
                                                                                    </p>
                                                                                    <p class="dropify-infos-message">
                                                                                        Drag and drop or click to
                                                                                        replace
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                                                                    <div class="px-3 mt-3">
                                                                        <img src="{{ asset('frontend/images/No-image.jpg') }}"
                                                                            alt="" class="img-fluid"
                                                                            style="border-radius: 10px; max-height: 190px !important;"
                                                                            id="location_image_preview">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-control-label"><b>Type:</b></label>
                                                                <div class="d-flex  align-items-center">
                                                                    <select class="form-control on_change_u_lo_type"
                                                                        name="type_loction_id[]" required>
                                                                        <option value="">Select type</option>
                                                                        <option value="1">Continent</option>
                                                                        <option value="2">Country</option>
                                                                        <option value="3">State</option>
                                                                        <option value="4">City</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-5">
                                                                <label
                                                                    class="form-control-label"><b>Location:</b></label>
                                                                <div class="d-flex  align-items-center">
                                                                    <select class="form-control" id="location"
                                                                        name="location_id[]" required>
                                                                        <option value="">Select Location</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <a id="plus-btn-data-content" href="javascript:void(0)"
                                                                class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i
                                                                    class="fas fa-plus"></i></a>
                                                        </div>
                                                    @else
                                                        @foreach ($home_content_locations as $k => $home_content_location)
                                                            <div class="d-flex align-items-center mt-2 row">
                                                                <div class="col-11 row">
                                                                    <div class="col-sm-12 col-md-6 mt-3">
                                                                        <label class="form-control-label">
                                                                            Image:</label>
                                                                        <div class="dropify-wrapper"
                                                                            style="border: none">
                                                                            <div class="dropify-loader"></div>
                                                                            <div class="dropify-errors-container">
                                                                                <ul></ul>
                                                                            </div>
                                                                            <input type="file" class="dropify"
                                                                                name="old_location_image[{{ $home_content_location->id }}]"
                                                                                accept="image/*"
                                                                                id="location_image_upload_{{ $k }}">
                                                                            <button type="button"
                                                                                class="dropify-clear">Remove</button>
                                                                            <div class="dropify-preview">
                                                                                <span class="dropify-render"></span>
                                                                                <div class="dropify-infos">
                                                                                    <div class="dropify-infos-inner">
                                                                                        <p class="dropify-filename">
                                                                                            <span
                                                                                                class="file-icon"></span>
                                                                                            <span
                                                                                                class="dropify-filename-inner"></span>
                                                                                        </p>
                                                                                        <p
                                                                                            class="dropify-infos-message">
                                                                                            Drag and drop or click to
                                                                                            replace
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                                                                        <div class="px-3 mt-3">
                                                                            <img src="{{ $home_content_location->photo ? asset('upload/home_content/university_location/' . $home_content_location->photo) : asset('frontend/images/No-image.jpg') }}"
                                                                                alt="" class="img-fluid"
                                                                                style="border-radius: 10px; max-height: 190px !important;"
                                                                                id="location_image_preview_{{ $k }}">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label
                                                                        class="form-control-label"><b>Type:</b></label>
                                                                    <div class="d-flex align-items-center">
                                                                        <select
                                                                            class="form-control form-control-lg on_change_u_lo_type"
                                                                            name="old_type_loction_id[{{ $home_content_location->id }}]"
                                                                            required>
                                                                            <option value="">Select type</option>
                                                                            <option
                                                                                @if ($home_content_location->type_loction_id == '1') selected @endif
                                                                                value="1">Continent</option>
                                                                            <option
                                                                                @if ($home_content_location->type_loction_id == '2') selected @endif
                                                                                value="2">Country</option>
                                                                            <option
                                                                                @if ($home_content_location->type_loction_id == '3') selected @endif
                                                                                value="3">State</option>
                                                                            <option
                                                                                @if ($home_content_location->type_loction_id == '4') selected @endif
                                                                                value="4">City</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-5">
                                                                    <label
                                                                        class="form-control-label"><b>Location:</b></label>
                                                                    <div class="d-flex  align-items-center">
                                                                        <select class="form-control form-control-lg"
                                                                            id="location"
                                                                            name="old_location_id[{{ $home_content_location->id }}]"
                                                                            required>
                                                                            <option value="">Select Location
                                                                            </option>
                                                                            @if ($home_content_location->type_loction_id == '1')
                                                                                @foreach ($continents as $continent)
                                                                                    <option
                                                                                        @if ($continent->id == $home_content_location->location_id) selected @endif
                                                                                        value="{{ $continent->id }}">
                                                                                        {{ $continent->name }}</option>
                                                                                @endforeach
                                                                            @elseif ($home_content_location->type_loction_id == '2')
                                                                                @foreach ($countrys as $country)
                                                                                    <option
                                                                                        @if ($country->id == $home_content_location->location_id) selected @endif
                                                                                        value="{{ $country->id }}">
                                                                                        {{ $country->name }}</option>
                                                                                @endforeach
                                                                            @elseif ($home_content_location->type_loction_id == '3')
                                                                                @foreach ($states as $state)
                                                                                    <option
                                                                                        @if ($state->id == $home_content_location->location_id) selected @endif
                                                                                        value="{{ $state->id }}">
                                                                                        {{ $state->name }}</option>
                                                                                @endforeach
                                                                            @elseif ($home_content_location->type_loction_id == '4')
                                                                                @foreach ($citys as $city)
                                                                                    <option
                                                                                        @if ($city->id == $home_content_location->location_id) selected @endif
                                                                                        value="{{ $city->id }}">
                                                                                        {{ $city->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                @if ($k == $home_content_locations->count() - 1)
                                                                    <a id="plus-btn-data-content"
                                                                        href="javascript:void(0)"
                                                                        class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i
                                                                            class="fas fa-plus"></i></a>
                                                                @else
                                                                    <a home_content_location_id="{{ $home_content_location->id }}"
                                                                        href="javascript:void(0)"
                                                                        class="minus-btn-data-old-audio px-1 p-0 m-0 ml-2"><i
                                                                            class="fas fa-minus-circle"></i></a>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="mt-3 rounded">
                                <div class="card-header" data-toggle="collapse"
                                    data-target="#collapseContent_university">
                                    <h5 class="card-title mb-0 py-2">
                                        <i class="fa fa-solid fa-plus"></i>
                                        University Section
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseContent_university">
                                    <form action="{{ route('backend.home_university_section.update') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">

                                            <div class="row mt-4">
                                                <div class="col-sm-12 ">
                                                    <label class=" form-control-label">University Title:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->university_title ?? '' }}"
                                                            name="sub_banner_title" class="form-control"
                                                            placeholder="Enter Title" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 mt-3">
                                                    <label class="form-control-label">Background Image:</label>
                                                    <div class="dropify-wrapper" style="border: none">
                                                        <div class="dropify-loader"></div>
                                                        <div class="dropify-errors-container">
                                                            <ul></ul>
                                                        </div>
                                                        <input type="file" class="dropify" name="university_image"
                                                            accept="image/*" id="university_image_upload">
                                                        <button type="button" class="dropify-clear">Remove</button>
                                                        <div class="dropify-preview">
                                                            <span class="dropify-render"></span>
                                                            <div class="dropify-infos">
                                                                <div class="dropify-infos-inner">
                                                                    <p class="dropify-filename">
                                                                        <span class="file-icon"></span>
                                                                        <span class="dropify-filename-inner"></span>
                                                                    </p>
                                                                    <p class="dropify-infos-message">
                                                                        Drag and drop or click to replace
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                                                    <div class="px-3 mt-3">
                                                        <img src="{{ $home_content->university_image_show ?? asset('frontend/images/No-image.jpg') }}"
                                                            alt="" class="img-fluid"
                                                            style="border-radius: 10px; max-height: 200px !important;"
                                                            id="university_image_preview">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="mt-3 rounded">
                                <div class="card-header" data-toggle="collapse" data-target="#collapseContent_3">
                                    <h5 class="card-title mb-0 py-2">
                                        <i class="fa fa-solid fa-plus"></i>
                                        Course Section
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseContent_3">
                                    <div class="card-body">
                                        <form action="{{ route('backend.home_course_section.update') }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mt-4">
                                                <div class="col-sm-12 ">
                                                    <label class=" form-control-label">Title:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->course_title }}"
                                                            name="course_title" class="form-control"
                                                            placeholder="Enter Title" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 rounded">
                                <div class="card-header" data-toggle="collapse" data-target="#collapseContent_4">
                                    <h5 class="card-title mb-0 py-2">
                                        <i class="fa fa-solid fa-plus"></i>
                                        Partner Section
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseContent_4">
                                    <div class="card-body">
                                        <form action="{{ route('backend.home_partner_section.update') }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mt-4">
                                                <div class="col-sm-12 ">
                                                    <label class=" form-control-label">Title:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->partner_title }}"
                                                            name="partner_title" class="form-control"
                                                            placeholder="Enter Title" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
                                                    <button type="submit" class="btn btn-primary ">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 rounded">
                                <div class="card-header" data-toggle="collapse" data-target="#collapseContent_5">
                                    <h5 class="card-title mb-0 py-2">
                                        <i class="fa fa-solid fa-plus"></i>
                                        Learn Anything Section
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseContent_5">
                                    <form action="{{ route('backend.home_learn_section.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row mt-4">
                                                <div class="col-sm-12 col-md-6 mt-3">
                                                    <label class="form-control-label">Image:</label>
                                                    <div class="dropify-wrapper" style="border: none">
                                                        <div class="dropify-loader"></div>
                                                        <div class="dropify-errors-container">
                                                            <ul></ul>
                                                        </div>
                                                        <input type="file" class="dropify" name="learn_image"
                                                            accept="image/*" id="learn_image_upload">
                                                        <button type="button" class="dropify-clear">Remove</button>
                                                        <div class="dropify-preview">
                                                            <span class="dropify-render"></span>
                                                            <div class="dropify-infos">
                                                                <div class="dropify-infos-inner">
                                                                    <p class="dropify-filename">
                                                                        <span class="file-icon"></span>
                                                                        <span class="dropify-filename-inner"></span>
                                                                    </p>
                                                                    <p class="dropify-infos-message">
                                                                        Drag and drop or click to replace
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                                                    <div class="px-3 mt-3">
                                                        <img src="{{ $home_content->learn_image_show ?? asset('frontend/images/No-image.jpg') }}"
                                                            alt="" class="img-fluid"
                                                            style="border-radius: 10px; max-height: 200px !important;"
                                                            id="learn_image_preview">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 mt-4">
                                                    <label class=" form-control-label">Title:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <textarea type="text" name="learn_title" class="form-control summernote">{{ $home_content->learn_title }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            @if ($learn_texts->count() == 0)
                                                <div class="mt-4">
                                                    <div class="col-sm-12 show-add-tagline-data">
                                                        <div class="d-flex mt-3">
                                                            <div class="" style="padding:10px;width: 97%;">
                                                                <div class="row mt-3">
                                                                    <label class="col-sm-2 mt-3">Title</label>
                                                                    <div class="col-sm-10">
                                                                        <input value="" type="text"
                                                                            name="title[]" class="form-control"
                                                                            placeholder="Enter Title">
                                                                    </div>
                                                                    <label class="col-sm-2 mt-3">URL</label>
                                                                    <div class="col-sm-10 mt-2">
                                                                        <input value="" type="text"
                                                                            name="url[]" class="form-control"
                                                                            placeholder="Enter URL">
                                                                    </div>
                                                                    <label class="col-sm-2 mt-3">Description</label>
                                                                    <div class="col-sm-10 mt-2">
                                                                        <textarea value="" type="text" name="description[]" class="form-control"
                                                                            placeholder="Enter Short Description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a id="plus-btn-data-tagline" href="javascript:void(0)"
                                                                class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                    class="fas fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />
                                            @else
                                                <div class="add-question-data-show">

                                                    <div class="mt-4">
                                                        <div class="col-sm-12 show-add-tagline-data">
                                                            @foreach ($learn_texts as $k => $learn_text)
                                                                <div class="d-flex mt-3">
                                                                    <div class=""
                                                                        style="padding:10px;width: 97%;">
                                                                        <div class="row mt-3">
                                                                            <label class="col-sm-2 mt-3">Title</label>
                                                                            <div class="col-sm-10">
                                                                                <input
                                                                                    value="{{ $learn_text->title }}"
                                                                                    type="text"
                                                                                    name="title_old[{{ $learn_text->id }}]"
                                                                                    class="form-control"
                                                                                    placeholder="Enter Title">
                                                                            </div>
                                                                            <label class="col-sm-2 mt-3">URL</label>
                                                                            <div class="col-sm-10 mt-2">
                                                                                <input value="{{ $learn_text->url }}"
                                                                                    type="text"
                                                                                    name="url_old[{{ $learn_text->id }}]"
                                                                                    class="form-control"
                                                                                    placeholder="Enter URL">
                                                                            </div>
                                                                            <label
                                                                                class="col-sm-2 mt-3">Description</label>
                                                                            <div class="col-sm-10 mt-2">
                                                                                <textarea type="text" name="description_old[{{ $learn_text->id }}]" class="form-control"
                                                                                    placeholder="Enter Short Description">{{ $learn_text->description }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <label class=" form-control-label"></label>
                                                                    @if ($k == 0)
                                                                        <a id="plus-btn-data-tagline"
                                                                            href="javascript:void(0)"
                                                                            class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-plus"></i></a>
                                                                    @else
                                                                        <a learn_id="{{ $learn_text->id }}"
                                                                            href="javascript:void(0)"
                                                                            class="minus-btn-learn-old-data px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-minus-circle"></i></a>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif

                                            <div class="row mt-4">
                                                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="mt-3 rounded">
                                <div class="card-header" data-toggle="collapse" data-target="#collapseContent_6">
                                    <h5 class="card-title mb-0 py-2">
                                        <i class="fa fa-solid fa-plus"></i>
                                        Media Partner Section
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseContent_6">
                                    <div class="card-body">
                                        <form action="{{ route('backend.home_media_partner_section.update') }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mt-4">
                                                <div class="col-sm-12 ">
                                                    <label class=" form-control-label">Title:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->client_title }}"
                                                            name="client_title" class="form-control"
                                                            placeholder="Enter Title" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 rounded">
                                <div class="card-header" data-toggle="collapse" data-target="#collapseContent_7">
                                    <h5 class="card-title mb-0 py-2">
                                        <i class="fa fa-solid fa-plus"></i>
                                        Counting Section
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseContent_7">
                                    <div class="card-body">
                                        <form action="{{ route('backend.home_counting_section.update') }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mt-4">
                                                <div class="col-sm-12 ">
                                                    <label class=" form-control-label">Title:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->counting_title }}"
                                                            name="counting_title" class="form-control"
                                                            placeholder="Enter Title" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 mt-3">
                                                    <label class=" form-control-label">Text 1:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->count_text_1 }}"
                                                            name="count_text_1" class="form-control"
                                                            placeholder="Enter Text 1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mt-3">
                                                    <label class=" form-control-label">Count Number 1:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->count_num_1 }}"
                                                            name="count_num_1" class="form-control"
                                                            placeholder="Enter Number 1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mt-3">
                                                    <label class=" form-control-label">Text 2:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->count_text_2 }}"
                                                            name="count_text_2" class="form-control"
                                                            placeholder="Enter Text 2">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mt-3">
                                                    <label class=" form-control-label">Count Number 2:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->count_num_2 }}"
                                                            name="count_num_2" class="form-control"
                                                            placeholder="Enter Number 2">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mt-3">
                                                    <label class=" form-control-label">Text 3:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->count_text_3 }}"
                                                            name="count_text_3" class="form-control"
                                                            placeholder="Enter Text 3">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mt-3">
                                                    <label class=" form-control-label">Count Number 3:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->count_num_3 }}"
                                                            name="count_num_3" class="form-control"
                                                            placeholder="Enter Number 3">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mt-3">
                                                    <label class=" form-control-label">Text 4:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->count_text_4 }}"
                                                            name="count_text_4" class="form-control"
                                                            placeholder="Enter Text 4">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mt-3">
                                                    <label class=" form-control-label">Count Number 4:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->count_num_4 }}"
                                                            name="count_num_4" class="form-control"
                                                            placeholder="Enter Number 4">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 rounded">
                                <div class="card-header" data-toggle="collapse" data-target="#collapseContent_8">
                                    <h5 class="card-title mb-0 py-2">
                                        <i class="fa fa-solid fa-plus"></i>
                                        Testimonials Section
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseContent_8">
                                    <form action="{{ route('backend.home_testimonials_section.update') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">

                                            <div class="row mt-4">
                                                <div class="col-sm-6 ">
                                                    <label class=" form-control-label">Title 1:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->review_title1 }}"
                                                            name="review_title1" class="form-control"
                                                            placeholder="Enter Title" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 ">
                                                    <label class=" form-control-label">Title 2:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->review_title2 }}"
                                                            name="review_title2" class="form-control"
                                                            placeholder="Enter Title" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="mt-3 rounded">
                                <div class="card-header" data-toggle="collapse" data-target="#collapseContent_10">
                                    <h5 class="card-title mb-0 py-2">
                                        <i class="fa fa-solid fa-plus"></i>
                                        Question Section
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseContent_10">
                                    <form action="{{ route('backend.home_question_section.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row mt-4">

                                                <div class="col-sm-12 col-md-6 mt-3">
                                                    <label class="form-control-label">Image:</label>
                                                    <div class="dropify-wrapper" style="border: none">
                                                        <div class="dropify-loader"></div>
                                                        <div class="dropify-errors-container">
                                                            <ul></ul>
                                                        </div>
                                                        <input type="file" class="dropify" name="question_image"
                                                            accept="image/*" id="question_image_upload">
                                                        <button type="button" class="dropify-clear">Remove</button>
                                                        <div class="dropify-preview">
                                                            <span class="dropify-render"></span>
                                                            <div class="dropify-infos">
                                                                <div class="dropify-infos-inner">
                                                                    <p class="dropify-filename">
                                                                        <span class="file-icon"></span>
                                                                        <span class="dropify-filename-inner"></span>
                                                                    </p>
                                                                    <p class="dropify-infos-message">
                                                                        Drag and drop or click to replace
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                                                    <div class="px-3 mt-3">
                                                        <img src="{{ $home_content->question_image_show ?? asset('frontend/images/No-image.jpg') }}"
                                                            alt="" class="img-fluid"
                                                            style="border-radius: 10px; max-height: 200px !important;"
                                                            id="question_image_preview">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 mt-4">
                                                    <label class=" form-control-label">Title:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->question_title }}"
                                                            name="question_title" class="form-control"
                                                            placeholder="Enter Title" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 mt-4">
                                                    <label class=" form-control-label">Short Description:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <textarea type="text" name="ques_short_des" class="form-control" placeholder="Enter Title 1">{{ $home_content->ques_short_des }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mt-4">
                                                    <label class=" form-control-label">Button Text:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->question_button_text }}"
                                                            name="question_button_text" class="form-control"
                                                            placeholder="Enter Title 1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mt-4">
                                                    <label class=" form-control-label">Button URL:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->question_button_url }}"
                                                            name="question_button_url" class="form-control"
                                                            placeholder="Enter Title 1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="mt-3 rounded">
                                <div class="card-header" data-toggle="collapse" data-target="#collapseContent_11">
                                    <h5 class="card-title mb-0 py-2">
                                        <i class="fa fa-solid fa-plus"></i>
                                        Register Page Section
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseContent_11">
                                    <div class="card-body">
                                        <form action="{{ route('backend.home_register_section.update') }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mt-4">
                                                <div class="col-sm-12 col-md-6 mt-3">
                                                    <label class="form-control-label">Image:</label>
                                                    <div class="dropify-wrapper" style="border: none">
                                                        <div class="dropify-loader"></div>
                                                        <div class="dropify-errors-container">
                                                            <ul></ul>
                                                        </div>
                                                        <input type="file" class="dropify" name="register_image"
                                                            accept="image/*" id="register_image_upload">
                                                        <button type="button" class="dropify-clear">Remove</button>
                                                        <div class="dropify-preview">
                                                            <span class="dropify-render"></span>
                                                            <div class="dropify-infos">
                                                                <div class="dropify-infos-inner">
                                                                    <p class="dropify-filename">
                                                                        <span class="file-icon"></span>
                                                                        <span class="dropify-filename-inner"></span>
                                                                    </p>
                                                                    <p class="dropify-infos-message">
                                                                        Drag and drop or click to replace
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                                                    <div class="px-3 mt-3">
                                                        <img src="{{ $home_content->register_image_show ?? asset('frontend/images/No-image.jpg') }}"
                                                            alt="" class="img-fluid"
                                                            style="border-radius: 10px; max-height: 200px !important;"
                                                            id="register_image_preview">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 mt-4">
                                                    <label class=" form-control-label">Title:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text"
                                                            value="{{ $home_content->register_title }}"
                                                            name="register_title" class="form-control"
                                                            placeholder="Enter Title" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 mt-4">
                                                    <label class=" form-control-label">Short Description:<span
                                                            class="tx-danger"></span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <textarea type="text" name="register_des" class="form-control" placeholder="Enter Short Description">{{ $home_content->register_des }}</textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 rounded">
                                <div class="card-header" data-toggle="collapse" data-target="#footer_image_gallery">
                                    <h5 class="card-title mb-0 py-2">
                                        <i class="fa fa-solid fa-plus"></i>
                                        Footer Activity Gallery
                                    </h5>
                                </div>

                                <div class="collapse" id="footer_image_gallery">
                                    <form action="{{ route('backend.home_footer_activity_gallery.update') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="col-sm-12 mt-3">
                                                <div class="mg-t-10 mg-sm-t-0 add-data-content-footer_image">
                                                    @if (empty($footer_images))
                                                        <!-- Add Image Section -->
                                                        <div class="d-flex align-items-center mt-2 row">
                                                            <div class="col-sm-12 col-md-6 mt-3">
                                                                <label class="form-control-label">Add Image:</label>
                                                                <div class="dropify-wrapper" style="border: none">
                                                                    <div class="dropify-loader"></div>
                                                                    <div class="dropify-errors-container">
                                                                        <ul></ul>
                                                                    </div>
                                                                    <input type="file" class="dropify"
                                                                        name="footer_image[]" accept="image/*"
                                                                        id="footer_image_upload">
                                                                    <button type="button"
                                                                        class="dropify-clear">Remove</button>
                                                                    <div class="dropify-preview">
                                                                        <span class="dropify-render"></span>
                                                                        <div class="dropify-infos">
                                                                            <div class="dropify-infos-inner">
                                                                                <p class="dropify-filename">
                                                                                    <span class="file-icon"></span>
                                                                                    <span
                                                                                        class="dropify-filename-inner"></span>
                                                                                </p>
                                                                                <p class="dropify-infos-message">Drag
                                                                                    and drop or click to replace</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                                                                <div class="px-3 mt-3">
                                                                    <img src="{{ asset('frontend/images/No-image.jpg') }}"
                                                                        alt="" class="img-fluid"
                                                                        style="border-radius: 10px; max-height: 200px !important;"
                                                                        id="footer_image_preview">
                                                                </div>
                                                            </div>
                                                            <a id="plus-btn-data-content-footer_image"
                                                                href="javascript:void(0)"
                                                                class="plus-btn-data-content-footer_image px-1 p-0 m-0 ml-2"><i
                                                                    class="fas fa-plus"></i></a>
                                                        </div>
                                                    @else
                                                        @foreach ($footer_images as $k => $image)
                                                            <div class="d-flex align-items-center mt-2 row">
                                                                <input type="hidden"
                                                                    name="old_footer_image_{{ $k }}"
                                                                    value="{{ $image }}">
                                                                <div class="col-sm-12 col-md-6 mt-3">
                                                                    <label class="form-control-label">Edit
                                                                        Image:</label>
                                                                    <div class="dropify-wrapper"
                                                                        style="border: none">
                                                                        <div class="dropify-loader"></div>
                                                                        <div class="dropify-errors-container">
                                                                            <ul></ul>
                                                                        </div>
                                                                        <input type="file" class="dropify"
                                                                            name="footer_image[]" accept="image/*"
                                                                            id="footer_image_upload_{{ $k }}">
                                                                        <button type="button"
                                                                            class="dropify-clear">Remove</button>
                                                                        <div class="dropify-preview">
                                                                            <span class="dropify-render"></span>
                                                                            <div class="dropify-infos">
                                                                                <div class="dropify-infos-inner">
                                                                                    <p class="dropify-filename">
                                                                                        <span
                                                                                            class="file-icon"></span>
                                                                                        <span
                                                                                            class="dropify-filename-inner"></span>
                                                                                    </p>
                                                                                    <p class="dropify-infos-message">
                                                                                        Drag and drop or click
                                                                                        to replace</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                                                                    <div class="px-3 mt-3">
                                                                        <img src="{{ asset('upload/footer_image/' . $image) }}"
                                                                            alt="" class="img-fluid"
                                                                            style="border-radius: 10px; max-height: 200px !important;"
                                                                            id="footer_image_preview_{{ $k }}">
                                                                    </div>
                                                                </div>

                                                                @if ($k == count($footer_images) - 1)
                                                                    <a id="plus-btn-data-content-footer_image"
                                                                        href="javascript:void(0)"
                                                                        class="plus-btn-data-content-footer_image px-1 p-0 m-0 ml-2"><i
                                                                            class="fas fa-plus"></i></a>
                                                                @else
                                                                    <a home_content_footer_image_id="{{ $k }}"
                                                                        href="javascript:void(0)"
                                                                        class="minus-btn-data-old-footer_image px-1 p-0 m-0 ml-2"><i
                                                                            class="fas fa-minus-circle"></i></a>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('Backend.components.footer')
            </div>
        </div>
    </div>

    @include('Backend.components.script')

    <script src="{{ asset('backend/lib/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/dropify.js') }}"></script>

    @foreach ($footer_images as $k => $item)
        <script>
            $('#footer_image_upload_' + @json($k)).on('change', function(e) {
                var fileInput = $(this)[0];

                var closestInput = $(fileInput).parent().parent().parent().siblings().eq(0);
                closestInput.attr('name', 'footer_image[]');

                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#footer_image_preview_' + @json($k)).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(fileInput.files[0]);
                }
            });
        </script>
    @endforeach

    @foreach ($home_content_locations as $k => $item)
        <script>
            $('#location_image_upload_' + @json($k)).on('change', function(e) {
                var fileInput = $(this)[0];

                // var closestInput = $(fileInput).parent().parent().parent().siblings().eq(0);
                // closestInput.attr('name', 'old_location_image[]');

                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#location_image_preview_' + @json($k)).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(fileInput.files[0]);
                }
            });
        </script>
    @endforeach

    <script>
        $('.summernote').summernote({
            placeholder: 'Write something...',
            tabsize: 4,
            height: 150
        });

        $('#banner_image_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#banner_image_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
        $('#hero_slider_bg_1_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#hero_slider_bg_1_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
        $('#hero_slider_bg_2_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#hero_slider_bg_2_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
        $('#university_image_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#university_image_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
        $('#location_image_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#location_image_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
        $('#footer_image_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#footer_image_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
        $('#question_image_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#question_image_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
        $('#register_image_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#register_image_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
        $('#learn_image_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#learn_image_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
    </script>

    <script>
        $('#plus-btn-data-question').on('click', function() {
            var out = '<div class="row">' +
                '<div class="col-sm-5 mt-3">' +
                '<label class=" form-control-label">Button Text:<span class="tx-danger"></span></label>' +
                '<div class="mg-t-10 mg-sm-t-0">' +
                '<input  value="" type="text" name="home_content_ques[]" class="form-control" placeholder="Enter Text">' +
                '</div></div>' +
                ' <div class="col-sm-7 mt-3 d-flex align-items-center ">' +
                '<div style="width: 97%;">' +
                ' <label class=" form-control-label">Button URL:<span class="tx-danger"></span></label>' +
                ' <div class="mg-t-10 mg-sm-t-0">' +
                '<input type="text"  value="" name="home_content_ans[]" class="form-control" placeholder="Enter URL ">' +
                '</div>' +
                '</div><div>' +
                '<label class=" form-control-label"></label>' +
                '<a href="javascript:void(0)" class="minus-btn-question-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>' +
                '</div></div></div>';

            $('.add-question-data-show').append(out);

        });
        $(document).on('click', '.minus-btn-question-data', function() {
            $(this).parent().parent().parent().remove();
        });
        $(document).on('click', '.minus-btn-question-old-data', function() {
            $(this).parent().parent().parent().parent().append(
                "<input type='hidden' name='old_delete_faq_data[]' value='" + $(this).attr('faq_id') + "'>");
            $(this).parent().parent().parent().remove();
        });


        $('#plus-btn-data-content').on('click', function() {
            var timestamp = Date.now();

            var myvar = `
                <div class="d-flex align-items-center row">
                    <div class="col-11 row">
                        <div class="col-sm-12 col-md-6 mt-3">
                            <label class="form-control-label">
                                Image:</label>
                            <div class="dropify-wrapper" style="border: none">
                                <div class="dropify-loader"></div>
                                <div class="dropify-errors-container">
                                    <ul></ul>
                                </div>
                                <input type="file" class="dropify"
                                    name="location_image[]" accept="image/*"
                                    id="location_image_upload_${timestamp}" required>
                                <button type="button"
                                    class="dropify-clear">Remove</button>
                                <div class="dropify-preview">
                                    <span class="dropify-render"></span>
                                    <div class="dropify-infos">
                                        <div class="dropify-infos-inner">
                                            <p class="dropify-filename">
                                                <span class="file-icon"></span>
                                                <span
                                                    class="dropify-filename-inner"></span>
                                            </p>
                                            <p class="dropify-infos-message">
                                                Drag and drop or click to
                                                replace
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                            <div class="px-3 mt-3">
                                <img src="{{ asset('frontend/images/No-image.jpg') }}"
                                    alt="" class="img-fluid"
                                    style="border-radius: 10px; max-height: 190px !important;"
                                    id="location_image_preview_${timestamp}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-control-label"><b>Type:</b></label>
                        <div class="d-flex  align-items-center">
                            <select class="form-control form-control-lg on_change_u_lo_type"
                                name="type_loction_id[]" required>
                                <option value="">Select type</option>
                                <option value="1">Continent</option>
                                <option value="2">Country</option>
                                <option value="3">State</option>
                                <option value="4">City</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <label
                            class="form-control-label"><b>Location:</b></label>
                        <div class="d-flex  align-items-center">
                            <select class="form-control form-control-lg" id="location"
                                name="location_id[]" required>
                                <option value="">Select Location</option>
                            </select>
                        </div>
                    </div>
                    <a href="javascript:void(0)"
                        class="minus-btn-data-content px-1 p-0 m-0 ml-2"><i
                            class="fas fa-minus-circle"></i></a>
                </div>
            `;

            $('.add-data-content').prepend(myvar);
            $(`#location_image_upload_${timestamp}`).dropify();

            $(document).on('change', `#location_image_upload_${timestamp}`, function() {
                var fileInput = $(this)[0];

                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(`#location_image_preview_${timestamp}`).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(fileInput.files[0]);
                }
            });
        });
        $(document).on('click', '.minus-btn-data-content', function() {
            $(this).parent().remove();
        });
        $(document).on('click', '.minus-btn-data-old-audio', function() {
            $(this).parent().parent().append('<input type="hidden" name="delete_home_content_location[]" value="' +
                $(this).attr('home_content_location_id') + '">');
            $(this).parent().remove();
        });


        $('#plus-btn-data-content-footer_image').on('click', function() {
            var timestamp = Date.now();

            var myvar = `
                <div class="d-flex align-items-center mt-2 row">
                    <div class="col-sm-12 col-md-6 mt-3">
                        <label class="form-control-label">Add Image:</label>
                        <div class="dropify-wrapper" style="border: none">
                            <div class="dropify-loader"></div>
                            <div class="dropify-errors-container">
                                <ul></ul>
                            </div>
                            <input type="file" class="dropify"
                                name="footer_image[]" accept="image/*"
                                id="footer_image_upload_${timestamp}"> <!-- Unique ID -->
                            <button type="button"
                                class="dropify-clear">Remove</button>
                            <div class="dropify-preview">
                                <span class="dropify-render"></span>
                                <div class="dropify-infos">
                                    <div class="dropify-infos-inner">
                                        <p class="dropify-filename">
                                            <span class="file-icon"></span>
                                            <span
                                                class="dropify-filename-inner"></span>
                                        </p>
                                        <p class="dropify-infos-message">
                                            Drag and drop or click to replace
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                        <div class="px-3 mt-3">
                            <img src="{{ asset('frontend/images/No-image.jpg') }}"
                                alt="" class="img-fluid"
                                style="border-radius: 10px; max-height: 200px !important;"
                                id="footer_image_preview_${timestamp}"> <!-- Unique ID -->
                        </div>
                    </div>
                    <a href="javascript:void(0)"
                        class="minus-btn-data-content-footer_image px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"> </i></a>
                </div>
            `;
            $('.add-data-content-footer_image').prepend(myvar);
            $(`#footer_image_upload_${timestamp}`).dropify();

            $(document).on('change', `#footer_image_upload_${timestamp}`, function() {
                var fileInput = $(this)[0];

                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(`#footer_image_preview_${timestamp}`).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(fileInput.files[0]);
                }
            });
        });

        $(document).on('click', '.minus-btn-data-content-footer_image', function() {
            $(this).parent().remove();
        });
        $(document).on('click', '.minus-btn-data-old-footer_image', function() {
            $(this).parent().remove();
        });


        $('#plus-btn-data-tagline').on('click', function() {
            var myvar = '<div class="d-flex mt-3">' +
                '     <div class="" style="padding:10px;width: 97%;">' +
                '         <div class="row mt-3">' +
                '             <label class="col-sm-2 mt-3">Title</label>' +
                '             <div class="col-sm-10">' +
                '                 <input  value="" type="text" name="title[]" class="form-control" placeholder="Enter Title">' +
                '             </div>' +
                '             <label class="col-sm-2 mt-3">URL</label>' +
                '             <div class="col-sm-10 mt-2">' +
                '                 <input  value="" type="text" name="url[]" class="form-control" placeholder="Enter URL">' +
                '             </div>' +
                '             <label class="col-sm-2 mt-3">Description</label>' +
                '             <div class="col-sm-10 mt-2">' +
                '                 <textarea  value="" type="text" name="description[]" class="form-control" placeholder="Enter Short Description"></textarea>' +
                '            </div>' +
                '      </div>' +
                '   </div>' +
                '    <a href="javascript:void(0)" class="minus-btn-data-tagline px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>' +
                '</div>';

            $('.show-add-tagline-data').append(myvar);
            tagline++;
            $(this).focus();
        });
        $(document).on('click', '.minus-btn-data-tagline', function() {
            $(this).parent().remove();
        });
        $(document).on('click', '.minus-btn-learn-old-data', function() {
            $(this).parent().parent().parent().parent().append(
                "<input type='hidden' name='old_delete_learn_data[]' value='" + $(this).attr('learn_id') + "'>");
            $(this).parent().remove();
        });
    </script>

    <script>
        $(document).on('change', '.on_change_u_lo_type', function() {
            let id = $(this).val();
            let url = '{{ url('/get_location_u/') }}/' + id;

            let location = $(this).closest('.row').find('#location');

            $.ajax({
                url: url,
                type: 'GET',
                success: function(res) {
                    location.empty();

                    let html = '<option value="">Select Location</option>';
                    $.each(res, function(index, element) {
                        html += "<option value=" + element.id + ">" + element.name +
                        "</option>";
                    });

                    location.append(html);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
</body>

</html>
