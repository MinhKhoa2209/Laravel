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
        <main class="flex-grow flex items-start pt-24 bg-white">
            <section class="intro py-8 mx-auto max-w-5xl flex flex-col md:flex-row w-full">
                <!-- Left Content -->
                <div class="md:w-1/4 mx-8 mt-6 mb-8 md:mb-0">
                    <h2 class="text-2xl font-bold mb-4">Account site</h2>
                    <h3 class="text-lg mb-4">Hello, <strong>{{ $user->name }}</strong>!</h3>
                    <p class="text-lg mb-4">Account information</p>
                    <p class="text-lg mb-4">Address (1)</p>
                    <a href="{{ route('logout') }}" class="text-lg font-semibold text-blue-600 underline"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Log out</a>
                </div>

                <!-- Right Content -->
                <div class="md:w-3/4 p-6 border border-gray-200 rounded-lg shadow">
                    <h2 class="text-2xl font-bold mb-4">Account</h2>
                    <p class="mb-4"><strong>Account name: </strong>{{ $user->name }}</p>
                    <p class="mb-4"><i class="fas fa-home"></i> <strong>Address: </strong>{{ $user->address }}</p>
                    <p class="mb-4"><i class="fas fa-phone-alt"></i> <strong>Phone number: </strong>{{ $user->phone }}</p>
                    <h3 class="text-xl font-bold mt-6 mb-4">Your order</h3>
                    <table class="w-full text-left border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 whitespace-nowrap">Order ID</th>
                                <th class="border border-gray-300 px-4 py-2 whitespace-nowrap">Total amount</th>
                                <th class="border border-gray-300 px-4 py-2 whitespace-nowrap">Order status</th>
                                <th class="border border-gray-300 px-4 py-2 whitespace-nowrap">Check time</th>
                                <th class="border border-gray-300 px-4 py-2 whitespace-nowrap">Check date</th>
                                <th class="border border-gray-300 px-4 py-2 whitespace-nowrap">Order note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->total_amount }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->status }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->check_time ??'null'}}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->check_date ?? 'null'}}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->order_note ??'null'}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">Order is not found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
