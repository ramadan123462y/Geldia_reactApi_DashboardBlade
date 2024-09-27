<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'main_title' => 'required',
            'title.*' => 'required',
            'froala_content.*' => 'required',
            'articlesubcategorie_id' => 'required|exists:articlesubcategories,id',
            'user_id' => 'required|exists:users,id',
            'is_new' => 'nullable|date|after:today',
            'banner' => 'sometimes|required|image',
            'video' => 'sometimes|file|mimes:mp4,avi,mov,webm|max:20000',
            'before' => 'sometimes|image',
            'after' => 'sometimes|image',
        ];
    }

    public function messages(): array
    {
        return [
            'froala_content.*.required' => 'The details input section  is required.',

        ];
    }
}
