<?php

use App\CustomerRequest;
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
        $this->call(CustomersTableSeeder::class);
        $this->call(ServiceTypesTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(SalaryPaymentsSeeder::class);
        $this->call(CustomerRequestsTableSeeder::class);
    }
}
