<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        return [
            'type'=>'required|in:1,2,3',
            'table_number'=>'required_if:type,==,1|integer|min:1',
            'service_charger'=>'required_if:type,==,1|numeric|min:0',
            'waiter_name'=>'required_if:type,==,1|min:5|max:255',
            'delivery_fees'=>'required_if:type,==,2|numeric|min:0',
            'customer_phone'=>'required_if:type,==,2|min:5|min:30',
            'customer_name'=>'required_if:type,==,2|min:5|max:255',
            'items.*.item_id'=>'required|exists:items,id',
            'items.*.number_items'=>'required|integer|min:1'
        ];
    }
}
