<?php

namespace App\Http\Requests\CourtHour;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourtHourRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_court' => 'required|integer',
            'id_hour' => 'required|integer',
            'day_number' => 'required|integer'
        ];
    }
}
