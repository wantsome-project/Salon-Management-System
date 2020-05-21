<?php

use App\Employee;
use App\SalaryPayment as SalaryPayment;
use App\User;
use App\UserRoles;
use Illuminate\Database\Seeder;

class SalaryPaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $employee = Employee::query()
            ->orderBy('id')
            ->first();
        if (!$employee) {
            die('Please run employee seed before salaryPayments seed');
        }

        $salary_payment = new SalaryPayment([
            'employee_id'  => $employee->id,
            'paid' => '100',
            'description' => Str::random(10),
        ]);
        $salary_payment->save();

        $employee = Employee::query()
            ->orderBy('id')
            ->first();
        if (!$employee) {
            die('Please run employee seed before salaryPayments seed');
        }

        $salary_payment = new SalaryPayment([
            'employee_id'  => $employee->id,
            'paid' => '200',
            'description' => Str::random(10),
        ]);
        $salary_payment->save();
    }
}
