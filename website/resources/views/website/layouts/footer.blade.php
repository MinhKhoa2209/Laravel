<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-10 px-6 py-8">
        <!-- Cột 1 -->
        <div class="mx-6">
            <h3 class="text-lg font-bold mb-4">Contact</h3>
            <div class="flex items-center mb-2">
                <i class="fas fa-map-marker-alt mr-2 text-gray-600"></i>
                <strong>Address: </strong>Hoa Vang, Da Nang
            </div>
            <div class="flex items-center mb-2">
                <i class="fas fa-phone-alt mr-2 text-gray-600"></i>
                <strong>Phone number: </strong>0905076967
            </div>
            <div class="flex items-center">
                <i class="fas fa-envelope mr-2 text-gray-600"></i>
                <strong>Email: </strong>khoadm.23it@vku.udn.vn
            </div>
        </div>

        <!-- Cột 2 -->
        <div class="mx-20">
            <h3 class="text-lg font-bold mb-4">Quick link</h3>
            <ul>
                <li><a href="/" class="hover:underline">Home Page</a></li>
                <li><a href="{{route('pages.about')}}" class="hover:underline">Introduction</a></li>
                <li><a href="#" class="hover:underline">Product</a></li>
                <li><a href="{{route('pages.blog')}}" class="hover:underline">Blog</a></li>
                <li><a href="{{route('pages.contact')}}" class="hover:underline">Contact</a></li>
                <li><a href="{{route('pages.order-tracking')}}" class="hover:underline">Check Order</a></li>
            </ul>
        </div>

    <!-- Cột 3 -->
    <div class="mx-10">
        <h3 class="text-lg font-bold mb-4">Customer Support</h3>
        <ul>
            <li><a href="{{route('pages.privacy_policy')}}" class="hover:underline">Privacy policy</a></li>
            <li><a href="{{route('pages.terms_of_service')}}" class="hover:underline">Terms of Service</a></li>
        </ul>
    </div>

    <!-- Cột 4 -->
    <div class="mx-4 ">
        <h3 class="text-lg font-bold mb-4">Social media</h3>
        <div class="flex space-x-4">
            <a href="https://www.facebook.com/profile.php?id=100076687362461" class="hover:text-gray-400"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/mixi.shop/" class="hover:text-gray-400"><i class="fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com/@mixigaming" class="hover:text-gray-400"><i class="fab fa-tiktok"></i></a>
        </div>
    </div>
    </div>
    <div class="text-center mt-12">
        <p>© 2024 MixiShop. All Rights Reserved.</p>
    </div>
</footer>
