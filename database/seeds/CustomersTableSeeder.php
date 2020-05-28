<?php

use App\Customer;
use App\UserRoles;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer([
            'phone' => '0749851345'
        ]);
        $customer->save();

        $user = new User([
            'customer_id' => $customer->id,
            'name' => "kevin Space",
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random(5)),
        ]);
        $user->save();


        $customer = new Customer([
            'phone' => '074983413'
        ]);
        $customer->save();

        $user = new User([
            'customer_id' => $customer->id,
            'name' => "Barbara Space",
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random(5)),
        ]);
        $user->save();
    }

}
