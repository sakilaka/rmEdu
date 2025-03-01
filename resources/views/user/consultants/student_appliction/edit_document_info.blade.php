@extends('user.layouts.master-layout')
@section('head')
@section('title','- Edit Documentation')

@endsection
@section('main_content')

<style>
    .tabs-area {
	background-color: #f9f9f9;
}
ul.tabs-nav {
    width: 200px;
	float: left;
}
ul.tabs-nav li {
	border-bottom: 1px solid #ddd;
	border-left: none;
	position: relative;
}
ul.tabs-nav li a {
	padding: 15px 15px;
	display: block;
	color: #ece4e4;
}
ul.tabs-nav li a i.fa {
	margin-right: 10px;
}
ul.tabs-nav li a:hover,
ul.tabs-nav li a.active {
	background-color: var(--theme_hover_color);
	width: 101%;
	left: 0;
	right: 0;
}
.tabs-body {
	width: calc(100% - 200px);
	float: left;
	padding: 30px;
	border-left: 1px solid #ddd;
	background: #fff;
	min-height: 675px;
}
.tabs-body-full {
	width: 100%;
	float: left;
	padding: 30px;
	border-left: 1px solid #ddd;
	background: #fff;
	min-height: 500px;
}
.tabs-head {
	margin-bottom: 20px;
	display: inline-block;
	width: 100%;
}
.tabs-head h4 {
	float: left;
	font-size: 18px;
	padding-top: 10px;
}
.tabs-footer {
	border-top: 1px solid #ddd;
	padding: 30px 0px 0px 0px;
	margin-top: 30px;
}
li {
    list-style: none;
}
</style>

<div class="br-mainpanel">
    <div class="br-pagebody">
        <div class="br-section-wrapper">
<div class="main-body">
	<div class="container-fluid">
        <div class="row mt-25">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header" style="background-color:var(--seller_background_color); height:auto">
						<div class="row">
							<div class="col-lg-12" style="color: var(--seller_text_color)">
								{{ __('Documents') }}
							</div>
						</div>
					</div>
					<div class="card-body tabs-area p-0" style="background-color:var(--seller_background_color); height:auto" >
						@include('user.consultants.student_appliction.theme_options_tabs_nav')
						<div class="tabs-body"  style="background-color:var(--seller_frontend_color); color:var(--seller_text_color)">
							
							<!--Data Entry Form-->
                        <form novalidate="" method="post" action="{{ route('admin.student_appliction_document-update', $s_appliction->id) }}"  data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                @csrf
							<div class="row ajax-doc-res">
									<div class="col-lg-12 mt-3">
                            <b><h4>Documentation</b></h4>
                            <hr>
									</div>
							
							
									@foreach ($s_appliction->documents as $k => $document)
										
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address"><b>{{$loop->iteration}}. {{ __( $document->document_name ) }}</b></label>
											<input type="file" class="mt-3 mb-3" name="old_document_file[{{ $document->id }}]" value="{{ $document->document_file }}"/>
											<div class="row">
												<div class="col-md-5">
													<button style="margin-left: 18px" type="button" data-toggle="modal" data-target="#certificateModal{{ $k }}" class="btn btn-primary"><i class="fa fa-solid fa-eye"></i> Details</button>
												</div>
											</div>
										</div>
									</div>
							
							
									<!-- Modal -->
									<div class="modal fade" id="certificateModal{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
											<h5 class="modal-title" id="audioModalLabel" style="color: black">{{ $document->document_name }}</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">
											@if ($document->extensions == 'pdf')
												<iframe src="{{ $document->document_file_show  }}" width="100%" height="500"></iframe>
											@else
											<img src="{{ $document->document_file_show  }}" alt="image" style="height: 300px; width:450px">
											@endif
											</div>
											<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
										</div>
									</div>
							
							
									@endforeach
								</div>

								
								<div class="row tabs-footer mt-15">
									<div class="col-lg-12">
                                        <a href="{{ route('admin.student_appliction_list') }}" class="btn blue-btn btn-danger">Close</a>
                                        <button type="submit" class="btn blue-btn btn-info">Save</button>
										{{-- <a id="submit-form" href="javascript:void(0);" class="btn blue-btn">{{ __('Save') }}</a> --}}
									</div>
								</div>
							</form>
							<form method="POST" action="" enctype="multipart/form-data" id="uploadForm">
								@csrf
								<input type="hidden" name="order" id="current_order">
								<div class="form-row mt-5">
									<div class="form-group col-md-8">
										<input type="text" class="form-control" required="" placeholder="Describe your document here…" name="title" id="documentTitle">

									</div>

									<div class="form-group col-md-4">
										<div class="input-group">
											<div class="custom-file">
												<input type="file" name="file" class="custom-file-input" id="upload_file" aria-describedby="file" accept="image/*,application/pdf" required="">
												<label class="custom-file-label overflow-hidden" for="file">Choose
													file</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<button id="uploadFile" type="submit" class="btn btn-primary">
											<span class="spinner-border spinner-border-sm spinner d-none" role="status" aria-hidden="true"></span>

											<span class="upload-status">Upload
												document</span></button>

									</div>

								</div>

							</form>
							<!--/Data Entry Form/-->
						</div>
					</div>
				</div>
			</div>


		</div>


    </div>
</div>
</div>
</div>
</div>
<br>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
@section('script')
<script src="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/js/wnoty.js"></script>

<script>
	var student_app_id= "{{$s_appliction->id}}";
	var current_order = "{{$s_appliction->documents->count() }}";
	document.getElementById("upload_file").onchange = function() {
		$('.custom-file-label').text(document.getElementById("upload_file").files[0].name)
		
	};
	$("#uploadFile").on("click", function (e) {
   
		if ($("#uploadForm")[0].checkValidity()) {
			e.preventDefault();
			current_order++;
			$(".spinner").toggleClass("d-none");
			$(".upload-status").text("Uploading...");

			//set upload form values based on user application
			$("#uploadForm #email").val(jQuery("#email").val());
			$("#uploadForm #current_order").val(current_order);
			let data = new FormData($("#uploadForm")[0]);
			var url = "{{url('/add-attachment/upload/')}}/"+student_app_id;
			
			$.ajax({
				type: "post",
				url: url,
				processData: false,
				contentType: false,
				data: data,
				success: function (response) {
					$(".spinner").toggleClass("d-none");
					$(".upload-status").text("Upload document");
					
					$("#uploadForm")[0].reset();
					$('.custom-file-label').text('Choose File');
					$('.ajax-doc-res').append(response.doc_view);

					wnoty_ff({
						type: "success",
						message: "Upload successful",
					});
				},
				error: function (err) {
					$(".upload-status").text("Upload document");
					$('.custom-file-label').text('Choose File');
					$(".spinner").toggleClass("d-none");
					$("#uploadForm")[0].reset();
				},
			});
		} else {
			e.preventDefault();
			wnoty_ff({
				type: "error",
				message:
					"Please add a document title and select a document to upload.",
			});
		}
	});
</script>
@endsection