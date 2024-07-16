<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <div class='container'>
        @session('success')
        <div class='alert' id='success-alert'>
            {{ session('success') }}
        </div>
        @endsession

        @session('error')
        <div class='alert alert-error' id='error-alert'>
           {{ session('error') }}
        </div>
        @endsession

        @yield('content')
    </div>
</body>
</html>