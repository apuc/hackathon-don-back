<?php

namespace Api\Http\Requests\v1\User\Notification;

use Illuminate\Foundation\Http\FormRequest;

class CheckAuthCodeRequest extends FormRequest
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
            'code' => 'required|integer',
            'user_id' => 'required|integer',
        ];
    }
}
