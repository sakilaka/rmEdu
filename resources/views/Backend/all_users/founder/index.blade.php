<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <title>{{ env('APP_NAME') }} | All Founder or Co-Founder</title>
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
                            All Founder or Co-Founder
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="{{ route('admin.founder.create') }}" class="btn btn-primary btn-fw">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add Founder or Co-Founder</a>
                        </nav>
                    </div>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="order-listing" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($founders as $founder)
                                        <tr role="row" class="odd">
                                            <td class="text-left">{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($founder->image_show)
                                                    <img src="{{ $founder->image_show }}" alt="{{ $founder->name }}"
                                                        width="40px" height="40px">&nbsp;&nbsp;
                                                @endif
                                                {{ $founder->name }}
                                            </td>
                                            <td>{{ $founder->designation }}</td>
                                            <td class="text-center">
                                                @if ($founder->status == 1)
                                                    <a href="{{ route('admin.founder.status', $founder->id) }}">
                                                        <span class="badge badge-success">Active</span>
                                                    </a>
                                                @elseif($founder->status == 0)
                                                    <a href="{{ route('admin.founder.status', $founder->id) }}">
                                                        <span class="badge badge-danger">Inactive</span>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.founder.edit', $founder->id) }}"
                                                    class="btn text-primary">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <input type="hidden" value="{{ $founder->id }}">
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
                                    <form action="{{ route('admin.founder.delete') }}" method="POST" id="deleteForm">
                                        @csrf
                                        <input type="hidden" name="founder_id" id="modal_item_id" value="">
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
