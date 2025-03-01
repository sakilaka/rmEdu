@section('title')
    Admin - Edit Hotel
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('tourism-hotel-package.index')}}"> <i class="icon ion-reply text-22"></i> All Hotels</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Edit Hotel</h6>
               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

               {{-- success message start --}}
           @if(session()->has('message'))
           <div class="alert alert-success">
           <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"></button>
           {{session()->get('message')}}
           </div>
           <script>
               setTimeout(function(){
                   $('.alert.alert-success').hide();
               }, 3000);
           </script>
           @endif
           {{-- success message End --}}

            <!----- Start Add Category Form input ------->
            <div class="col-xl-9 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('tourism-hotel-package.update', $hotel->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{ method_field('PATCH') }}

                        <div class="row mt-3" id="menuimage">
                            <label class="col-sm-3 form-control-label">Continent Image: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $hotel->image_show}}" alt="">
                                        <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                    </div>
                            </div>
                        </div><!-- row -->

                      <div class="row mt-4">
                        <label class="col-sm-3 form-control-label">Hotel Name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                          <input type="text" name="name" value="{{ $hotel->name }}" class="form-control" placeholder="Enter Hotel Name" required>
                        </div>
                      </div><!-- row -->
                      <div class="row mt-4">
                        <label class="col-sm-3 form-control-label">Price: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                          <input type="text" name="price" value="{{ $hotel->price }}" class="form-control" placeholder="Enter Price" required>
                        </div>
                      </div><!-- row -->
                      <div class="row mt-4">
                        <label class="col-sm-3 form-control-label">Maximum Guest: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                          <input type="number" name="m_guest" value="{{ $hotel->m_guest }}" class="form-control" placeholder="Enter Maximum Guest" required>
                        </div>
                      </div><!-- row -->
                      <div class="row mt-4">
                        <label class="col-sm-3 form-control-label">Contact Number: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                          <input type="text" name="number" value="{{ $hotel->number }}" class="form-control" placeholder="Enter Contact Number" required>
                        </div>
                      </div><!-- row -->
                      <div class="row mt-4">
                        <label class="col-sm-3 form-control-label">Email: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                          <input type="email" name="email" value="{{ $hotel->email }}" class="form-control" placeholder="Enter Email" required>
                        </div>
                      </div><!-- row -->
                      <div class="row mt-4">
                        <label class="col-sm-3 form-control-label">Address: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                          <textarea type="text" name="address" class="form-control" placeholder="Enter Hotel Address" required>{{ $hotel->address }}</textarea>
                        </div>
                      </div><!-- row -->
                      <div class="row mt-4">
                        <label class="col-sm-3 form-control-label">Room Facilities: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                          <select class="form-control multipleSelect2Search custom-select" name="room_facilities[]" multiple required>
                            <option value="">Select Room Facilities</option>
                            <option {{$hotel->roomFacilities->where('room_facilities','Air Condition')->first() != null ? 'selected': ''}} value="Air Condition">Air Condition</option>
                            <option {{$hotel->roomFacilities->where('room_facilities','Bath')->first() != null ? 'selected': ''}} value="Bath">Bath</option>
                            <option {{$hotel->roomFacilities->where('room_facilities','Flat- Screen TV')->first() != null ? 'selected': ''}} value="Flat- Screen TV">Flat- Screen TV</option>
                            <option {{$hotel->roomFacilities->where('room_facilities','Washing Machine')->first() != null ? 'selected': ''}} value="Washing Machine">Washing Machine</option>
                            <option {{$hotel->roomFacilities->where('room_facilities','Electric Kettle')->first() != null ? 'selected': ''}} value="Electric Kettle">Electric Kettle</option>
                            <option {{$hotel->roomFacilities->where('room_facilities','Coffee Maker')->first() != null ? 'selected': ''}} value="Coffee Maker">Coffee Maker</option>
                          </select>
                        </div>
                      </div><!-- row -->
                      <div class="row mt-4">
                        <label class="col-sm-3 form-control-label">Room Accessibility: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                          <select class="form-control multipleSelectSearch custom-select" name="room_accessibility[]" multiple  required>
                            <option value="">Select Room Accessibility</option>
                            <option {{$hotel->roomAccessibilities->where('room_accessibility','Toilet with grab rails')->first() != null ? 'selected' : '' , $hotel->id}} value="Toilet with grab rails">Toilet with grab rails adsdas</option>
                            <option {{$hotel->roomAccessibilities->where('room_accessibility','Roll in shower')->first() != null ? 'selected': '' , $hotel->id}} value="Roll in shower">Roll in shower</option>
                            <option {{$hotel->roomAccessibilities->where('room_accessibility','Raised Toitel')->first() != null ? 'selected': '' , $hotel->id}} value="Raised Toitel">Raised Toitel</option>
                            <option {{$hotel->roomAccessibilities->where('room_accessibility','Lowered sink')->first() != null ? 'selected': '' , $hotel->id}} value="Lowered sink">Lowered sink</option>
                            <option {{$hotel->roomAccessibilities->where('room_accessibility','Shampoo')->first()  != null ? 'selected': '' , $hotel->id}} value="Shampoo">Shampoo</option>
                            <option {{$hotel->roomAccessibilities->where('room_accessibility','Bath shop')->first() != null ? 'selected': '' , $hotel->id}} value="Bath shop">Bath shop</option>
                          </select>
                        </div>
                      </div><!-- row -->
                      <div class="row mt-4">
                        <label class="col-sm-3 form-control-label">Facilities: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                          <textarea type="text" name="facilities" id="summernote_two" class="form-control" placeholder="Enter Continent Name" required>{{ $hotel->facilities }}</textarea>
                        </div>
                      </div><!-- row -->
                      <div class="row mt-4">
                        <label class="col-sm-3 form-control-label">Short Description: <span class="tx-danger">*</span></label>
                        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                          <textarea type="text" name="description" id="summernote" class="form-control" placeholder="Enter Continent Name" required>{{ $hotel->description }}</textarea>
                        </div>
                      </div><!-- row -->

                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('tourism-hotel-package.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Update</button>
                          </div>
                        </div>
                    </form>

                </div><!-- form-layout -->
            </div><!-- col-6 -->
            <!----- Start Add Category Form input ------->
          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
      $('.multipleSelect2Search').select2();
  });
</script>
<script>
  $(document).ready(function() {
      $('.multipleSelectSearch').select2();
  });
</script>

<script>
  $(function(){
  'use strict';

  $('#datatable1').DataTable({
      responsive: true,
      language: {
      searchPlaceholder: 'Search...',
      sSearch: '',
      lengthMenu: '_MENU_ items/page',
      }
  });

  $('#datatable2').DataTable({
      bLengthChange: false,
      searching: false,
      responsive: true
  });

  // Select2
  $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

  });
</script>
@endsection
