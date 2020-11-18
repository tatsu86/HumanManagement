<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class friendRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|max:30',
            'name_kana' => 'string|max:30',
            'gender' => 'string|max:1',
            'feature' => 'string|max:255',
            // 'email' => 'sample@example.com',
        ];
    }
}
