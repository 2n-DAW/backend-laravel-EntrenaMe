<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        //return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'fname.required' => 'El :attribute es obligatorio',
            'lname.required' => 'Añade un :attribute al student',
            'email.required' => 'Añade un :attribute al student',
            'password.required' => 'Añade un :attribute al student',
        ];
    }
   
    public function attributes()
    {
        return [
            'fname' => 'name of student',
            'lname' => 'lname of student',
            'email' => 'email of student',
            'password' => 'password of student',
        ];
    }
}
