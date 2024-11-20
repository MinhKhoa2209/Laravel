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
        <main class="flex-grow flex items-center pt-24">
            <section class="intro py-8 px-6 text-center mx-auto max-w-3xl">
                <h2 class="text-3xl font-bold mb-6">Welcome to MixiShop's Official Website!</h2>
                <p class="text-lg mb-4">
                    The official and only website of MixiShop. Currently, we only accept orders on the website, and not anywhere else!
                </p>
                <p class="text-lg mb-6">
                    If there are any promotions, they will be announced publicly on the following OFFICIAL AND ONLY channels:
                </p>
                <ul class="list-disc list-inside text-left mx-auto mb-6 space-y-2">
                    <li class="mb-2">Website: <a href="/" class="text-blue-600 underline">https://shop.mixigaming.com/</a></li>
                    <li class="mb-2">Fanpage: <a href="https://www.facebook.com/MixiShop-182674912385853/" class="text-blue-600 underline">https://www.facebook.com/MixiShop-182674912385853/</a></li>
                    <li class="mb-2">Instagram: <a href="https://www.instagram.com/mixi.shop/" class="text-blue-600 underline">https://www.instagram.com/mixi.shop/</a></li>
                    <li class="mb-2">Email: <a href="mailto:Mixiishop@gmail.com" class="text-blue-600 underline">Mixiishop@gmail.com</a></li>
                </ul>
                <p class="text-lg mt-4">MixiShop is pleased to serve you!</p>
            </section>
        </main>

        <!-- Footer (Included) -->
        <footer>
            @include('website.layouts.footer')
        </footer>

    </div>

</body>

</html>
