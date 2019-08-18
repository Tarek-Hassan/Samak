<?php

namespace Modules\CartOrder\Model\OrderDetails\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderDetailsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'quantity'=>'required|numeric',
            'size'=>'required|numeric',
            'cooked'=>'required|numeric',
            'cutting'=>'required|numeric',
            'cleaned'=>'required|numeric',
        ];
    }
}
