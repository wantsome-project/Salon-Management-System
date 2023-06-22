<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

/**
 * Class Appointment
 * @package App
 * @property integer  $id
 * @property integer  $customer_id
 * @property integer  $service_type_id
 * @property integer  $employee_id
 * @property string   $status
 * @property array|Application|Request|mixed|string appointment_time
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

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, "customer_id", "id");
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, "employee_id", "id");
    }

    public function serviceType(): BelongsTo
    {
        return $this->belongsTo(ServiceType::class, "service_type_id", "id");
    }

}
