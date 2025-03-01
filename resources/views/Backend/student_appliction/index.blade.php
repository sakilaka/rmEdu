<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <title>{{ env('APP_NAME') }} | All Students Appliction List</title>

    <link rel="stylesheet" href="{{ asset('backend/assets/css/rowGroup.min.css') }}">
    <style>
        .fs-09 {
            font-size: 0.9rem !important
        }
    </style>
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
                            All Students Appliction List
                        </h3>

                        <nav aria-label="breadcrumb">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary-bg" data-toggle="modal"
                                    data-target="#manage_fields_modal">Manage Fields</button>

                                <button class="btn btn-primary-bg ml-3" data-toggle="modal"
                                    data-target="#manage_filters_modal">Manage Filters</button>

                                <select name="study_fund" class="form-control form-control-lg ml-3"
                                    id="study_fund_type">
                                    <option value="">Select Fund Type</option>
                                    <option value="all" @if ($study_fund_type && $study_fund_type == 'all') selected @endif>
                                        All
                                    </option>
                                    <option value="Self finance" @if ($study_fund_type && $study_fund_type == 'Self finance') selected @endif>Self
                                        finance
                                    </option>
                                    <option
                                        value="Chinese Government Scholarship"@if ($study_fund_type && $study_fund_type == 'Chinese Government Scholarship') selected @endif>
                                        Chinese Govt. Scholarship
                                    </option>
                                    <option
                                        value="Part scholarship part self financed"@if ($study_fund_type && $study_fund_type == 'Part scholarship part self financed') selected @endif>
                                        Part scholarship part...
                                    </option>
                                </select>

                                @if (isset($table_manipulate_data['application_status']) && $table_manipulate_data['application_status'] == 'on')
                                    <select name="status_filter" id="status_filter"
                                        class="ml-3 form-control form-control-lg">
                                        <option value="">Select Status</option>
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
                                        @foreach ($statusLabels as $key => $status)
                                            <option value="{{ $status }}">{{ $status }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </nav>
                    </div>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="application_table" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-left">SL</th>
                                        @if (isset($table_manipulate_data['application_code']) && $table_manipulate_data['application_code'] == 'on')
                                            <th>Code</th>
                                        @endif
                                        @if (isset($table_manipulate_data['student_name']) && $table_manipulate_data['student_name'] == 'on')
                                            <th>Student</th>
                                        @endif
                                        @if (isset($table_manipulate_data['passport_number']) && $table_manipulate_data['passport_number'] == 'on')
                                            <th>Passport</th>
                                        @endif
                                        @if (isset($table_manipulate_data['program_name']) && $table_manipulate_data['program_name'] == 'on')
                                            <th>Program Name</th>
                                        @endif
                                        @if (isset($table_manipulate_data['universityOne']) && $table_manipulate_data['universityOne'] == 'on')
                                            <th>University One</th>
                                        @endif
                                        @if (isset($table_manipulate_data['universityTwo']) && $table_manipulate_data['universityTwo'] == 'on')
                                            <th>University Two</th>
                                        @endif
                                        @if (isset($table_manipulate_data['universityThree']) && $table_manipulate_data['universityThree'] == 'on')
                                            <th>University Three</th>
                                        @endif
                                        @if (isset($table_manipulate_data['statusOne']) && $table_manipulate_data['statusOne'] == 'on')
                                            <th>Status One</th>
                                        @endif
                                        @if (isset($table_manipulate_data['statusTwo']) && $table_manipulate_data['statusTwo'] == 'on')
                                            <th>Status Two</th>
                                        @endif
                                        @if (isset($table_manipulate_data['statusThree']) && $table_manipulate_data['statusThree'] == 'on')
                                            <th>Status Three</th>
                                        @endif
                                        @if (isset($table_manipulate_data['university_name']) && $table_manipulate_data['university_name'] == 'on')
                                            <th>University</th>
                                        @endif
                                        @if (isset($table_manipulate_data['application_status']) && $table_manipulate_data['application_status'] == 'on')
                                            <th>Status</th>
                                        @endif
                                        @if (isset($table_manipulate_data['admission_notice']) && $table_manipulate_data['admission_notice'] == 'on')
                                            <th>Admission notice</th>
                                        @endif
                                        @if (isset($table_manipulate_data['payment_receipt']) && $table_manipulate_data['payment_receipt'] == 'on')
                                            <th>Payment receipt</th>
                                        @endif
                                        @if (isset($table_manipulate_data['country']) && $table_manipulate_data['country'] == 'on')
                                            <th>Country</th>
                                        @endif

                                        @if (isset($table_manipulate_data['email']) && $table_manipulate_data['email'] == 'on')
                                            <th>Student Email</th>
                                        @endif
                                        @if (isset($table_manipulate_data['paid_status']) && $table_manipulate_data['paid_status'] == 'on')
                                            <th
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 80px;">
                                                Paid Status
                                            </th>
                                        @endif
                                        @if (isset($table_manipulate_data['final_destination']) && $table_manipulate_data['final_destination'] == 'on')
                                            <th>Final destination</th>
                                        @endif
                                        @if (isset($table_manipulate_data['action']) && $table_manipulate_data['action'] == 'on')
                                            <th class="text-right">Action</th>
                                        @endif
                                        @if (isset($table_manipulate_data['partner_name']) && $table_manipulate_data['partner_name'] == 'on')
                                            <th>Partner</th>
                                        @endif

                                        @if (isset($table_manipulate_data['application_fee']) && $table_manipulate_data['application_fee'] == 'on')
                                            <th>Application fee</th>
                                        @endif




                                        @if (isset($table_manipulate_data['applied_by']) && $table_manipulate_data['applied_by'] == 'on')
                                            <th>Applied by</th>
                                        @endif



                                        @if (isset($table_manipulate_data['apply_date']) && $table_manipulate_data['apply_date'] == 'on')
                                            <th
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 80px;">
                                                Apply Date
                                            </th>
                                        @endif



                                    </tr>
                                </thead>

                                @php
                                    $sl_count = 1;
                                @endphp
                                <tbody>
                                    @if (!collect($table_manipulate_filter_data)->contains('is_selected', true))

                                        @foreach ($applictions as $item)
                                            <tr role="row">
                                                <td class="text-left">{{ $sl_count }}</td>
                                                @if (isset($table_manipulate_data['application_code']) && $table_manipulate_data['application_code'] == 'on')
                                                    <td>{{ $item->application_code ?? '' }}</td>
                                                @endif
                                                @if (isset($table_manipulate_data['student_name']) && $table_manipulate_data['student_name'] == 'on')
                                                    @php
                                                        $studentName =
                                                            $item->first_name == null
                                                                ? 'No name'
                                                                : $item->first_name . ' ' . $item->last_name;
                                                    @endphp
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="{{ $studentName ?? '' }}">
                                                            {{ $studentName ?? '' }}
                                                        </span>
                                                    </td>
                                                @endif

                                                {{-- passport  --}}

                                                @if (isset($table_manipulate_data['passport_number']) && $table_manipulate_data['passport_number'] == 'on')
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="{{ $item->passport_number ?? '' }}">
                                                            {{ $item->passport_number ?? '' }}
                                                        </span>
                                                    </td>
                                                @endif

                                                @if (isset($table_manipulate_data['program_name']) && $table_manipulate_data['program_name'] == 'on')
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        @foreach ($item->carts as $cart)
                                                            <span data-toggle="tooltip" data-placement="left"
                                                                data-original-title="{{ $cart->course->name ?? '' }}">
                                                                {{ $cart->course->name ?? '' }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                @endif
                                                @if (isset($table_manipulate_data['universityOne']) && $table_manipulate_data['universityOne'] == 'on')
                                                    <td
                                                        style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        `` {{ $item->universityOne ?? '' }}
                                                    </td>
                                                @endif
                                                @if (isset($table_manipulate_data['universityTwo']) && $table_manipulate_data['universityTwo'] == 'on')
                                                    <td
                                                        style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        `` {{ $item->universitytwo ?? '' }}
                                                    </td>
                                                @endif
                                                @if (isset($table_manipulate_data['universityThree']) && $table_manipulate_data['universityThree'] == 'on')
                                                    <td
                                                        style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        `` {{ $item->universitythree ?? '' }}
                                                    </td>
                                                @endif
                                                @if (isset($table_manipulate_data['statusOne']) && $table_manipulate_data['statusOne'] == 'on')
                                                    <td
                                                        style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        `` {{ $item->statusOne ?? '' }}
                                                    </td>
                                                @endif
                                                @if (isset($table_manipulate_data['statusTwo']) && $table_manipulate_data['statusTwo'] == 'on')
                                                    <td
                                                        style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        `` {{ $item->statusTwo ?? '' }}
                                                    </td>
                                                @endif
                                                @if (isset($table_manipulate_data['statusThree']) && $table_manipulate_data['statusThree'] == 'on')
                                                    <td
                                                        style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        `` {{ $item->statusThree ?? '' }}
                                                    </td>
                                                @endif

                                                @if (isset($table_manipulate_data['university_name']) && $table_manipulate_data['university_name'] == 'on')
                                                    <td
                                                        style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                        @foreach ($item->carts as $cart)
                                                            <span data-toggle="tooltip" data-placement="top"
                                                                data-original-title="{{ $cart->course->university->name ?? '' }}">
                                                                {{ $cart->course->university->name ?? '' }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                @endif

                                                @if (isset($table_manipulate_data['application_status']) && $table_manipulate_data['application_status'] == 'on')
                                                    <td data-field="status">
                                                        <form
                                                            action="{{ route('studentApplication.updateStatus', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')

                                                            <select name="status" class="form-control"
                                                                onchange="this.form.submit()">
                                                                @php
                                                                    $statusLabels = [
                                                                        0 => [
                                                                            'label' => 'Not Complete',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        1 => [
                                                                            'label' => 'Processing',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        2 => [
                                                                            'label' => 'Approved',
                                                                            'badge' => 'badge-success',
                                                                        ],
                                                                        3 => [
                                                                            'label' => 'Cancel',
                                                                            'badge' => 'badge-danger',
                                                                        ],
                                                                        4 => [
                                                                            'label' => 'Not Submitted',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        5 => [
                                                                            'label' => 'Submitted',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        6 => [
                                                                            'label' => 'Pending',
                                                                            'badge' => 'badge-warning',
                                                                        ],
                                                                        7 => [
                                                                            'label' => 'E-documents Qualified',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        8 => [
                                                                            'label' => 'Waiting Processing',
                                                                            'badge' => 'badge-warning',
                                                                        ],
                                                                        9 => [
                                                                            'label' => 'Processing',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        10 => [
                                                                            'label' => 'More Documents Needed',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        11 => [
                                                                            'label' => 'Re-Submitted',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        12 => [
                                                                            'label' => 'Rejected',
                                                                            'badge' => 'badge-danger',
                                                                        ],
                                                                        13 => [
                                                                            'label' => 'Transferred',
                                                                            'badge' => 'badge-info',
                                                                        ],
                                                                        14 => [
                                                                            'label' => 'Accepted',
                                                                            'badge' => 'badge-success',
                                                                        ],
                                                                        15 => [
                                                                            'label' => 'E-offer Delivered',
                                                                            'badge' => 'badge-success',
                                                                        ],
                                                                        16 => [
                                                                            'label' => 'Offer Delivered',
                                                                            'badge' => 'badge-success',
                                                                        ],
                                                                    ];
                                                                @endphp

                                                                @foreach ($statusLabels as $key => $status)
                                                                    <option value="{{ $key }}"
                                                                        {{ $item->status == $key ? 'selected' : '' }}>
                                                                        {{ $status['label'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </form>
                                                    </td>
                                                @endif


                                                {{-- addmission notice  --}}
                                                @if (isset($table_manipulate_data['admission_notice']) && $table_manipulate_data['admission_notice'] == 'on')
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="{{ $item->application_notice ?? '' }}">
                                                            @if ($item->application_notice)
                                                                <p class="my-2">
                                                                    <a href="{{ asset('upload/application/' . $item->application_notice) }}"
                                                                        target="_blank">
                                                                        View Current File
                                                                    </a>
                                                                </p>
                                                            @else
                                                                <p class="my-2">No file uploaded.</p>
                                                            @endif
                                                        </span>
                                                    </td>
                                                @endif

                                                {{-- payment_receipt  --}}
                                                @if (isset($table_manipulate_data['payment_receipt']) && $table_manipulate_data['payment_receipt'] == 'on')
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="{{ $item->payment_receipt ?? '' }}">
                                                            @if ($item->payment_receipt)
                                                                <p class="my-2">
                                                                    <a href="{{ asset('upload/payment/' . $item->payment_receipt) }}"
                                                                        target="_blank">
                                                                        View Current File
                                                                    </a>
                                                                </p>
                                                            @else
                                                                <p class="my-2">No file uploaded.</p>
                                                            @endif
                                                        </span>
                                                    </td>
                                                @endif

                                                {{-- country  --}}

                                                @if (isset($table_manipulate_data['country']) && $table_manipulate_data['country'] == 'on')
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="{{ $item->home_country ?? '' }}">
                                                            {{ $item->home_country ?? '' }}
                                                        </span>
                                                    </td>
                                                @endif

                                                @if (isset($table_manipulate_data['email']) && $table_manipulate_data['email'] == 'on')
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="{{ $item->email ?? '' }}">
                                                            {{ $item->email ?? '' }}
                                                        </span>
                                                    </td>
                                                @endif


                                                @if (isset($table_manipulate_data['paid_status']) && $table_manipulate_data['paid_status'] == 'on')
                                                    <td>
                                                        @if ($item->payment_status == 1)
                                                            <span class="badge badge-success">Paid</span>
                                                        @elseif($item->payment_status == 0)
                                                            <span class="badge badge-danger">Unpaid</span>
                                                        @endif
                                                    </td>
                                                @endif


                                                @if (isset($table_manipulate_data['final_destination']) && $table_manipulate_data['final_destination'] == 'on')
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="{{ $item->final_destination ?? '' }}">
                                                            {{ $item->final_destination ?? '' }}
                                                        </span>
                                                    </td>
                                                @endif


                                                @if (isset($table_manipulate_data['action']) && $table_manipulate_data['action'] == 'on')
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v text-primary"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <div class="d-flex">
                                                                    <a href="#"
                                                                        class="btn text-primary assign-application-modal-trigger"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        data-original-title="Assign Application to Partner"
                                                                        data-application-id="{{ $item->id }}">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.student_appliction_details', $item->id) }}"
                                                                        class="btn text-primary" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        data-original-title="View">
                                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.application-form-download', $item->id) }}"
                                                                        class="btn text-primary" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        data-original-title="Download Application">
                                                                        <i class="fa fa-download"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.application-all-document-download', $item->id) }}"
                                                                        class="btn text-primary" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        data-original-title="Download Application File">
                                                                        <i class="fa fa-cloud" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.student_appliction_invoice', $item->id) }}"
                                                                        class="btn text-primary" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        data-original-title="Invoice">
                                                                        <i class="fa fa-solid fa-receipt"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.student_appliction_edit', $item->id) }}"
                                                                        class="btn text-primary" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        data-original-title="Edit">
                                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                                    </a>
                                                                    <input type="hidden"
                                                                        value="{{ $item->id }}">
                                                                    <a data-toggle="modal"
                                                                        data-target="#delete_modal_box"
                                                                        class="btn text-primary delete-item"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        data-original-title="Delete">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endif


                                                @if (isset($table_manipulate_data['partner_name']) && $table_manipulate_data['partner_name'] == 'on')
                                                    @php
                                                        $partner = $item->partner($item->partner_ref_id);
                                                    @endphp
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="{{ $partner ? $partner->name : '' }}">
                                                            {{ $partner ? $partner->name : '' }}
                                                        </span>
                                                    </td>
                                                @endif

                                                {{-- @php
                                                    dd($item->documents);
                                                @endphp --}}

                                                {{-- @foreach ($item->documents as $document)
                                                   <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="{{ $document->document_file ?? '' }}">
                                                            @if ($document->document_file)
                                                                <p class="my-2">
                                                                    <a href="{{ asset('upload/application/' . $document->document_file) }}"
                                                                        target="_blank">
                                                                        View Current File
                                                                    </a>
                                                                </p>
                                                            @else
                                                                <p class="my-2">No file uploaded.</p>
                                                            @endif
                                                        </span>
                                                    </td>
                                                @endforeach --}}




                                                {{-- Application fee  --}}

                                                @if (isset($table_manipulate_data['application_fee']) && $table_manipulate_data['application_fee'] == 'on')
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="{{ $item->application_fee ?? '' }}">
                                                            {{ $item->application_fee ?? '' }}
                                                        </span>
                                                    </td>
                                                @endif








                                                @if (isset($table_manipulate_data['applied_by']) && $table_manipulate_data['applied_by'] == 'on')
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                        <span data-toggle="tooltip" data-placement="left"
                                                            data-original-title="{{ $item->applied_by ?? '' }}">
                                                            {{ $item->applied_by ?? '' }}
                                                        </span>
                                                    </td>
                                                @endif




                                                @if (isset($table_manipulate_data['apply_date']) && $table_manipulate_data['apply_date'] == 'on')
                                                    <td class="text-center">
                                                        {{ date('d M, Y', strtotime($item->created_at)) }}

                                                    </td>
                                                @endif






                                                @php
                                                    $sl_count++;
                                                @endphp
                                            </tr>
                                        @endforeach
                                    @else
                                        @php
                                            $groupedApplicationIds = [];
                                        @endphp

                                        @foreach ($table_manipulate_filter_data as $filter)
                                            @if ($filter['is_selected'] != false)
                                                @php
                                                    $filter_type = $filter['filter_parent'];
                                                    $filter_id = $filter['filter_child'];
                                                    $filter_name = $filter['filter_name'];
                                                @endphp
                                                <tr class="group-header dtrg-group" data-toggle="collapse"
                                                    data-target=".group-{{ Str::slug($filter_type . '-' . $filter_id) }}">
                                                    <td colspan="100%">
                                                        <span class="group-icon"></span>
                                                        <span>{{ $filter_name }}</span>
                                                    </td>
                                                </tr>
                                                @foreach ($applictions as $item)
                                                    @php
                                                        $show_application = false;
                                                        foreach ($item->carts as $cart_item) {
                                                            if (
                                                                ($filter_type == 'degree' &&
                                                                    $cart_item->course->degree_id == $filter_id) ||
                                                                ($filter_type == 'department' &&
                                                                    $cart_item->course->department_id == $filter_id) ||
                                                                ($filter_type == 'university' &&
                                                                    $cart_item->course->university_id == $filter_id)
                                                            ) {
                                                                $show_application = true;
                                                                break;
                                                            } elseif (
                                                                $filter_type == 'partner' &&
                                                                $item->partner_ref_id == $filter_id
                                                            ) {
                                                                $show_application = true;
                                                                break;
                                                            }
                                                        }
                                                    @endphp
                                                    @if ($show_application)
                                                        @php
                                                            $groupedApplicationIds[] = $item->id;
                                                        @endphp
                                                        <tr
                                                            class="collapse group-{{ Str::slug($filter_type . '-' . $filter_id) }}">
                                                            <td class="text-left">{{ $sl_count }}</td>
                                                            @if (isset($table_manipulate_data['application_code']) && $table_manipulate_data['application_code'] == 'on')
                                                                <td>{{ $item->application_code ?? '' }}</td>
                                                            @endif
                                                            @if (isset($table_manipulate_data['student_name']) && $table_manipulate_data['student_name'] == 'on')
                                                                @php
                                                                    $studentName = $item->student
                                                                        ? $item->student->name
                                                                        : $item->first_name . ' ' . $item->last_name;
                                                                @endphp
                                                                <td
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                                    <span data-toggle="tooltip" data-placement="left"
                                                                        data-original-title="{{ $studentName ?? '' }}">
                                                                        {{ $studentName ?? '' }}
                                                                    </span>
                                                                </td>
                                                            @endif
                                                            @if (isset($table_manipulate_data['partner_name']) && $table_manipulate_data['partner_name'] == 'on')
                                                                @php
                                                                    $partner = $item->partner($item->partner_ref_id);
                                                                @endphp
                                                                <td
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                                    <span data-toggle="tooltip" data-placement="left"
                                                                        data-original-title="{{ $partner ? $partner->name : '' }}">
                                                                        {{ $partner ? $partner->name : '' }}
                                                                    </span>
                                                                </td>
                                                            @endif
                                                            @if (isset($table_manipulate_data['program_name']) && $table_manipulate_data['program_name'] == 'on')
                                                                <td
                                                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    @foreach ($item->carts as $cart)
                                                                        @if (
                                                                            ($filter_type == 'degree' && $cart->course->degree_id == $filter_id) ||
                                                                                ($filter_type == 'department' && $cart->course->department_id == $filter_id) ||
                                                                                ($filter_type == 'university' && $cart->course->university_id == $filter_id))
                                                                            <span data-toggle="tooltip"
                                                                                data-placement="left"
                                                                                data-original-title="{{ $cart->course->name ?? '' }}">
                                                                                {{ $cart->course->name ?? '' }}
                                                                            </span>
                                                                            @php break; @endphp
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                            @endif
                                                            @if (isset($table_manipulate_data['universityOne']) && $table_manipulate_data['universityOne'] == 'on')
                                                                <td
                                                                    style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    `` {{ $item->universityOne ?? '' }}
                                                                </td>
                                                            @endif
                                                            @if (isset($table_manipulate_data['universityTwo']) && $table_manipulate_data['universityTwo'] == 'on')
                                                                <td
                                                                    style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    `` {{ $item->universitytwo ?? '' }}
                                                                </td>
                                                            @endif
                                                            @if (isset($table_manipulate_data['universityThree']) && $table_manipulate_data['universityThree'] == 'on')
                                                                <td
                                                                    style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    `` {{ $item->universitythree ?? '' }}
                                                                </td>
                                                            @endif
                                                            @if (isset($table_manipulate_data['statusOne']) && $table_manipulate_data['statusOne'] == 'on')
                                                                <td
                                                                    style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    `` {{ $item->statusOne ?? '' }}
                                                                </td>
                                                            @endif
                                                            @if (isset($table_manipulate_data['statusTwo']) && $table_manipulate_data['statusTwo'] == 'on')
                                                                <td
                                                                    style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    `` {{ $item->statusTwo ?? '' }}
                                                                </td>
                                                            @endif
                                                            @if (isset($table_manipulate_data['statusThree']) && $table_manipulate_data['statusThree'] == 'on')
                                                                <td
                                                                    style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    `` {{ $item->statusThree ?? '' }}
                                                                </td>
                                                            @endif
                                                            @if (isset($table_manipulate_data['university_name']) && $table_manipulate_data['university_name'] == 'on')
                                                                <td
                                                                    style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                                    @foreach ($item->carts as $cart)
                                                                        <span data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            data-original-title="{{ $cart->course->university->name ?? '' }}">
                                                                            {{ $cart->course->university->name ?? '' }}
                                                                        </span>
                                                                    @endforeach
                                                                </td>
                                                            @endif
                                                            @if (isset($table_manipulate_data['apply_date']) && $table_manipulate_data['apply_date'] == 'on')
                                                                <td class="text-center">
                                                                    {{ date('d M, Y', strtotime($item->created_at)) }}
                                                                </td>
                                                            @endif
                                                            @if (isset($table_manipulate_data['paid_status']) && $table_manipulate_data['paid_status'] == 'on')
                                                                <td>
                                                                    @if ($item->payment_status == 1)
                                                                        <span class="badge badge-success">Paid</span>
                                                                    @elseif($item->payment_status == 0)
                                                                        <span class="badge badge-danger">Unpaid</span>
                                                                    @endif
                                                                </td>
                                                            @endif
                                                            @if (isset($table_manipulate_data['application_status']) && $table_manipulate_data['application_status'] == 'on')
                                                                <td data-field="status">
                                                                    @php
                                                                        $statusLabels = [
                                                                            0 => [
                                                                                'label' => 'Not Complete',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            1 => [
                                                                                'label' => 'Processing',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            2 => [
                                                                                'label' => 'Approved',
                                                                                'badge' => 'badge-success',
                                                                            ],
                                                                            3 => [
                                                                                'label' => 'Cancel',
                                                                                'badge' => 'badge-danger',
                                                                            ],
                                                                            4 => [
                                                                                'label' => 'Not Submitted',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            5 => [
                                                                                'label' => 'Submitted',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            6 => [
                                                                                'label' => 'Pending',
                                                                                'badge' => 'badge-warning',
                                                                            ],
                                                                            7 => [
                                                                                'label' => 'E-documents Qualified',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            8 => [
                                                                                'label' => 'Waiting Processing',
                                                                                'badge' => 'badge-warning',
                                                                            ],
                                                                            9 => [
                                                                                'label' => 'Processing',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            10 => [
                                                                                'label' => 'More Documents Needed',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            11 => [
                                                                                'label' => 'Re-Submitted',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            12 => [
                                                                                'label' => 'Rejected',
                                                                                'badge' => 'badge-danger',
                                                                            ],
                                                                            13 => [
                                                                                'label' => 'Transferred',
                                                                                'badge' => 'badge-info',
                                                                            ],
                                                                            14 => [
                                                                                'label' => 'Accepted',
                                                                                'badge' => 'badge-success',
                                                                            ],
                                                                            15 => [
                                                                                'label' => 'E-offer Delivered',
                                                                                'badge' => 'badge-success',
                                                                            ],
                                                                            16 => [
                                                                                'label' => 'Offer Delivered',
                                                                                'badge' => 'badge-success',
                                                                            ],
                                                                        ];
                                                                    @endphp
                                                                    <span
                                                                        class="badge {{ $statusLabels[$item->status]['badge'] }}">
                                                                        {{ $statusLabels[$item->status]['label'] }}
                                                                    </span>
                                                                </td>
                                                            @endif
                                                            @if (isset($table_manipulate_data['action']) && $table_manipulate_data['action'] == 'on')
                                                                <td class="text-right">
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#"
                                                                            class="action-icon dropdown-toggle"
                                                                            data-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i
                                                                                class="fa fa-ellipsis-v text-primary"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <div class="d-flex">
                                                                                <a href="#"
                                                                                    class="btn text-primary assign-application-modal-trigger"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    data-original-title="Assign Application to Partner"
                                                                                    data-application-id="{{ $item->id }}">
                                                                                    <i class="fa fa-plus"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                <a href="{{ route('admin.student_appliction_details', $item->id) }}"
                                                                                    class="btn text-primary"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    data-original-title="View">
                                                                                    <i class="fa fa-eye"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                <a href="{{ route('admin.application-form-download', $item->id) }}"
                                                                                    class="btn text-primary"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    data-original-title="Download Application">
                                                                                    <i class="fa fa-download"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                <a href="{{ route('admin.application-all-document-download', $item->id) }}"
                                                                                    class="btn text-primary"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    data-original-title="Download Application File">
                                                                                    <i class="fa fa-cloud"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                <a href="{{ route('admin.student_appliction_invoice', $item->id) }}"
                                                                                    class="btn text-primary"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    data-original-title="Invoice">
                                                                                    <i class="fa fa-solid fa-receipt"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                <a href="{{ route('admin.student_appliction_edit', $item->id) }}"
                                                                                    class="btn text-primary"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    data-original-title="Edit">
                                                                                    <i class="fa fa-edit"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                                <input type="hidden"
                                                                                    value="{{ $item->id }}">
                                                                                <a data-toggle="modal"
                                                                                    data-target="#delete_modal_box"
                                                                                    class="btn text-primary delete-item"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    data-original-title="Delete">
                                                                                    <i class="fa fa-trash"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            @endif
                                                            @php $sl_count++; @endphp
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach

                                        @php
                                            $ungroupedApplications = $applictions->whereNotIn(
                                                'id',
                                                $groupedApplicationIds,
                                            );
                                        @endphp

                                        @if ($ungroupedApplications->isNotEmpty())
                                            <tr class="group-header dtrg-group" data-toggle="collapse"
                                                data-target=".group-other-applications">
                                                <td colspan="100%">
                                                    <span class="group-icon"></span>
                                                    <span>Other Applications</span>
                                                </td>
                                            </tr>
                                            @foreach ($ungroupedApplications as $item)
                                                <tr class="collapse group-other-applications">
                                                    <td class="text-left">{{ $sl_count }}</td>
                                                    @if (isset($table_manipulate_data['application_code']) && $table_manipulate_data['application_code'] == 'on')
                                                        <td>{{ $item->application_code ?? '' }}</td>
                                                    @endif
                                                    @if (isset($table_manipulate_data['student_name']) && $table_manipulate_data['student_name'] == 'on')
                                                        <td
                                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                            <span data-toggle="tooltip" data-placement="left"
                                                                data-original-title="{{ $item->student->name ?? '' }}">
                                                                {{ $item->student->name ?? '' }}
                                                            </span>
                                                        </td>
                                                    @endif
                                                    @if (isset($table_manipulate_data['partner_name']) && $table_manipulate_data['partner_name'] == 'on')
                                                        @php
                                                            $partner = $item->partner($item->partner_ref_id);
                                                        @endphp
                                                        <td
                                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                                            <span data-toggle="tooltip" data-placement="left"
                                                                data-original-title="{{ $partner ? $partner->name : '' }}">
                                                                {{ $partner ? $partner->name : '' }}
                                                            </span>
                                                        </td>
                                                    @endif
                                                    @if (isset($table_manipulate_data['program_name']) && $table_manipulate_data['program_name'] == 'on')
                                                        <td
                                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                            @foreach ($item->carts as $cart)
                                                                <span data-toggle="tooltip" data-placement="left"
                                                                    data-original-title="{{ $cart->course->name ?? '' }}">
                                                                    {{ $cart->course->name ?? '' }}
                                                                </span>
                                                            @endforeach
                                                        </td>
                                                    @endif
                                                    @if (isset($table_manipulate_data['university_name']) && $table_manipulate_data['university_name'] == 'on')
                                                        <td
                                                            style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                            @foreach ($item->carts as $cart)
                                                                <span data-toggle="tooltip" data-placement="top"
                                                                    data-original-title="{{ $cart->course->university->name ?? '' }}">
                                                                    {{ $cart->course->university->name ?? '' }}
                                                                </span>
                                                            @endforeach
                                                        </td>
                                                    @endif
                                                    @if (isset($table_manipulate_data['apply_date']) && $table_manipulate_data['apply_date'] == 'on')
                                                        <td class="text-center">
                                                            {{ date('d M, Y', strtotime($item->created_at)) }}
                                                        </td>
                                                    @endif
                                                    @if (isset($table_manipulate_data['paid_status']) && $table_manipulate_data['paid_status'] == 'on')
                                                        <td>
                                                            @if ($item->payment_status == 1)
                                                                <span class="badge badge-success">Paid</span>
                                                            @elseif($item->payment_status == 0)
                                                                <span class="badge badge-danger">Unpaid</span>
                                                            @endif
                                                        </td>
                                                    @endif
                                                    @if (isset($table_manipulate_data['application_status']) && $table_manipulate_data['application_status'] == 'on')
                                                        <td data-field="status">
                                                            @php
                                                                $statusLabels = [
                                                                    0 => [
                                                                        'label' => 'Not Complete',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    1 => [
                                                                        'label' => 'Processing',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    2 => [
                                                                        'label' => 'Approved',
                                                                        'badge' => 'badge-success',
                                                                    ],
                                                                    3 => [
                                                                        'label' => 'Cancel',
                                                                        'badge' => 'badge-danger',
                                                                    ],
                                                                    4 => [
                                                                        'label' => 'Not Submitted',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    5 => [
                                                                        'label' => 'Submitted',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    6 => [
                                                                        'label' => 'Pending',
                                                                        'badge' => 'badge-warning',
                                                                    ],
                                                                    7 => [
                                                                        'label' => 'E-documents Qualified',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    8 => [
                                                                        'label' => 'Waiting Processing',
                                                                        'badge' => 'badge-warning',
                                                                    ],
                                                                    9 => [
                                                                        'label' => 'Processing',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    10 => [
                                                                        'label' => 'More Documents Needed',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    11 => [
                                                                        'label' => 'Re-Submitted',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    12 => [
                                                                        'label' => 'Rejected',
                                                                        'badge' => 'badge-danger',
                                                                    ],
                                                                    13 => [
                                                                        'label' => 'Transferred',
                                                                        'badge' => 'badge-info',
                                                                    ],
                                                                    14 => [
                                                                        'label' => 'Accepted',
                                                                        'badge' => 'badge-success',
                                                                    ],
                                                                    15 => [
                                                                        'label' => 'E-offer Delivered',
                                                                        'badge' => 'badge-success',
                                                                    ],
                                                                    16 => [
                                                                        'label' => 'Offer Delivered',
                                                                        'badge' => 'badge-success',
                                                                    ],
                                                                ];
                                                            @endphp
                                                            <span
                                                                class="badge {{ $statusLabels[$item->status]['badge'] }}">
                                                                {{ $statusLabels[$item->status]['label'] }}
                                                            </span>
                                                        </td>
                                                    @endif

                                                    @if (isset($table_manipulate_data['action']) && $table_manipulate_data['action'] == 'on')
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="action-icon dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v text-primary"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <div class="d-flex">
                                                                        <a href="#"
                                                                            class="btn text-primary assign-application-modal-trigger"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            data-original-title="Assign Application to Partner"
                                                                            data-application-id="{{ $item->id }}">
                                                                            <i class="fa fa-plus"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <a href="{{ route('admin.student_appliction_details', $item->id) }}"
                                                                            class="btn text-primary"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            data-original-title="View">
                                                                            <i class="fa fa-eye"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <a href="{{ route('admin.application-form-download', $item->id) }}"
                                                                            class="btn text-primary"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            data-original-title="Download Application">
                                                                            <i class="fa fa-download"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <a href="{{ route('admin.application-all-document-download', $item->id) }}"
                                                                            class="btn text-primary"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            data-original-title="Download Application File">
                                                                            <i class="fa fa-cloud"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <a href="{{ route('admin.student_appliction_invoice', $item->id) }}"
                                                                            class="btn text-primary"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            data-original-title="Invoice">
                                                                            <i class="fa fa-solid fa-receipt"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <a href="{{ route('admin.student_appliction_edit', $item->id) }}"
                                                                            class="btn text-primary"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            data-original-title="Edit">
                                                                            <i class="fa fa-edit"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                        <input type="hidden"
                                                                            value="{{ $item->id }}">
                                                                        <a data-toggle="modal"
                                                                            data-target="#delete_modal_box"
                                                                            class="btn text-primary delete-item"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            data-original-title="Delete">
                                                                            <i class="fa fa-trash"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @endif
                                                    @php $sl_count++; @endphp
                                                </tr>
                                            @endforeach
                                        @endif

                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Item delete modal --}}
                <div id="delete_modal_box" class="modal fade delete-modal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img src="{{ asset('backend/assets/images/warning.png') }}" alt=""
                                    width="50" height="46">
                                <h5 class="mt-3 mb-4">Are you sure want to delete this?</h5>
                                <div class="m-t-20 flex">
                                    <form action="{{ route('admin.student_appliction_delete') }}" method="POST"
                                        id="deleteForm">
                                        @csrf
                                        <input type="hidden" name="s_appliction_id" id="modal_item_id"
                                            value="">
                                    </form>
                                    <div class="mt-3">
                                        <a href="#" class="btn btn-success" data-dismiss="modal">Cancel</a>
                                        <a class="btn btn-danger"
                                            onclick="document.getElementById('deleteForm').submit()">Confirm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- assign application to partner - modal --}}
                <div class="modal fade" id="assign_application_to_partner_modal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel-2" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('admin.assign_application_to_partner') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Assign Application To Partner</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="application_id" value="">
                                        <select name="partner_id" class="form-control form-control-lg" required>
                                            <option value="">Select Partner</option>
                                            <option value="none">None</option>
                                            @foreach ($all_partners as $partner)
                                                @php
                                                    if (!empty($partner->continent_id)) {
                                                        $partner_continent = App\Models\Continent::find(
                                                            $partner->continent_id,
                                                        );
                                                    }
                                                @endphp
                                                <option value="{{ $partner->id }}">{{ $partner->name }} -
                                                    {{ $partner_continent->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <p style="font-size: 1rem;">Assign an application to specific partner.</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" type="button" class="btn btn-light"
                                        data-dismiss="modal">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Assign</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- manage fields - modal --}}

                <div class="modal fade" id="manage_fields_modal" tabindex="-1" role="dialog"
                    aria-labelledby="manage-fields-modal" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('admin.student_appliction_list.table_manipulate') }}"
                                method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Select fields to manipulate data table</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="application_code"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['application_code']) && $table_manipulate_data['application_code'] == 'on') checked @endif>
                                                                Application Code
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="partner_name"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['partner_name']) && $table_manipulate_data['partner_name'] == 'on') checked @endif>
                                                                Partner
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="program_name"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['program_name']) && $table_manipulate_data['program_name'] == 'on') checked @endif>
                                                                Program Name
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="apply_date"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['apply_date']) && $table_manipulate_data['apply_date'] == 'on') checked @endif>
                                                                Apply Date
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="application_status"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['application_status']) && $table_manipulate_data['application_status'] == 'on') checked @endif>
                                                                Application Status
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="passport_number"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['passport_number']) && $table_manipulate_data['passport_number'] == 'on') checked @endif>
                                                                Passport Number
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="admission_notice"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['admission_notice']) && $table_manipulate_data['admission_notice'] == 'on') checked @endif>
                                                                Admission Notice
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="application_fee"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['application_fee']) && $table_manipulate_data['application_fee'] == 'on') checked @endif>
                                                                Application fee
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="payment_receipt"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['payment_receipt']) && $table_manipulate_data['payment_receipt'] == 'on') checked @endif>
                                                                Payment receipt
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="country"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['country']) && $table_manipulate_data['country'] == 'on') checked @endif>
                                                                Country
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="student_name"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['student_name']) && $table_manipulate_data['student_name'] == 'on') checked @endif>
                                                                Student Name
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="email"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['email']) && $table_manipulate_data['email'] == 'on') checked @endif>
                                                                Student Email
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="university_name"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['university_name']) && $table_manipulate_data['university_name'] == 'on') checked @endif>
                                                                University Name
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="universityOne"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['universityOne']) && $table_manipulate_data['universityOne'] == 'on') checked @endif>
                                                                University 1
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="universityTwo"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['universityTwo']) && $table_manipulate_data['universityTwo'] == 'on') checked @endif>
                                                                University 2
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="universityThree"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['universityThree']) && $table_manipulate_data['universityThree'] == 'on') checked @endif>
                                                                University 2
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="statusOne"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['statusOne']) && $table_manipulate_data['statusOne'] == 'on') checked @endif>
                                                                Status 1
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="statusTwo"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['statusTwo']) && $table_manipulate_data['statusTwo'] == 'on') checked @endif>
                                                                Status 2
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="statusThree"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['statusThree']) && $table_manipulate_data['statusThree'] == 'on') checked @endif>
                                                                Status 3
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="paid_status"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['paid_status']) && $table_manipulate_data['paid_status'] == 'on') checked @endif>
                                                                Paid Status
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="final_destination"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['final_destination']) && $table_manipulate_data['final_destination'] == 'on') checked @endif>
                                                                Final Destination
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="applied_by"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['applied_by']) && $table_manipulate_data['applied_by'] == 'on') checked @endif>
                                                                Applied By
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <label class="form-check-label fs-09">
                                                                <input type="checkbox" name="action"
                                                                    class="form-check-input"
                                                                    @if (isset($table_manipulate_data['action']) && $table_manipulate_data['action'] == 'on') checked @endif>
                                                                Action
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-muted" style="font-size: 1rem;">Select desired fields to show
                                            in data-table.</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" type="button" class="btn btn-light"
                                        data-dismiss="modal">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- manage filters - modal --}}
                <div class="modal fade" id="manage_filters_modal" tabindex="-1" role="dialog"
                    aria-labelledby="manage-fields-modal" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Manage filters to manipulate data table</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <form
                                        action="{{ route('admin.student_appliction_list.table_manipulate_filter') }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" name="data_filter_type" value="add_filter">

                                        <div class="card-header" data-toggle="collapse"
                                            data-target="#add_new_filter">
                                            <h5 class="text-dark" style="font-size: 1rem;">
                                                <i class="fa fa-solid fa-plus"></i>
                                                Add New Filter
                                            </h5>
                                        </div>
                                        <div class="collapse" id="add_new_filter">
                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <input type="hidden" name="filter_name" class="form-control">
                                                </div>

                                                <div class="col-12 mt-3">
                                                    <p class="text-muted" style="font-size: 1rem">Available Filters
                                                    </p>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <select name="filter_parent"
                                                                class="form-control form-control-lg"
                                                                id="filter_parent" required>
                                                                <option value="">Select Filter Type</option>
                                                                <option value="partner">Partner</option>
                                                                <option value="degree">Degree</option>
                                                                <option value="department">Department</option>
                                                                <option value="university">University</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select name="filter_child"
                                                                class="form-control form-control-lg" id="filter_child"
                                                                required>
                                                                <option value="">Select Type First</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mt-3 text-right">
                                                    <button class="btn btn-primary" type="submit">Add Filter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="mt-2">
                                    <form
                                        action="{{ route('admin.student_appliction_list.table_manipulate_filter') }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" name="data_filter_type" value="manage_filter">

                                        <div class="card-header" data-toggle="collapse" data-target="#manage_filter">
                                            <h5 class="text-dark" style="font-size: 1rem;">
                                                <i class="fa fa-solid fa-plus"></i>
                                                Manage Filters
                                            </h5>
                                        </div>
                                        <div class="collapse" id="manage_filter">
                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Filter Name</th>
                                                                <th class="text-right" style="padding-right: 2rem">
                                                                    Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label fs-09">
                                                                            <input type="checkbox" name="filter_id[]"
                                                                                class="form-check-input"
                                                                                value="none"
                                                                                {{ !collect($table_manipulate_filter_data)->contains('is_selected', true) ? 'checked' : '' }}>
                                                                            None
                                                                            <i class="input-helper"></i>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td class="text-right" style="padding-right: 2rem">
                                                                </td>
                                                            </tr>
                                                            @if (!empty($table_manipulate_filter_data))
                                                                @foreach ($table_manipulate_filter_data as $filter)
                                                                    <tr>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <label class="form-check-label fs-09">
                                                                                    <input type="checkbox"
                                                                                        name="filter_id[]"
                                                                                        class="form-check-input"
                                                                                        value="{{ $filter['id'] }}"
                                                                                        {{ $filter['is_selected'] ? 'checked' : '' }}>
                                                                                    {{ $filter['filter_name'] }}
                                                                                    <i class="input-helper"></i>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-right"
                                                                            style="padding-right: 2rem">
                                                                            <a
                                                                                href="{{ route('admin.student_appliction_list.delete_filter_item', ['id' => $filter['id']]) }}">
                                                                                <i class="fa fa-trash text-danger"
                                                                                    style="font-size: 16px"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-12 mt-3 text-right">
                                                    <button class="btn btn-primary" type="submit">Update
                                                        Filter</button>
                                                </div>
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
    <script src="{{ asset('backend/assets/js/data-table_rowGroup.min.js') }}"></script>

    <script>
        var table = $('#application_table').DataTable({
            "aLengthMenu": [
                [15, 25, 50, -1],
                [15, 25, 50, "All"]
            ],
            "dom": 'Bfrtip',
            "buttons": [
                'excel', 'pdf', 'print'
            ],
            "iDisplayLength": 15,
            "language": {
                search: ""
            }
        });

        $('#application_table').each(function() {
            var datatable = $(this);
            // SEARCH - Add the placeholder for Search and Turn this into in-line form control
            var search_input = datatable.closest('.dataTables_wrapper').find(
                'div[id$=_filter] input');
            search_input.attr('placeholder', 'Search...');
            search_input.removeClass('form-control-sm');

            // LENGTH - Inline-Form control
            var length_sel = datatable.closest('.dataTables_wrapper').find(
                'div[id$=_length] select');
            length_sel.removeClass('form-control-sm');
        });
    </script>

    <script>
        $('#application_table tbody').on('click', 'tr.group-header', function() {
            var group = $(this).data('group');
            var rows = $('#application_table tbody tr.group-' + group);

            if ($(this).hasClass('expanded')) {
                $(this).removeClass('expanded').addClass('collapsed');
                $(this).find('span.group-icon').html(
                    '&#9662;'); // group icon to ▼

                rows.hide();
            } else {
                $(this).removeClass('collapsed').addClass('expanded');
                $(this).find('span.group-icon').html(
                    '&#9656;'); // group icon to ▶
                rows.show();
            }
        });

        $('#application_table tbody tr.group-header').each(function() {
            $(this).removeClass('collapsed').addClass('expanded');
            $(this).find('span.group-icon').html(
                '&#9656;'); // group icon to ▶
        });
    </script>

    <script>
        $('.assign-application-modal-trigger').click(function() {
            var applicationId = $(this).data('application-id');

            $('input[name="application_id"]').val(applicationId);
            $('#assign_application_to_partner_modal').modal('show');
        });

        $('#assign_application_to_partner_modal').on('hidden.bs.modal', function() {
            $('input[name="application_id"]').val('');
        });
    </script>

    @if (isset($table_manipulate_data['application_status']) && $table_manipulate_data['application_status'] == 'on')
        <script>
            document.getElementById('status_filter').addEventListener('change', function() {
                var selectedStatus = this.value;
                var tableRows = document.querySelectorAll('#application_table tbody tr:not(.group-header)');

                tableRows.forEach(function(row) {
                    var statusCell = row.querySelector('td[data-field="status"]');

                    var statusSpan = statusCell.querySelector('span');

                    if (selectedStatus == '') {
                        row.style.display = '';
                        return;
                    }

                    if (statusSpan.textContent.trim() === selectedStatus) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        </script>
    @endif

    <script>
        var studyFundSelect = document.getElementById('study_fund_type');

        studyFundSelect.addEventListener('change', function() {
            var selectedValue = studyFundSelect.value;

            if (selectedValue !== '') {
                var form = document.createElement('form');

                form.action = '{{ route('admin.student_appliction_list.study_type_filter') }}';
                form.method = 'POST';

                var csrfToken = document.querySelector('meta[name="_token"]').getAttribute('content');
                var csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = csrfToken;

                form.appendChild(csrfInput);

                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'study_fund';
                input.value = selectedValue;

                form.appendChild(input);
                document.body.appendChild(form);

                form.submit();
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#filter_parent').on('change', function() {
                var parentValue = $(this).val();

                if (parentValue) {
                    $.ajax({
                        url: '{{ route('admin.student_appliction_list.get_filter_items') }}',
                        type: 'GET',
                        data: {
                            filter: parentValue
                        },
                        success: function(response) {
                            $('#filter_child').empty();
                            $('#filter_child').append(
                                '<option value="">Select Filter</option>');
                            $.each(response, function(index, item) {
                                $('#filter_child').append('<option value="' + item.id +
                                    '" data-filter-name="' + item.name + '">' + item
                                    .name + '</option>');
                            });
                        },
                        error: function() {
                            alert('Error retrieving data. Please try again.');

                            $('#filter_child').empty();
                            $('#filter_child').append(
                                '<option value="">Select Type First</option>');
                        }
                    });
                } else {
                    $('#filter_child').empty();
                    $('#filter_child').append('<option value="">Select Type First</option>');
                }
            });

            $(document).on('change', 'select[name="filter_child"]', function() {
                let filter_name = $(this).find('option:selected').data('filter-name');
                $('input[name="filter_name"]').val(filter_name);
            });

            function updateNoneCheckbox() {
                var allUnchecked = !$('input[name="filter_id[]"]:checked').length;
                $('input[name="filter_id[]"][value="none"]').prop('checked', allUnchecked);
            }

            $(document).on('change', 'input[name="filter_id[]"]:not([value="none"])', function() {
                $('input[name="filter_id[]"][value="none"]').prop('checked', false);
            });

            $(document).on('change', 'input[name="filter_id[]"][value="none"]', function() {
                $(this).prop('checked', true);
                $('input[name="filter_id[]"]:not([value="none"])').prop('checked', false);
            });

            $(document).on('change', 'input[name="filter_id[]"]', function() {
                updateNoneCheckbox();
            });

            $('input[name="filter_id[]"]:not([value="none"])').trigger('change');
        });
    </script>
</body>

</html>
