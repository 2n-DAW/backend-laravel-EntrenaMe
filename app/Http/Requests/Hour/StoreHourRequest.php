<?php

namespace App\Http\Requests\Hour;

use Illuminate\Foundation\Http\FormRequest;

class StoreHourRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        
            'slot_hour' => 'required|string|max:255',
        ];
    }
}
