<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequestUpdator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return z;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'customer_id'=>'required',
           'payment_number'=>'required',
           'receipt_number'=>'required',
           'amount'=>'required',
           'status'=>'required',
        ];
    }
}
