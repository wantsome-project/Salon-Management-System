<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Employee
 * @package App
 * @property integer  $id
 * @property integer  $user_id
 * @property string   $phone
 * @property integer  $payroll
 * @property Service  $services
 * @property User     $user
 */

class Employee extends Model
{
    protected $table = "employees";

    protected $fillable = [
        'phone',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, "employee_id", "id");
    }

    public function salary_payments()
    {
        return $this->hasMany(SalaryPayment::class, "employee_id", 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}



