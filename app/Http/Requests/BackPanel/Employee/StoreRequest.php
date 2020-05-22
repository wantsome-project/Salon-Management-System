<?php

namespace App\Http\Requests\BackPanel\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
                "string",
                "max:255"
            ],
            "user.email" => [
                "required",
                "string",
                "email",
                "max:255",
            ],
            "user.password" => [
                "required",
                "string",
                "min:8",
                "confirmed"
            ],
            "employee.title" => [
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
            ]
        ];
    }

    public function attributes()
    {
        return [
            "user.name" => "name",
            "user.email" => "email",
            "user.password" => "password",
            "employee.phone" => "phone",
            "employee.payroll" => "payroll",
        ];
    }
}
