{{-- Header --}}
@include('partials.header')

<section class="dashboard p-6 min-h-screen">
    <h2 class="text-2xl font-bold mb-4">Customers List</h2>

    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="py-2 px-4 border">Customer ID</th>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Email</th>
                <th class="py-2 px-4 border">Contact Number</th>
                <th class="py-2 px-4 border">Address</th>
            </tr>
        </thead>
        <tbody>
            @if($customers && $customers->count() > 0)
                @foreach($customers as $customer)
                    <tr>
                        <td class="py-2 px-4 border">#{{ $customer->id }}</td>
                        <td class="py-2 px-4 border">{{ htmlspecialchars($customer->customer_name) }}</td>
                        <td class="py-2 px-4 border">{{ htmlspecialchars($customer->email_address) }}</td>
                        <td class="py-2 px-4 border">{{ htmlspecialchars($customer->contact_number) ?? '-' }}</td>
                        <td class="py-2 px-4 border">{{ htmlspecialchars($customer->address) ?? '-' }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center py-4">No customers found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</section>

{{-- Footer --}}
@include('partials.footer')
