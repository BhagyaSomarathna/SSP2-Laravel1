{{-- Header --}}
@include('partials.header')

<div class="max-w-md mx-auto mt-16 p-8 bg-white rounded-xl shadow-lg">
    <h1 class="text-3xl font-bold mb-6">Login</h1>

    <form method="POST" action="{{ route('login.post') }}">


        @csrf

        <input type="email" name="email" placeholder="Email"
               class="w-full p-3 mb-4 rounded-lg bg-gray-200"
               value="{{ old('email') }}" required autofocus>

        <input type="password" name="password" placeholder="Password"
               class="w-full p-3 mb-4 rounded-lg bg-gray-200" required>

        <button type="submit"
                class="w-full py-3 rounded-full bg-indigo-500 text-white font-bold hover:bg-indigo-600 transition">
            Login
        </button>

        @if ($errors->any())
            <p class="text-red-600 mt-2">{{ $errors->first() }}</p>
        @endif
    </form>
</div>

{{-- Footer --}}
@include('partials.footer')
