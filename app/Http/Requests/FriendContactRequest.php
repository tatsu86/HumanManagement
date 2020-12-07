<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FriendContactRequest extends FormRequest
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
            'contact_date' => 'required',
            'detail' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'contact_date.required' => '連絡日時は必ず入力してください。',
            'detail.required' => '内容は必ず入力してください。',
        ];
    }
}
