@extends('frontend.app')

@section('title', 'User Login' )

@include('frontend.header')

<div class=" form_div ">
    @section('content')
    <h2>Login Form</h2>
    <form class="form-group" method="post" action="{{ route('login') }}">
        @csrf
        <label for="email">Email:</label>
        <input class="form-control" type="email" id="email" name="email" required>
        @error('user_eemail')
        <div class='error'>{{$message}}</div>
        @enderror <br>
        <label for="password">Password:</label>
        <input class="form-control" type="password" id="password" name="password" required>
        @error('password')
        <div class='error'>{{$message}}</div>
        @enderror <br>
        <button class="btn btn-primary" name="submit" type="submit">Login</button>
    </form>
</div>
@include('frontend.footer')

@endsection