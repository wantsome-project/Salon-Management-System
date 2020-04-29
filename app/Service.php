<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "services";

    public function service()
    {
        return $this->hasOne(ServiceType::class, "service_type_id", "id");
    }
}
