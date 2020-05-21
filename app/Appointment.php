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
 * @property string       $status
 * @property array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Request|mixed|string appointment_time
 * @property mixed appointment_date
 */

class Appointment extends Model
{
    protected $table = "appointments";

    public function customer()
    {
        return $this->belongsTo(Customer::class, "customer_id", "id");
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class, "employee_id", "id");
    }
    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, "service_type_id", "id");
    }

}
