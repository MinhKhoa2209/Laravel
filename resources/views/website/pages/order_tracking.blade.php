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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/kMVqHDzDBP1oWyP2IBLr9fHUnkixrjjgkGpDje+9edj76Pj2mWtGtsnL5JpG1QZUb+U1a1e3OrKbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100">
    <!-- Page Wrapper -->
    <div class="min-h-screen flex flex-col justify-between">

        <header>
            @include('website.layouts.header')
        </header>

        <main class="flex-grow flex items-center justify-center pt-32 pb-24 bg-white">
            <section class="py-8 mx-auto max-w-5xl w-full">

                    <h3 class="text-xl font-bold mb-6">Your Order</h3>
                    <table class="w-full text-left border-collapse border border-gray-300">
                        <thead>
                        <tr>
                <th scope="col" class="border border-gray-300 px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order ID</th>
                <th scope="col" class="border border-gray-300 px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Total amount</th>
                <th scope="col" class="border border-gray-300 px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order status</th>
                <th scope="col" class="border border-gray-300 px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Check time</th>
                <th scope="col" class="border border-gray-300 px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Check date</th>
                <th scope="col" class="border border-gray-300 px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order note</th>
                <th scope="col" class="border border-gray-300 px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Order details</th>
              </tr>
            </thead>

                        <tbody>
                            @forelse ($orders as $order)
                            
                            <tr>
                            <td class="border border-gray-300 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $order->id }}</td>
                            <td class="border border-gray-300 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ Number::currency($order->total_amount, 'VND') }}</td>
                            <td class="border border-gray-300 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
        @php
            $status = '';
            if ($order->status == 'pending') {
                $status = '<span class="bg-yellow-500 py-1 px-3 rounded text-black shadow">Processing</span>';
            }
            if ($order->status == 'shipped') {
                $status = '<span class="bg-green-500 py-1 px-3 rounded text-black shadow">Shipped</span>';
            }
            if ($order->status == 'cancelled') {
                $status = '<span class="bg-red-500 py-1 px-3 rounded text-black shadow">Cancelled</span>';
            }
            if ($order->status == 'delivered') {
                $status = '<span class="bg-green-500 py-1 px-3 rounded text-black shadow">Delivered</span>';
            }
        @endphp
        {!! $status !!} 
    </td>
    <td class="border border-gray-300 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $order->check_time ?? 'null' }}</td>
    <td class="border border-gray-300 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $order->check_date ?? 'null' }}</td>
    <td class="border border-gray-300 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $order->order_note ?? 'null' }}</td>
    <td class="border border-gray-300 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
    <a href="{{ route('orders.order_detail', $order->id) }}" class="bg-gray-100 py-1 px-3 rounded text-black shadow">
    View details
    </a>

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
            </section>
        </main>

        <footer>
            @include('website.layouts.footer')
        </footer>

    </div>
</body>

</html>