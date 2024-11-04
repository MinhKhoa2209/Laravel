<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/wishlist.js')
    @vite('resources/js/header.js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body class="bg-gray-100">
    <!-- Page Wrapper -->
    <div class="min-h-screen flex flex-col">

        <header>
            @include('website.layouts.header')
        </header>

        <!-- Main Content -->
        <main class="flex-grow">
            @include('website.layouts.content')
        </main>

        <!-- Footer (Included) -->
        <footer>
            @include('website.layouts.footer')
        </footer>

    </div>

</body>

</html>
