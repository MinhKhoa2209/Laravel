@extends('website.layouts.app')
@section('title', 'Home Page')
@section('content')
<main class="flex-grow">
    <div class="flex-grow mt-24">
        <!-- Banner 1 Section -->
        <section class="bg-white">
            <div class="relative flex items-center justify-center">
                <img src="{{ asset('admin_assets/img/content/banner1.webp') }}" alt="Banner Image"
                        class="h-53 w-85 object-cover" style="width: 85%; height: 53%; max-width: 100%;" />
                </div>
            </div>
        </section>

        <!-- Category Banner Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold mb-12">MIXI BRAND</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
                    @foreach ($categories as $category)
                        <div class="group">
                            <div
                                class="w-full aspect-square rounded-full bg-gray-100 overflow-hidden transform transition-transform duration-300 group-hover:scale-110">
                                <a href="{{ route('collections.category', ['categoryName' => str_replace(' ', '-', $category->name)]) }}">
                                    <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}"
                                        class="w-full h-auto object-cover">
                                </a>
                            </div>
                            <h3 class="text-lg font-semibold mt-4">{{ $category->name }}</h3>
                            <p class="text-gray-500">{{ $category->products_count }} products</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Featured Products Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-center mb-8">Featured Products
                    <span class="ml-2 inline-block bg-red-500 text-white text-sm font-bold py-1 px-3 rounded-full animate-bounce">
                        <i class="fas fa-fire mr-2"></i>  HOT DEALS
                    </span>
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($featuredProducts as $product)
                        <a href="{{ route('products.detail', $product->id) }}" class="block">
                            <div
                                class="bg-gray-100 p-4 rounded-lg text-center transition-transform duration-300 transform hover:scale-105 relative group">
                                <img src="{{ Storage::url($product->image) }}"
                                    class="w-full h-auto object-cover mb-4 rounded">
                                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                                <p class="text-red-500 font-bold">{{ number_format($product->price, 0, '.', '.') }} VND</p>
                                <div
                                    class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="bg-white rounded-lg shadow-md flex w-[60%] h-[10%]">
                                        <button type="button"
                                            class="text-black flex-1 bg-white rounded-l-lg hover:bg-black hover:text-white transition-colors duration-300 flex items-center justify-center h-full">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                        <button type="button"
                                            class="text-black flex-1 bg-white rounded-r-lg hover:bg-black hover:text-white transition-colors duration-300 flex items-center justify-center h-full"
                                            onclick="addToWishlist({{ $product->id }})">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>


        <!--Collections Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-center mb-6">Collections</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($lego as $product)
                        <a href="{{ route('products.detail', $product->id) }}" class="block">
                            <div
                                class="bg-gray-100 p-4 rounded-lg text-center transition-transform duration-300 transform hover:scale-105 relative group">
                                <img src="{{ Storage::url($product->image) }}"
                                    class="w-full h-auto object-cover mb-4 rounded">
                                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                                <p class="text-red-500 font-bold">{{ number_format($product->price, 0, '.', '.') }} VND</p>
                                <div
                                    class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="bg-white rounded-lg shadow-md flex w-[60%] h-[10%]">
                                        <button type="button"
                                            class="text-black flex-1 bg-white rounded-l-lg hover:bg-black hover:text-white transition-colors duration-300 flex items-center justify-center h-full">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                        <button type="button"
                                            class="text-black flex-1 bg-white rounded-r-lg hover:bg-black hover:text-white transition-colors duration-300 flex items-center justify-center h-full"
                                            onclick="addToWishlist({{ $product->id }})">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Banner 2 Section -->
        <section class="py-16 bg-white ">
            <div class="relative flex items-center justify-center">
                <img src="{{ asset('admin_assets/img/content/banner2.jpg') }}" alt="Banner Image"
                        class="h-53 w-85 object-cover" style="width: 85%; height: 53%; max-width: 100%;" />
                </div>
            </div>
        </section>

        <section class="py-16 bg-gray-50">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-center mb-8">Customer Reviews</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse ($reviews as $review)
                        <div class="bg-white p-6 rounded-lg shadow">
                            <p class="italic">"{{ $review['feedback'] }}"</p>
                            <div class="mt-4">
                                <span class="font-semibold">{{ $review['author'] }}</span>
                                <span class="text-gray-600"> - {{ $review['date'] }}</span>
                                <div class="mt-2">
                                    <span class="text-yellow-500">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review['rating'])
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500">No reviews available.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Banner 3 Section -->
        <section class="bg-white py-16">
            <div class="relative flex items-center justify-center">
                <img src="{{ asset('admin_assets/img/content/banner3.webp') }}" alt="Banner Image"
                        class="h-53 w-85 object-cover" style="width: 85%; height: 53%; max-width: 100%;" />
                </div>
            </div>
        </section>
    </div>


</main>
@endsection
