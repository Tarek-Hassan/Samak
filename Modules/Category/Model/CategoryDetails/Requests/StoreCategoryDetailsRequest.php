<?php

namespace Modules\Category\Model\CategoryDetails\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryDetailsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titleAr'=>'required|string|max:190',
            'titleEn'=>'required|string|max:2000',
            'rate'=>'required|numeric|max:2000',
            'large'=>'required|numeric|max:190',
            'medium'=>'required|numeric|max:190',
            'small'=>'required|numeric|max:190',
            'discount'=>'nullable|numeric|max:190',
            'quantity'=>'nullable',

            'user_id'=>'required',
            'category_id'=>'required',



        ];
    }
}
