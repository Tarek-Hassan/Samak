<?php

namespace Modules\CartOrder\Model\Cart\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
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
