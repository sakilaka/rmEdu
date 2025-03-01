<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <title>{{ env('APP_NAME') }} | Student Application Program Edit</title>
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
                            Student Application Program Info Edit
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="{{ route('admin.student_appliction_list') }}" class="btn btn-primary btn-fw">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                View All Application</a>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            @include('Backend.student_appliction.theme_options_tabs_nav')
                        </div>

                        <div class="col-10">
                            <div class="tab-content tab-content-vertical bg-white rounded">
                                <div class="tab-pane fade show active" id="program-info-tab-content" role="tabpanel"
                                    aria-labelledby="home-tab-vertical">

                                    <form novalidate="" method="post"
                                        action="{{ route('admin.student_appliction_program_update', $s_appliction->id) }}"
                                        data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-lg-12 mb-2">
                                                <h4>Program Information</h4>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('Application ID:') }}</label>
                                                    <input disabled value="{{ $s_appliction->application_code }}"
                                                        type="text" name="facebook" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('User_id/Name:') }}</label>
                                                    <input disabled value="{{ @$s_appliction->student->name }}"
                                                        type="text" name="facebook" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('Program Name:') }}</label>

                                                    @foreach ($s_appliction->carts as $cart)
                                                        <input disabled value="{{ @$cart->course->name }}"
                                                            type="text" name="facebook" id="address"
                                                            class="form-control">
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('University Name:') }}</label>
                                                    @foreach ($s_appliction->carts as $cart)
                                                        <input disabled value="{{ @$cart->course->university->name }}"
                                                            type="text" name="facebook" id="address"
                                                            class="form-control">
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('University 1:') }}</label>
                                                    <select class="form-control" name="universityOne" id="">
                                                        <option value="">Select University</option>
                                                        @foreach ($university as $single)
                                                            <option value="{{ $single->name }} " {{ $single->name == $s_appliction->universityOne ? 'selected' : ''}}>{{ $single->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('Status 1:') }}</label>
                                                    <input value="{{ $s_appliction->statusOne }}"
                                                        type="text" name="statusOne" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('University 2:') }}</label>
                                                    <select class="form-control" name="universityTwo" id="">
                                                        <option value="">Select University</option>
                                                        @foreach ($university as $single)
                                                            <option value="{{ $single->name }} " {{ $single->name == $s_appliction->universityTwo ? 'selected' : ''}}>{{ $single->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('Status 2:') }}</label>
                                                    <input value="{{ $s_appliction->statusOne }}"
                                                        type="text" name="statusTwo" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('University 3:') }}</label>
                                                    <select class="form-control" name="universityThree" id="">
                                                        <option value="">Select University</option>
                                                        @foreach ($university as $single)
                                                            <option value="{{ $single->name }} " {{ $single->name == $s_appliction->universityThree ? 'selected' : ''}}>{{ $single->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('Status 3:') }}</label>
                                                    <input value="{{ $s_appliction->statusOne }}"
                                                        type="text" name="statusThree" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('Application Fee:') }}</label>
                                                    <input disabled value="{{ $s_appliction->application_fee }}"
                                                        type="text" name="facebook" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('Payment Status:') }}</label>
                                                    <select name="payment_status" class="form-control form-control-lg">
                                                        <option @if ($s_appliction->payment_status == 0) Selected @endif
                                                            value="0">Unpaid</option>
                                                        <option @if ($s_appliction->payment_status == 1) Selected @endif
                                                            value="1">Paid</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('Status:') }}</label>
                                                    @php
                                                        $statusLabels = [
                                                            0 => 'Not Complete',
                                                            1 => 'Processing',
                                                            2 => 'Approved',
                                                            3 => 'Cancel',
                                                            4 => 'Not Submitted',
                                                            5 => 'Submitted',
                                                            6 => 'Pending',
                                                            7 => 'E-documents Qualified',
                                                            8 => 'Waiting Processing',
                                                            9 => 'Processing',
                                                            10 => 'More Documents Needed',
                                                            11 => 'Re-Submitted',
                                                            12 => 'Rejected',
                                                            13 => 'Transferred',
                                                            14 => 'Accepted',
                                                            15 => 'E-offer Delivered',
                                                            16 => 'Offer Delivered',
                                                        ];
                                                    @endphp

                                                    <select name="status" class="form-control form-control-lg">
                                                        <option value="">Select Status</option>
                                                        @foreach ($statusLabels as $value => $label)
                                                            <option value="{{ $value }}"
                                                                @if ($s_appliction->status == $value) selected @endif>
                                                                {{ $label }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('Final destination:') }}</label>
                                                    <input name="final_destination" value="{{ $s_appliction->final_destination }}"
                                                        type="text" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('Applied by:') }}</label>
                                                    <input name="applied_by" value="{{ $s_appliction->applied_by }}"
                                                        type="text" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('Application Notice:') }}</label>
                                                    @if($s_appliction->application_notice)
                                                        <p class="my-2">
                                                            <a href="{{ asset('upload/application/' . $s_appliction->application_notice ) }}" target="_blank">
                                                                View Current File
                                                            </a>
                                                        </p>
                                                    @else
                                                        <p class="my-2">No file uploaded.</p>
                                                    @endif
                                                    <input type="file" name="application_file" class="form-control form-control-lg">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('Payment receipt:') }}</label>
                                                    @if($s_appliction->payment_receipt)
                                                        <p class="my-2">
                                                            <a href="{{ asset('upload/payment/' . $s_appliction->payment_receipt ) }}" target="_blank">
                                                                View Current File
                                                            </a>
                                                        </p>
                                                    @else
                                                        <p class="my-2">No file uploaded.</p>
                                                    @endif
                                                    <input type="file" name="payment_receipt" class="form-control form-control-lg">
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row tabs-footer mt-15">
                                            <div class="col-lg-12">
                                                <a href="{{ route('admin.student_appliction_list') }}"
                                                    class="btn blue-btn btn-danger">Cancel</a>
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
</body>

</html>
