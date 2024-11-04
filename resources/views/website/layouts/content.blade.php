<main class="flex-grow mt-24">

    <!-- Banner 1 Section -->
    <section class="bg-white">
        <div class="relative h-screen md:h-[100vh]">
            <div class="absolute inset-0" style="background-image: url('{{ asset('admin_assets/img/content/banner1.webp') }}'); background-size: cover; background-position: center; height: 100%; width: 85%; left: 50%; transform: translateX(-50%);">
            </div>
            <div class="container mx-auto h-full flex items-center justify-center text-white relative z-10">
            </div>
        </div>
    </section>

    <!-- Category Banner Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-12">MIXI BRAND</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
                <!-- Category Item -->
                <div class="group">
                    <div class="w-full aspect-square rounded-full bg-gray-100 overflow-hidden transform transition-transform duration-300 group-hover:scale-110">
                        <a href="{{ route('collections.spring-summer-clothes') }}">
                            <img src="{{ asset('admin_assets/img/spring_clothes/spring.svg') }}" alt="Spring & Summer" class="w-full h-auto object-cover">
                        </a>
                    </div>
                    <h3 class="text-lg font-semibold mt-4">Spring & Summer</h3>
                    <p class="text-gray-500">8 products</p>
                </div>

                <div class="group">
                    <div class="w-full aspect-square rounded-full bg-gray-100 overflow-hidden transform transition-transform duration-300 group-hover:scale-110">
                        <a href="{{route('collections.fall-winter-clothes')}}">
                        <img src="{{ asset('admin_assets/img/winter_clothes/winter.svg') }}" alt="Fall & Winter" class="w-full h-auto object-cover">
                        </a>
                    </div>
                    <h3 class="text-lg font-semibold mt-4">Fall & Winter</h3>
                    <p class="text-gray-500">4 products</p>
                </div>

                <div class="group">
                    <div class="w-full aspect-square rounded-full bg-gray-100 overflow-hidden transform transition-transform duration-300 group-hover:scale-110">
                        <a href="{{route('collections.pitcher')}}">
                        <img src="{{ asset('admin_assets/img/pitcher/cup.svg') }}" alt="Cup" class="w-full h-auto object-cover">
                        </a>
                    </div>
                    <h3 class="text-lg font-semibold mt-4">Cup</h3>
                    <p class="text-gray-500">3 products</p>
                </div>

                <div class="group">
                    <div class="w-full aspect-square rounded-full bg-gray-100 overflow-hidden transform transition-transform duration-300 group-hover:scale-110">
                        <a href="{{route('collections.lego')}}">
                        <img src="{{ asset('admin_assets/img/lego/lego.svg') }}" alt="Lego" class="w-full h-auto object-cover">
                        </a>
                    </div>
                    <h3 class="text-lg font-semibold mt-4">Lego</h3>
                    <p class="text-gray-500">9 products</p>
                </div>

                <div class="group">
                    <div class="w-full aspect-square rounded-full bg-gray-100 overflow-hidden transform transition-transform duration-300 group-hover:scale-110">
                        <a href="{{route('collections.shoes')}}">
                        <img src="{{ asset('admin_assets/img/shoes/shoes.svg') }}" alt="Shoes" class="w-full h-auto object-cover">
                        </a>
                    </div>
                    <h3 class="text-lg font-semibold mt-4">Shoes</h3>
                    <p class="text-gray-500">1 product</p>
                </div>

                <div class="group">
                    <div class="w-full aspect-square rounded-full bg-gray-100 overflow-hidden transform transition-transform duration-300 group-hover:scale-110">
                        <a href="{{route('collections.souvenir')}}">
                        <img src="{{ asset('admin_assets/img/souvenir/souvenir.svg') }}" alt="Souvenir" class="w-full h-auto object-cover">
                        </a>
                    </div>
                    <h3 class="text-lg font-semibold mt-4">Souvenir</h3>
                    <p class="text-gray-500">1 product</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Featured Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($featuredProducts as $product)
                <a href="{{ route('products.detail', $product->id) }}" class="block">
                    <div class="bg-gray-100 p-4 rounded-lg text-center transition-transform duration-300 transform hover:scale-105 relative group">
                        <img src="{{ Storage::url($product->image) }}" class="w-full h-auto object-cover mb-4 rounded">
                        <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                        <p class="text-red-500 font-bold">{{ number_format($product->price, 2, '.', ',') }} VND</p>
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="bg-white rounded-lg shadow-md flex w-[60%] h-[10%]">
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
        </div>
    </section>



    <!--Collections Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-6">Collections</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($lego as $product)
                <a href="{{ route('products.detail', $product->id) }}" class="block">
                    <div class="bg-gray-100 p-4 rounded-lg text-center transition-transform duration-300 transform hover:scale-105 relative group">
                        <img src="{{ Storage::url($product->image) }}" class="w-full h-auto object-cover mb-4 rounded">
                        <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                        <p class="text-red-500 font-bold">{{ number_format($product->price, 2, '.', ',') }} VND</p>
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="bg-white rounded-lg shadow-md flex w-[60%] h-[10%]">
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
        </div>
    </section>

    <!-- Banner 2 Section -->
    <section class="py-16 bg-white">
        <div class="relative h-[100vh] md:h-[100vh]">
            <div class="absolute inset-0" style="background-image: url('{{ asset('admin_assets/img/content/banner2.jpg') }}'); background-size: cover; background-position: center; height: 65%; width: 85%; left: 50%; transform: translateX(-50%);">
            </div>
            <div class="container mx-auto h-full flex items-center justify-center text-white relative z-10">
            </div>
        </div>
    </section>

    <!-- Customer Reviews Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Customer Reviews</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($reviews as $review)
                    <div class="bg-white p-6 rounded-lg shadow">
                        <p class="italic">"{{ $review->content }}"</p>
                        <div class="mt-4">
                            <span class="font-semibold">{{ $review->author }}</span>
                            <span class="text-gray-600"> - {{ $review->date }}</span>
                            <div class="mt-2">
                                <span class="text-yellow-500">@for($i = 1; $i <= 5; $i++) @if($i <= $review->rating) ★ @else ☆ @endif @endfor</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Banner 3 Section -->
    <section class="py-16 bg-white">
        <div class="relative h-screen md:h-[65vh]">
            <div class="absolute inset-0" style="background-image: url('{{ asset('admin_assets/img/content/banner3.webp') }}'); background-size: cover; background-position: center; height: 80%; width: 85%; left: 50%; transform: translateX(-50%);">
            </div>
            <div class="container mx-auto h-full flex items-center justify-center text-white relative z-10">
            </div>
        </div>
    </section>

</main>