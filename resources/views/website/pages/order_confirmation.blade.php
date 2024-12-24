@extends('website.layouts.app')
@section('title', 'Order Confirmation')
@section('content')

    <div class="container mx-auto pt-32 pb-20 ">
        <h1 class="text-3xl font-bold mb-8 text-center">Order Confirmation!</h1>
        <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 text-center">
            <h2 class="text-xl font-semibold mb-4">Your order has been placed successfully
                <i class="fas fa-check-circle text-green-500 ml-2"></i>
            </h2>
            <p class="mb-4">Thank you for your purchase. We appreciate your business.</p>

            <div class="flex justify-center space-x-4">
                <a href="{{ route('orders.order_detail', ['orderId' => $order->id]) }}" class="bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 flex items-center justify-center">
                    View Order Details
                </a>
                <a href="{{ route('homepage') }}" class="bg-gray-200 text-black p-3 rounded-lg hover:bg-gray-300 flex items-center justify-center">
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
@endsection
