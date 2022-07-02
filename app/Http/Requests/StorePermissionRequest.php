<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
        return [
            'name' => 'required|max:255',
            'display_name' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'A Role Name is required',
            'display_name.required' => 'A Role Display Name is required',

        ];
    }
}
