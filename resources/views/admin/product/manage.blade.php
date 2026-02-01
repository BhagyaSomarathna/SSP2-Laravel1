{{-- resources/views/admin/product/manage.blade.php --}}
@include('partials.header')

<section class="dashboard px-6 py-10">
  <h2 class="font-bold text-3xl text-center mb-6">Manage Products</h2>

  <div class="overflow-x-auto">
    <table class="w-full text-left border border-gray-300">
      <thead>
        <tr class="bg-blue-100 text-sm">
          <th class="px-3 py-2">ID</th>
          <th class="px-3 py-2">Item Name</th>
          <th class="px-3 py-2">Category</th>
          <th class="px-3 py-2">Description</th>
          <th class="px-3 py-2">Price</th>
          <th class="px-3 py-2">Image</th>
          <th class="px-3 py-2">Actions</th>
        </tr>
      </thead>

      <tbody>
        @forelse($products as $product)
          <tr class="border-t bg-blue-50 text-sm">
            <td class="px-3 py-2">{{ $product->id }}</td>
            <td class="px-3 py-2">{{ $product->item_name }}</td>
            <td class="px-3 py-2">{{ $product->category_name }}</td>
            <td class="px-3 py-2">{{ $product->description }}</td>
            <td class="px-3 py-2">Rs. {{ number_format($product->price, 2) }}</td>

            <td class="px-3 py-2">
              @if($product->img)
                <img src="{{ asset('images/' . $product->img) }}"
                     class="w-20 rounded shadow"
                     alt="Product image">
              @else
                <span class="text-gray-500 text-xs">No image</span>
              @endif
            </td>

            <td class="px-3 py-2 space-x-2">
              <!-- Edit button -->
              <a href="{{ route('admin.products.edit', $product->id) }}"
                 class="inline-block px-3 py-1 bg-blue-500 text-white rounded text-xs hover:bg-blue-600">
                 Edit
              </a>

              <!-- Delete button -->
              <form action="{{ route('admin.products.delete', $product->id) }}"
                    method="POST"
                    class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                        onclick="return confirm('Delete this product?')"
                        class="px-3 py-1 bg-red-500 text-white rounded text-xs hover:bg-red-600">
                  Delete
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center text-red-500 py-6">
              No products found
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</section>

@include('partials.footer')
