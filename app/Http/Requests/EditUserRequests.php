<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequests extends FormRequest
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
            'name' => 'required|string|min:10|max:199',
            'email' => 'required|string|min:10|max:199',
            'role' => 'nullable|string|max:199',
            'national_id' => 'nullable|string|max:199',
            'address' => 'nullable|string|max:199',
            'cell_number' => 'nullable|string|max:199',
            'facebook' => 'nullable|string|max:199',
            'twitter' => 'nullable|string|max:199',
            'bio' => 'nullable|string',
            'instagram' => 'nullable|string|max:199',
            'avatar' => 'nullable|image|max:20480',
        ];
    }
}
