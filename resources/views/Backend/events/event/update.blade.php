<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/summernote/dist/summernote-bs4.css') }}">
    <title>{{ env('APP_NAME') }} | Edit Event</title>
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
                            Edit Event
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="{{ route('admin.event.index') }}" class="btn btn-primary btn-fw">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                View All</a>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-md-12 m-auto grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample" action="{{ route('admin.event.update', $events->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="row">
                                                    <div class="col-sm-12 mb-2">
                                                        <h4>Event Details</h4>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Event
                                                                Photo <span class="text-danger"
                                                                    style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                            <div class="dropify-wrapper" style="border: none">
                                                                <div class="dropify-loader"></div>
                                                                <div class="dropify-errors-container">
                                                                    <ul></ul>
                                                                </div>
                                                                <input type="file" class="dropify" name="image"
                                                                    accept="image/*" id="avatar_upload">
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
                                                    </div>
                                                    <div
                                                        class="col-sm-6 d-flex justify-content-center align-items-center">
                                                        <div class="px-3">
                                                            <img src="{{ $events->image_show ?? asset('frontend/images/No-image.jpg') }}"
                                                                alt="" class="img-fluid"
                                                                style="border-radius: 10px; max-height: 200px !important;"
                                                                id="avatar_preview">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Event Name:
                                                        <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="Enter Event Name" value="{{ $events->name }}"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Category:<span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" name="category_id"
                                                        id="cat">
                                                        <option value="">Select Category</option>
                                                        @foreach ($categorys as $category)
                                                            <option @if ($category->id == $events->category_id) Selected @endif
                                                                value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Start Date:
                                                        <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="date" name="startdate"
                                                            value="{{ $events->startdate }}" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">End Date:
                                                        <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="date" name="enddate"
                                                            value="{{ $events->enddate }}" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Recording:<span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" name="recording">
                                                        <option value="">Select Recording</option>
                                                        <option @if ($events->recording == '1') Selected @endif
                                                            value="1">Yes</option>
                                                        <option @if ($events->recording == '0') Selected @endif
                                                            value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Event Language:<span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" name="language_id">
                                                        <option value="">Select Language</option>
                                                        @foreach ($languages as $language)
                                                            <option @if ($language->id == $events->language_id) Selected @endif
                                                                value="{{ $language->id }}">{{ $language->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Event Fee:
                                                        <span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="number" name="fee" class="form-control"
                                                            placeholder="Event Fee" value="{{ $events->fee }}"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Event Release:<span class="text-danger"
                                                            style="font-size: 1.25rem; line-height:0;">*</span></label>
                                                    <select class="form-control form-control-lg" name="release_id">
                                                        <option value="">Select Release</option>
                                                        <option @if ($events->release_id == '0') Selected @endif
                                                            value="0">Passed Event</option>
                                                        <option @if ($events->release_id == '1') Selected @endif
                                                            value="1">Upcoming Event </option>
                                                        <option @if ($events->release_id == '2') Selected @endif
                                                            value="1">Live Event </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Organization Name:</label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text" name="organization_name"
                                                            class="form-control"
                                                            value="{{ $events->organization_name }}"
                                                            placeholder="Organization Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Location:</label>
                                                    <div class="mg-t-10 mg-sm-t-0">
                                                        <input type="text" name="location" class="form-control"
                                                            placeholder="Location" value="{{ $events->location }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Requisites :</label>
                                                    <div class="mg-t-10 mg-sm-t-0 add-data">
                                                        @if ($events->courserequisites->count() == 0)
                                                            <div class="d-flex align-items-center mt-2">
                                                                <div class="d-flex align-items-center select-add-section"
                                                                    style="width: 97%;">
                                                                    <input type="text" name="requisites[]"
                                                                        value="{{ old('requisites') }}"
                                                                        class="form-control"
                                                                        placeholder="Enter Pre Requisites">
                                                                </div>
                                                                <a id="plus-btn-data" href="javascript:void(0)"
                                                                    class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                        class="fas fa-plus"></i></a>
                                                            </div>
                                                        @else
                                                            @foreach ($events->courserequisites as $k => $courserequisite)
                                                                <div class="d-flex align-items-center mt-2">
                                                                    <div class="d-flex align-items-center select-add-section"
                                                                        style="width: 97%;">
                                                                        <input type="text"
                                                                            name="old_requisites[{{ $courserequisite->id }}]"
                                                                            value="{{ $courserequisite->name }}"
                                                                            class="form-control"
                                                                            placeholder="Enter Pre Requisites">
                                                                    </div>
                                                                    @if ($k == $events->courserequisites->count() - 1)
                                                                        <a id="plus-btn-data"
                                                                            href="javascript:void(0)"
                                                                            class="plus-btn-data px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-plus"></i></a>
                                                                    @else
                                                                        <a courserequisite_id="{{ $courserequisite->id }}"
                                                                            href="javascript:void(0)"
                                                                            class="minus-btn-data-old px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-minus-circle"></i></a>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Program Learn :</label>
                                                    <div class="mg-t-10 mg-sm-t-0 add-data-learn">
                                                        @if ($events->courselearns->count() == 0)
                                                            <div class="d-flex align-items-center mt-2">
                                                                <div class="d-flex align-items-center select-add-section"
                                                                    style="width: 97%;">
                                                                    <input type="text" name="course_learn[]"
                                                                        value="{{ old('course_learn') }}"
                                                                        class="form-control"
                                                                        placeholder="Enter Program Learn">
                                                                </div>
                                                                <a id="plus-btn-data-learn" href="javascript:void(0)"
                                                                    class="plus-btn-data-learn px-1 p-0 m-0 ml-2"><i
                                                                        class="fas fa-plus"></i></a>
                                                            </div>
                                                        @else
                                                            @foreach ($events->courselearns as $k => $courselearn)
                                                                <div class="d-flex align-items-center mt-2">
                                                                    <div class="d-flex align-items-center select-add-section"
                                                                        style="width: 97%;">
                                                                        <input type="text"
                                                                            name="old_course_learn[{{ $courselearn->id }}]"
                                                                            value="{{ $courselearn->name }}"
                                                                            class="form-control"
                                                                            placeholder="Enter Program Learn">
                                                                    </div>
                                                                    @if ($k == $events->courselearns->count() - 1)
                                                                        <a id="plus-btn-data-learn"
                                                                            href="javascript:void(0)"
                                                                            class="plus-btn-data-learn px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-plus"></i></a>
                                                                    @else
                                                                        <a courselearn_id="{{ $courselearn->id }}"
                                                                            href="javascript:void(0)"
                                                                            class="minus-btn-data-old-learn px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-minus-circle"></i></a>
                                                                    @endif

                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Event Schedule :</label>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <tr class="text-center bg-primary text-white">
                                                                <th>Name</th>
                                                                <th class="text-center">Partner</th>
                                                                <th>Days</th>
                                                                <th>Date</th>
                                                                <th>Start Time</th>
                                                                <th>End Time</th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="mg-t-10 mg-sm-t-0 add-data-schedule">
                                                        @if ($events->eventschedules->count() == 0)
                                                            <div class="d-flex align-items-center mt-2">
                                                                <div class="d-flex align-items-center select-add-section"
                                                                    style="width: 97%;">
                                                                    <input type="text" name="schedulename[]"
                                                                        class="mr-1 form-control"
                                                                        placeholder="Enter name">
                                                                    <select class="form-control form-control-lg"
                                                                        name="instrutor_id[]">
                                                                        <option>select speakers</option>
                                                                        @foreach ($instrutors as $instrutor)
                                                                            <option value="{{ $instrutor->id }}">
                                                                                {{ $instrutor->name }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    <select class="form-control form-control-lg ml-1"
                                                                        name="day_id[]">
                                                                        <option>Select Day</option>
                                                                        @php
                                                                            $days = [];
                                                                            for ($i = 1; $i <= 31; $i++) {
                                                                                $days[] = $i;
                                                                            }
                                                                        @endphp
                                                                        @foreach ($days as $item)
                                                                            <option value="{{ $item }}">
                                                                                Day {{ $item }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="date" name="scheduledate[]"
                                                                        class="ml-1 form-control"
                                                                        placeholder="Start Time">
                                                                    <input type="time" name="schedulestart_time[]"
                                                                        class="ml-1 form-control"
                                                                        placeholder="Start Time">
                                                                    <input type="time" name="scheduleend_time[]"
                                                                        class="ml-1 form-control"
                                                                        placeholder="Start Time">
                                                                </div>

                                                                <a id="plus-btn-data" href="javascript:void(0)"
                                                                    class="plus-btn-data-schedule px-1 p-0 m-0 ml-2"><i
                                                                        class="fas fa-plus"></i></a>
                                                            </div>
                                                        @else
                                                            @foreach ($events->eventschedules as $k => $eventschedule)
                                                                <div class="d-flex align-items-center mt-2">
                                                                    <div class="d-flex align-items-center select-add-section"
                                                                        style="width: 97%;">
                                                                        <input type="text"
                                                                            name="old_schedulename[{{ $eventschedule->id }}]"
                                                                            class="mr-1 form-control"
                                                                            placeholder="Enter name"
                                                                            value="{{ $eventschedule->schedulename }}">
                                                                        <select class="form-control form-control-lg"
                                                                            name="old_instrutor_id[{{ $eventschedule->id }}]">
                                                                            <option>Select speakers</option>
                                                                            @foreach ($instrutors as $instrutor)
                                                                                <option
                                                                                    @if ($instrutor->id == $eventschedule->instrutor_id) Selected @endif
                                                                                    value="{{ $instrutor->id }}">
                                                                                    {{ $instrutor->name }}</option>
                                                                            @endforeach
                                                                        </select>

                                                                        <select
                                                                            class="form-control form-control-lg ml-1"
                                                                            name="old_day_id[{{ $eventschedule->id }}]">
                                                                            <option>Select Day</option>
                                                                            @php
                                                                                $days = [];
                                                                                for ($i = 1; $i <= 31; $i++) {
                                                                                    $days[] = $i;
                                                                                }
                                                                            @endphp
                                                                            @foreach ($days as $item)
                                                                                <option value="{{ $item }}"
                                                                                    @if ($eventschedule->day_id == $item) Selected @endif>
                                                                                    Day {{ $item }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>

                                                                        <input type="date"
                                                                            name="old_scheduledate[{{ $eventschedule->id }}]"
                                                                            value="{{ $eventschedule->scheduledate }}"
                                                                            class="ml-1 form-control"
                                                                            placeholder="Start Time">
                                                                        <input type="time"
                                                                            name="old_schedulestart_time[{{ $eventschedule->id }}]"
                                                                            value="{{ $eventschedule->schedulestart_time }}"
                                                                            class="ml-1 form-control"
                                                                            placeholder="Start Time">
                                                                        <input type="time"
                                                                            name="old_scheduleend_time[{{ $eventschedule->id }}]"
                                                                            value="{{ $eventschedule->scheduleend_time }}"
                                                                            class="ml-1 form-control"
                                                                            placeholder="Start Time">


                                                                    </div>
                                                                    @if ($k == $events->eventschedules->count() - 1)
                                                                        <a id="plus-btn-data"
                                                                            href="javascript:void(0)"
                                                                            class="plus-btn-data-schedule px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-plus"></i></a>
                                                                    @else
                                                                        <a eventschedule_id="{{ $eventschedule->id }}"
                                                                            href="javascript:void(0)"
                                                                            class="minus-btn-data-old-schedule px-1 p-0 m-0 ml-2"><i
                                                                                class="fas fa-minus-circle"></i></a>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mt-3">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea type="text" id="summernote" name="about" class="form-control" placeholder="Enter description">{!! $events->about !!}</textarea>
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

    <script src="{{ asset('backend/lib/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Write something...',
            tabsize: 4,
            height: 150
        });
    </script>
    <script src="{{ asset('backend/assets/js/dropify.js') }}"></script>
    <script>
        $('#avatar_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#avatar_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
    </script>

    <script>
        $('.plus-btn-data-schedule').on('click', function() {

            let mySchedule = `
                <div class="d-flex align-items-center mt-2">
                    <div class="d-flex align-items-center select-add-section"
                        style="width: 97%;">
                        <input type="text" name="schedulename[]"
                            class="mr-1 form-control" placeholder="Event Name" required>
                        <select class="form-control form-control-lg"
                            name="instrutor_id[]" required>
                            <option>Select Speakers</option>
                            @foreach ($instrutors as $instrutor)
                                <option value="{{ $instrutor->id }}">
                                    {{ $instrutor->name }}</option>
                            @endforeach
                        </select>
                        <select class="form-control form-control-lg ml-1"
                            name="day_id[]" required>
                            <option>Select Day</option>
                            @php
                                $days = [];
                                for ($i = 1; $i <= 31; $i++) {
                                    $days[] = $i;
                                }
                            @endphp
                            @foreach ($days as $item)
                                <option value="{{ $item }}">
                                    Day {{ $item }}
                                </option>
                            @endforeach
                        </select>
                        <input type="date" name="scheduledate[]"
                            class="ml-1 form-control" required>
                        <input type="time" name="schedulestart_time[]"
                            class="ml-1 form-control" required>
                        <input type="time" name="scheduleend_time[]"
                            class="ml-1 form-control">
                    </div>

                    <a href="javascript:void(0)"
                        class="minus-btn-data-schedule px-1 p-0 m-0 ml-2"><i
                            class="fas fa-minus"></i></a>
                </div>
            `;

            $('.add-data-schedule').append(mySchedule);
        });
        $(document).on('click', '.minus-btn-data-schedule', function() {
            $(this).parent().remove();
        });
        $(document).on('click', '.minus-btn-data-old-schedule ', function() {
            $(this).parent().parent().append('<input type="hidden" name="delete_eventschedule[]" value="' + $(this)
                .attr('eventschedule_id') + '">');
            $(this).parent().remove();
        });
    </script>

    <script>
        //Course Pre Requisites start
        $('#plus-btn-data').on('click', function() {

            var myvar = '<div class="d-flex align-items-center mt-2">' +
                ' <div class="d-flex align-items-center select-add-section" style="width: 97%;">' +
                '   <input type="text" name="requisites[]" class="form-control" placeholder="Enter Pre Requisites">' +
                '' +
                '' +
                '</div>' +
                '' +
                '  <a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>' +
                '</div>';

            $('.add-data').prepend(myvar);
        });
        $(document).on('click', '.minus-btn-data', function() {
            $(this).parent().remove();
        });
        $(document).on('click', '.minus-btn-data-old', function() {
            $(this).parent().parent().append('<input type="hidden" name="delete_courserequisite[]" value="' + $(
                this).attr('courserequisite_id') + '">');
            $(this).parent().remove();
        });
        //Course Pre Requisites End

        //Course What Will I Learn start
        $('#plus-btn-data-learn').on('click', function() {

            var myvar = '<div class="d-flex align-items-center mt-2">' +
                ' <div class="d-flex align-items-center select-add-section" style="width: 97%;">' +
                '   <input type="text" name="course_learn[]" class="form-control" placeholder="Enter Program Learn">' +
                '' +
                '' +
                '</div>' +
                '' +
                '  <a href="javascript:void(0)" class="minus-btn-data-learn px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>' +
                '</div>';

            $('.add-data-learn').prepend(myvar);
        });
        $(document).on('click', '.minus-btn-data-learn', function() {
            $(this).parent().remove();
        });
        $(document).on('click', '.minus-btn-data-old-learn', function() {
            $(this).parent().parent().append('<input type="hidden" name="delete_learn[]" value="' + $(this).attr(
                'courselearn_id') + '">');
            $(this).parent().remove();
        });
        //Course What Will I Learn End
    </script>
</body>

</html>
