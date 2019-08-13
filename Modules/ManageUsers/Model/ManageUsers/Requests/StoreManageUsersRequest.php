<?php

namespace Modules\ManageUsers\Model\ManageUsers\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreManageUsersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'avatar'=>'nullable',



        ];
    }
}
