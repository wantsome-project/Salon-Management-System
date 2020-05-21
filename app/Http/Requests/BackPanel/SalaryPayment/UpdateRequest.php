<?php

namespace App\Http\Requests\BackPanel\SalaryPayment;

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

            "salary_payment.paid" => [
                "required",
                "numeric",
                "min:0",
            ],
            "salary_payment.description" => [
                "required",
            ],
        ];
    }

    public function attributes()
    {
        return [
            "salary.payment.paid" => "Paid amount",
            "salary_payment.description" => "Payment details",
        ];
    }
}
