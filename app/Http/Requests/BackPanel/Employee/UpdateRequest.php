<?php

namespace App\Http\Requests\BackPanel\Employee;

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
            "user.name" => [
                "required",
            ],
            "employee.service_type_id" => [
                "required",
                "string",
                "max:255"
            ],
            "employee.phone" => [
                "required",
                "numeric",
            ],
            "employee.payroll" => [
                "required",
                "numeric",
                "min:0",
            ],

            'employee.image' => [
                'nullable',
                'image',
            ],
        ];
    }
    public function attributes()
    {
        return [
            "user.name" => "name",
            "employee.service_type_id" => "Service provided",
            "employee.phone" => "phone",
            "employee.payroll" => "payroll",
        ];
    }
}
