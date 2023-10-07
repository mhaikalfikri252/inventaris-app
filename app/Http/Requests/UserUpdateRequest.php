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
        $email = $this->request->get("email");

        return [
            'username' => 'required', 'string', 'max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($email, 'email')],
            'password' => ['required', Password::min(8)->letters()->numbers()],
            'role_id' => 'required',
            'city_id' => 'required',
        ];
    }
}
