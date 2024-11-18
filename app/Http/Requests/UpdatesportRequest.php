<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_sport' => 'required|integer',
            'n_sport' => 'nullable|string|max:255',
            'img_sport' => 'nullable|string|max:255',
            'slug_sport' => 'nullable|string|max:255',
        ];
    }
}
