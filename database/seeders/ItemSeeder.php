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
    item::create([
    'item_name' => 'Welcome Art',
    'category_name' => 'traditional',
    'price' => 2800,
    'description' => 'This painting reflects the Sri Lankan custom of welcoming guests with flowers, with figures dressed in traditional attire. The warm tones and cultural expressions bring charm and authenticity to the artwork. Measuring 14 x 18 inches, it is painted with acrylic on canvas board and includes a simple border frame for easy display.',
    'img' => 'welcome art.jpg',
    ]);

     item::create([
    'item_name' => 'Cultural representation',
    'category_name' => 'traditional',
    'price' => 3500,
    'description' => 'Inspired by traditional temple murals, this painting illustrates ancient Sri Lankan rituals and ceremonies with fine detailing and earthy colors. It represents the cultural storytelling heritage of the island. Sized at 18 x 24 inches, it is painted using tempera on canvas and comes with a traditional wooden carved frame.',
    'img' =>'traditional art 1.jpg',
    ]);

     item::create([
    'item_name' => 'Traditional Drummer and Kandyan Dancer',
    'category_name' => 'traditional',
    'price' => 2700,
    'description' => 'This striking artwork showcases the rhythm and energy of a Kandyan drummer alongside a dancer, symbolizing harmony between music and movement in Sri Lankan performances. Done in oil on canvas, the painting measures 20 x 24 inches and is set in a premium wooden frame with glass cover, making it a centerpiece for cultural art lovers.',
    'img' =>'kandyan dancers.jpg',
    ]);

     item::create([
    'item_name' => 'Mandala Bloom',
    'category_name' => 'modern',
    'price' =>4000 ,
    'description' => 'A vibrant mandala-inspired artwork with detailed floral and geometric patterns, bringing balance and elegance to your wall décor. The bold colors and symmetrical design make it a standout decorative piece.
Size: 18 x 24 inches (45 x 60 cm)',
    'img' =>'modern art 1.jpg',
    ]);
     item::create([
    'item_name' => 'Blooming Serenity',
    'category_name' => 'modern',
    'price' => 5200,
    'description' => 'A soft and graceful flower painting that captures nature’s freshness and charm. With delicate brushstrokes and warm tones, this piece adds a calming touch to any living space.Size: 20 x 28 inches (50 x 70 cm)',
    'img' =>'modern art 2.webp',
    ]);

     item::create([
    'item_name' => 'Buddha Tranquility',
    'category_name' => 'modern',
    'price' => 3500,
    'description' => 'A large-scale artwork of a serene Buddha face in golden and blue hues, symbolizing peace and mindfulness. Perfect for meditation spaces, lounges, or serene interiors.
Size: 24 x 32 inches (60 x 80 cm)',
    'img' =>'modern art 3.jpg',
    ]);
     


        // Add more products as needed
    }
}
