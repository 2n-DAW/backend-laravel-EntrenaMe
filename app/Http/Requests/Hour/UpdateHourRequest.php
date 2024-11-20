<?php

namespace App\Http\Requests\Hour;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHourRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_hour' => 'required|integer',
            'slot_hour' => 'required|string|max:255',
        ];
    }
}
