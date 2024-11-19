<?php

namespace App\Http\Requests\Court;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourtRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_court' => 'required|integer',
            'n_court' => 'nullable|string|max:255',
            'img_court' => 'nullable|string|max:255',
            'slug_court' => 'nullable|string|max:255',
        ];
    }
}
