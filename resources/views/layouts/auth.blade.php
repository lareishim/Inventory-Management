<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login')</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body style="margin: 0; background: linear-gradient(135deg, #7f53ac 0%, #647dee 100%);">
    <div class="full-center-container">
        @yield('content')
    </div>
</body>
</html>
