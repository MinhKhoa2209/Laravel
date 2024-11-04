<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/wishlist.js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/kMVqHDzDBP1oWyP2IBLr9fHUnkixrjjgkGpDje+9edj76Pj2mWtGtsnL5JpG1QZUb+U1a1e3OrKbw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100">
    <!-- Page Wrapper -->
    <div class="min-h-screen flex flex-col justify-between">

        <header>
            @include('website.layouts.header')
        </header>

        <!-- Main Content-->
        <main class="flex-grow flex items-center px-24 pt-40 pb-24 bg-white">
            <div class="w-[75%] mx-auto">
                <h1 class="text-xl font-semibold mb-6">Search Results for "{{ $query }}"</h1>
                @if($products->isEmpty())
                    <p class="text-center text-gray-500 text-lg">Product is not found</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                        @foreach($products as $product)
                        <a href="{{ route('products.detail', $product->id) }}" class="block">
                            <div class="product-card relative bg-gray-100 p-4 rounded-lg text-center transition-transform duration-300 transform group hover:scale-105">
                                <div class="relative overflow-hidden">
                                    <img src="{{ Storage::url($product->image) }}" class="product-image w-full h-auto object-cover mb-4 rounded transition-transform duration-300 transform group-hover:scale-110">
                                </div>
                                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                                <p class="text-red-500 font-bold">{{ number_format($product->price, 2, '.', ',') }} VND</p>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="bg-white rounded-lg shadow-md flex w-[60%] h-[10%]">
                                        <button type="button" class="text-black flex-1 bg-white rounded-l-lg hover:bg-black hover:text-white transition-colors duration-300 flex items-center justify-center h-full">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                        <button type="button" class="text-black flex-1 bg-white rounded-r-lg hover:bg-black hover:text-white transition-colors duration-300 flex items-center justify-center h-full" onclick="removeFromWishlist({{ $product->id }}, this)">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </main>

        <!-- Footer (Included) -->
        <footer>
            @include('website.layouts.footer')
        </footer>
    </div>
</body>

</html>
