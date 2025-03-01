@extends('user.layouts.master-layout')
@section('head')
@section('title','- Edit program info')

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
								{{ __('Program Information') }}
							</div>
						</div>
					</div>
					<div class="card-body tabs-area p-0" style="background-color:var(--seller_background_color); height:auto">
						@include('user.consultants.student_appliction.theme_options_tabs_nav')
						<div class="tabs-body" style="background-color:var(--seller_frontend_color); color:var(--seller_text_color)">
							
							<!--Data Entry Form-->
                            <form novalidate="" method="post" action="{{ route('consultent.student_appliction_program_update', $s_appliction->id) }}"  data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                @csrf
								
								<div class="row">
									<div class="col-lg-12">
										<h1>Program Information</h1>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Application ID:') }}</label>
											<input disabled value="{{ $s_appliction->application_code }}" type="text" name="facebook" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('User_id/Name:') }}</label>
											<input disabled value="{{ @$s_appliction->student->name }}" type="text" name="facebook" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Program Name:') }}</label>
											
											@foreach ($s_appliction->carts as $cart)
											<input disabled value="{{ @$cart->course->name }}" type="text" name="facebook" id="address" class="form-control">
											@endforeach
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('University Name:') }}</label>
											@foreach ($s_appliction->carts as $cart)
											<input disabled value="{{ @$cart->course->university->name }}" type="text" name="facebook" id="address" class="form-control">
											@endforeach
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Application Fee:') }}</label>
											<input disabled value="{{ $s_appliction->application_fee }}" type="text" name="facebook" id="address" class="form-control">
										</div>
									</div>
									
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Payment Status:') }}</label>
											<select name="payment_status" class="form-control">
												<option @if ($s_appliction->payment_status == 0) Selected @endif value="1"> Not Paid</option>
												<option @if ($s_appliction->payment_status == 1) Selected @endif value="1"> Paid</option>
											</select>
												
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Status:') }}</label>
											<select name="status" class="form-control">
												<option value=""> Select Status</option>
												<option @if ($s_appliction->status == 1) Selected @endif value="1"> Processing</option>
												<option @if ($s_appliction->status == 2) Selected @endif value="2"> Approved</option>
												<option @if ($s_appliction->status == 3) Selected @endif value="3"> Cancel</option>
												<option @if ($s_appliction->status == 4) Selected @endif value="4">Not Submitted</option>
												<option @if ($s_appliction->status == 5) Selected @endif value="5">Submitted</option>
												<option @if ($s_appliction->status == 6) Selected @endif value="6">Pending</option>
												<option @if ($s_appliction->status == 7) Selected @endif value="7">E-documents Qualified</option>
												<option @if ($s_appliction->status == 8) Selected @endif value="8">Waiting Processing</option>
												<option @if ($s_appliction->status == 9) Selected @endif value="9">Processing</option>
												<option @if ($s_appliction->status == 10) Selected @endif value="10">More Documents Needed</option>
												<option @if ($s_appliction->status == 11) Selected @endif value="11">Re-Submitted</option>
												<option @if ($s_appliction->status == 12) Selected @endif value="12">Rejected</option>
												<option @if ($s_appliction->status == 13) Selected @endif value="13">Transferred</option>
												<option @if ($s_appliction->status == 14) Selected @endif value="14">Accepted</option>
												<option @if ($s_appliction->status == 15) Selected @endif value="15">E-offer Delivered</option>
												<option @if ($s_appliction->status == 16) Selected @endif value="16">Offer Delivered</option>
										</select>
										</div>
									</div>


								</div>

									<div class="row tabs-footer mt-15">
										<div class="col-lg-12">
											<a href="{{ route('admin.student_appliction_list') }}" class="btn blue-btn btn-danger">Close</a>
											<button type="submit" class="btn blue-btn btn-info">Save</button>
											{{-- <a id="submit-form" href="javascript:void(0);" class="btn blue-btn">{{ __('Save') }}</a> --}}
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
@endsection
