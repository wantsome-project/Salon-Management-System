<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "services";

    public function serviceType()
    {
        return $this->hasOne(ServiceType::class, "service_type_id", "id");
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, "employee_id", "id");
    }
}
}
