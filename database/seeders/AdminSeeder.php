<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        admin::create([
            'admin_name' => 'Admin1',
            'admin_email' => 'admin1@gmail.com',
            'admin_password' => Hash::make('admin@123'),
        ]);
    }
}
