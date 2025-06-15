<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name'=>'pompa',
            'description'=>'pompa air',
            'sku'=>'pompa098',
            'price'=>'200000',
            'stock'=>'5',
            'category_id'=>'1'
        ]);
    }
}
