<?php

namespace Modules\PaymentMethod\Model\PaymentMethod\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StorePaymentMethodRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'PaymentMethod'=>'required|string|max:190',
        ];
    }
}
