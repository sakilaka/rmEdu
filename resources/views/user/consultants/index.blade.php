@extends('user.layouts.master-layout')
@section('head')
@section('title', '- Manage Student')

@endsection
@section('main_content')

<div class="right_section">
    <div>
        <h3>Manage Application</h3>
    </div>
</div>


<div class="row  mb-3">
    <div class="col-sm-4">
        <label class=" form-control-label"><b>Payment Status</b></label>
        <select class="form-control form-control-lg form-select" id="filter_payment_status" name="continent_id" required>
            <option value="">Select Payment Status</option>
            <option value="Paid">Paid</option>
            <option value="Not Paid">Not Paid</option>
        </select>
    </div>
    <div class="col-sm-4">
        <label class=" form-control-label"><b>Application Status</b></label>
        <select class="form-control form-control-lg form-select" id="filter_application_status"
            name="filter_application_status" required>
            <option value="">Select Application Status</option>
            <option value="Not Complete">Not Complete</option>
            <option value="Processing">Processing</option>
            <option value="Approved">Approved</option>
            <option value="Cancel">Cancel</option>
            <option value="Not Submitted">Not Submitted</option>
            <option value="Submitted">Submitted</option>
            <option value="Pending">Pending</option>
            <option value="E-documents Qualified">E-documents Qualified</option>
            <option value="Waiting Processing">Waiting Processing</option>
            <option value="Processing">Processing</option>
            <option value="More Documents Needed">More Documents Needed</option>
            <option value="Re-Submitted">Re-Submitted</option>
            <option value="Rejected">Rejected</option>
            <option value="Transferred">Transferred</option>
            <option value="Accepted">Accepted</option>
            <option value="E-offer Delivered">E-offer Delivered</option>
            <option value="Offer Delivered">Offer Delivered</option>
        </select>
    </div>
</div>

<div style="overflow-x:auto;">
    <table id="application-datasources" class="table table-striped mt-3">
        <thead>
            <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
                <th scope="col">Appliction ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Application Date</th>
                <th scope="col no-sort">Paid Status</th>
                <th scope="col no-sort">Status</th>
                <th scope="col no-sort">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
                <tr>
                    <td class="text-center sorting_1">{{ $application->application_code }}</td>
                    <td>
                        {{ $application->first_name . ' ' . $application->middle_name . ' ' . $application->last_name }}
                    </td>
                    <td>{{ $application->phone }}</td>
                    <td>{{ date('d M, Y', strtotime($application->created_at)) }}</td>
                    <td class="text-center">{{ $application->payment_status == 1 ? 'Paid' : 'Unpaid' }}</td>
                    <td>
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
                        {{ $statusLabels[$application->status] }}
                    </td>
                    <td class="text-center">
                        <button style="margin-bottom: 2px; background-color: #448bff; color: #fff; margin: 1px"
                            type="button" data-toggle="modal" data-target="#certificateModal2" class="btn">
                            <i class="fa-solid fa-edit"></i>
                        </button>
                        <a style="margin-bottom: 2px; background-color: #448bff; color: #fff; margin: 1px"
                            href="{{ route('frontend.application-details', ['id' => $application->id]) }}"
                            class="btn"><i class="fa-duotone fa fa-eye"></i>
                        </a>
                        <button class="btn delete-button" style="background-color: #448bff; color: #fff; margin: 1px"
                            courseid="{{ $application->id }}">
                            <i class="icon fa fa-trash tx-28"></i>
                        </button>
                        <a class="btn" style="background-color: #448bff; color: #fff; margin: 1px"
                            href="{{ route('consultent.application-form-download', ['id' => $application->id]) }}"><i
                                class="fa fa-solid fa-download"></i>
                        </a>
                        <a class="btn" style="background-color: #448bff; color: #fff; margin: 1px"
                            href="{{ route('consultent.student_appliction_edit', ['id' => $application->id]) }}"><i
                                class="fa-solid fa-file-pen"></i>
                        </a>

                        <div class="modal fade" id="certificateModal2" tabindex="-1" role="dialog"
                            aria-labelledby="audioModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="modal">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="audioModalLabel" style="color: black">
                                            Application
                                            ID: {{ $application->application_code }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form
                                        action="{{ route('frontend.application-status', ['id' => $application->id]) }}"
                                        method="post">
                                        <input type="hidden" name="_token"
                                            value="h5FBi37Zxc3Lq9Wneyu7ZKUEDAmU9Wtjgw44ZOPE" autocomplete="off">
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <label class="title"><b>Change Status</b></label>
                                                <select name="status" class="form-control">

                                                    <option value="1"
                                                        @if ($application->status == 1) selected @endif>
                                                        Processing
                                                    </option>
                                                    <option value="2"
                                                        @if ($application->status == 2) selected @endif>
                                                        Approved
                                                    </option>
                                                    <option value="3"
                                                        @if ($application->status == 3) selected @endif>
                                                        Cancel
                                                    </option>
                                                    <option value="4"
                                                        @if ($application->status == 4) selected @endif>
                                                        Not Submitted
                                                    </option>
                                                    <option value="5"
                                                        @if ($application->status == 5) selected @endif>S
                                                        ubmitted
                                                    </option>
                                                    <option value="6"
                                                        @if ($application->status == 6) selected @endif>
                                                        Pending
                                                    </option>
                                                    <option value="7"
                                                        @if ($application->status == 7) selected @endif>
                                                        E-documents Qualified
                                                    </option>
                                                    <option value="8"
                                                        @if ($application->status == 8) selected @endif>
                                                        Waiting Processing
                                                    </option>
                                                    <option value="9"
                                                        @if ($application->status == 9) selected @endif>
                                                        Processing
                                                    </option>
                                                    <option value="10"
                                                        @if ($application->status == 10) selected @endif>
                                                        More Documents Needed
                                                    </option>
                                                    <option value="11"
                                                        @if ($application->status == 11) selected @endif>
                                                        Re-Submitted
                                                    </option>
                                                    <option value="12"
                                                        @if ($application->status == 12) selected @endif>
                                                        Rejected
                                                    </option>
                                                    <option value="13"
                                                        @if ($application->status == 13) selected @endif>
                                                        Transferred
                                                    </option>
                                                    <option value="14"
                                                        @if ($application->status == 14) selected @endif>
                                                        Accepted
                                                    </option>
                                                    <option value="15"
                                                        @if ($application->status == 15) selected @endif>
                                                        E-offer Delivered
                                                    </option>
                                                    <option value="16"
                                                        @if ($application->status == 16) selected @endif>
                                                        Offer Delivered
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="delete-modal" class="modal">
    <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <form action="{{ route('consultent.student_appliction_delete') }}" method="post">
                    @csrf
                    <h4 class="tx-semibold mg-b-20 mt-2 ">Are you sure! you want to delete this?</h4>
                    <input type="hidden" value="{{ @$application->id }}" name="s_appliction_id" id="order_id">
                    <button type="submit"
                        class="btn btn-danger mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20"
                        id="confirm-yes">
                        yes
                    </button>
                    <button type="button"
                        class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20"
                        id="confirm-no">
                        No
                    </button>
                </form>
            </div><!-- modal-body -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div>

<script>
    $(".delete-button").click(function() {
        $("#delete-modal").show();
        $("#course_id").val($(this).attr('courseId'))

    });
    $("#confirm-no").click(function() {
        $("#delete-modal").hide();
    });
    $("#confirm-yes").click(function() {
        $("#delete-modal").hide();
    });

    $('.btn[data-target="#certificateModal2"]').click(function() {
        $('#certificateModal2').modal('show');
    });
</script>

<script>
    $('#filter_payment_status, #filter_application_status').change(function() {
        var paymentStatus = $('#filter_payment_status').val();
        var applicationStatus = $('#filter_application_status').val();

        $('#application-datasources tbody tr').hide();

        $('#application-datasources tbody tr').each(function() {
            var paymentStatusCell = $(this).find('td:nth-child(5)').text().trim();
            var applicationStatusCell = $(this).find('td:nth-child(6)').text().trim();

            if ((paymentStatus == '' || paymentStatus == paymentStatusCell) &&
                (applicationStatus == '' || applicationStatus == applicationStatusCell)) {
                $(this).show();
            }
        });
    });
</script>
@endsection
