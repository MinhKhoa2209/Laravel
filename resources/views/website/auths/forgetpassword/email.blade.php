<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/wishlist.js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/kMVqHDzDBP1oWyP2IBLr9fHUnkixrjjgkGpDje+9edj76Pj2mWtGtsnL5JpG1QZUb+U1a1e3OrKbw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-white">
    <h1>Forgot password link</h1>
    <h2 class="">Hello</h2>
    <h3>You recently requested to reset your password for your Mixiue Shop account.
    Use the button below to reset it. This password reset is only valid for the next 24 hours.</h3>
    <br>
    <a class="bg-blue-600 text-white font-bold py-2 rounded w-full" href="{{ route('auth.ShowResetPassword', ['token'=>$token]) }}">Reset your password</a>
</body>
