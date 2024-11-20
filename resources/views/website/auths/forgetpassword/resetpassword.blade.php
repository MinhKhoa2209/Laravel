<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Reset Password</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/kMVqHDzDBP1oWyP2IBLr9fHUnkixrjjgkGpDje+9edj76Pj2mWtGtsnL5JpG1QZUb+U1a1e3OrKbw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-white">
    <!-- Page Wrapper -->
    <div class="min-h-screen flex flex-col justify-between">

        <header>
            @include('website.layouts.header')
        </header>

        <div class="container mx-auto pt-40 pb-24 bg-white">
            <div class="flex justify-center">
                <div class="max-w-md w-full">
                    <div class="bg-white border border-gray-200 rounded-lg shadow-lg">
                        <div class="p-8">
                            <div class="text-center">
                                <h1 class="text-2xl font-bold text-gray-900 mb-4">Set New Password</h1>
                                <p class="text-sm text-gray-600 mb-6">Please enter your email and a new password.</p>
                            </div>
                            <form action="{{ route('auth.SubmitResetPassword') }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}"> <!-- Token reset -->
                                @if ($errors->any())
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control font-semibold w-full p-3 border border-gray-400 rounded" placeholder="Enter your email address" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control font-semibold w-full p-3 border border-gray-400 rounded" placeholder="New Password" required>
                                </div>
                                <div class="form-group">
                                    <input name="password_confirmation" type="password" class="form-control font-semibold w-full p-3 border border-gray-400 rounded" placeholder="Confirm New Password" required>
                                </div>
                                <button type="submit" class="bg-blue-600 text-white font-bold py-2 rounded w-full">Reset Password</button>
                            </form>
                            <!-- <hr class="my-4">
                            <div class="text-center">
                                <a class="text-sm text-blue-600 hover:underline" href="{{ route('login') }}">Back to Login</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            @include('website.layouts.footer')
        </footer>
    </div>
</body>

</html>
