<?php

namespace App\Http\Requests\BackPanel\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "appointment.customer_id" => [
                "required",
                "numeric",
                "exists:customers,id",
            ],

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
            "appointment.status" => [
                "required",
            ],
            "appointment.appointment_time" => [
                "required",
            ],
            "appointment.appointment_date" => [
                "required",
            ],
        ];
    }

    public function attributes()
    {
        return [
            "appointment.customer_id" => "Customer",
            "appointment.employee_id" => "Employee",
            "appointment.service_type_id" => "Payment details",
            "appointment.status" => "Status",
            "appointment.appointment_time" => "Time",
            "appointment.appointment_date" => "Date",
        ];
    }

}
