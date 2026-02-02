<section class="dashboard p-6">
    <h2 class="text-2xl font-bold mb-4">Sales Report</h2>

    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="py-2 px-4 border">Date</th>
                <th class="py-2 px-4 border">Total Orders</th>
                <th class="py-2 px-4 border">Total Sales (Rs.)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sales as $sale)
                <tr>
                    <td class="py-2 px-4 border">{{ $sale->order_day }}</td>
                    <td class="py-2 px-4 border">{{ $sale->total_orders }}</td>
                    <td class="py-2 px-4 border">Rs.{{ number_format($sale->total_sales, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-4">No sales records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</section>
