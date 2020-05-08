<?php
namespace App\Http\Requests\BackPanel\Service_Type;

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
            "service_type_name" => [
                "required",
            ],
            "service_type_description" => [
                "required",
            ],
            "service)_type_duration" => [
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
            "service_type_name" => "service type5 name",
        ];
    }
}
