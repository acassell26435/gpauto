<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required',
            'email' => 'required',
            'sex' => 'required',
            'dob' => 'required|before:1995/01/01',
            'mobile' => 'required',
            'address' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg',
        ];
    }
}
