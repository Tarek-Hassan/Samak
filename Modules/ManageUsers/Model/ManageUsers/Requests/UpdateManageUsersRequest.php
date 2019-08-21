<?php

namespace Modules\ManageUsers\Model\ManageUsers\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateManageUsersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'name' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'phone'=>'nullable|numeric',
            'avatar'=>'nullable',

        ];
    }
}
