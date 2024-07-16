<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BlueThinkPhp</title>
    <!-- botstrapCss -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- botstrapCss -->

    <!-- bootstrapJs -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <!-- bootstrapJs -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" />
    <!-- Styles -->

    <!-- style jquery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- style jquery -->

    <!-- scrip -->
    <script src="{{ asset('js/welcome.js') }}"></script>
    <!-- scrip -->
</head>
<body>
<header>
<div class="home_content ">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div id="main"> 
            <button class="openbtn" onclick="openNav()">&#9776;</button>
        </div>
        <a class="navbar-brand" href="{{ url('index') }}">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('welcome') }}">welcome</a>
                </li>
                <li class="nav-item">
                    @if (Auth::check())
                        <a class="header_link" href="{{url('profile')}}">{{Auth::user()->first_name}}</a>
                        <img onclick="window.location.href = '{{url('profile')}}' " class="header_user_image" src="{{Auth::user()->profile_image}}">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-link navbar-brand" style="display: inline; padding: 0;">Logout</button>
                        </form>
                        @else
                        @if (strpos(Request::path(), 'login') === false && strpos(Request::path(), 'register') === false)
                            <a class="navbar-brand" href="{{ url('login') }}">Login</a>
                            <a class="navbar-brand" href="{{ url('register') }}">Register</a>
                        @endif
                    @endif
                </li>
            </ul>
        </div>
    </nav>
</header>
<main>
    
<!-- Modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
    <!-- sidebar -->
    @include('frontend.sidebar')
    
    
