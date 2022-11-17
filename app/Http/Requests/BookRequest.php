<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
    
    /**
     * Set rules validasi yang diperlukan untuk tiap field
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'author_id' => ['required'],
            'published_year' => ['required']
        ];
    }
}
