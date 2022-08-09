<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    { 
        $user_id = isset($this->user->id) ? $this->user->id : '';
        return [
            'full_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user_id.',id',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8',
            'role_id' => 'required'
        ];
    }
}
