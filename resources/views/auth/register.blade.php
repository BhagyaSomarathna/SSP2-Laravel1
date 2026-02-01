{{-- resources/views/auth/register.blade.php --}}

{{-- Header --}}
@include('partials.header')

{{-- Registration Form --}}
<div class="max-w-md mx-auto mt-16 p-8 bg-white border-2 border-black rounded-xl text-center shadow-lg">
    <h1 class="text-3xl font-bold mb-6">Registration</h1>

   <form method="POST" action="{{ route('register') }}">



        @csrf

        {{-- Name --}}
        <input type="text" name="customer_name" placeholder="Full Name"
               class="w-full p-3 bg-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
               value="{{ old('customer_name') }}" required>

        {{-- Email --}}
        <input type="email" name="email_address" placeholder="Email Address"
               class="w-full p-3 bg-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
               value="{{ old('email_address') }}" required>

        {{-- Password --}}
        <input type="password" name="password" placeholder="Password"
               class="w-full p-3 bg-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
               required>

        {{-- Confirm Password --}}
        <input type="password" name="password_confirmation" placeholder="Confirm Password"
               class="w-full p-3 bg-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
               required>

        {{-- Address --}}
        <input type="text" name="address" placeholder="Address"
               class="w-full p-3 bg-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
               value="{{ old('address') }}" required>

        {{-- Contact Number --}}
<input type="number" name="contact_number" placeholder="Contact Number"
       class="w-full p-3 bg-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
       value="{{ old('contact_number') }}" required>


        {{-- Terms & Privacy --}}
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="flex items-center text-sm mt-2">
                <input type="checkbox" name="terms" id="terms" required class="mr-2">
                <label for="terms" class="text-gray-700">
                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm">Terms</a>',
                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm">Privacy</a>',
                    ]) !!}
                </label>
            </div>
        @endif

        {{-- Submit Button --}}
        <button type="submit"
                class="w-full mt-4 py-3 rounded-full bg-gradient-to-r from-green-400 to-green-600 text-white font-semibold hover:opacity-90 transition">
            Register
        </button>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mt-4 text-red-600 text-sm">
                {{ $errors->first() }}
            </div>
        @endif
    </form>

    {{-- Link to Login --}}
    <p class="mt-4 text-gray-600 text-sm">
        Already registered? <a href="{{ route('login') }}" class="underline text-blue-600">Login here</a>
    </p>
</div>

{{-- Footer --}}
@include('partials.footer')
