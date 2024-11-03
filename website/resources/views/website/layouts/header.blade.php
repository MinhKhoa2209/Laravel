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
            <img src="{{ asset('admin_assets/img/images.jpg') }}" alt="Logo" class="h-32 w-auto object-cover object-top">
        </div>

        <!-- Navigation -->
        <nav class="hidden lg:flex space-x-4 justify-center flex-grow flex-nowrap">
            <a href="{{route('dashboard')}}" class="text-gray-700 hover:text-black text-lg hover:underline">Home Page</a>
            <a href="{{ route('pages.about') }}" class="text-gray-700 hover:text-black text-lg hover:underline">Introduction</a>
            <div class="relative group">
                <a href="{{route('collections.all-products')}}" class="text-gray-700 hover:text-black text-lg hover:underline">Product</a>
                <div class="absolute left-0 hidden group-hover:block bg-white mt-0 shadow-lg rounded transition-all duration-200 z-30 min-w-[220px]">
                    <a href="{{ route('collections.spring-summer-clothes') }}" class="block px-4 py-2 text-lg text-gray-700 hover:bg-gray-100">Spring summer clothes</a>
                    <a href="{{ route('collections.fall-winter-clothes') }}" class="block px-4 py-2 text-lg text-gray-700 hover:bg-gray-100">Fall winter clothes</a>
                    <a href="{{ route('collections.pitcher') }}" class="block px-4 py-2 text-lg text-gray-700 hover:bg-gray-100">Pitcher</a>
                    <a href="{{ route('collections.lego') }}" class="block px-4 py-2 text-lg text-gray-700 hover:bg-gray-100">Lego</a>
                    <a href="{{ route('collections.shoes') }}" class="block px-4 py-2 text-lg text-gray-700 hover:bg-gray-100">Shoes</a>
                    <a href="{{ route('collections.souvenir') }}" class="block px-4 py-2 text-lg text-gray-700 hover:bg-gray-100">Souvenir</a>
                </div>
            </div>
            <a href="{{ route('pages.blog') }}" class="text-gray-700 hover:text-black text-lg hover:underline">Blog</a>
            <a href="{{ route('pages.contact') }}" class="text-gray-700 hover:text-black text-lg hover:underline">Contact</a>
            <a href="{{ route('pages.order-tracking') }}" class="text-gray-700 hover:text-black text-lg hover:underline">Check Order</a>
        </nav>

        <!-- Icons -->
        <div class="flex items-center space-x-4">
            <!-- Search Icon -->
            <div class="relative flex-grow hidden lg:flex">
                <form method="GET" action="{{ route('products.search') }}" class="flex items-center w-full">
                    <input type="text" name="query" placeholder="Search for product" class="border border-gray-300 rounded-lg pl-10 pr-4 py-2 w-full focus:outline-none focus:ring focus:ring-blue-400">
                    <button type="submit" class="absolute left-3 top-1/2 transform -translate-y-1/2 bg-transparent border-none cursor-pointer">
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
                    <div class="absolute  left-0 hidden group-hover:block bg-black shadow-lg mt-1 rounded transform -translate-y-1 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100 z-20">
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-white hover:bg-gray-600">Login</a>
                        <a href="{{ route('register') }}" class="block px-4 py-2 text-white hover:bg-gray-600">Register</a>
                    </div>
                @else
                    <a href="#" class="flex items-center text-gray-700 hover:text-black-500">
                        <i class="far fa-user text-2xl text-gray-700"></i>
                    </a>
                    <div class="absolute  left-0 hidden group-hover:block bg-black shadow-lg mt-1 rounded transform -translate-y-1 transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100 z-20">
                        <a href="{{ route('pages.account') }}" class="block px-4 py-2 text-white hover:bg-gray-600">Account</a>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-white hover:bg-gray-600"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>

            <!-- Icon Wishlist -->
            <a href="{{route('pages.wishlist')}}" class="relative text-gray-700 hover:text-black-500">
                <i class="far fa-heart text-2xl text-gray-700"></i>
            </a>

            <!-- Icon Cart -->
            <a href="{{route('pages.cart')}}" class="relative text-gray-700 hover:text-black-500">
                <i class="fas fa-shopping-cart text-2xl text-gray-700"></i>
            </a>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <nav id="mobile-nav" class="lg:hidden hidden bg-white shadow-md z-50">
        <div class="container mx-auto px-4 py-2">
            <div id="main-menu" class="flex flex-col space-y-2 mt-2">
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-black">Home Page</a>
                <a href="{{ route('pages.about') }}" class="text-gray-700 hover:text-black">Introduction</a>

                <a href="{{ route('collections.all-products') }}" class="text-gray-700 hover:text-black">All Products</a>
                <div class="flex justify-between items-center text-gray-700 hover:text-black cursor-pointer" onclick="showProductCategories()">
                    Product
                    <i class="fas fa-chevron-right ml-2"></i>
                </div>

                <a href="{{ route('pages.blog') }}" class="text-gray-700 hover:text-black">Blog</a>
                <a href="{{ route('pages.contact') }}" class="text-gray-700 hover:text-black">Contact</a>
                <a href="{{ route('pages.order-tracking') }}" class="text-gray-700 hover:text-black">Check Order</a>
            </div>

            <div id="product-categories" class="hidden space-y-2 mt-2">
                <div class="flex items-center cursor-pointer text-gray-700 hover:text-black" onclick="showMainMenu()">
                    <i class="fas fa-chevron-left mr-2"></i>
                </div>
                <a href="{{ route('collections.spring-summer-clothes') }}" class="text-gray-700 hover:text-black block">Spring summer clothes</a>
                <a href="{{ route('collections.fall-winter-clothes') }}" class="text-gray-700 hover:text-black block">Fall winter clothes</a>
                <a href="{{ route('collections.pitcher') }}" class="text-gray-700 hover:text-black block">Pitcher</a>
                <a href="{{ route('collections.lego') }}" class="text-gray-700 hover:text-black block">Lego</a>
                <a href="{{ route('collections.shoes') }}" class="text-gray-700 hover:text-black block">Shoes</a>
                <a href="{{ route('collections.souvenir') }}" class="text-gray-700 hover:text-black block">Souvenir</a>
            </div>

        </div>
    </nav>

</header>
