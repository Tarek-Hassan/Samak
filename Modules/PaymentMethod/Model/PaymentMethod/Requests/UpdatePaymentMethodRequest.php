<?php

namespace Modules\PaymentMethod\Model\PaymentMethod\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentMethodRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'paymentmethod'=>'required|string|max:190',
        ];
    }
}
