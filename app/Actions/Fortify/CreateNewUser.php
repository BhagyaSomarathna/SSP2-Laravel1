<?php

namespace App\Actions\Fortify;

use App\Models\customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered customer.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input)
{
    Validator::make($input, [
        'customer_name' => ['required', 'string', 'max:255'],
        'email_address' => ['required', 'string', 'email', 'max:255', 'unique:customer'],
        'password' => $this->passwordRules(),
    ])->validate();

    return customer::create([
        'customer_name' => $input['customer_name'],
        'email_address' => $input['email_address'],
        'password' => Hash::make($input['password']),
        'address' => $input['address'] ?? null,
        'contact_number' => $input['contact_number'] ?? null,
    ]);

    // Immediately log out the user after registration
        auth()->logout();

        return $customer; 
}
}