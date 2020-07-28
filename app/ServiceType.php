<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Class ServiceType
 * @package App
 *
 * @property integer $id
 * @property string  $name
 * @property string  $description
 * @property integer $duration
 * @property integer $price
 * @property string  $photo_name
 *
 */

class ServiceType extends Model
{
    protected $table = "service_types";

    protected $fillable = [
        'name',
        'description',
        'duration',
        'price',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, "service_type_id", "id");
    }
    public function employees()
    {
        return $this->hasMany(Employee::class, "employee_id", "id");
    }

    public function getPhotoUrl()
    {
        return asset("assets/service_type_images/".$this->photo_name);
    }
}
