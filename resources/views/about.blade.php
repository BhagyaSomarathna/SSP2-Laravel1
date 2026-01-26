<!-- resources/views/about.blade.php -->

<!-- Header section with nav bar -->
@include('partials.header')

<!-- Vision Section -->
<section class="py-16 px-6 bg-gray-50">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-12">
        <img src="{{ asset('images/img 14.jpg') }}" 
             alt="Vision Image" 
             class="w-full md:w-1/3 rounded-xl shadow-lg object-cover">
        
        <div class="md:w-2/3 text-center md:text-left">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Vision</h2>
            <p class="text-gray-600 leading-relaxed text-lg">
                To become the most trusted and inspiring online destination for art and collectibles, 
                where every customer can discover authentic treasures, celebrate creativity, 
                and build meaningful collections with confidence.
            </p>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="py-16 px-6 bg-white">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-12">
        <img src="{{ asset('images/img 15.png') }}" 
             alt="Mission Image" 
             class="w-full md:w-1/3 rounded-xl shadow-lg object-cover">
        
        <div class="md:w-2/3 text-center md:text-left">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Mission</h2>
            <p class="text-gray-600 leading-relaxed text-lg">
                Our mission is to curate and deliver authentic, high-quality artworks and collectibles 
                directly to our customers. We strive to create a secure, user-friendly platform 
                that connects people with inspiring pieces, while ensuring trust, transparency, 
                and exceptional service in every interaction.
            </p>
        </div>
    </div>
</section>

<!-- What this website does -->
<section class="py-16 px-6 bg-gray-50">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row-reverse items-center gap-12">
        <img src="{{ asset('images/img 16.webp') }}" 
             alt="Gallery Image" 
             class="w-full md:w-1/3 rounded-xl shadow-lg object-cover">
        
        <div class="md:w-2/3 text-center md:text-left">
            <h2 class="text-3xl text-center font-bold text-gray-800 mb-4">What this website does?</h2>
            <p class="text-gray-600 leading-relaxed text-lg">
                LuxeArts is an online platform dedicated to showcasing and selling unique artworks 
                and collectibles. Our admins carefully manage and curate the collection, 
                ensuring authenticity and quality, while customers can easily browse, explore, 
                and purchase their favorite pieces. The website provides a secure and user-friendly 
                space where art lovers can discover inspiring creations and add them 
                to their personal collections.
            </p>
        </div>
    </div>
</section>

<!-- Footer -->
@include('partials.footer')
