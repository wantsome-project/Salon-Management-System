<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";

    public function employee()
    {
        return $this->belongsTo(Service::class, "employee_id", "id");
    }
}
