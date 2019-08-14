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
            'OrderDetails_img'=>'nullable',
            'OrderDetails_nameAr'=>'required|string|max:190',
            'OrderDetails_nameEn'=>'required|string|max:190',
        ];
    }
}
