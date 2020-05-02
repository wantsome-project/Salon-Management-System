<?php

use App\Employee;
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
        $employee = new Employee([
            'phone' => '0749982097',
            'payroll' => '2000'
        ]);
        $employee->save();

        $employee = new Employee([
            'phone' => '0749851345',
            'payroll' => '4500'
        ]);
        $employee->save();
    }
}
