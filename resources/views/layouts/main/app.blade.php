<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Head -->
    @include('layouts.main.includes.head.app')
    <!-- End Head -->
</head>
<body>
    <!-- Header -->
    <div id="app">
        @include('layouts.main.includes.header.app')
    </div>
    <!-- End Header -->

    <!-- Content -->
    @yield('content')
    <!-- End Content -->

    <!-- Footer -->
    <div class="container">
        @include('layouts.main.includes.footer.app')
    </div>
    <!-- End Footer -->

    <script>
    </script>
</body>
</html>
