{{-- resources/views/checkout/confirmation.blade.php --}}
@include('partials.header')

<section class="py-12 px-6 min-h-screen flex justify-center items-center">
    <div class="max-w-xl w-full bg-white shadow-lg rounded-2xl p-8 text-center">
        @if(session('success'))
            <h1 class="text-3xl font-bold text-green-600 mb-6">{{ session('success') }}</h1>
        @endif

        <p class="text-lg mb-4">Your order has been placed successfully!</p>

        <div class="bg-gray-100 p-4 rounded-lg text-left space-y-2 mb-6">
            <p><span class="font-semibold">Order ID:</span> #{{ $order->id }}</p>
            <p><span class="font-semibold">Order Date:</span> {{ \Carbon\Carbon::parse($order->order_date)->format('F j, Y') }}</p>
            <p><span class="font-semibold">Delivery Date:</span> {{ \Carbon\Carbon::parse($order->delivery_date)->format('F j, Y') }}</p>
            <p><span class="font-semibold">Total Amount:</span> Rs.{{ number_format($order->amount, 2) }}</p>
            <p><span class="font-semibold">Customer Name:</span> {{ $order->customer_name }}</p>
        </div>

        <a href="{{ route('category') }}"
           class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
           Continue Shopping
        </a>
    </div>
</section>

@include('partials.footer')
