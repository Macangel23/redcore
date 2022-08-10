<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

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
        $user_id = isset($this->user) ? $this->user : '';
        return [
            'full_name' => 'requiredunique:users,full_name,'.$user_id.',id',
            'email' => 'required|email|unique:users,email,'.$user_id.',id',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password|min:8',
            'role_id' => 'required'
        ];
    }
}
