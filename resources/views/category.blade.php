<!-- resources/views/categories.blade.php -->

<!-- Header -->
@include('partials.header')

<!-- Traditional Paintings -->
<section class="px-6 md:px-20 py-12">
    <div class="grid md:grid-cols-2 gap-10 items-center">
        <!-- Text -->
        <div class="space-y-4">
            <h2 class="text-3xl font-bold text-gray-800">Traditional Paintings</h2>
            <p class="text-gray-600">
                Discover a curated collection of original paintings that capture creativity, emotion, 
                and timeless beauty—perfect for art lovers and collectors alike.
            </p>
           <a href="{{ url('/products/traditional') }}"
   class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
    View products
</a>
        </div>
        <!-- Image -->
        <div>
            <img src="{{ asset('images/traditional image.jpeg') }}" 
                 alt="Traditional Paintings" 
                 class="rounded-2xl shadow-lg w-full h-80 object-cover">
        </div>
    </div>
</section>

<!-- Modern Paintings -->
<section class="px-6 md:px-20 py-12 bg-gray-50">
    <div class="grid md:grid-cols-2 gap-10 items-center">
        <!-- Image -->
        <div>
            <img src="{{ asset('images/modern painting.jpeg') }}" 
                 alt="Modern Paintings" 
                 class="rounded-2xl shadow-lg w-full h-80 object-cover">
        </div>
        <!-- Text -->
        <div class="space-y-4">
            <h2 class="text-3xl font-bold text-gray-800">Modern Paintings</h2>
            <p class="text-gray-600">
                Explore bold, creative, and contemporary artworks that bring fresh perspectives and style to any space.
            </p>
            <a href="{{ url('/products/modern') }}"
   class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
    View products
</a>
        </div>
    </div>
</section>

<!-- Abstract Paintings -->
<section class="px-6 md:px-20 py-12">
    <div class="grid md:grid-cols-2 gap-10 items-center">
        <!-- Text -->
        <div class="space-y-4">
            <h2 class="text-3xl font-bold text-gray-800">Abstract Paintings</h2>
            <p class="text-gray-600">
                Immerse yourself in expressive forms and vibrant colors that inspire imagination beyond boundaries.
            </p>
           <a href="{{ url('/products/abstract') }}"
   class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
    View products
</a>
        </div>
        <!-- Image -->
        <div>
            <img src="{{ asset('images/abstract paintings.webp') }}" 
                 alt="Abstract Paintings" 
                 class="rounded-2xl shadow-lg w-full h-80 object-cover">
        </div>
    </div>
</section>

<!-- Home Deco -->
<section class="px-6 md:px-20 py-12 bg-gray-50">
    <div class="grid md:grid-cols-2 gap-10 items-center">
        <!-- Image -->
        <div>
            <img src="{{ asset('images/home deco.png') }}" 
                 alt="Home Decoration" 
                 class="rounded-2xl shadow-lg w-full h-80 object-cover">
        </div>
        <!-- Text -->
        <div class="space-y-4">
            <h2 class="text-3xl font-bold text-gray-800">Home Deco</h2>
            <p class="text-gray-600">
                Add elegance and personality to your living spaces with unique art-inspired décor pieces.
            </p>
            <a href="{{ url('/products/homedeco') }}"
   class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
    View products
</a>
        </div>
    </div>
</section>

<!-- Crafts -->
<section class="px-6 md:px-20 py-12">
    <div class="grid md:grid-cols-2 gap-10 items-center">
        <!-- Text -->
        <div class="space-y-4">
            <h2 class="text-3xl font-bold text-gray-800">Crafts</h2>
            <p class="text-gray-600">
                Discover handcrafted creations that blend tradition, creativity, and unique artistry.
            </p>
           <a href="{{ url('/products/crafts') }}"
   class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
    View products
</a>
        </div>
        <!-- Image -->
        <div>
            <img src="{{ asset('images/crafts.jpg') }}" 
                 alt="Crafts" 
                 class="rounded-2xl shadow-lg w-full h-80 object-cover">
        </div>
    </div>
</section>

<!-- Footer -->
@include('partials.footer')
