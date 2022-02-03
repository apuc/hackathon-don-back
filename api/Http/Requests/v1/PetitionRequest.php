<?php

namespace Api\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class PetitionRequest extends FormRequest
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
//            'user_id' => 'integer',
            'description' => 'required|string',

            'incident_category' => 'array|required',
            'incident_category.*.incident_category_id' => 'integer|required',

            'address' => 'array|required',
            'address.longitude' => 'required',
            'address.latitude' => 'required',
            'address.explanation' => 'string',

            'hashtag' => 'array',
            'hashtag.*.tag_id]' => 'numeric',

//            'mediafiles' => 'array',
//            'mediafiles.*.photo' => 'mimes:jpeg,bmp,png',
//            'mediafiles.*.video' => 'string',

            'photo' => 'mimes:jpeg,bmp,png',
            'video' => 'string',
        ];
    }
}
