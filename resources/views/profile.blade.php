{{-- Header --}}
@include('partials.header')

<div class="max-w-md mx-auto mt-16 p-8 bg-white border-2 border-black rounded-xl text-center shadow-lg">
    @if($customer)
        <h1 class="text-2xl font-bold mb-4">Welcome, {{ $customer->customer_name }}</h1>
        <p class="mb-2">Email: {{ $customer->email_address }}</p>
        <p class="mb-2">Address: {{ $customer->address }}</p>
        <p class="mb-2">Contact Number: {{ $customer->contact_number }}</p>

        {{-- Logout Button --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="bg-red-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-red-600 transition">
                Logout
            </button>
        </form>
    @else
        <p>You're not logged in! <a href="{{ route('login') }}" class="underline text-blue-600">Login here</a></p>
    @endif
</div>

{{-- Footer --}}
@include('partials.footer')
