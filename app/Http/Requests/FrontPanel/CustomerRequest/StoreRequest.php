<?php

namespace App\Http\Requests\FrontPanel\CustomerRequest;

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
            "customer_request.name" => [
                "required",
                "string"
            ],
            "customer_request.email" => [
                "required",
                "string",
                "email",
                "max:255",
            ],
            "customer_request.phone" => [
                "required",
                "numeric",
            ],
            "customer_request.subject" => [
                "required",
                "string"
            ],

            "customer_request.message" => [
                "required",
                "string",
            ],
        ];
    }

    public function attributes()
    {
        return [
            "customer_request.name" => "Name",
            "customer_request.email" => "Email",
            "customer_request.phone" => "Phone",
            "customer_request.subject" => "Subject",
            "customer_request.message" => "Message",
        ];
    }
}
