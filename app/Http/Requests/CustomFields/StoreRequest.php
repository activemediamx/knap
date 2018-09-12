<?php

namespace App\Http\Requests\CustomFields;

use App\Http\Requests\CoreRequest;

class StoreRequest extends CoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {
        $user = $this->user();
        return $user->can('manage-custom-fields');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        \Validator::extend('not_custom_fields', function($attribute, $value, $parameters, $validator) {
            $userColumns = \Schema::getColumnListing('users');

            if(!in_array($this->get('label'), $userColumns)){
                return true;
            }

            return false;
        });

        return [
            'label'     => 'required|unique:custom_fields|not_custom_fields',
            'name'      => 'required|unique:custom_fields|alpha_dash',
            'required'  => 'required',
            'type'      => 'required'
        ];
    }

}
