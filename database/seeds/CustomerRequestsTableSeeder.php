<?php

use App\CustomerRequest;
use Illuminate\Database\Seeder;

class CustomerRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $customer_request = new CustomerRequest([
                'name' => 'ana',
                'email' => Str::random(10).'@gmail.com',
                'phone' => '0749851345',
                'subject' => Str::random(15),
                'message'=>Str::random(30),
            ]);
            $customer_request->save();

            $customer_request = new CustomerRequest([
                'name' => 'maria',
                'email' => Str::random(10).'@gmail.com',
                'phone' => '0749854345',
                'subject' => Str::random(15),
                'message'=>Str::random(30),
            ]);
            $customer_request->save();
        }
    }
}
