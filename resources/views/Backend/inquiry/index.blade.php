<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <title>{{ env('APP_NAME') }} | All Inquiries</title>

    <link rel="stylesheet"
        href="{{ asset('frontend/application/modules/frontend/views/themes/default/assets/css/select2.min.css') }}">
    <style>
        .select2-container--default .select2-selection--single {
            padding: 5px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 7px;
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
                            All Inquiries
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="{{ route('frontend.inquiry_form_show') }}"
                                class="btn btn-primary btn-fw">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add Inquiry</a>
                        </nav>
                    </div>

                    <form id="filter-form" method="POST" action="{{ route('admin.inquiry.index.filter') }}">
                        @csrf
                        <div class="row justify-content-end mb-2">
                            <!-- Budget Input -->
                            <div class="col-md-3 col-lg-2 mt-1 px-0 ml-2">
                                <input type="number" name="budget" class="form-control" placeholder="Enter Budget"
                                    style="padding: 8px 12px" value="{{ old('budget', request('budget')) }}">
                            </div>

                            <!-- Country Select -->
                            <div class="col-md-3 col-lg-2 mt-1 px-0 ml-2">
                                <select name="country" class="country-select2 form-control form-control-lg">
                                    <option value="">Select Country</option>
                                    <option value="all" {{ request('country') == 'all' ? 'selected' : '' }}>All
                                    </option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ request('country') == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Program Select -->
                            <div class="col-md-3 col-lg-2 mt-1 px-0 ml-2">
                                <select name="program" class="program-select2 form-control form-control-lg">
                                    <option value="all" {{ request('program') == 'all' ? 'selected' : '' }}>All
                                    </option>
                                    <option value="" {{ request('program') == '' ? 'selected' : '' }}>Select
                                        Program</option>
                                    <option value="Bachelor’s"
                                        {{ request('program') == 'Bachelor’s' ? 'selected' : '' }}>Bachelor’s
                                    </option>
                                    <option value="Master’s"
                                        {{ request('program') == 'Master’s' ? 'selected' : '' }}>Master’s</option>
                                    <option value="PhD" {{ request('program') == 'PhD' ? 'selected' : '' }}>PhD
                                    </option>
                                </select>
                            </div>

                            <!-- Interest Select -->
                            <div class="col-md-3 col-lg-2 mt-1 px-0 ml-2">
                                <select name="interest" class="interest-select2 form-control form-control-lg">
                                    <option value="all" {{ request('interest') == 'all' ? 'selected' : '' }}>All
                                    </option>
                                    <option value="" {{ request('interest') == '' ? 'selected' : '' }}>Select
                                        Interest</option>
                                    <option value="Poor" {{ request('interest') == 'Poor' ? 'selected' : '' }}>Poor
                                    </option>
                                    <option value="Mid" {{ request('interest') == 'Mid' ? 'selected' : '' }}>Mid
                                    </option>
                                    <option value="High" {{ request('interest') == 'High' ? 'selected' : '' }}>High
                                    </option>
                                    <option value="Max" {{ request('interest') == 'Max' ? 'selected' : '' }}>Max
                                    </option>
                                </select>
                            </div>
                        </div>
                    </form>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="order-listing" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th>SL</th>
                                        <th>Unique ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inquiries as $inquiry)
                                        <tr role="row" class="odd">
                                            <td class="text-left">{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper($inquiry->unique_inquiry_code) }}</td>
                                            <td>{{ $inquiry->name }}</td>
                                            <td>{{ $inquiry->email ?? '' }}</td>
                                            <td>{{ $inquiry->mobile ?? '' }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.inquiry.view', ['unique_id' => $inquiry->unique_inquiry_code]) }}"
                                                    class="btn text-primary">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('admin.inquiry.edit', ['unique_id' => $inquiry->unique_inquiry_code]) }}"
                                                    class="btn text-primary">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <input type="hidden" value="{{ $inquiry->id }}">
                                                <a data-toggle="modal" data-target="#delete_modal_box"
                                                    class="btn text-primary delete-item">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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
                                    <form action="{{ route('admin.inquiry.delete') }}" method="POST" id="deleteForm">
                                        @csrf
                                        <input type="hidden" name="inquiry_id" id="modal_item_id" value="">
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

                @include('Backend.components.footer')
            </div>
        </div>
    </div>

    @include('Backend.components.script')

    <script src="{{ asset('backend/lib/select2/js/select2.min.js') }}"></script>
    <script>
        $('.country-select2').select2({
            placeholder: 'Select a country'
        });
        $('.program-select2').select2({
            placeholder: 'Select a program'
        });
        $('.interest-select2').select2({
            placeholder: 'Select an interest'
        });

        $(document).ready(function() {
            $('#filter-form').on('change', 'input, select', function() {
                $(this).closest('form').submit();
            });
        });
    </script>
</body>

</html>
