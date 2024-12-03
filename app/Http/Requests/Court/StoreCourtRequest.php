<?php

namespace App\Http\Requests\Court;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourtRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'n_court' => 'required|string|max:255',
            'img_court' => 'nullable|string|max:255',
        ];
    }
}
