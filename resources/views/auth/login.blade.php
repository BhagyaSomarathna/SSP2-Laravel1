{{-- Header --}}
@include('partials.header')

{{-- Login Form --}}
<div class="max-w-md mx-auto mt-12 p-8 bg-white border-2 border-black rounded-xl text-center shadow-lg">
    <h1 class="text-4xl font-bold mb-8">Login</h1>

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <input type="email"
               name="email"
               placeholder="Email"
               required
               class="w-4/5 p-3 my-4 rounded-md bg-gray-300 text-base focus:outline-none focus:ring-2 focus:ring-gray-400">

        <input type="password"
               name="password"
               placeholder="Password"
               required
               class="w-4/5 p-3 my-4 rounded-md bg-gray-300 text-base focus:outline-none focus:ring-2 focus:ring-gray-400">

        <button type="submit"
                class="w-1/2 mt-6 py-3 rounded-full bg-gradient-to-r from-yellow-200 to-green-400 text-lg font-semibold shadow-md hover:from-yellow-300 hover:to-green-500 transition">
            Login
        </button>
    </form>
</div>

{{-- Footer --}}
@include('partials.footer')
