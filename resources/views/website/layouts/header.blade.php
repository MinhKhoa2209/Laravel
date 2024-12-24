<header class="bg-white shadow fixed top-0 left-0 w-full h-24 z-50 overflow-visible">
    <div class="container mx-auto flex items-center h-full px-3">
        <!-- Hamburger Button -->
        <div class="lg:hidden flex items-center">
            <button onclick="toggleMobileNav()" class="focus:outline-none mr-4">
                <i class="fas fa-bars text-gray-700 text-2xl"></i>
            </button>
        </div>

        <!-- Logo -->
        <div class="flex items-center justify-center lg:justify-start flex-grow overflow-hidden h-full">
            <a href="/">
                <img src="{{ asset('admin_assets/img/images.jpg') }}" alt="Logo"
                    class="h-32 w-auto object-cover object-top">
            </a>
        </div>

        <!-- Navigation -->

        <nav class="hidden lg:flex space-x-4 justify-center flex-grow flex-nowrap">
            <a href="/" class="block py-2 px-2 text-gray-700 text-lg hover:bg-gray-50 hover:underline hover:bg-transparent border-0 hover:text-cyan-700">Home Page</a>
            <a href="{{ route('pages.about') }}" class="block py-2 px-2 text-gray-700 text-lg hover:bg-gray-50 hover:underline hover:bg-transparent border-0 hover:text-cyan-700">Introduction</a>

            <div class="relative group">
                <a href="{{route('collections.all-products')}}" class="block py-2 px-2 text-gray-700 text-lg hover:bg-gray-50 hover:underline hover:bg-transparent border-0 hover:text-cyan-700">Product
                    <i class="fas fa-chevron-down ml-1"></i>
                </a>
                <div class="absolute left-0 hidden group-hover:block bg-white mt-0 shadow-lg rounded transition-all duration-200 z-30 min-w-[220px]">
                    @foreach ($categories as $category)
                    <a href="{{ route('collections.category', ['categoryName' => str_replace(' ', '-', $category->name)]) }}" class="block px-4 py-2 hover:text-cyan-700 text-lg text-gray-700 hover:bg-gray-100">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
            <a href="{{ route('pages.blog') }}" class="block py-2 px-2 text-gray-700 text-lg hover:bg-gray-50 hover:underline hover:bg-transparent border-0 hover:text-cyan-700">Blog</a>
            <a href="{{ route('pages.contact') }}" class="block py-2 px-2 text-gray-700 text-lg hover:bg-gray-50 hover:underline hover:bg-transparent border-0 hover:text-cyan-700">Contact</a>
            <a href="{{ route('pages.checkOrder') }}" class="block py-2 px-2 text-gray-700 text-lg hover:bg-gray-50 hover:underline hover:bg-transparent border-0 hover:text-cyan-700">Check Order</a>

        </nav>


        <div class="flex items-center space-x-4">
            <div class="relative flex-grow hidden lg:flex">
                <form method="GET" action="{{ route('products.search') }}" class="flex items-center w-full">
                    <input type="text" name="query" placeholder="Search for product"
                        class="border border-gray-300 rounded-lg pl-10 pr-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-400"
                        required>
                    <button type="submit"
                        class="absolute left-3 top-1/2 transform -translate-y-1/2 bg-transparent border-none cursor-pointer">
                        <i class="fas fa-search text-gray-600"></i>
                    </button>
                </form>
            </div>

            <!-- Icon Login/Account -->
            <div class="relative group">
                @guest
                    <a href="#" class="flex items-center text-gray-700 hover:text-black-500">
                        <i class="far fa-user text-2xl text-gray-700"></i>
                    </a>
                    <div
                        class="absolute  left-0 hidden group-hover:block bg-black shadow-lg mt-1 rounded transform -translate-y-1 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100 z-20">
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-white hover:bg-gray-600">Login</a>
                        <a href="{{ route('register') }}" class="block px-4 py-2 text-white hover:bg-gray-600">Register</a>
                    </div>
                @else
                    <a href="#" class="flex items-center text-gray-700 hover:text-black-500">
                        <i class="far fa-user text-2xl text-gray-700"></i>
                    </a>
                    <div
                        class="absolute  left-0 hidden group-hover:block bg-black shadow-lg mt-1 rounded transform -translate-y-1 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100 z-20">
                        <a href="{{ route('pages.account') }}"
                            class="block px-4 py-2 text-white hover:bg-gray-600">Account</a>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-white hover:bg-gray-600"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>

            <!-- Icon Wishlist -->
            <a href="{{ route('pages.wishlist') }}" class="relative text-gray-700 hover:text-black-500">
                <i class="far fa-heart text-2xl text-gray-700"></i>
                <span
                    class="wishlist-count absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full"
                    style="display: {{ $wishlistCount > 0 ? 'inline-block' : 'none' }};">
                    {{ $wishlistCount }}
                </span>
            </a>

            <!-- Icon Cart -->
            <div class="relative group">
                <a href="{{ route('pages.cart') }}" class="relative text-gray-700 hover:text-black-500 group-hover:text-black">
                    <i class="fas fa-shopping-cart text-2xl text-gray-700"></i>
                    <span
                        class="cart-count absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
                        <span id="cart-count">{{ count($cartItems) }}</span>
                    </span>
                </a>
                <div class="absolute right-0 hidden group-hover:block bg-white border borer-gray-200 mt-0 shadow-lg rounded transition-all duration-200 z-50 min-w-[320px] ">
                    <div class="p-6 space-y-6">
                        @if(count($cartItems) > 0)
                            @foreach($cartItems as $item)
                                <div class="flex items-center space-x-6" >
                                    <img src="{{ Storage::url($item->product->image) }}"
                                         alt="{{ $item->name }}"
                                         class="w-16 h-16 object-cover rounded-md">
                                    <div class="flex-1">
                                        <p class="text-sm font-semibold truncate">{{ $item->name }}</p>
                                        <p class="text-xs text-gray-500">Quantity: {{ $item->quantity }}</p>
                                        <p class="text-xs text-gray-500" >
                                            Sub amount: {{ number_format($item->sub_amount, 0, ',', '.') }} VND
                                        </p>
                                    </div>
                                
                                </div>
                            @endforeach
                        @else
                            <p class="text-center text-gray-500">Your cart is empty.</p>
                        @endif
                    </div>
                    <div class="border-t px-6 py-4">
                        <p class="text-base font-bold" >Total amount:
                            {{ number_format($totalPrice, 0, ',', '.') }} VND
                        </p>
                        <a href="{{ route('pages.cart') }}"
                           class="block w-full mt-3 text-center bg-black text-white py-3 rounded-lg hover:bg-gray-800">
                            Checkout
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Mobile Navigation -->
    <nav id="mobile-nav" class="lg:hidden hidden bg-white shadow-md z-50">
        <div class="container mx-auto px-4 py-2">
            <div id="main-menu" class="flex flex-col space-y-2 mt-2">

                <a href="#" class="block text-gray-700 text-lg  hover:underline hover:bg-transparent border-0 hover:text-cyan-700">Home Page</a>
                <a href="{{ route('pages.about') }}" class="block  text-gray-700 text-lg  hover:underline hover:bg-transparent border-0 hover:text-cyan-700">Introduction</a>
                <div class="flex items-center text-gray-700 text-lg border-0 hover:text-cyan-700">
                    <a href="{{ route('collections.all-products') }}" class="flex-grow hover:underline ">
                        Product
                    </a>
                    <i class="fas fa-chevron-right ml-2 cursor-pointer" onclick="showProductCategories()"></i>

                </div>
                <a href="{{ route('pages.blog') }}" class="block  text-gray-700 text-lg  hover:underline hover:bg-transparent border-0 hover:text-cyan-700">Blog</a>
                <a href="{{ route('pages.contact') }}" class="block  text-gray-700 text-lg  hover:underline hover:bg-transparent border-0 hover:text-cyan-700">Contact</a>
                <a href="{{ route('pages.checkOrder') }}" class="block  text-gray-700 text-lg  hover:underline hover:bg-transparent border-0 hover:text-cyan-700">Check Order</a>
            </div>

            <div id="product-categories" class="hidden space-y-2 mt-2">
                <div class="flex items-center cursor-pointer text-gray-700 hover:text-black" onclick="showMainMenu()">
                    <i class="fas fa-chevron-left mr-2"></i>
                </div>
                @foreach ($categories as $category)
                    <a href="{{ route('collections.category', ['categoryName' => str_replace(' ', '-', $category->name)]) }}" class="block  text-gray-700 text-lg  hover:underline hover:bg-transparent border-0 hover:text-cyan-700">

                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

        </div>
    </nav>
</header>
