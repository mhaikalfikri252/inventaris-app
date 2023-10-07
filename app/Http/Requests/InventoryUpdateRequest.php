<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'inventory_name' => 'required|string|max:255',
            'facility_id' => 'required',
            'purchase_date' => 'required|date',
            'location' => 'required|max:255',
            'employee_id' => 'required',
            'price' => 'required|numeric',
            'information' => 'nullable|string',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
