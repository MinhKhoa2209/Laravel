@extends('website.layouts.app')
@section('title', 'Category Products')
@section('content')

        <!-- Main Content -->
        <main class="flex-grow py-28 bg-white">
            <section class="py-8 px-6 mx-auto max-w-7xl flex flex-wrap">

                <!-- Filter Button for Small Screens -->
                <div class="w-full lg:hidden p-2 flex justify-start ml-12 mb-4">
                    <button id="filter-toggle" onclick="toggleFilter()" class="flex items-center px-4 py-2 bg-gray-200 rounded">
                        <i class="fas fa-filter mr-2"></i>Filter
                    </button>
                </div>

                <!-- Left Content (Product Filters) -->
                <div id="filter-content" class="hidden lg:block w-full lg:w-1/4 mb-10 bg-white p-4 shadow-md border border-gray-200 rounded-lg self-start">
                    <h2 class="text-3xl font-bold mb-4">{{ $categoryName }}</h2>
                    <div class="filters mt-6">
                        <h3 class="text-xl font-semibold mb-2">Filter</h3>
                        <div>
                            <h4 class="text-md font-semibold mb-2">Price Range</h4>
                            <ul class="list-inside">
                                <li>
                                    <input type="checkbox" class="filter-price" id="price-1" name="price" value="0-100000" onchange="filterProducts()">
                                    <label for="price-1"> Under 100,000 VND</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="filter-price" id="price-2" name="price" value="100000-500000" onchange="filterProducts()">
                                    <label for="price-2"> 100,000 - 500,000 VND</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="filter-price" id="price-3" name="price" value="500000-1000000" onchange="filterProducts()">
                                    <label for="price-3"> 500,000 - 1,000,000 VND</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <!-- Right Content (Product List) -->
                <div class="w-full lg:w-3/4 px-14 min-h-[360px] flex-grow">
                    <div id="no-product-message" class="text-red-500 font-bold text-center my-4 mx-auto hidden">
                        No products found.
                    </div>

                    @if($products->isEmpty())
                        <div class="text-red-500 font-bold text-center my-4 flex-grow">
                            No products found.
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 flex-grow">
                            @foreach($products as $product)
                                <a href="{{ route('products.detail', $product->id) }}" class="block product" data-price="{{ $product->price }}">
                                    <div class="bg-gray-100 p-4 rounded-lg text-center transition-transform duration-300 transform hover:scale-105 relative group min-h-[360px] flex flex-col">
                                        <img src="{{ Storage::url($product->image) }}" class="w-full h-auto object-cover mb-4 rounded">
                                        <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                                        <p class="text-red-500 font-bold">{{ number_format($product->price, 0, '.', '.') }} VND</p>
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
                    @endif
                </div>
            </section>
        </main>
@endsection
