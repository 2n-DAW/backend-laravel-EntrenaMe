<?php

namespace App\Http\Requests\Month;

use Illuminate\Foundation\Http\FormRequest;

class StoreMonthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        
            'n_month' => 'required|string|max:255',
        ];
    }
}
