<?php $__env->startSection('title','- Contact'); ?>
<?php $__env->startSection('head'); ?>
<style>
    .mapbox iframe{
        width: 100%!important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<?php echo $__env->make('Frontend.layouts.parts.header-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="content_search" style="margin-top:70px">

    <link rel="stylesheet" href="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/css/intlTelInput.css">
    <style>
  .iti--allow-dropdown{
      width: 100%;
  }
        </style>

<div class="bg-alice-blue py-3 py-lg-4">
    <div class="container-lg p-2 p-md-5">
        <div class="row justify-content-center">
            <div class="col-md-12">

      <!--Start Course Preview Header-->
      <div class="classic_header hero-header position-relative text-white" style="height:200px!important;">
          <div class="bottom-0 end-0 overflow-hidden position-absolute start-0 top-0" >
              <img src="<?php echo e(@$banner->image_show); ?>"  class="img-fluid wh_sm_100" alt="">
          </div>
          <div class="container-lg hero-header_wrap position-relative">
              <div class="row align-items-end my-5">
                  <div class="col-12">
                      <h1 class="fw-semi-bold contact_txt" style="color: var(--header_text_color)"><?php echo e(@$banner->title); ?></h1>
                      <p class='m-1' style="color: var(--header_text_color)">Email : <?php echo e(@$contact_info->email1); ?> </p>
                      <p class='m-1' style="color: var(--header_text_color)"> Hotline  : <?php echo e(@$contact_info->phone1); ?> </p>
                  </div>
              </div>
          </div>
      </div>
      <!--End Course Preview Header-->
      <!--Start F.A.Q-->


      <?php
      $address = \App\Models\Tp_option::where('option_name', 'google_maps_address')->first();
      if($address){
			$dataObj = json_decode($address->option_value);
			$data['g_location'] = $dataObj->g_location ?? '';
			$data['status'] = $dataObj->status ?? '';
		}else{
			$data['g_location'] = "";
			$data['status'] = "";
		}
		$datalist = $data;
      ?>
      <div class="bg-alice-blue py-5">
          <div class="container-fluid">
              <div class="row justify-content-center">
                <?php if($data['status'] == 1): ?>
                  <div class="col-lg-6">
                      <div class="mapbox">
                          <!-- <div id="mapBox" class="" style="height: 450px" data-lat="23.751611" data-lon="90.370381"
                              data-zoom="10" data-info="Rd No. 8A, Dhaka 1209,Q92C+J5R Dhaka."
                              data-marker="https://lead.academy/<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/img/marker.png"
                              data-mlat="23.751611" data-mlon="90.370381"> -->
                              <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d912.9703229713159!2d90.3698338!3d23.7516122!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd3460d9ff26ccb52!2zMjPCsDQ1JzA1LjgiTiA5MMKwMjInMTMuNCJF!5e0!3m2!1sen!2sbd!4v1640149738105!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
                              <?php echo $datalist['g_location']; ?>

                              
                              <!-- </div> -->
                      </div>
                  </div>
                <?php endif; ?>
                  <div class="col-lg-6">
                      <div class="contact_form">


                          <form class="contact_form_box" action="<?php echo e(route('frontend.user.contact.store')); ?>" method="post" id="contactForm" novalidate="novalidate">
                              <?php echo csrf_field(); ?>
                            <div class="row">
                                  <div class="col-lg-6">
                                      <div class="mb-3">
                                          <label for="fullName" class="form-label" style="color: var(--text_color)">Full Name <i class="text-danger"> *
                                              </i></label>
                                          <input type="text" name="name" class="form-control form-control-lg" id="fullName"
                                              placeholder="Enter Your Name">
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="mb-3">
                                          <label for="phoneNumber" class="form-label" style="color: var(--text_color)">Phone No.</label>
                                          <input type="number" name="mobile" class="form-control form-control-lg" id="phoneNumber">
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="mb-3">
                                          <label for="emailAddress" class="form-label" style="color: var(--text_color)">Your Email <i class="text-danger"> *
                                              </i></label>
                                          <input type="email" name="email" class="form-control form-control-lg" id="emailAddress"
                                              placeholder="Enter Your Email address">
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="mb-3">
                                          <label for="whoAmI" class="form-label" style="color: var(--text_color)">I am</label>
                                          <select class="form-select form-select-lg" name="type" aria-label="Default select example"
                                              id="whoAmI">
                                              <option value="student" selected>Student</option>
                                              <option value="instructor">Instructor</option>
                                              <option value="company">Company</option>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="col-lg-6">
                                      <div class="mb-3">
                                          <label for="organizationName" class="form-label" style="color: var(--text_color)">Organization Name</label>
                                          <input type="text" name="organization" class="form-control form-control-lg" id="organizationName"
                                              placeholder="">
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="mb-3">
                                          <label for="prefferedDate" class="form-label" style="color: var(--text_color)">Preffered date and Time</label>
                                          <input type="datetime-local" name="date" class="form-control form-control-lg" id="prefferedDate">
                                      </div>
                                  </div>
                                  <div class="col-lg-12">
                                      <div class="mb-3">
                                          <label for="reasonForCall" class="form-label" style="color: var(--text_color)">Reason for a call <i
                                                  class="text-danger"> * </i></label>
                                          <textarea class="form-control" name="details" id="reasonForCall" rows="5"
                                              placeholder="write message"></textarea>
                                      </div>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-lg btn-dark-cerulean" id="submit_contact">Send
                                  Message</button>



                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
            </div>
        </div>
    </div>
</div>
      <!--End F.A.Q-->

      <script src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/intlTelInput.js"></script>
      <!--gmaps Js-->
      <!-- AIzaSyB13ZAvCezMx5TETYIiGlzVIq65Mc2FG5g -->
      <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCiXxFU3GJiFz35LlWrj_HgehXtHUmFPY"></script> -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCiXxFU3GJiFz35LlWrj_HgehXtHUmFPY"></script>
      <script src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/gmaps.min.js"></script>
      <script  src="<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/utils.js"></script>
      <script>
  if ($("#mapBox").length) {
      var $lat = $("#mapBox").data("lat");
      var $lon = $("#mapBox").data("lon");
      var $zoom = $("#mapBox").data("zoom");
      var $marker = $("#mapBox").data("marker");
      var $info = $("#mapBox").data("info");
      var $markerLat = $("#mapBox").data("mlat");
      var $markerLon = $("#mapBox").data("mlon");
      var map = new GMaps({
          el: "#mapBox",
          lat: $lat,
          lng: $lon,
          scrollwheel: false,
          scaleControl: true,
          streetViewControl: false,
          panControl: true,
          disableDoubleClickZoom: true,
          mapTypeControl: false,
          zoom: $zoom,
      });
      map.addMarker({
          lat: $markerLat,
          lng: $markerLon,
          icon: $marker,
          infoWindow: {
              content: $info,
          },
      });
  }
      </script>

      <script>
  $('#submit_contact').on('click', function() {
      var name = $('#fullName').val();
      var phoneNumber = $('#phoneNumber').val();
      var emailAddress = $('#emailAddress').val();
      var whoAmI = $('#whoAmI').val();
      var organizationName = $('#organizationName').val();
      var prefferedDate = $('#prefferedDate').val();
      var reasonForCall = $('#reasonForCall').val();
      // alert(phoneNumber);return false;
      if (name == '') {
          toastrErrorMsg("Name must be required!");
          $("#fullName").focus();
          return false;
      }
      if (emailAddress == '') {
          toastrErrorMsg("Email must be required!");
          $("#emailAddress").focus();
          return false;
      }
      if (IsEmail(emailAddress) == false) {
          toastrErrorMsg("Your mail is invalid");
          return false;
      }

      if (reasonForCall == '') {
          toastrErrorMsg("Message must be required!");
          $("#reasonForCall").focus();
          return false;
      }

      $.ajax({
          url: base_url + enterprise_shortname + "/submit-contact",
          type: "POST",
          data: {
              'csrf_test_name': CSRF_TOKEN,
              name: name,
              emailAddress: emailAddress,
              phoneNumber: phoneNumber,
              whoAmI: whoAmI,
              organizationName: organizationName,
              prefferedDate: prefferedDate,
              reasonForCall: reasonForCall,
              enterprise_shortname: enterprise_shortname
          },
          success: function(r) {
              // console.log(r);return false;
              toastrSuccessMsg(r);
          }
      });

  });

  var input = document.querySelector("#phoneNumber");
      var utilslink = '<?php echo e(asset('frontend')); ?>/application/modules/frontend/views/themes/default/assets/js/index.html';

      window.intlTelInput(input, {

        // allowDropdown: false,
        // autoHideDialCode: false,
        // autoPlaceholder: "off",
        // dropdownContainer: document.body,
        // excludeCountries: ["us"],
        // formatOnDisplay: false,
        // geoIpLookup: function(callback) {
        //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        //     var countryCode = (resp && resp.country) ? resp.country : "";
        //     callback(countryCode);
        //   });
        // },
        // hiddenInput: "full_number",
        // initialCountry: "auto",
        // localizedCountries: { 'de': 'Deutschland' },
        // nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      //   onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        preferredCountries: ['NG'],
        // separateDialCode: true,
            // Change the country selection
           // instance.selectCountry("gb"),



        utilsScript: utilslink+"utils.js",
      });

  ("use strict");


      </script></div>
  <!--======== main content close ==========-->


<?php echo $__env->make('Frontend.layouts.parts.news-letter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rmintern/public_html/resources/views/Frontend/pages/contact.blade.php ENDPATH**/ ?>