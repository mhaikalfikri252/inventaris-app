<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AssetUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $asset_code = $this->request->get("asset_code");

        return [
            'asset_code' => ['required', 'max:255', Rule::unique('assets')->ignore($asset_code, 'asset_code')],
            'asset_name' => 'required', 'string', 'max:255',
            'facility_id' => 'required',
            'purchase_date' => 'required', 'date',
            'location' => 'required', 'max:255',
            'employee_id' => 'required',
            'price' => 'required', 'numeric', 'gte:1000000',
            'status_asset_id' => 'required',
            'information' => 'nullable', 'string',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
