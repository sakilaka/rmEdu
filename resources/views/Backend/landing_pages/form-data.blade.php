<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <title>{{ env('APP_NAME') }} | Manage Form Data</title>

    <style>
        .fs-09 {
            font-size: 1rem !important;
            padding-top: 0;
        }

        .fw-bold {
            font-weight: bold;
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
                            Manage Form Data
                        </h3>
                    </div>

                    <div class="row card">
                        <div class="col-sm-12 card-body table-responsive">
                            <table id="order-listing" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Academic Details</th>
                                        <th>Message</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($forms as $form)
                                        @php
                                            $education = json_decode($form->education, true);
                                        @endphp
                                        <tr role="row" class="odd">
                                            <td class="text-left">{{ $loop->iteration }}</td>
                                            <td style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;"
                                                data-toggle="tooltip" data-placement="top" title="{{ $form->name }}">
                                                {{ $form->name }}
                                            </td>
                                            <td style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;"
                                                data-toggle="tooltip" data-placement="top" title="{{ $form->contact }}">
                                                {{ $form->contact }}
                                            </td>
                                            <td style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;"
                                                data-toggle="tooltip" data-placement="top"
                                                title="{{ $form->education }}">
                                                {{ $form->education }}
                                            </td>
                                            <td style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px;"
                                                data-toggle="tooltip" data-placement="top" title="{{ $form->message }}">
                                                {{ $form->message }}
                                            </td>
                                            <td class="text-right">
                                                <a data-toggle="modal" data-target="#infoModal" class="btn text-primary"
                                                    data-id="{{ $form->id }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <input type="hidden" value="{{ $form->id }}">
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
                                    <form action="{{ route('admin.landing_page.submitted_form_data.delete') }}"
                                        method="POST" id="deleteForm">
                                        @csrf
                                        <input type="hidden" name="form_id" id="modal_item_id" value="">
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

                {{-- Form data show modal --}}
                <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="infoModalLabel">Submitted Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="modalName" class="fw-bold fs-09">Name</label>
                                        <p id="modalName" class="form-control-plaintext fs-09"></p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="modalContact" class="fw-bold fs-09">Contact No.</label>
                                        <p id="modalContact" class="form-control-plaintext fs-09"></p>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="modalEducation" class="fw-bold fs-09">
                                            Academic details
                                        </label>
                                        <p id="modalEducation" class="form-control-plaintext fs-09"></p>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="modalMessage" class="fw-bold fs-09">Message</label>
                                        <p id="modalMessage" class="form-control-plaintext fs-09"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary-bg" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                @include('Backend.components.footer')
            </div>
        </div>
    </div>

    @include('Backend.components.script')

    <script>
        $(document).ready(function() {
            $('#infoModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var formId = button.data('id');

                $.ajax({
                    url: '{{ route('admin.landing_page.get_form_data') }}',
                    method: 'GET',
                    data: {
                        form_id: formId
                    },
                    success: function(response) {
                        $('#modalName').text(response.data.name);
                        $('#modalContact').text(response.data.contact);

                        var educationDetails = response.data.education.split(',');
                        var formattedEducation = educationDetails.join('<br>');
                        $('#modalEducation').html(formattedEducation);

                        $('#modalMessage').text(response.data.message);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching form data:', error);
                    }
                });
            });
        });
    </script>
</body>

</html>
