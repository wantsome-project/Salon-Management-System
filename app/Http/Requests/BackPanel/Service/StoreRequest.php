<?php

namespace App\Http\Requests\BackPanel\Service;

use App\UserRoles;
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
     * Prepare the data for validation.
     *
     * @return void
     */
    public function prepareForValidation()
    {
        $user = \Auth::user();
        if ($user->employee_id) {
            $all_inputs = $this->all();
            $all_inputs['service']["employee_id"] = $user->employee_id;
            $this->merge($all_inputs);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "service.employee_id" => [
                "required",
                "numeric",
                "exists:employees,id",
            ],

            "service.customer_id" => [
                "required",
                "numeric",
                "exists:customers,id",
            ],
            "service.service_type_id" => [
                "required",
                "numeric",
                "exists:service_types,id",
            ],

        ];
    }

    public function attributes()
    {
        return [
            "service.employee_id" => "Employee",
            "service.customer_id" => "Customer",
            "service.service_type_id" => "Payment details",
        ];
    }

}
