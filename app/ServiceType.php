<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $table = "service_types";

    public function service()
    {
        return $this->belongsTo(Service::class, "id", "service_type_id");
    }
}
