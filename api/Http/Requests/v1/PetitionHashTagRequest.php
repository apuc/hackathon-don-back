<?php

namespace Api\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class PetitionHashTagRequest extends FormRequest
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
            'petition_id' =>  'required|integer',
            'hash_tag_id' => 'required|integer',
        ];
    }
}
