<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Employee
 * @package App
 * @property integer $id
 * @property string  $phone
 * @property integer $payroll
 * @property string  $photo_name
 * @property Service $services
 * @property User    $user
 * @property ServiceType $service_type_id
 */

class Employee extends Model
{
    protected $table = "employees";

    protected $fillable = [
        'phone',
        'service_type_id',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, "employee_id", "id");
    }

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, "service_type_id", "id");
    }

    public function salary_payments()
    {
        return $this->hasMany(SalaryPayment::class, "employee_id", 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, "employee_id", "id");
    }
    public function getPhotoUrl()
    {
        return asset("assets/employees_images/".$this->photo_name);
    }
}



