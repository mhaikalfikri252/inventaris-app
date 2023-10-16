<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $username = $this->request->get("username");

        return [
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($username, 'username')],
            'email' => 'required', 'email', 'max:255',
            'password' => ['required', Password::min(8)->letters()->numbers()],
            'role_id' => 'required',
            'city_id' => 'required',
        ];
    }
}
