{{-- Header --}}
@include('partials.header')

<div class="max-w-md mx-auto mt-16 p-8 bg-white rounded-xl shadow-lg">
    <h1 class="text-3xl font-bold mb-6">Login</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <input
            type="email"
            name="email"
            placeholder="Email"
            class="w-full p-3 mb-4 rounded-lg bg-gray-200"
            required
            autofocus
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            class="w-full p-3 mb-4 rounded-lg bg-gray-200"
            required
        >

        <div class="flex justify-between items-center">
            <button
                type="submit"
                class="py-2 px-6 rounded-full bg-indigo-500 text-white font-bold hover:bg-indigo-600 transition">
                Login
            </button>

            <a href="{{ route('password.request') }}"
               class="text-sm text-gray-600 underline">
                Forgot password?
            </a>
        </div>
    </form>
</div>

{{-- Footer --}}
@include('partials.footer')
