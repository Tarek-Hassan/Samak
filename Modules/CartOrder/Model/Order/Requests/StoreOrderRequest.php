<?php

namespace Modules\CartOrder\Model\Order\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Order_img'=>'nullable',
            'Order_nameAr'=>'required|string|max:190',
            'Order_nameEn'=>'required|string|max:190',
        ];
    }
}
