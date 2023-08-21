<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => 'required', 'string', 'max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($email, 'email')],
            'role_id' => 'required',
            'city_id' => 'required',
        ];
    }
}
