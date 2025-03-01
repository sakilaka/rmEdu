<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/summernote/dist/summernote-bs4.css') }}">
    <title>{{ env('APP_NAME') }} | Edit Category</title>
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
                            Edit Category
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-9 m-auto grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample"
                                        action="{{ route('home-category.update', $categorie->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="menu_type" class=" col-form-label">Category Image</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-8 col-lg-6">
                                                        <div class="dropify-wrapper" style="border: none">
                                                            <div class="dropify-loader"></div>
                                                            <div class="dropify-errors-container">
                                                                <ul></ul>
                                                            </div>
                                                            <input type="file" class="dropify" name="image"
                                                                accept="image/*" id="thumbnail_upload">
                                                            <button type="button" class="dropify-clear">Remove</button>
                                                            <div class="dropify-preview">
                                                                <span class="dropify-render"></span>
                                                                <div class="dropify-infos">
                                                                    <div class="dropify-infos-inner">
                                                                        <p class="dropify-filename">
                                                                            <span class="file-icon"></span>
                                                                            <span class="dropify-filename-inner"></span>
                                                                        </p>
                                                                        <p class="dropify-infos-message">
                                                                            Drag and drop or click to replace
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-sm-12 col-md-4 col-lg-6 d-flex justify-content-center align-items-center">
                                                        <div class="px-3">
                                                            <img src="{{ $categorie->image_show ?? asset('frontend/images/No-image.jpg') }}"
                                                                alt="{{ $categorie->name }}" class="img-fluid"
                                                                style="border-radius: 10px; max-height: 200px !important;" id="thumbnail_preview">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="category_name" class=" col-form-label">Name</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input id="category_name" type="text" name="name"
                                                    class="form-control" value="{{ $categorie->name }}"
                                                    placeholder="Enter menu name" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="category_type" class=" col-form-label">Type</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-lg" name="type"
                                                    id="category_type" required>
                                                    <option value="">Select type</option>
                                                    <option value="home"
                                                        @if ($categorie->type == 'home') selected @endif>Program
                                                    </option>
                                                    <option value="event"
                                                        @if ($categorie->type == 'event') selected @endif>Event</option>
                                                    <option value="blog"
                                                        @if ($categorie->type == 'blog') selected @endif>Blog</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="category_status" class=" col-form-label">Status</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-lg" name="status"
                                                    id="category_status" required>
                                                    <option value="">Select type</option>
                                                    <option @if($categorie->status == 1) @selected(true) @endif value="1">Active
                                                    </option>
                                                    <option @if($categorie->status == 0) @selected(true) @endif value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 d-flex justify-content-between align-items-center">
                                                <label for="menu_position" class=" col-form-label">Description</label>
                                                <p>:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <textarea id="summernote" name="details" style="height: 150px" required>{!! $categorie->details !!}</textarea>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary mr-2">Update</button>
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

    <script src="{{ asset('backend/lib/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Write something...',
            tabsize: 4,
            height: 150
        });
    </script>

    <script src="{{ asset('backend/assets/js/dropify.js') }}"></script>
    <script>
        $('#thumbnail_upload').on('change', function(e) {
            var fileInput = $(this)[0];

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#thumbnail_preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
    </script>
</body>

</html>
