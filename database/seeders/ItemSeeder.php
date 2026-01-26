<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\item;

class ItemSeeder extends Seeder
{
    public function run()
    {
        item::create([
    'item_name' => 'Elephant in Esala Perahera',
    'category_name' => 'traditional',
    'price' => 2000,
    'description' => 'A traditional piece inspired by the grand Kandy Esala Perahera, this artwork highlights a richly decorated elephant in striking blue and white tones. Created as a hand-painted batik on fabric, it measures 12 x 18 inches and can be framed as desired. It symbolizes blessings, prosperity, and Sri Lanka’s most famous cultural festival.',
    'img' => 'esala perahera 1.jpg',

    ]);


        // Add more products as needed
    }
}
