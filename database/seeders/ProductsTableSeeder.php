<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        $categories = [1, 2, 3, 4];

        foreach ($categories as $categoryId) {
            for ($i = 1; $i <= 4; $i++) {
                DB::table('products')->insert([
                    'product_category_id' => $categoryId,
                    'name' => "Product " . $i,
                    'price' => rand(10, 100),
                    'description' => "Description of Product " . $i .  " in category " . $categoryId,                    
                    'tags' => 'tag1, tag2, tag3',
                    'image' => 'products/sampleProductImage.jpg'
                ]);
            }
        }
    }
}
