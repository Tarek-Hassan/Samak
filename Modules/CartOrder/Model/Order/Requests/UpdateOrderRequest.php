<?php

namespace Modules\CartOrder\Model\Order\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'status'=>'required|string|max:190',
            'estimatedtime'=>'required|string|max:190',
            'country'=>'required|string|max:190',
            'city'=>'required|string|max:190',
            'street'=>'required|string|max:190',
            'deliveryfee'=>'required|numeric',
        ];
    }
}
