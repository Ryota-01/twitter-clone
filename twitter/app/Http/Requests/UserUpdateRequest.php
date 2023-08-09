<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns',
        ];
    }

    public function messages()
    {
        return [
            'email.requires' => 'メールアドレスは必須です',
            'email.email' => '有効なメールアドレスを入力してください',
        ];
    }
}