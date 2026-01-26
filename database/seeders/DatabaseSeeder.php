<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\admin;
use App\Models\category;
use App\Models\item;
use App\Models\order;
use App\Models\customer;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // User::factory(10)->create();

         $admins = admin::factory()->count(3)->create();

       
    }

    
}
