{{-- Header --}}
@include('partials.header')

<section class="upload-section py-12 min-h-screen bg-gray-100">
    <div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Upload a New Product</h2>

        @if(session('success'))
            <p class="text-green-600 mb-4 text-center">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <div class="text-red-600 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="space-y-4" action="{{ route('admin.product.upload.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="block mb-1 font-medium">Item Name</label>
                <input type="text" name="item_name" value="{{ old('item_name') }}" required
                       class="w-full p-3 border rounded-lg">
            </div>

            <div>
                <label class="block mb-1 font-medium">Category</label>
                <input type="text" name="category_name" value="{{ old('category_name') }}" required
                       class="w-full p-3 border rounded-lg">
            </div>

            <div>
                <label class="block mb-1 font-medium">Description</label>
                <input type="text" name="description" value="{{ old('description') }}"
                       class="w-full p-3 border rounded-lg">
            </div>

            <div>
                <label class="block mb-1 font-medium">Price</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}" required
                       class="w-full p-3 border rounded-lg">
            </div>

            <div>
                <label class="block mb-1 font-medium">Image</label>
                <input type="file" name="img" accept="image/*" required class="w-full">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                Upload
            </button>
        </form>
    </div>
</section>

{{-- Footer --}}
@include('partials.footer')
