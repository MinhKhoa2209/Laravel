<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Your Name">
    <title>Mixi Shop - @yield('title')</title>

    <!-- CSS và JS -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/wishlist.js')
    @vite('resources/js/product.js')
    @vite('resources/js/header.js')
    @vite('resources/js/filterProduct.js')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body class="bg-white">
    <header>
        @include('website.layouts.header')
    </header>

    @yield('content')

    <footer>
        @include('website.layouts.footer')
    </footer>

    @yield('script')
</body>


</html>
