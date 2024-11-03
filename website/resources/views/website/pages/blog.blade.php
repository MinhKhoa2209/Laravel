<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/header.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/kMVqHDzDBP1oWyP2IBLr9fHUnkixrjjgkGpDje+9edj76Pj2mWtGtsnL5JpG1QZUb+U1a1e3OrKbw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-white">
    <!-- Page Wrapper -->
    <div class="min-h-screen flex flex-col justify-between">

        <header>
            @include('website.layouts.header')
        </header>

        <!-- Main Content -->
        <main class="flex-grow flex items-center pt-20">
            <section class="intro py-8 px-6 text-center mx-auto max-w-3xl">
                <h2 class="text-3xl font-bold mb-4">Welcome to MixiShop</h2>
                <p class="mb-4">MixiShop is a prominent e-commerce platform that offers a wide range of products, from fashion and electronics to home goods. Here are the standout features of MixiShop:</p>
                <ol class="list-decimal list-inside text-left mx-auto">
                    <li><strong>Diverse Product Range:</strong> MixiShop provides thousands of items from well-known brands, making it easy for customers to find suitable products.</li>
                    <li><strong>Quality Customer Service:</strong> A dedicated and professional support team is always ready to listen to customer inquiries.</li>
                    <li><strong>Attractive Discounts and Promotions:</strong> MixiShop frequently organizes promotional events and discount codes, giving customers opportunities to shop at lower prices.</li>
                    <li><strong>Fast Delivery:</strong> The platform is committed to timely and quick delivery, especially offering free shipping for large orders.</li>
                    <li><strong>Comfortable Shopping Experience:</strong> The user-friendly interface makes it easy for customers to search and order products quickly.</li>
                    <li><strong>Flexible Return Policy:</strong> The transparent return policy allows customers to shop with peace of mind.</li>
                </ol>
            </section>
        </main>

        <!-- Footer (Included) -->
        <footer>
            @include('website.layouts.footer')
        </footer>

    </div>

</body>

</html>
