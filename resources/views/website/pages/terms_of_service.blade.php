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
        <main class="container mx-auto pt-32 pb-20 px-4 ">
            <h1 class="text-3xl font-bold mb-6">Terms of Service</h1>

            <h2 class="text-2xl font-semibold mb-3">1. Introduction</h2>
            <p class="mb-4">Welcome to our website.</p>
            <p class="mb-4">By accessing our website, you agree to these terms. We reserve the right to change, modify, add, or remove any part of these Terms of Service at any time. Changes will be effective immediately upon posting on the website without prior notice. Your continued use of the website after the changes are posted constitutes your acceptance of those changes.</p>
            <p class="mb-4">Please check back regularly to stay updated on any changes to our terms.</p>

            <h2 class="text-2xl font-semibold mb-3">2. Website Usage Instructions</h2>
            <p class="mb-4">By accessing our website, you confirm that you are at least 18 years old or accessing the website under the supervision of a parent or legal guardian. You ensure that you have full legal capacity to engage in transactions for the purchase and sale of goods according to current regulations of Vietnamese law.</p>
            <p class="mb-4">During the registration process, you agree to receive promotional emails from our website. If you wish to opt out of receiving emails, you can do so by clicking the unsubscribe link at the bottom of any promotional email.</p>

            <h2 class="text-2xl font-semibold mb-3">3. Safe and Convenient Payment</h2>
            <p class="mb-4">Buyers can choose from the following payment methods:</p>
            <ul class="list-disc list-inside mb-4">
                <li>Method 1: Direct payment (buyer receives goods at the seller's address)</li>
                <li>Method 2: Cash on Delivery (COD—delivery and payment at the buyer's location)</li>
                <li>Method 3: Online payment by credit card or bank transfer</li>
            </ul>
        </main>

        <!-- Footer (Included) -->
        <footer>
            @include('website.layouts.footer')
        </footer>

    </div>

</body>

</html>
