@extends('website.layouts.app')
@section('title', 'Wishlist')
@section('content')

        <main class="flex-grow flex items-center px-24 pt-40 pb-24 bg-white">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 w-[75%] mx-auto gap-10 wishlist-container">
                @if($wishlistItems->isEmpty())
                    <div class="col-span-full text-center p-4">
                        <h2 class="text-lg font-semibold">Your wishlist is empty.</h2>
                        <p class="text-gray-500">Add items to your wishlist to save them for later.</p>
                    </div>
                @else
                    @foreach($wishlistItems as $item)
                        <a href="{{ route('products.detail', $item->product->id) }}" class="block"  id="product-{{ $item->product->id }}">
                            <div class="product-card relative bg-gray-100 p-4 rounded-lg text-center transition-transform duration-300 transform min-h-[420px] group hover:scale-105 flex flex-col justify-between">
                                <div class="relative overflow-hidden flex-grow">
                                    <img src="{{ Storage::url($item->product->image) }}" class="product-image w-full h-auto object-cover mb-4 rounded transition-transform duration-300 transform group-hover:scale-110">
                                </div>
                                <div class="flex flex-col items-center justify-center flex-grow">
                                    <h3 class="text-lg font-semibold text-center">{{ $item->product->name }}</h3>
                                    <p class="text-red-500 font-bold text-center">{{ number_format($item->product->price, 0, '.', '.') }} VND</p>
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="bg-white rounded-lg shadow-md flex w-[60%] h-[10%]">
                                        <button type="button" class="text-black flex-1 bg-white rounded-l-lg hover:bg-black hover:text-white transition-colors duration-300 flex items-center justify-center h-full">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                        <button type="button" class="text-black flex-1 bg-white rounded-r-lg hover:bg-black hover:text-white transition-colors duration-300 flex items-center justify-center h-full" onclick="removeFromWishlist({{ $item->product->id }})">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </main>

@endsection
