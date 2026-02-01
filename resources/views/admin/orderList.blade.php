{{-- resources/views/admin/orderList.blade.php --}}
@include('partials.header')

<section class="dashboard px-6 py-10">
    <h2 class="text-3xl font-bold text-center mb-6">Orders List</h2>

    <div class="overflow-x-auto bg-white p-4 rounded shadow">
        <table class="min-w-full table-auto border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2 border">Order ID</th>
                    <th class="px-4 py-2 border">Customer</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Order Date</th>
                    <th class="px-4 py-2 border">Delivery Date</th>
                    <th class="px-4 py-2 border">Amount (Rs.)</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr class="border-t bg-blue-50 text-sm">
                        <td class="px-4 py-2 border">#{{ $order->id }}</td>
                        <td class="px-4 py-2 border">{{ $order->customer_name }}</td>
                        <td class="px-4 py-2 border">{{ $order->email_address }}</td>
                        <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($order->order_date)->format('F j, Y') }}</td>
                        <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($order->delivery_date)->format('F j, Y') }}</td>
                        <td class="px-4 py-2 border">Rs. {{ number_format($order->amount, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-red-500">
                            No orders found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

@include('partials.footer')
