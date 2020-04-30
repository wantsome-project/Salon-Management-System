<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";

    public function services()
    {
        return $this->hasMany(Service::class, "employee_id", "id");
    }

    public function users()
    {
        return $this->belongsTo(Users::class, "user_id", "id");
    }
}
