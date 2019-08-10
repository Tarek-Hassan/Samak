<?php

namespace Modules\Setting\Model\AboutUs\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreAboutUsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'bodyAr' => 'required|string|max:2000',
            'bodyEn' => 'required|string|max:2000',


        ];
    }
}
