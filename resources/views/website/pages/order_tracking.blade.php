@extends('website.layouts.app')
@section('title', 'Order Tracking')
@section('content')

        <main class="flex-grow flex items-center justify-center pt-32 pb-24 bg-white">
            <section class="py-8 mx-auto max-w-5xl w-full">
                <div class="p-6 rounded-lg text-center shadow-[10px_10px_30px_rgb(156,163,175)]">

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
@endsection
