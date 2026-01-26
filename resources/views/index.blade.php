<!-- resources/views/index.blade.php -->

<!-- Header section with nav bar -->
@include('partials.header')

<!-- Main image and welcome message -->
<div class="relative w-full h-80 md:h-96 lg:h-[400px]">
    <!-- Main image -->
    <img src="{{ asset('images/img2.webp') }}" 
         alt="Main Image" 
         class="w-full h-full object-cover">

    <!-- Buttons overlay -->
    <div class="absolute inset-0 flex flex-col justify-center items-center gap-4">
        <a href="{{ url('/login') }}" 
           class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition duration-300">
            Login
        </a>
        <a href="{{ url('/register') }}" 
           class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition duration-300">
            Register
        </a>
    </div>
</div>






<section class="py-16 px-6 text-center bg-gray-50">
    <h1 class="text-4xl font-bold mb-6">Welcome to LuxeArts!</h1>
    <p class="text-gray-700 max-w-3xl mx-auto leading-relaxed text-lg">
        Discover a world where art meets passion. Explore our curated collection of unique artworks 
        and rare collectibles, each telling its own story. Whether you’re a seasoned collector or 
        an art enthusiast, we invite you to browse, appreciate, and bring home pieces that inspire. 
        Your journey into creativity starts here!
    </p>
</section>

<!-- Small description about website -->
<section class="flex flex-col md:flex-row items-center gap-12 py-16 px-6 max-w-6xl mx-auto">
    <img src="{{ asset('images/mandala art.png') }}" 
         alt="Mandala" 
         class="w-60 object-cover rounded-xl shadow-lg">

    <div class="text-center md:text-left">
        <h2 class="text-3xl text-center font-bold mb-4">What is LuxeArts?</h2>
        <p class="text-gray-700 leading-relaxed text-lg">
            LuxeArts is an online platform connecting art lovers and collectors directly with unique artworks and collectibles. Admins manage and curate the collection, ensuring authenticity 
            and quality, while customers can easily browse, purchase, and enjoy exclusive pieces. By keeping interactions direct and streamlined, we provide a secure, transparent, and 
            personalized experience for everyone who appreciates the world of art and collectibles.
        </p>
    </div>
</section>

<!-- Available categories -->
<section class="py-12 px-6 text-center">
    <h2 class="text-3xl font-bold mb-8">Shop by Category</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

        <!-- Traditional -->
        <div class="category-card p-5 border border-gray-200 rounded-2xl shadow bg-white">
            <img src="{{ asset('images/traditional.webp') }}" alt="Traditional" class="w-28 h-28 mx-auto rounded-lg object-cover">
            <h3 class="mt-4 text-lg font-semibold">Traditional</h3>
            <p class="text-gray-600 text-sm">Classic and cultural arts.</p>
            <div class="mt-4">
                <a href="{{ url('/category?category=traditional') }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">View</a>
            </div>
        </div>

        <!-- Modern -->
        <div class="category-card p-5 border border-gray-200 rounded-2xl shadow bg-white">
            <img src="{{ asset('images/modern.jpg') }}" alt="Modern" class="w-28 h-28 mx-auto rounded-lg object-cover">
            <h3 class="mt-4 text-lg font-semibold">Modern</h3>
            <p class="text-gray-600 text-sm">Contemporary art styles.</p>
            <div class="mt-4">
                <a href="{{ url('/category?category=modern') }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">View</a>
            </div>
        </div>

        <!-- Abstract -->
        <div class="category-card p-5 border border-gray-200 rounded-2xl shadow bg-white">
            <img src="{{ asset('images/abstract 9.jpg') }}" alt="Abstract" class="w-28 h-28 mx-auto rounded-lg object-cover">
            <h3 class="mt-4 text-lg font-semibold">Abstract</h3>
            <p class="text-gray-600 text-sm">Creative and expressive works.</p>
            <div class="mt-4">
                <a href="{{ url('/category?category=abstract') }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">View</a>
            </div>
        </div>

        <!-- Home Deco -->
        <div class="category-card p-5 border border-gray-200 rounded-2xl shadow bg-white">
            <img src="{{ asset('images/home deco.jpg') }}" alt="Home Deco" class="w-28 h-28 mx-auto rounded-lg object-cover">
            <h3 class="mt-4 text-lg font-semibold">Home Deco</h3>
            <p class="text-gray-600 text-sm">Beautiful décor items.</p>
            <div class="mt-4">
                <a href="{{ url('/category?category=home-deco') }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">View</a>
            </div>
        </div>

        <!-- Crafts -->
        <div class="category-card p-5 border border-gray-200 rounded-2xl shadow bg-white">
            <img src="{{ asset('images/crafts.jpg') }}" alt="Crafts" class="w-28 h-28 mx-auto rounded-lg object-cover">
            <h3 class="mt-4 text-lg font-semibold">Crafts</h3>
            <p class="text-gray-600 text-sm">Handmade artistic pieces.</p>
            <div class="mt-4">
                <a href="{{ url('/category?category=crafts') }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">View</a>
            </div>
        </div>

    </div>
</section>

<!-- Footer -->
@include('partials.footer')
