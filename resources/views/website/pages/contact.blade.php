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

<body class="bg-gray-100">
    <!-- Page Wrapper -->
    <div class="min-h-screen flex flex-col justify-between">

        <header>
            @include('website.layouts.header')
        </header>

       <!-- Main Content -->
    <main class="flex-grow flex items-start pt-24">
        <section class="intro py-8 px-4 mx-auto max-w-3xl flex flex-col md:flex-row w-full">
            <!-- Left Content -->
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h2 class="text-3xl font-bold mb-6">Contact MixiShop</h2>
                <div class="text-lg mb-4">
                    <strong>Address:</strong> Hoa Vang, Da Nang
                </div>
                <div class="text-lg mb-4">
                    <strong>Phone number:</strong> 0905076967
                </div>
                <div class="text-lg mb-4">
                    <strong>Email:</strong> <a href="mailto:khoadm.23it@vku.udn.vn" class="text-blue-600 underline">khoadm.23it@vku.udn.vn</a>
                </div>
            </div>

            <!-- Right Content (Google Map) -->
            <div class="md:w-1/2 flex justify-center">
                <div class="h-96 w-full">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3685.6687513674888!2d108.13647277495318!3d15.987848084679914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421d180086551d%3A0x15416f11e3546c8c!2zVHJ1bmcgdMOibSBow6BuaCBjaMOtbmggaHV54buHbiBIb8OgIFZhbmc!5e1!3m2!1svi!2s!4v1729338987230!5m2!1svi!2s"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"></iframe>
                </div>
            </div>
        </section>
    </main>



        <!-- Footer (Included) -->
        <footer>
            @include('website.layouts.footer')
        </footer>

    </div>

</body>

</html>
