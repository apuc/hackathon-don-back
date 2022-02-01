<?php

namespace Api\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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

            'fio' => 'required|string',
            'photo' => 'mimes:jpeg,bmp,png',

            'user_id' => 'required|integer',
            'address_id' => 'integer',

        ];

    }
}
