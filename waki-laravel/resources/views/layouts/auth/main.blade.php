<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WakiMart | @yield('title')</title>

    @include('layouts.auth.style')
</head>

<body class="hold-transition login-page">
    @yield('content')

    @include('layouts.auth.scipt')
</body>

</html>