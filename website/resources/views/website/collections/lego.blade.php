<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Product Page with Filters">
    <meta name="author" content="Your Name">
    <title>All Products</title>

    <!-- CSS và JS -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/wishlist.js')
    @vite('resources/js/product.js')
    @vite('resources/js/header.js')
    @vite('resources/js/filterProduct.js')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col justify-between">

        <!-- Header -->
        <header>
            @include('website.layouts.header')
        </header>

        <!-- Main Content -->
        <main class="flex-grow py-28 bg-white">
            <section class="py-8 px-6 mx-auto max-w-7xl flex flex-wrap">

                <!-- Nút Filter cho màn hình nhỏ -->
                <div class="w-full lg:hidden p-2 flex justify-start ml-12 mb-4">
                    <button id="filter-toggle" onclick="toggleFilter()" class="flex items-center px-4 py-2 bg-gray-200 rounded">
                        <i class="fas fa-filter mr-2"></i>Filter
                    </button>
                </div>

                <!-- Left Content (Product Filters) -->
                <div id="filter-content" class="hidden lg:block w-full lg:w-1/4 mb-10 bg-white p-4 shadow-md border border-gray-200 rounded-lg self-start flex-grow-0">
                    <h2 class="text-3xl font-bold mb-4">Lego</h2>
                    <div class="filters mt-6">
                        <h3 class="text-xl font-semibold mb-2">Filter</h3>
                        <div>
                            <h4 class="text-md font-semibold mb-2">Price Range</h4>
                            <ul class="list-inside">
                                <li><input type="checkbox" class="filter-price" id="price-1" name="price" value="0-100000" onchange="filterProducts()"> Under 100,000 VND</li>
                                <li><input type="checkbox" class="filter-price" id="price-2" name="price" value="100000-500000" onchange="filterProducts()"> 100,000 - 500,000 VND</li>
                                <li><input type="checkbox" class="filter-price" id="price-3" name="price" value="500000-1000000" onchange="filterProducts()"> 500,000 - 1,000,000 VND</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Right Content (Product List) -->
                <div class="w-full lg:w-3/4 px-14 min-h-[360px] flex-grow-0 flex flex-col">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 flex-grow">
                        @foreach($lego as $product)
                        <a href="{{ route('products.detail', $product->id) }}" class="block product" data-price="{{ $product->price }}">
                            <div class="bg-gray-100 p-4 rounded-lg text-center transition-transform duration-300 transform hover:scale-105 relative group min-h-[360px] flex flex-col">
                                <img src="{{ Storage::url($product->image) }}" class="w-full h-auto object-cover mb-4 rounded">
                                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                                <p class="text-red-500 font-bold">{{ number_format($product->price, 0, '.', ',') }} VND</p>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="bg-white rounded-lg shadow-md flex w-[60%] h-12">
                                        <button type="button" class="text-black flex-1 bg-white rounded-l-lg hover:bg-black hover:text-white transition-colors duration-300 flex items-center justify-center h-full">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                        <button type="button" class="text-black flex-1 bg-white rounded-r-lg hover:bg-black hover:text-white transition-colors duration-300 flex items-center justify-center h-full" onclick="addToWishlist({{ $product->id }})">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <div id="no-product-message" class="text-red-500 font-bold hidden text-center my-4 flex-grow">
                        There are no products in this price range.
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer>
            @include('website.layouts.footer')
        </footer>
    </div>

</body>

</html>
