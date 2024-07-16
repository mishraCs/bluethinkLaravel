@extends('frontend.app')
@section('title', 'User Login ')
@include('frontend.header')
<div class=" header_nav form_div">
    @section('content')
    <h2 class="hjk">Register Form</h2>
    <form for="form_element" class="form-group" method="post" action="{{ route('register') }}" name="myForm"  enctype="multipart/form-data">
        @csrf
       <div id = "name" ><label>First Name:</label><br><span class="form_error"></span>
            <input class="form-control" type="text" id="first_name" name="first_name" value=""  required ><br>
            @error('first_name') 
            <div class='error'>{{ $message }}</div>
            @enderror
        </div>

        <div id = "last_name" ><label for="last_name">Last Name:</label><br><span class="form_error"></span>
        <input class="form-control" type="text" id="last_name" name="last_name" required ><br>
        @error('last_name') 
        <div class='error'>{{ $message }}</div>
        @enderror
        </div>

        <div id = "email"><label>Email:</label><br><span class="form_error"></span>
        <input class="form-control" type="email" id="email" name="email" required ><br>
        @error('email') 
        <div class='error'>{{ $message }}</div>
        @enderror
        </div>
        
        <div id = "password_error">
        <label>Password:</label><br><span class="form_error"></span>
        <input id="password" type="password" class="form-control" name="password" value="" required>
        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span><br>
        @error('password') 
        <div class='error'>{{ $message }}</div>
        @enderror
        </div>

        <div id="confirm_password_error"><label>Confirm Password:</label><br><span class="form_error"></span>
        <input id="confirm_password" type="password" class="form-control" name="confirm_password" value="" required>
        <span toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password"></span><br>
        @error('confirm_password') 
        <div class='error'>{{ $message }}</div>
        @enderror
        </div>
        
        <div id = "profile_image" ><label>Profile Image:</label><br><span class="form_error"></span>
        <input class="form-control" type="file" id="profile_image" name="profile_image"><br>
        @error('profile_image') 
        <div class='error'>{{ $message }}</div>
        @enderror
        </div>
        <button class="btn btn-success" name="submit" type="submit">Register</button>
    </form>
</div>
@include('frontend.footer')
@endsection
<script>
    $(document).ready(function() {
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>
