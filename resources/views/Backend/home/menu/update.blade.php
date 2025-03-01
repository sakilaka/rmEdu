<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <title>{{ env('APP_NAME') }} | Edit Menu</title>
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
                            Edit Menu
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-9 m-auto grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample" action="{{ route('admin.update_menu', $menu->id) }}"
                                        method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="menu_type" class=" col-form-label">Menu Type</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-lg" name="menu_type"
                                                    id="menu_type" onchange="showCourseFields(this)">
                                                    <option value="header_menu"
                                                        @if ($menu->type == 'header_menu') Selected @endif>Header Menu
                                                    </option>
                                                    <option value="footer_menu"
                                                        @if ($menu->type == 'footer_menu') Selected @endif>Footer Menu
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="menu_name" class=" col-form-label">Menu Name</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input id="menu_name" type="text"
                                                    name="name" value="{{ $menu->name }}" class="form-control"
                                                    placeholder="Enter menu name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="menu_position" class=" col-form-label">Menu
                                                    Position</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="number" min="1"
                                                    max="99" name="position" class="form-control"
                                                    placeholder="Enter position" value="{{ $menu->position }}"
                                                    id="menu_position" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="page_url" class=" col-form-label">Page URL</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-lg" name="url"
                                                    id="page_url">
                                                    <option value="">Select Page</option>
                                                    <option value="about"
                                                        @if ($menu->url == 'about') Selected @endif>about page
                                                    </option>
                                                    <option value="learner"
                                                        @if ($menu->url == 'learner') Selected @endif>learnar page
                                                    </option>
                                                    <option value="instructor"
                                                        @if ($menu->url == 'instructor') Selected @endif>consultant
                                                        page</option>
                                                    <option value="contact"
                                                        @if ($menu->url == 'contact') Selected @endif>contact page
                                                    </option>
                                                    <option value="library"
                                                        @if ($menu->url == 'library') Selected @endif>library page
                                                    </option>
                                                    <option value="event-list"
                                                        @if ($menu->url == 'event-list') Selected @endif>event page
                                                    </option>
                                                    <option value="blogs"
                                                        @if ($menu->url == 'blogs') Selected @endif>blogs page
                                                    </option>

                                                    <option value="faqs"
                                                        @if ($menu->url == 'faqs') Selected @endif>faq</option>
                                                    <option value="privacy-policy"
                                                        @if ($menu->url == 'privacy-policy') Selected @endif>privacy
                                                        policy</option>
                                                    <option value="refund-policy"
                                                        @if ($menu->url == 'refund-policy') Selected @endif>refund
                                                        policy</option>
                                                    <option value="terms-conditions"
                                                        @if ($menu->url == 'terms-conditions') Selected @endif>terms &
                                                        conditions</option>
                                                    <option value="course_list"
                                                        @if ($menu->url == 'course_list') Selected @endif>admission
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="masterCourseFields" class="courseFields d-none">
                                            <div class="form-group row">
                                                <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                    <label for="column_number" class=" col-form-label">Column
                                                        Number</label>
                                                    <p>:</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="form-control form-control-lg" name="column_num"
                                                        id="column_number">
                                                        <option value="">Select Column</option>
                                                        <option value="1"
                                                            @if ($menu->column_num == '1') Selected @endif>1
                                                        </option>
                                                        <option value="2"
                                                            @if ($menu->column_num == '2') Selected @endif>2
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary mr-2">Update</button>
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

    <script>
        function showCourseFields() {
            if ($('#menu_type').val() == "header_menu") {
                $('#masterCourseFields').removeClass('d-block').addClass('d-none');
            } else {
                console.log(false);
                $('#masterCourseFields').removeClass('d-none').addClass('d-block');
            }
        }
    </script>
</body>

</html>
