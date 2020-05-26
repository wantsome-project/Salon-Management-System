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
            'type' => 'Shampoo',
            'brand' => "L'Oreal",
            'price' => '100',
            'quantity' => '2',
            'photo_name' => 'one.jpeg',

        ]);
        $product->save();

        $product = new Product([
            'type' => 'Hair color',
            'brand' => "L'Oreal",
            'price' => '50',
            'quantity' => '3',
            'photo_name' => 'two.jpeg',

        ]);
        $product->save();

        $product = new Product([
            'type' => 'Hair conditioner',
            'brand' => "L'Oreal",
            'price' => '40',
            'quantity' => '3',
            'photo_name' => 'three.jpeg',

        ]);
        $product->save();
    }
}
