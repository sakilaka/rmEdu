<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <title>{{ env('APP_NAME') }} | Manage Landing Pages</title>
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
                            Manage Landing Pages
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="{{ route('admin.landing_page.create') }}" class="btn btn-primary btn-fw">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add Landing Page</a>
                        </nav>
                    </div>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="order-listing" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>URL</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pages as $page)
                                        <tr role="row" class="odd">
                                            <td class="text-left">{{ $loop->iteration }}</td>
                                            <td
                                                style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                {{ $page->title }}</td>
                                            <td
                                                style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                                <a href="{{ route('landing_page.show_page', ['slug' => $page->slug]) }}"
                                                    target="_blank">
                                                    {{ route('landing_page.show_page', ['slug' => $page->slug]) }}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                @if ($page->status == 1)
                                                    <a href="{{ route('admin.landing_page.change_status', $page->id) }}">
                                                        <span class="badge badge-success">Active</span>
                                                    </a>
                                                @elseif($page->status == 0)
                                                    <a href="{{ route('admin.landing_page.change_status', $page->id) }}">
                                                        <span class="badge badge-danger">Inactive</span>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.landing_page.edit', $page->id) }}"
                                                    class="btn text-primary">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <input type="hidden" value="{{ $page->id }}">
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
                                    <form action="{{ route('admin.landing_page.delete') }}" method="POST" id="deleteForm">
                                        @csrf
                                        <input type="hidden" name="page_id" id="modal_item_id" value="">
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
