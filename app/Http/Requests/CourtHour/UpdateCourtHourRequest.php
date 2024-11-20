<?php

namespace App\Http\Requests\CourtHour;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourtHourRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_court_hour' => 'required|integer',
            'id_court' => 'nullable|integer',
            'id_hour' => 'nullable|integer',
            'day_number' => 'nullable|integer'
        ];
    }
}
