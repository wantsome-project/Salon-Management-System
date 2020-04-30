<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $table = "service_types";

    public function service()
    {
        return $this->hasMany(Service::class, "service_type_id", "id");
    }
}
