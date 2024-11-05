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

        <main class="flex-grow flex items-center justify-center pt-32 pb-24 bg-white">
            <section class="py-8 mx-auto max-w-5xl w-full">
                <div class="p-6 border border-gray-400 rounded-lg shadow text-center">

                    <h3 class="text-xl font-bold mb-6">Your Order</h3>
                    <table class="w-full text-left border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Order ID</th>
                                <th class="border border-gray-300 px-4 py-2">Total Amount</th>
                                <th class="border border-gray-300 px-4 py-2">Order Status</th>
                                <th class="border border-gray-300 px-4 py-2">Check Time</th>
                                <th class="border border-gray-300 px-4 py-2">Check Date</th>
                                <th class="border border-gray-300 px-4 py-2">Order Note</th>
                                <th class="border border-gray-300 px-4 py-2">Order Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->total_amount }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->status }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->check_time ?? 'null' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->check_date ?? 'null' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $order->order_note ?? 'null' }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <a href="{{ route('orders.order_detail', $order->id) }}" class="text-blue-500 hover:underline">
                                        View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">Order is not found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </main>

        <footer>
            @include('website.layouts.footer')
        </footer>

    </div>
</body>

</html>
