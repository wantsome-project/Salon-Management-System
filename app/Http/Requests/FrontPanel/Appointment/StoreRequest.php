<?php

namespace App\Http\Requests\FrontPanel\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "employee_id" => [
                "required",
                "numeric",
                "exists:employees,id",
            ],
            "service_type_id" => [
                "required",
                "numeric",
                "exists:service_types,id",
            ],
            "appointment_date" => [
                "required",
                "date",
            ],
            "appointment_time" => [
                "required",
                "string",
                "max:255",
            ],
        ];
    }

    public function attributes()
    {
        return [
            "employee_id" => "Employee",
            "service_type_id" => "Service type",
            "appointment_date" => "Pick a date",
            "appointment_time" => "Pick a time",
        ];
    }
}

