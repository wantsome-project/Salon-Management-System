<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Appointment
 * @package App
 * @property integer  $id
 * @property integer  $customer_id
 * @property integer  $service_type_id
 * @property integer  $employee_id
 * @property string   $status
 * @property array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Request|mixed|string appointment_time
 * @property mixed    appointment_date
 */
class Appointment extends Model
{
    const STATUS_ON_HOLD = "onHold";
    const STATUS_CONFIRMED = "confirmed";
    const STATUS_CANCELED = "canceled";

    protected $table = "appointments";

    protected $fillable = [
        'customer_id',
        'employee_id',
        'service_type_id',
        'status',
        'appointment_time',
        'appointment_date',
    ];

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
