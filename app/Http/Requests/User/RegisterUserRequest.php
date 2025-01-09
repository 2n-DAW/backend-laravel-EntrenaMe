<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'img_user' => 'nullable|string|max:255',
            'email' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'img_user' => $this->img_user ?? 'porfile.png',
        ]);
    }
}