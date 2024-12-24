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
    @vite('resources/js/icon.js')


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
    <div class="fixed right-4 bottom-8 space-y-4 z-50 flex flex-col items-center">
        <button onclick="scrollToTop()" class="scroll-to-top bg-gray-200 p-4 rounded-full shadow-lg hover:bg-gray-400 transition  w-12 h-12 flex items-center justify-center" style="display: none;">
            <i class="fas fa-arrow-up text-xl"></i>
        </button>
        <button onclick="makeCall()" class="bg-green-500 text-white p-4 rounded-full shadow-lg transition transform scale-100 hover:scale-110  w-12 h-12 flex items-center justify-center">
            <i class="fas fa-phone text-xl"></i>
        </button>
        <button onclick="openMessenger()" class="bg-blue-500 text-white p-4 rounded-full shadow-lg transition transform scale-100 hover:scale-110  w-12 h-12 flex items-center justify-center">
            <i class="fab fa-facebook-messenger text-xl"></i>
        </button>

    </div>

    <footer>
        @include('website.layouts.footer')
    </footer>

    @yield('script')
</body>


</html>
