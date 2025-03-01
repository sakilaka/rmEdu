<!DOCTYPE html>
<html lang="en">

<head>
    @include('User-Backend.components.head')
    <title>{{ env('APP_NAME') }} | My Applications</title>
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
                            My Applications
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="{{ route('frontend.university_course_list') }}" class="btn btn-primary btn-fw">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add Application</a>
                        </nav>
                    </div>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="order-listing" class="table dataTable-export table-striped dataTable no-footer"
                                role="grid" aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-left">SL</th>
                                        <th>Appliction Code</th>
                                        <th>Full name</th>
                                        <th>Passport Number</th>
                                        <th>Final Destination</th>
                                        <th>Country</th>
                                        <th>University 1</th>
                                        <th>University 2</th>
                                        <th>University 3</th>
                                        <th>Status 1</th>
                                        <th>Status 2</th>
                                        <th>Status 3</th>
                                        <th>Appliction Fee</th>
                                        <th class="text-center">Payment Method</th>
                                        <th class="text-center">Payment Method</th>
                                        <th class="text-center">Payment Method</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    {{-- {{ $order }} --}}
                                        <tr role="row" class="odd">
                                            <td class="text-left">{{ $loop->iteration }}</td>
                                            <td>{{ $order->application_code }}</td>
                                            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                            <td>{{ $order->passport_number }}</td>
                                            <td>{{ $order->final_destination }}</td>
                                            <td>{{ @$order->home_country }}</td>
                                            <td>{{ @$order->universityOne }}</td>
                                            <td>{{ @$order->universityTwo }}</td>
                                            <td>{{ @$order->universityThree }}</td>
                                            <td>{{ @$order->statusOne }}</td>
                                            <td>{{ @$order->statusTwo }}</td>
                                            <td>{{ @$order->statusThree }}</td>
                                            <td>{{ @$order->application_fee }}</td>
                                            <td>{{ @$order->payment_method }}</td>
                                            <td>{{ @$order->payment_receipt }}</td>
                                            <td>{{ @$order->payment_status }}</td>
                                            <td class="text-center">
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
                                                <span class="badge {{ $statusLabels[$order->status]['badge'] }}">
                                                    {{ $statusLabels[$order->status]['label'] }}
                                                </span>
                                            </td>
                                            <td class="text-right d-flex justify-content-end align-items-center">
                                                @if ($order->status == 0)
                                                    <a href="{{ route('apply_admission', @$order->id) }}"
                                                        class="btn text-primary" data-toggle="tooltip"
                                                        data-placement="top" data-original-title="Edit Application">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                @endif
                                                <a href="{{ route('user.order_details', @$order->id) }}"
                                                    class="btn text-primary" data-toggle="tooltip" data-placement="top"
                                                    data-original-title="View Application Details">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('frontend.manage_consultant_application_invoice', @$order->id) }}"
                                                    class="btn text-primary" data-toggle="tooltip" data-placement="top"
                                                    data-original-title="View Invoice">
                                                    <i class="fa fa-solid fa-receipt" aria-hidden="true"></i>
                                                </a>
                                            </td>   
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
