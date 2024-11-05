<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/product.js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header>
        @include('website.layouts.header')
    </header>

    <!-- Main Content -->
    <main class="py-8 bg-white">
        <div class="container mx-auto flex flex-col lg:flex-row items-center bg-white p-16">
            <div class="lg:w-1/2 pt-12 lg:mb-0">
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="mx-auto w-[80%] h-auto rounded-md shadow-md border border-gray-300">
            </div>
            <div class="lg:w-1/2 lg:pl-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                <p class="text-red-500 text-2xl font-bold mb-4">{{ number_format($product->price, 2, '.', ',') }} VND</p>

                <!-- Promotions Section -->
                <div class="mt-4 border-2 border-dashed border-blue-500 p-4 rounded-lg">
                    <h3 class="text-xl font-semibold text-blue-600">Promotions</h3>
                    <ul class="mt-2 text-sm text-gray-700 list-disc list-inside">
                        <li>Free shipping on orders above 500k</li>
                        <li>Flat shipping fee of 30k nationwide</li>
                        <li>Support via official fanpage</li>
                        <li>Easy returns for defective items</li>
                    </ul>
                </div>

                @if($product->quantity > 0)
                <div class="mt-6 flex items-center space-x-4 w-full">
                    <div class="flex items-center mx-auto w-auto border border-gray-300 rounded-md overflow-hidden">
                        <button onclick="updateProductQuantity({{ $product->id }}, -1)" class="bg-white text-lg px-4 py-2">−</button>
                        <input type="number" id="quantity-{{ $product->id }}" name="quantity" min="1" value="1" class="w-12 text-center border-0 focus:ring-blue-500 focus:border-blue-500" data-max-quantity="{{ $product->quantity }}" readonly>
                        <button onclick="updateProductQuantity({{ $product->id }}, 1)" class="bg-white text-lg px-4 py-2">+</button>
                    </div>
                    <button class="text-blue-500 border border-blue-500 px-8 py-2 rounded-lg hover:bg-blue-50 transition flex-grow" onclick="addToCart({{ $product->id }})">
                        ADD TO CART
                    </button>
                </div>

                <!-- Buy Now Button -->
                <div class="mt-4">
                        <button type="submit" class="w-full bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition" onclick="buyNow({{ $product->id }})">
                            BUY NOW
                        </button>
                </div>
            @else
                <!-- Out of Stock Button -->
                <div class="mt-6">
                    <button class="w-full bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition"  >
                        OUT OF STOCK
                    </button>
                </div>
            @endif

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        @include('website.layouts.footer')
    </footer>
</body>
</html>
