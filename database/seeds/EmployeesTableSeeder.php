<?php

use App\Employee;
use App\ServiceType;
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

        $service_type = ServiceType::query()
            ->orderBy('id', 'desc')
            ->first();

        $employee = new Employee([
            'phone' => '0749982097',
            'service_type_id' => $service_type->id,
            'payroll' => '2000',
            'photo_name' => 'one.jpeg'
        ]);
        $employee->save();

        $user = new User([
            'employee_id' => $employee->id,
            'name' => "Mike Nice ",
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random(5)),
        ]);
        $user->save();


        $service_type = ServiceType::query()
            ->orderBy('id', 'desc')
            ->first();

        $employee = new Employee([
            'phone' => '0749851345',
            'service_type_id' => $service_type->id,
            'payroll' => '4500',
            'photo_name' => "two.jpeg"
        ]);
        $employee->save();

        $user = new User([
            'employee_id' => $employee->id,
            'name' => "Michael Bob ",
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random(5)),
        ]);
        $user->save();
    }
}
