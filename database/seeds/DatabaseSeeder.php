<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(EmployeesTableSeeder::class);
        // $this->call(ServicesTableSeeder::class);
        // $this->call(ServiceTypesTableSeeder::class);
        // those wont work until we finish the other seeders
        $this->call(ProductsTableSeeder::class);
    }
}
