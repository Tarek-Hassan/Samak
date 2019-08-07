<?php

namespace Modules\Category\Model\Category\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_img'=>'nullable',
            'category_nameAr'=>'required|string|max:190',
            'category_nameEn'=>'required|string|max:190',
        ];
    }
}
