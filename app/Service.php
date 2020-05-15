<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Service
 * @package App
 * @property integer      $id
 * @property integer      $customer_id
 * @property integer      $service_type_id
 * @property integer      $employee_id
 * @property integer      $price
 * @property ServiceType  $serviceType
 * @property Employee     $employee
 * @property Customer     $customers
 */

class Service extends Model
{
    protected $table = "services";


    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, "service_type_id", "id");
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, "employee_id", "id");
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, "customer_id", "id");
    }

}
