@include('partials.header')

<section class="cart py-12 px-6 min-h-screen">
    <h2 class="text-3xl font-bold text-center mb-10">Your Cart</h2>

    @if(!empty($cart))
        <div class="cart-container max-w-3xl mx-auto space-y-4">
            @php $totalAmount = 0; @endphp

            @foreach($cart as $item)
                @php
                    $subtotal = $item['price'] * $item['qty'];
                    $totalAmount += $subtotal;
                @endphp

                <div class="cart-item flex items-center justify-between bg-white p-4 rounded-2xl shadow">
                    <img src="{{ asset('images/' . $item['img']) }}" 
                         alt="{{ $item['name'] }}" 
                         class="w-20 h-20 object-cover rounded-lg">

                    <div class="flex-1 px-4">
                        <h3 class="font-semibold text-lg">{{ $item['name'] }}</h3>
                        <p>Qty: {{ $item['qty'] }}</p>
                        <p class="font-bold text-blue-700">Rs. {{ number_format($subtotal, 2) }}</p>
                    </div>

                    <a href="{{ route('cart.remove', $item['id']) }}" 
                       class="text-red-600 hover:underline">Remove</a>
                </div>
            @endforeach

            <div class="text-right mt-6">
                <p class="text-xl font-bold">Total: Rs. {{ number_format($totalAmount, 2) }}</p>
                <div class="mt-4 flex justify-end space-x-4">
                    <a href="{{ route('cart.clear') }}" 
                       class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">Clear Cart</a>

                    
                </div>
            </div>
        </div>
    @else
        <p class="text-center text-gray-500">Your cart is empty.</p>
    @endif
</section>

@include('partials.footer')
