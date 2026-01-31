{{-- Header --}}
@include('partials.header')

<section class="py-12 px-6 min-h-screen">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Order Confirmation</h1>

        @php $total = 0; @endphp

        @if(session('cart') && count(session('cart')) > 0)
            <!-- Selected Items Section -->
            <div id="selected-items" class="bg-gray-100 p-4 rounded-lg mb-6">
                <h2 class="text-xl font-semibold mb-4">Your Items</h2>

                @foreach(session('cart') as $item)
                    @php
                        $subtotal = $item['price'] * $item['qty'];
                        $total += $subtotal;
                    @endphp
                    <div class="flex items-center justify-between bg-white p-3 rounded-md shadow mb-3">
                        <img src="{{ asset('images/' . $item['img']) }}" 
                             alt="{{ $item['name'] }}" 
                             class="w-16 h-16 object-cover rounded-md border">
                        <div class="flex-1 px-4">
                            <p class="font-medium text-gray-700">{{ $item['name'] }} (x{{ $item['qty'] }})</p>
                            <p class="text-sm text-gray-500">Subtotal: Rs.{{ $subtotal }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Total -->
            <div id="checkout-total" class="text-right text-lg font-bold text-blue-700 mb-6">
                Total: Rs.{{ $total }}
            </div>

            <!-- Customer details -->
            <div class="customer-details">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Delivery Details</h2>
                <form method="POST" action="{{ route('checkout.placeOrder') }}" class="space-y-4">
                    @csrf
                    <input type="text" name="customer_name" placeholder="Full name" required

                           class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    <input type="text" name="address" placeholder="Address" required
                           class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    <input type="text" name="contact" placeholder="Contact number" required
                           class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">

                    <!-- Payment -->
                    <div class="payment-method">
                        <p class="font-medium text-gray-700 mb-2">Payment method</p>
                        <label class="mr-4">
                            <input type="radio" name="payment" value="cash" required class="mr-1"> Cash
                        </label>
                        <label>
                            <input type="radio" name="payment" value="card" required class="mr-1"> Card
                        </label>
                    </div>

                    <!-- Card details (show with JS if card selected) -->
                    <div id="cardDetails" class="space-y-3 hidden">
                        <input type="text" name="card_number" placeholder="Card Number"
                               class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        <input type="text" name="expiry" placeholder="Expiry Date"
                               class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        <input type="text" name="cvv" placeholder="CVV"
                               class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>

                    <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Place Order
                    </button>
                </form>
            </div>
        @else
            <p class="text-center text-gray-500 mt-10">Your cart is empty. Please add items before checkout.</p>
        @endif
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentRadios = document.querySelectorAll('input[name="payment"]');
    const cardDetails = document.getElementById('cardDetails');

    paymentRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if(this.value === 'card') {
                cardDetails.classList.remove('hidden');
            } else {
                cardDetails.classList.add('hidden');
            }
        });
    });
});
</script>

{{-- Footer --}}
@include('partials.footer')
