<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
/**
 *Class SalaryPayment
 *@property integer  $id
 *@property integer  $employee_id
 *@property integer  $paid
 *@property string   $description
 *@property Carbon   $created_at
 *@property Employee $employee
 *@property User     $user
 */


class SalaryPayment extends Model
{
    protected $table = "salary_payments";

    protected $fillable = [
        'employee_id',
        'paid',
        'description',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, "employee_id", "id");
    }
}
