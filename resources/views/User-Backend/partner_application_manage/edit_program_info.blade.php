<!DOCTYPE html>
<html lang="en">

<head>
    @include('User-Backend.components.head')
    <title>{{ env('APP_NAME') }} | Student Application Program Edit</title>
</head>

<body>
    <div class="container-scroller">
        @include('User-Backend.components.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('User-Backend.components.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            Student Application Program Info Edit
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="{{ route('frontend.manage_consultant_application') }}"
                                class="btn btn-primary btn-fw">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                View All Application</a>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            @include('User-Backend.partner_application_manage.partner_application_edit_nav')
                        </div>

                        <div class="col-10">
                            <div class="tab-content tab-content-vertical bg-white rounded">
                                <div class="tab-pane fade show active" id="program-info-tab-content" role="tabpanel"
                                    aria-labelledby="home-tab-vertical">

                                    <form novalidate="" method="post"
                                        action="{{ route('consultent.student_appliction_program_update', $s_appliction->id) }}"
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
                                                    <label for="address">{{ __('Application Fee:') }}</label>
                                                    <input disabled value="{{ $s_appliction->application_fee }}"
                                                        type="text" name="facebook" id="address"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="payment_status">{{ __('Payment Status:') }}</label>
                                                    <select name="payment_status" class="form-control form-control-lg">
                                                        <option @if ($s_appliction->payment_status == 0) Selected @endif
                                                            value="0"> Unpaid</option>
                                                        <option @if ($s_appliction->payment_status == 1) Selected @endif
                                                            value="1"> Paid</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="status">{{ __('Status:') }}</label>
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


                                        </div>

                                        <div class="row tabs-footer mt-15">
                                            <div class="col-lg-12">
                                                <a href="{{ route('frontend.manage_consultant_application') }}"
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

                @include('User-Backend.components.footer')
            </div>
        </div>
    </div>

    @include('User-Backend.components.script')
</body>

</html>
