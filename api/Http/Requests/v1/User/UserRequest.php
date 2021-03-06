<?php

namespace Api\Http\Requests\v1\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'password' => 'required',
            'email' => 'email',
            'phone' => 'required|numeric',

            'address' => 'array',
            'address.longitude' => 'string',
            'address.latitude' => 'string',
            'address.explanation' => 'string',

            'fio' => 'string',
            'photo' => 'mimes:jpeg,bmp,png',

            'roles' => 'array',
            'hashtag.*.role_id]' => 'numeric',
        ];

    }
}
