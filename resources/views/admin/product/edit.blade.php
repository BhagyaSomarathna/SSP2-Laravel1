{{-- resources/views/admin/product/edit.blade.php --}}
@include('partials.header')

<section class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10">
    <!-- Heading -->
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Product</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Item Name -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Item Name</label>
            <input 
                type="text" 
                name="item_name" 
                value="{{ old('item_name', $product->item_name) }}" 
                required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Category -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
            <input 
                type="text" 
                name="category_name" 
                value="{{ old('category_name', $product->category_name) }}" 
                required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Price -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
            <input 
                type="number" 
                step="0.01" 
                name="price"   
                value="{{ old('price', $product->price) }}" 
                required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea 
                name="description" 
                rows="5"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- Current Image -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
            @if($product->img)
                <img src="{{ asset('images/' . $product->img) }}" 
                     alt="Current Product Image" 
                     class="max-w-[150px] rounded-md shadow-md mb-2">
            @else
                <p class="text-gray-500">No image uploaded.</p>
            @endif
        </div>

        <!-- Upload New Image -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Change Image (optional)</label>
            <input 
                type="file" 
                name="img" 
                accept="image/*" 
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- Submit Button -->
        <div>
            <button 
                type="submit" 
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg shadow transition">
                Update Product
            </button>
        </div>
    </form>
</section>

@include('partials.footer')
