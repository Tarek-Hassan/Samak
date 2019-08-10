<?php

namespace Modules\Setting\Model\Info\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreInfoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'phone'=>'required|numeric',
'address'=>'required|string|max:190',
'website'=>'required|url',
'email'=>'required|email|max:190',
'cuttingprice'=>'required|numeric',
'cleaningprice'=>'required|numeric',
'cookingprice'=>'required|numeric',
'deliveryprice'=>'required|numeric',


        ];
    }
}

