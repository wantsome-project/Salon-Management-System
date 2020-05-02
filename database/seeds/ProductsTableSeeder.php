<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
            'product_type' => 'Sampon',
            'product_brand' => 'Nivea',
            'price' => '100'
        ]);
        $product->save();

        $product = new Product([
            'product_type' => 'Vopsea de par',
            'product_brand' => 'Garnier',
            'price' => '50'
        ]);
        $product->save();

        $product = new Product([
            'product_type' => 'Balsam de par',
            'product_brand' => 'Head & Shoulders',
            'price' => '40'
        ]);
        $product->save();
    }
}
