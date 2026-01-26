{{-- Header --}}
@include('partials.header')

{{-- Contact Section --}}
<section class="text-center py-12 px-6">
    <h1 class="text-4xl font-bold mb-8">Contact Us</h1>

    {{-- Team Members --}}
    <div class="flex justify-center gap-10 flex-wrap mb-10">
        <div class="max-w-xs">
            <img src="{{ asset('images/officer 2.webp') }}"
                 alt="Shehan Tharaka"
                 class="w-full rounded-lg mb-3 shadow-md">
            <h3 class="text-lg font-semibold">Shehan Tharaka</h3>
            <p class="text-gray-700">077889654</p>
            <p class="text-gray-700">shehan@gmail.com</p>
        </div>

        <div class="max-w-xs">
            <img src="{{ asset('images/officer 3.jpg') }}"
                 alt="John Perera"
                 class="w-full rounded-lg mb-3 shadow-md">
            <h3 class="text-lg font-semibold">John Perera</h3>
            <p class="text-gray-700">0778899765</p>
            <p class="text-gray-700">john@gmail.com</p>
        </div>

        <div class="max-w-xs">
            <img src="{{ asset('images/officer.webp') }}"
                 alt="Bhagya Sandeepani"
                 class="w-full rounded-lg mb-3 shadow-md">
            <h3 class="text-lg font-semibold">Bhagya Sandeepani</h3>
            <p class="text-gray-700">0789098765</p>
            <p class="text-gray-700">bhagya@gmail.com</p>
        </div>
    </div>

    {{-- Company Information --}}
    <div class="my-8 text-lg font-medium text-gray-800">
        <p>No.27A Peradeniya Road, Kandy</p>
        <p>0778898098</p>
        <p>LuxeArts@gmail.com</p>
    </div>

    {{-- Feedback Form --}}
    <div class="max-w-lg mx-auto p-6 border-2 border-black rounded-lg text-left bg-white shadow-md">
        <h2 class="text-2xl font-semibold text-center mb-6">
            Share your feedback with us
        </h2>

        <form method="POST" action="#">
            @csrf

            <label for="name" class="font-bold block mt-4">Name</label>
            <input type="text"
                   id="name"
                   name="name"
                   placeholder="Enter your name"
                   class="w-full p-3 mt-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400">

            <label for="message" class="font-bold block mt-4">Your feedback</label>
            <textarea id="message"
                      name="message"
                      rows="4"
                      placeholder="Write your feedback"
                      class="w-full p-3 mt-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400"></textarea>

            <button type="submit"
                    class="w-full py-3 mt-6 rounded-full bg-gradient-to-r from-gray-600 to-gray-400 text-white font-semibold text-lg hover:from-gray-800 hover:to-gray-600 transition">
                Submit
            </button>
        </form>
    </div>
</section>

{{-- Footer --}}
@include('partials.footer')
