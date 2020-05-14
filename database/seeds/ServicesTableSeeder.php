<?php

use App\Customer;
use App\Employee;
use App\Service;
use App\ServiceType;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = Customer::query()
            ->orderBy('id')
            ->first();
        if (!$customer) {
            die('Please run customers seed before services seed');
        }
        $employee = Employee::query()
            ->orderBy('id')
            ->first();
        if (!$employee) {
            die('Please run employee seed before services seed');
        }

        $service_type = ServiceType::query()
            ->orderBy('id')
            ->first();

        if (!$employee) {
            die('Please run service type seed before services seed');
        }
        $service = new Service([
            'customer_id'  => $customer->id,
            'employee_id'  => $employee->id,
            'service_type_id' => $service_type->id,
            'price' => '100',
        ]);
        $service->save();

        $customer = Customer::query()
            ->orderBy('id', 'desc')
            ->first();
        if (!$customer) {
            die('Please run customers seed before services seed');
        }
        $employee = Employee::query()
            ->orderBy('id', 'desc')
            ->first();
        if (!$employee) {
            die('Please run employee seed before services seed');
        }

        $service_type = ServiceType::query()
            ->orderBy('id', 'desc')
            ->first();

        if (!$employee) {
            die('Please run service type seed before services seed');
        }
        $service = new Service([
            'customer_id'  => $customer->id,
            'employee_id'  => $employee->id,
            'service_type_id' => $service_type->id,
            'price' => '100',
        ]);
        $service->save();


    }
}
