<?php

namespace App\Http\Requests\BackPanel\Product;

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
            "product.type" => [
                "required",
            ],
            "product.brand" => [
                "required",
            ],
            "product.quantity" => [
                "required",
                "numeric",
                "min:0",
            ],
            "product.price" => [
                "required",
                "numeric",
                "min:0",
            ],
            "product.image" => [
                "nullable",
                "image",
            ],
        ];
    }

    public function attributes()
    {
        return [
            "product.type" => "product type",
            "product.brand" => "product brand",
            "product.quantity" => "product quantity",
            "product.price" => "product price",
            "product.image" => "image"
        ];
    }
}
