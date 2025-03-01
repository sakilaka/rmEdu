<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <title>{{ env('APP_NAME') }} | All University</title>
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
                            All University
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="{{ route('admin.university.create') }}" class="btn btn-primary btn-fw">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add University</a>
                        </nav>
                    </div>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="order-listing" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>University</th>
                                        <th>Continent</th>
                                        <th>Country</th>
                                        <th>Address</th>
                                        {{-- <th>State</th> --}}
                                        {{-- <th>City</th> --}}
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($universities as $university)
                                        <tr role="row" class="odd">
                                            <td class="text-left">{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ $university->image_show }}" alt="" width="30px"
                                                    height="30px">
                                            </td>
                                            <td
                                                style="white-space: nowrap; 
                                                        overflow: hidden; 
                                                        text-overflow: ellipsis; 
                                                        max-width: 250px;">
                                                <a href="{{ route('frontend.university_details', ['id' => $university->id]) }}"
                                                    data-toggle="tooltip" data-placement="top"
                                                    data-original-title="{{ $university->name }}" target="_blank"
                                                    style="color: var(--primary_background)">
                                                    {{ $university->name }}
                                                </a>
                                            </td>
                                            <td>{{ $university->continent->name ?? '' }}</td>
                                            <td>{{ $university->country->name ?? '' }}</td>
                                            <td data-toggle="tooltip" data-placement="top"
                                                data-original-title="{{ $university->address }}">
                                                {{ Illuminate\Support\Str::limit($university->address, 30, '...') }}
                                            </td>
                                            {{-- <td>{{ $university->state->name ?? '' }}</td> --}}
                                            {{-- <td>{{ $university->city->name ?? '' }}</td> --}}
                                            <td class="text-center">
                                                @if ($university->status == 1)
                                                    <a href="{{ route('admin.university.status', $university->id) }}">
                                                        <span class="badge badge-success">Active</span>
                                                    </a>
                                                @elseif($university->status == 0)
                                                    <a href="{{ route('admin.university.status', $university->id) }}">
                                                        <span class="badge badge-danger">Inactive</span>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.university.edit', $university->id) }}"
                                                    class="btn text-primary">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <input type="hidden" value="{{ $university->id }}">
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
                                    <form action="{{ route('admin.university.delete') }}" method="POST"
                                        id="deleteForm">
                                        @csrf
                                        <input type="hidden" name="university_id" id="modal_item_id" value="">
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
</body>

</html>
