<?php

namespace App\Http\Requests\BackPanel\ServiceType;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "service_type.name" => [
                "required",
                "string"
            ],
            "service_type.description" => [
                "required",
                "string"
            ],
            "service_type.duration" => [
                "required",
                "min:0"
            ],
            "service_type.price" => [
                "required",
                "numeric",
                "min:0",
            ],
        ];
    }

    public function attributes()
    {
        return [
            "service_type.name" => "name",
            "service_type.description" => "description",
            "service_type.duration" => "duration",
            "service_type.price" => "price"
        ];
    }
}
