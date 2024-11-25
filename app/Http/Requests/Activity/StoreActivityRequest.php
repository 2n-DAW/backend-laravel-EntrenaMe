<?php

namespace App\Http\Requests\Activity;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_user_instructor' => 'required|integer',
            'n_activity' => 'required|string|max:255',
            'spots' => 'required|integer',
            'description' => 'nullable|string|max:255',
            'img_activity' => 'nullable|string|max:255',
            'slot_hour' => 'required|string|max:255',
            'week_day' => 'required|string|max:255',
        ];
    }
    
    protected function prepareForValidation()
    {
        $this->merge([
            'description' => $this->description ?? '',
            'img_activity' => $this->img_activity ?? 'activity.png',
        ]);
    }
}
