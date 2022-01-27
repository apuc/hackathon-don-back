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
//            'user_id' => 'numeric',
//            'description' => 'required',
//            "incident_category": [],
//            "address": {
//                "longitude": "96.399017",
//                "latitude": "-89.085191",
//                "explanation": "AsB8TQozQs2UeXQwYcBqTjTPhrldQtADUJpwK62nVVDnaiQ29QtkXsbfUf7Sp9LdzspCZEjVM65hRFqMueFaRuoXE4logftN6HMx",
//            },
//            "mediafile": [],
//        "hash_tag": []
        ];


    }
}
