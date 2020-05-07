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
            ],
            "user.email" => [
                "required",
            ],
            "user.password" => [
                "required",
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
