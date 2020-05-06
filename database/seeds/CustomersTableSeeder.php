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
        $user = new User([
            'role_id' => UserRoles::CUSTOMER,
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random(5)),
        ]);
        $user->save();

        $customer = new Customer([
            'user_id' => $user->id,
            'phone' => '0749851345'
        ]);
        $customer->save();

        $user = new User([
            'role_id' => UserRoles::CUSTOMER,
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random(5)),
        ]);
        $user->save();

        $customer = new Customer([
            'user_id' => $user->id,
            'phone' => '074983413'
        ]);
        $customer->save();
    }

}
