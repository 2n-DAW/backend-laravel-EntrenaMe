<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSportRequest extends FormRequest
{
    public function authorize()
    {
        error_log('authorize');
        return true;
    }

    public function rules()
    {
        error_log('rules');
        return [
            'n_sport' => 'required|string|max:255',
            'img_sport' => 'nullable|string',
            'slug_sport' => 'required|string|unique:sports,slug_sport',
        ];
    }
}