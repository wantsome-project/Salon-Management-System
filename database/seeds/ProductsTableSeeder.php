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
            'type' => 'Sampon',
            'brand' => 'Nivea',
            'price' => '100',
            'quantity' => '2',
        ]);
        $product->save();

        $product = new Product([
            'type' => 'Vopsea de par',
            'brand' => 'Garnier',
            'price' => '50',
            'quantity' => '3',
        ]);
        $product->save();

        $product = new Product([
            'type' => 'Balsam de par',
            'brand' => 'Head & Shoulders',
            'price' => '40',
            'quantity' => '3',
        ]);
        $product->save();
    }
}
