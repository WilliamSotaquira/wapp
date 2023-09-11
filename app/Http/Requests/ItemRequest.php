<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
        if (request()->routeIs('items.store')) {
            $code = 'required|unique:items';
        } else {
            $code = 'required|unique:items,code,' . $this->item->id;
        }

        return [

            'name' => 'required',
            'code' => $code,
            'performance' => 'required',
            'score' => 'required',
            'cost' => 'required',
        ];
    }
}
