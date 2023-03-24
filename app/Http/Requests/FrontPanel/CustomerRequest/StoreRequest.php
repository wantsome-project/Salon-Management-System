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
            "name" => [
                "required",
                "string"
            ],
            "email" => [
                "required",
                "string",
                "email",
                "max:255",
            ],
            "phone" => [
                "required",
                "numeric",
            ],
            "subject" => [
                "required",
                "string"
            ],

            "message" => [
                "required",
                "string",
            ],
        ];
    }

    public function attributes()
    {
        return [
            "name" => "Name",
            "email" => "Email",
            "phone" => "Phone",
            "subject" => "Subject",
            "message" => "Message",
        ];
    }
}
