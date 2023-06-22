<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 * @property Customer     $customer
 */

class Service extends Model
{
    protected $table = "services";
    protected $fillable = [
        'employee_id',
        'customer_id',
        'service_type_id',
    ];

    /**
     * @return BelongsTo
     */
    public function serviceType(): BelongsTo
    {
        return $this->belongsTo(ServiceType::class, "service_type_id", "id");
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, "employee_id", "id");
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, "customer_id", "id");
    }

}
