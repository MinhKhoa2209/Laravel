@extends('website.layouts.app')
@section('title', 'Order Detail')
@section('content')

    <div class="container mx-auto py-12">
        <h1 class="text-3xl font-bold mb-8 text-center">Order Details</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Cart Items Section -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Your Items</h2>
                <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                    @foreach ($order->orderItems as $item)
                        <div class="flex items-center border-b border-gray-300 py-4">
                            <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}"
                                class="w-20 h-20 object-cover rounded-lg mr-6">
                            <div class="flex-grow">
                                <h3 class="text-lg font-semibold">{{ $item->product->name }}</h3>
                                <p class="text-gray-600">Quantity: {{ $item->quantity }}</p>
                                <p class="text-gray-600">Price per item:
                                    {{ number_format($item->product->price, 0, '.', '.') }} VND</p>
                            </div>
                            <p class="text-blue-500 font-bold">{{ number_format($item->sub_amount, 0, ',', '.') }} VND
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>
            <div>
                <!-- Delivery Information Section -->
                <section class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">Delivery Information</h2>
                    <div
                        class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="mb-4">
                            <label class="block font-semibold">Name:</label>
                            <p>{{ $user->name }}</p>
                        </div>
                        <div class="mb-4">
                            <label class="block font-semibold">Check Time:</label>
                            <p>{{ $order->check_time ?? 'Not specified' }}</p>
                        </div>
                        <div class="mb-4">
                            <label class="block font-semibold">Phone:</label>
                            <p>{{ $user->phone }}</p>
                        </div>
                        <div class="mb-4">
                            <label class="block font-semibold">Check Date:</label>
                            <p>{{ $order->check_date ?? 'Not specified' }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block font-semibold">Address:</label>
                            <p>{{ $user->address }}</p>
                        </div>
                        <div class="mb-4">
                            <label class="block font-semibold">Order Notes:</label>
                            <p>{{ $order->order_note ?? 'No notes' }}</p>
                        </div>

                    </div>
                </section>

                <!-- Total Amount Section -->
                <section class="mb-8 ">
                    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                        <div class="flex justify-between items-center mb-4">
                            <label class="text-xl font-bold">Payment Method:</label>
                            <p class="text-2xl text-blue-500 font-bold">{{ $payment->payment_method }}</p>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold">Total Amount</h3>
                            <p class="text-2xl text-blue-500 font-bold">
                                {{ number_format($order->total_amount, 0, '.', '.') }} VND</p>
                        </div>

                        <div class="flex justify-center gap-4">
                            @if ($order->status === 'pending')
                                <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="w-full md:w-auto">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="w-full bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                        Cancel Order
                                    </button>
                                </form>
                            @endif
                            <a href="{{ route('homepage') }}"
                                class="w-full md:w-auto bg-gray-200 text-black px-4 py-2 rounded-lg text-center hover:bg-gray-300">
                                Back to Dashboard
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- Feedback Section -->
        @if($order->status === 'delivered')
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Feedback</h2>
                <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                    <form action="{{ route('orders.feedback', $order->id) }}" method="POST">
                        @csrf
                        <textarea name="feedback" rows="4" class="w-full p-4 border border-gray-300 rounded-lg" placeholder="Share your feedback here...">{{ old('feedback', $order->feedback) }}</textarea>
                        <button type="submit"  class="flex justify-center items-center w-[40%] mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 mx-auto">Submit Feedback</button>
                    </form>
                </div>
            @endif
        </section>

    </div>
@endsection
