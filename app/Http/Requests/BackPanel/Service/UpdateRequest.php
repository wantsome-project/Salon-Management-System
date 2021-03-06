<?php

namespace App\Http\Requests\BackPanel\Service;

use App\Service;
use App\User;
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
        /* @var Service $service */
        $service = $this->route('service');
        $user = \Auth::user();

        return $user->is_admin || $user->employee_id == $service->employee_id;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    public function prepareForValidation()
    {
        $user = \Auth::user();
        if ($user->employee_id && !$user->is_admin) {
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
