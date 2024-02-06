<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamCreateRequest extends FormRequest
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
            'email' => 'required|unique:teams',
            'sex' => 'required',
            'mobile' => 'required|unique:teams',
            'dob' => 'required|before:1995/01/01',
            'address' => 'required',
            'post' => 'required',
            'status' => 'required',
            'join_date' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg',
        ];
    }
}
