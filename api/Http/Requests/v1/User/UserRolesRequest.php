<?php

namespace Api\Http\Requests\v1\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRolesRequest extends FormRequest
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
            'user_id' =>  'required|integer',
            'role_id' => 'required|integer',
        ];
    }
}
