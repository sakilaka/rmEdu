<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <title>{{ env('APP_NAME') }} | Theme Color</title>
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
                            {{ __('Theme Color') }}
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            @include('Backend.setting.appearance.theme_options_appearance_nav_tabs')
                        </div>

                        <div class="col-10">
                            <div class="tab-content tab-content-vertical bg-white rounded">
                                <div class="tab-pane fade show active" id="program-info-tab-content" role="tabpanel"
                                    aria-labelledby="home-tab-vertical">

                                    <form novalidate="" method="post"
                                        action="{{ route('backend.theme-options-color-save') }}" data-validate="parsley"
                                        id="DataEntry_formId" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Header Background Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="header_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['header_color'] == '' ? '#07477D' : $datalist['header_color'] }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Header Banner Background Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="header_banner_bg"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['header_banner_bg'] == '' ? '#102f25' : $datalist['header_banner_bg'] }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Header Text Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="header_text_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['header_text_color'] == '' ? '#07477D' : $datalist['header_text_color'] }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Menu Background Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="menu_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['menu_color'] == '' ? '#212529' : $datalist['menu_color'] }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Footer Color') }}<span class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="footer_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['footer_color'] ?: '#07477D' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Footer Text Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="footer_text_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['footer_text_color'] ?: '#fff' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Currency Background Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="currency_background_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['currency_background_color'] ?: '#07477D' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Currency Frontend Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="currency_frontend_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['currency_frontend_color'] ?: '#07477D' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Category Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="category_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['category_color'] ?: '#07477D' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Button Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="button2_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['button2_color'] ?: '#07477D' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Button Text Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="button2_text_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['button2_text_color'] ?: '#07477D' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Button Hover Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="button2_hover_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['button2_hover_color'] ?: '#0a58ca' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Button Border Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="button2_border_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['button2_border_color'] ?: '#07477D' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Button Hover Border Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="button2_hover_border_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['button2_hover_border_color'] ?: '#07477D' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Text Color') }}<span class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="text_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['text_color'] ?: '#fff' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Product Text Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="product_text_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['product_text_color'] ?: '#fff' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Dashboard Theme Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="theme_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['theme_color'] ?: '#1d2939' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Dashboard Theme Text Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="theme_text_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['theme_text_color'] ?: '#adb5bd' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Dashboard Theme Hover Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="theme_hover_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['theme_hover_color'] ?: '#18222f' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Seller Dashboard Background Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="seller_background_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['seller_background_color'] ?: '#1d2939' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Seller Dashboard Frontend Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="seller_frontend_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['seller_frontend_color'] ?: '#1d2939' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Seller Dashboard Text Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="seller_text_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['seller_text_color'] ?: '#adb5bd' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Package-1 Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="package1_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['package1_color'] ?: '#2D3B68' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Package-2 Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="package2_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['package2_color'] ?: '#223764' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Package Button Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="button1_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['button1_color'] ?: '#1bbc9d' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Package Button Hover Color') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="button1_hover_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['button1_hover_color'] ?: '#1bbc9d' }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label  class="font-weight-bold text-muted">{{ __('Footer News Letter') }}<span
                                                            class="red">*</span></label>
                                                    <div class="asColorPicker-wrap">
                                                        <input type="text" name="footer_news_color"
                                                            class="form-control color-picker asColorPicker-input"
                                                            value="{{ $datalist['footer_news_color'] ?: '#25171c' }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row tabs-footer mt-15">
                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="btn blue-btn btn-primary">Save</button>
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
    <script src="{{ asset('backend/assets/js/form-addons.js') }}"></script>
    <script src="{{ asset('backend/assets/js/formpickers.js') }}"></script>

</body>

</html>
