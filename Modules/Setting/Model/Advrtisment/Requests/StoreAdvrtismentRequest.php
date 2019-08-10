<?php

namespace Modules\Setting\Model\Advrtisment\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdvrtismentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:190',
            'description' => 'required|string|max:2000',
            

        ];
    }
}
