<?php

namespace App\Http\Requests\Activity;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_activity' => 'required|integer',
            'id_user_instructor' => 'required|string|max:255',
            'n_activity' => 'required|string|max:255',
            'spots' => 'required|integer',
            'spots_available' => 'required|integer',
            'description' => 'nullable|string|max:255',
            'img_activity' => 'nullable|string|max:255',
            'slot_hour' => 'required|string|max:255',
            'week_day' => 'required|string|max:255',
            'id_sport' => 'required|integer',
        ];
    }
    
}
