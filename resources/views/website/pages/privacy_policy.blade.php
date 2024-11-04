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
        <main class="container mx-auto pt-32 pb-20 px-4 bg-white">
            <h1 class="text-3xl font-bold mb-6">Privacy Policy</h1>
            <p class="mb-4">We are committed to protecting the privacy of our customers' personal information and strictly complying with all applicable legal regulations on information privacy.</p>

            <h2 class="text-2xl font-semibold mb-3">1. Information Collection</h2>
            <p class="mb-4">We collect personal information only when you voluntarily provide it through registration forms, order forms, or other communication channels.</p>

            <h2 class="text-2xl font-semibold mb-3">2. Use of Information</h2>
            <p class="mb-4">Your personal information will be used to provide services, process orders, and enhance your experience on our website.</p>

            <h2 class="text-2xl font-semibold mb-3">3. Information Security</h2>
            <p class="mb-4">We employ appropriate security measures to protect your information from unauthorized access and unwanted disclosure.</p>

            <h2 class="text-2xl font-semibold mb-3">4. Information Sharing</h2>
            <p class="mb-4">Your personal information will not be shared with any third parties without your consent, except when required by legal authorities.</p>

            <h2 class="text-2xl font-semibold mb-3">5. Changes to the Policy</h2>
            <p class="mb-4">This privacy policy may be updated from time to time. Any changes will be posted on our website.</p>

            <p class="mt-6">If you have any questions about this privacy policy, please contact us at <a href="mailto:support@yourwebsite.com" class="text-blue-600 underline">support@yourwebsite.com</a>.</p>
        </main>


        <!-- Footer (Included) -->
        <footer>
            @include('website.layouts.footer')
        </footer>

    </div>

</body>

</html>
