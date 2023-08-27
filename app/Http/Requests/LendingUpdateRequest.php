<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LendingUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $asset_id = $this->request->get("asset_id");

        return [
            'person_name' => 'required', 'string', 'max:255',
            'asset_id' => ['required', Rule::unique('lendings')->ignore($asset_id, 'asset_id')],
            'loan_date' => 'required', 'date',
            'return_date' => 'required', 'date',
            'status_lending_id' => 'required',
        ];
    }
}
