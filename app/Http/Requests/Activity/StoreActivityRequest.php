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
            'spots' => 'required|integer'

        ];
    }
}
