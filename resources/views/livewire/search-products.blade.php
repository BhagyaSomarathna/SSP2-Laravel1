<div class="relative">
    <input 
        type="text" 
        wire:model="query" 
        placeholder="Search..." 
        class="border rounded px-2 py-1 w-64"
    >

    @if(strlen($query) > 0)
        <ul class="absolute bg-white border mt-1 w-full max-h-60 overflow-auto shadow-lg z-50">
            @forelse($products as $product)
                <li class="px-2 py-1 hover:bg-gray-100">
                    <a href="{{ route('products.show', $product->id) }}">
                        {{ $product->name }}
                    </a>
                </li>
            @empty
                <li class="px-2 py-1 text-gray-500">No results found</li>
            @endforelse
        </ul>
    @endif
</div>
