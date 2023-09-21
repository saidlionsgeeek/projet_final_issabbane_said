<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        $categories = [1, 2, 3];
        $products = [];
        for ($i = 0; $i < 20; $i++) {
            if ($i <= 7) {
                $products[] = [
                    'name' => $faker->text(20), 
                    'description' => $faker->text(80), 
                    'image' => 'Ofiice Chaire_'.$i. '.jpg',
                    'stock' => $faker->numberBetween(1, 100),
                    'price' => $faker->randomFloat(2, 10, 1000),
                    'user_id' => 1, // User IDc fixed at 1 7it kolhom mn 3nd l admin
                    'category_id' => 1,
                ];
            }elseif ($i > 7 && $i <= 14) {
                $products[] = [
                    'name' => $faker->text(20), 
                    'description' => $faker->text(80), 
                    'image' => 'Club Chair_'.$i. '.jpg',
                    'stock' => $faker->numberBetween(1, 100),
                    'price' => $faker->randomFloat(2, 10, 1000),
                    'user_id' => 1, // User IDc fixed at 1 7it kolhom mn 3nd l admin
                    'category_id' => 2,
                ];
            }else{
                $products[] = [
                    'name' => $faker->text(20), 
                    'description' => $faker->text(80), 
                    'image' => 'Rocking Chair_'.$i. '.png',
                    'stock' => $faker->numberBetween(1, 100),
                    'price' => $faker->randomFloat(2, 10, 1000),
                    'user_id' => 1, // User IDc fixed at 1 7it kolhom mn 3nd l admin
                    'category_id' => 3,
                ];
            }
            
        }
        Product::insert($products);
    }
}
