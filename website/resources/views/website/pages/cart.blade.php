<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/product.js')
    @vite('resources/js/header.js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col justify-between">
        <header>
            @include('website.layouts.header')
        </header>

        <main class="flex-grow flex flex-col px-8 lg:px-24 pt-28 pb-24 bg-white">
            <h1 class="text-3xl font-bold mb-6">Shopping Cart</h1>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <div class="lg:col-span-8">
                    <div id="cart-container">
                        @if($cartItems->isEmpty())
                            <p class="text-center text-gray-500">Your cart is empty.</p>
                        @else
                            @foreach($cartItems as $item)
                                <div id="cart-item-{{ $item->product_id }}" class="flex items-center border-b border-gray-300 py-6 cart-item">
                                    <button type="button" class="text-red-600 mr-6" aria-label="Remove item" onclick="removeFromCart({{ $item->product_id }});">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}" class="w-20 h-20 object-cover rounded-lg mr-6">
                                    <div class="flex-grow">
                                        <h3 class="text-xl font-semibold">{{ $item->product->name }}</h3>
                                    </div>
                                    <p class="text-blue-500 font-bold mr-4" id="subtotal-{{ $item->product_id }}">
                                        {{ number_format($item->sub_amount, 0, ',', '.') }} VND
                                    </p>

                                    <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                                        <button type="button" class="bg-white text-lg px-4 py-2" onclick="updateCartQuantity({{ $item->product_id }}, -1);">−</button>
                                        <input type="number" id="quantity-{{ $item->product_id }}" name="quantity" min="1" value="{{ $item->quantity }}"
                                               class="w-12 text-center border-0 focus:ring-blue-500 focus:border-blue-500" readonly>
                                        <button type="button" class="bg-white text-lg px-4 py-2" onclick="updateCartQuantity({{ $item->product_id }}, 1);">+</button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="lg:col-span-4">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h2 class="text-xl font-bold mb-4">Additional Information</h2>
                        <form action="{{ route('cart.proceedToCheckout') }}" method="POST">
                            @csrf
                            <label for="check-date" class="block mb-2 text-sm">Check Date</label>
                            <input type="date" id="check-date" name="check_date" class="w-full p-2 mb-4 border rounded-lg" min="{{ \Carbon\Carbon::today()->toDateString() }}">

                            <label for="check-time" class="block mb-2 text-sm">Check Time</label>
                            <select id="check-time" name="check_time" class="w-full p-2 mb-4 border rounded-lg">
                                <option value="">Select Time</option>
                                <option value="8:00 AM - 12:00 PM">8:00 AM - 12:00 PM</option>
                                <option value="12:00 PM - 04:00 PM">12:00 PM - 04:00 PM</option>
                                <option value="04:00 PM - 08:00 PM">04:00 PM - 08:00 PM</option>
                            </select>

                            <label for="order-note" class="block mb-2 text-sm">Order Note</label>
                            <textarea id="order-note" name="order_note" class="w-full p-4 border rounded-lg mb-4" rows="4"></textarea>

                            <div class="border-t pt-4 mt-4">
                                <h3 class="text-xl font-bold">Total Price</h3>
                                <p id="total-amount" class="text-2xl text-blue-500 font-bold">{{ number_format($totalPrice, 0, ',', '.') }} VND</p>
                            </div>

                            <button type="submit" class="w-full bg-black text-white p-3 rounded-lg mt-6 hover:bg-gray-800"
                                    {{ $cartItems->isEmpty() ? 'disabled' : '' }}>
                                Checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            @include('website.layouts.footer')
        </footer>
    </div>

</body>

</html>
