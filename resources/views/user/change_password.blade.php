@extends('user.layouts.master-layout')
@section('head')
@section('title','- Change Password')


@endsection
@section('main_content')

    {{-- success message start --}}
    {{-- @if(session()->has('message'))
    <div class="alert alert-success">
    {{session()->get('message')}}
    </div>
    <script>
        setTimeout(function(){
            $('.alert.alert-success').hide();
        }, 3000);
    </script>
    @endif --}}
    {{-- success message start --}}


    <div class="card card-body mt-2 mb-3 shadow" style="background-color:var(--seller_background_color)">
        <div class="right_section">
            <div>
                <h4 style="color: var(--seller_text_color)">Security Setting</h4>
                <span style="color: var(--seller_text_color)">Update your Password.</span>
            </div>
        </div>
        <div class="passwodBox mb-3 card card-body " style="background-color: var(  --seller_frontend_color); color: var(--seller_text_color)">
            <form action="{{ route('user.password_change', auth()->user()->id) }}" method="POST" style="margin-top: 0%">
                @csrf
                    

                    <div class="d-flex">
                        <label for="">Current Password</label>
                        <input type="password" id="current_password"  name="current_password" required="">
                        
                        <a class="" onclick="togglePassword('current_password')"  style="margin-top: 5px; margin-left:-25px">
                            <i class="fa fa-eye" id="current_password_eye"></i>
                        </a>
                    </div>

                
                    {{-- <hr/> --}}
                    <div class="d-flex">
                    
                            <label class="mt-3" for="">New Password</label>
                            <input class="mt-3 @error('new_password') is-invalid @enderror" type="password" id="new_password"  name="new_password" required="">
                            <a class="" onclick="togglePassword('new_password')" style="margin-top: 20px; margin-left:-25px">
                                <i class="fa fa-eye" id="new_password_eye"></i>
                            </a>
                    </div>
                
                    {{-- <div class="d-flex"> --}}
                        @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    {{-- </div> --}}
                


                    <div class="d-flex">
                        <label class="mt-3" for="">Confirm Password</label>
                        <input class="mt-3" type="password" id="new_password_confirmation" name="new_password_confirmation" required="">
                        <a class="" onclick="togglePassword('new_password_confirmation')" style="margin-top: 20px; margin-left:-25px">
                            <i class="fa fa-eye" id="new_password_confirmation_eye"></i>
                        </a>
                    </div>

                
                    <button class="mt-3 btn shadow" type="submit"  style="background-color: var( --button2_color); color:white;">
                        Update
                    </button>
                

            </form>
        </div>
    </div>




    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const eyeIcon = document.getElementById(inputId + '_eye');
            
            if (input.type === "password") {
                input.type = "text";
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                input.type = "password";
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>



@endsection
