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
            "appointment.employee_id" => [
                "required",
                "numeric",
                "exists:employees,id",
            ],
            "appointment.service_type_id" => [
                "required",
                "numeric",
                "exists:service_types,id",
            ],
            "appointment.appointment_date" => [
                "required",
                "date",
            ],
            "appointment.appointment_time" => [
                "required",
                "string",
                "max:255",
            ],
        ];
    }

    public function attributes()
    {
        return [
            "appointment.employee_id" => "Employee",
            "appointment.service_type_id" => "Service type",
            "appointment.appointment_date" => "Pick a date",
            "appointment.appointment_time" => "Pick a time",
        ];
    }
}

