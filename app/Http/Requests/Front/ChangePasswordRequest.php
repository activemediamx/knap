<?php

namespace App\Http\Requests\Front;

use App\Http\Requests\CoreRequest;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends CoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];
    }
}
