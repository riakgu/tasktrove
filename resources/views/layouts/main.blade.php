<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }} - {{ $title }}</title>

    <link rel="shortcut icon" href="assets/images/svg/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" href="assets/css/app.css" />

    @yield('style')

</head>

<body>
<div id="app">

    @include('partials.sidebar')

    <div id="main" class="layout-navbar navbar-fixed">

        @include('partials.header')

        @yield('content')

        @include('partials.header')

    </div>

</div>
<script src="assets/js/dark.js"></script>
<script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<script src="assets/js/app.js"></script>

@yield('script')

</body>

</html>
