<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;
use App\Models\customer; 
use Illuminate\Support\Facades\Password;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Use default Jetstream actions for registration, profile, etc.
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

       // Authentication
Fortify::authenticateUsing(function ($request) {
    $customer = customer::where('email_address', $request->email)->first();

    if ($customer && Hash::check($request->password, $customer->password)) {
        return $customer;
    }

    return null;
});


        // Rate limiting for login attempts
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input('email_address')).'|'.$request->ip());
            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // Login & register views
Fortify::loginView(fn() => view('auth.login'));
Fortify::registerView(fn() => view('auth.register'));


/*
Fortify::resetUserPasswordsUsing(function (array $input) {
    // Find the customer by email_address
    $customer = customer::where('email_address', $input['email'])->first();

    if (!$customer) {
        throw ValidationException::withMessages([
            'email_address' => __('We can\'t find a customer with that email address.'),
        ]);
    }

    return $customer;
});
*/

// Password reset
Fortify::resetUserPasswordsUsing(function (array $input) {
    $customer = customer::where('email_address', $input['email'])->first();

    if (!$customer) {
        throw ValidationException::withMessages([
            'email' => __('We can\'t find a customer with that email address.'),
        ]);
    }

    return $customer;
});



        
    }
}
