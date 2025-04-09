<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required|string|min:3|max:128",
            "email"=>"required|email|unique:users",
            "password"=>"required|string|min:8|max:128|confirmed",
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            "name.required"=>"user name is required",
            "name.min"=>"name must be at least 3 characters",
            "name.max"=>"name must be at most 128 characters",
            "email.required"=>"user email is required",
            "email.email"=>"email must be a valid ",
            "email.unique"=>"email already exists",
            "password.required"=>"password is required",
            "password.min"=>"password must be at least 8 characters",
            "password.max"=>"password must be at most 128 characters",
            "password.confirmed"=>"password confirmation does not match",
        ];
    }
}
