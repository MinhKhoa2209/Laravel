<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body class="bg-white">
    <div class="container mx-auto py-12">
        <h1 class="text-3xl font-bold mb-8 text-center">Mixi Shop </h1>

                @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('orders.placeOrder') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <section class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">Delivery Information</h2>
                    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 grid grid-cols-1 md:grid-cols-2 gap-8">
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

                <section class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">Your Items</h2>
                    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                        @foreach($cartItems as $item)
                            <div class="flex items-center border-b border-gray-300 py-4">
                                <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}" class="w-20 h-20 object-cover rounded-lg mr-6">
                                <div class="flex-grow">
                                    <h3 class="text-lg font-semibold">{{ $item->product->name }}</h3>
                                    <p class="text-gray-600">Quantity: {{ $item->quantity }}</p>
                                    <p class="text-gray-600">Price per item: {{ number_format($item->product->price, 0, ',', '.') }} VND</p>
                                </div>
                                <p class="text-blue-500 font-bold">{{ number_format($item->sub_amount, 0, ',', '.') }} VND</p>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>

        <section class="mb-8">
            <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                <div class="mb-4">
                    <h3 class="text-xl font-bold pb-4">Select a Payment Method:</h3>
                    <select id="payment_method" name="payment_method" class="w-full p-2 border rounded-lg" required>
                        <option value="COD">Cash on Delivery (COD)</option>
                        <option value="bank_transfer">Bank Transfer</option>
                        <option value="mobile_payment">Mobile Payment</option>
                    </select>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold">Total Price</h3>
                    <p class="text-2xl text-blue-500 font-bold">{{ number_format($cartItems->sum('sub_amount'), 0, ',', '.') }} VND</p> <!-- Updated for total amount -->
                </div>

                <input name="total_amount" type="hidden" value="{{ $cartItems->sum('sub_amount') }}">

                <div class="flex space-x-4">
                    <a href="{{ route('pages.cart') }}" class="w-full bg-gray-200 text-black p-3 rounded-lg text-center hover:bg-gray-300">Back to Cart</a>
                    <button type="submit" class="w-full bg-black text-white p-3 rounded-lg hover:bg-gray-800">Place Order</button>
                </div>
            </div>
        </section>
        </form>
    </div>
</body>
</html>
