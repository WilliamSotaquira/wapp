<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        // if (request()->routeIs('items.store')) {
        //     $code = 'required|unique:items';
        // } else {
        //     $code = 'required|unique:items,code,' . $this->item->id;
        // }

        return [

            'details' => 'max:250',
            'payment' => 'required | numeric',
            'grand' => 'required | numeric',
            'status' => 'required',
            'type' => 'required',
            'transaction_date' => 'required',


            // 'payment_installments' => 'required',
            // 'payment_number' => 'required',
            // 'autorization_number' => 'required',
            // 'agreed_rate' => 'required',
            // 'billed_EA' => 'required',

            // 'budget_id' => 'required',
            // 'category_id' => 'required',
            // 'user_id' => 'required',


        ];
    }
    }
}
