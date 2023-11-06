<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Toys'],
            ['name' => 'Health & Beauty'],
            ['name' => 'Grocery'],     
            ['name' => 'Jewelery & Watches'],
        ];

        DB::table('product_categories')->insert($categories);
    }
}
