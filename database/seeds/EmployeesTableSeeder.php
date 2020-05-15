<?php

use App\Employee;
use App\User;
use App\UserRoles;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'role_id' => UserRoles::EMPLOYEE,
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random(5)),
        ]);
        $user->save();

        $employee = new Employee([
            'user_id' => $user->id,
            'phone' => '0749982097',
            'title' => 'hairstylist',
            'payroll' => '2000',
        ]);
        $employee->save();

        $user = new User([
            'role_id' => UserRoles::EMPLOYEE,
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random(5)),
        ]);
        $user->save();
        $employee = new Employee([
            'user_id' => $user->id,
            'phone' => '0749851345',
            'title' => 'stylist',
            'payroll' => '4500',
        ]);
        $employee->save();
    }
}
