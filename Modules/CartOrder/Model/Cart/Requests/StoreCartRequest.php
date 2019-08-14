<?php

namespace Modules\CartOrder\Model\Cart\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Cart_img'=>'nullable',
            'Cart_nameAr'=>'required|string|max:190',
            'Cart_nameEn'=>'required|string|max:190',
        ];
    }
}
