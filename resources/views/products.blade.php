@include('partials.header')

<section class="py-12 px-6 bg-gray-50 min-h-screen">
    <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">
        {{ ucfirst($category) }}
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse ($items as $item)
            <div class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition">
                <img src="{{ asset('images/' . $item->img) }}"
                     alt="{{ $item->item_name }}"
                     class="w-full h-48 object-cover rounded-lg mb-4">

                <h3 class="text-lg font-semibold">{{ $item->item_name }}</h3>
                <p class="text-gray-600 text-sm mb-2">
                    {{ Str::limit($item->description, 60) }}
                </p>

                <p class="text-indigo-600 font-bold mb-3">
                    Rs. {{ number_format($item->price, 2) }}
                </p>

                <!-- Add to Cart Form -->
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <input type="hidden" name="name" value="{{ $item->item_name }}">
                    <input type="hidden" name="price" value="{{ $item->price }}">
                    <input type="hidden" name="img" value="{{ $item->img }}">
                    <button type="submit"
                        class="block w-full text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">
                        Add to Cart
                    </button>
                </form>
            </div>
        @empty
            <p class="col-span-4 text-center text-gray-500">
                No products found.
            </p>
        @endforelse
    </div>
</section>

@include('partials.footer')
