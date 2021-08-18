<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateListingRequests extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'condition' => 'required|string',
            'whatsapp_number' => 'nullable|string',
            'cell_number' => 'required|string',
            'email' => 'nullable|email',
            'location' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'currency' => 'required|string',
            'status' => 'required|boolean',
            'priority' => 'required|numeric',
            'featured_image' => 'required|image|max:20480',
            'image_2' => 'nullable|image|max:20480',
            'image_3' => 'nullable|image|max:20480',
        ];
    }
}