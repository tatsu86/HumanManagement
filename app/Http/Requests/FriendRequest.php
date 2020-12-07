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
            'name' => 'required|string|max:30',
            'name_kana' => 'string|max:30',
            'gender' => 'string|max:1',
            'feature' => 'string|max:255',
        ];
    }

    public function messages()
    {
        return [
          'name.required' => '名前は必ず入力してください。',
          'name.max' => '名前は30文字以内で入力してください。',
          'name_kana.required' => '名前カナは必ず入力してください。',
          'name_kana.max' => '名前カナは30文字以内で入力してください。',
          
        ];
    }
}
