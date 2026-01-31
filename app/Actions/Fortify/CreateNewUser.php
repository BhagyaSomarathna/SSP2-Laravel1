<?php

namespace App\Actions\Fortify;

use App\Models\Customer;
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
    public function create(array $input): Customer
    {
        Validator::make($input, [
            'name'           => ['required', 'string', 'max:255'],
            'email'          => ['required', 'email', 'max:255', 'unique:customer,email_address'],
            'password'       => $this->passwordRules(),
            'address'        => ['required', 'string'],
            'contact_number' => ['required', 'string'], 
        ])->validate();

        return Customer::create([
            'customer_name'  => $input['name'],
            'email_address'  => $input['email'],
            'password'       => Hash::make($input['password']),
            'address'        => $input['address'],
            'contact_number' => $input['contact_number'], 
        ]);
    }
}
