<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <title>{{ env('APP_NAME') }} | Application Invoice</title>

    <style>
        li {
            font-size: 0.9rem;
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
                            Application Invoice
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="{{ route('admin.application_order_print', $orderdetails->id) }}"
                                class="btn btn-primary">
                                <i class="fa fa-print mr-1"></i>Print
                            </a>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card px-2">
                                <div class="card-body">
                                    <div class="mt-4 container-fluid d-flex justify-content-between">
                                        <p class="text-right d-inline-block" style="font-size: 1.25rem">
                                            @php
                                                $title = \App\Models\Tp_option::where(
                                                    'option_name',
                                                    'theme_option_header',
                                                )->first();
                                            @endphp
                                            <strong>{{ $title->company_name }}</strong>
                                        </p>
                                        <p class="text-right d-inline-block" style="font-size: 1.25rem">
                                            <strong>Application ID: </strong>
                                            {{ $orderdetails->application_code }}
                                        </p>
                                    </div>
                                    <div class="mt-4 container-fluid d-flex justify-content-between">
                                        <div class="col-md-5 pl-0 d-flex justify-content-start align-items-start">
                                            <ul class="list-unstyled">
                                                <li>Student ID :
                                                    <span style="color:#5d9fc5;">
                                                        {{ $orderdetails->student->id }}
                                                    </span>
                                                </li>
                                                <li>Student Name :
                                                    <span style="color:#5d9fc5;">
                                                        {{ $orderdetails->student->name }}
                                                    </span>
                                                </li>
                                                <li>Email :
                                                    <span style="color:#5d9fc5;">
                                                        {{ $orderdetails->student->email }}
                                                    </span>
                                                </li>
                                                <li>Phone Number :
                                                    <span style="color:#5d9fc5;">
                                                        {{ $orderdetails->student->mobile }}
                                                    </span>
                                                </li>
                                                <li>Address :
                                                    <span style="color:#5d9fc5;">
                                                        {{ $orderdetails->student->address }}
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center align-items-start">
                                            <img src="{{ asset('backend/assets/images/logo.svg') }}"
                                                alt="{{ env('APP_NAME') }}" width="150px">
                                        </div>
                                        <div class="col-md-5 pr-0 d-flex justify-content-end align-items-start">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="fw-bold">
                                                        Creation Date: </span>
                                                    {{ date('d M, Y', strtotime(@$orderdetails->created_at)) }}
                                                </li>
                                                <li>
                                                    <span class="me-1 fw-bold">
                                                        Payment Status: </span>
                                                    @if (@$orderdetails->payment_method)
                                                        <span class="badge bg-warning text-white fw-bold">
                                                            {{ @$orderdetails->payment_method }}
                                                        </span>
                                                    @endif
                                                </li>

                                                <li>
                                                    @php
                                                        function getStatusBadgeClass($status)
                                                        {
                                                            $statusClasses = [
                                                                0 => 'bg-primary',
                                                                1 => 'bg-info',
                                                                2 => 'bg-success',
                                                                3 => 'bg-danger',
                                                            ];

                                                            return $statusClasses[$status] ?? '';
                                                        }

                                                        function getStatusText($status)
                                                        {
                                                            $statusTexts = [
                                                                0 => 'Application Start',
                                                                1 => 'Processing',
                                                                2 => 'Approval',
                                                                3 => 'Cancel',
                                                            ];

                                                            return $statusTexts[$status] ?? '';
                                                        }
                                                    @endphp
                                                    <span class="me-1 fw-bold">Status :</span>
                                                    <span
                                                        class="badge fw-bold {{ getStatusBadgeClass($orderdetails->status) }} text-white">
                                                        {{ getStatusText($orderdetails->status) }}
                                                    </span>
                                                </li>


                                            </ul>
                                        </div>
                                    </div>

                                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                                        <div class="table-responsive w-100">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr class="bg-dark text-white">
                                                        <th>SL</th>
                                                        <th>Program Name</th>
                                                        <th class="text-right">University Name</th>
                                                        <th class="text-right">Fee</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $total_fees = 0;
                                                    @endphp
                                                    @foreach ($orderdetails->carts as $cart)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>{{ $cart->course->name }}</td>
                                                            <td>{{ $cart->course->university->name }}</td>
                                                            <td>{{ $orderdetails->application_fee }}</td>
                                                        </tr>
                                                        @php
                                                            $total_fees += $orderdetails->application_fee;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="container-fluid mt-5 w-100">
                                        <h4 class="text-right mb-5" style="font-size: 1.25rem">Total :
                                            {{ $total_fees }}</h4>
                                    </div>

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
