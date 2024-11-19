<?php

namespace App\Http\Requests\Sport;

use Illuminate\Foundation\Http\FormRequest;

class StoreSportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'n_sport' => 'required|string|max:255',
            'img_sport' => 'nullable|string|max:255',
            //'slug_sport' => 'nullable|string|max:255',
        ];
    }
}
