<?php

namespace App\Http\Requests\BackPanel\Service_Type;

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
            "service_name" => [
                "required",
            ],
            "service_duration" => [
                "required",
            ],
            "service_description" => [
                "required",
            ],
            "price" => [
                "required",
                "numeric",
                "min:0",
            ],
        ];
    }

    public function attributes()
    {
        return [
            "service_name" => "service name",
        ];
    }
}

