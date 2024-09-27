<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'settings.Facebook' => 'nullable|url',
            'settings.Instagram' => 'nullable|url',
            'settings.Twitter' => 'nullable|url',
            'settings.TikTok' => 'nullable|url',
            'settings.LinkedIn' => 'nullable|url',
            'settings.YouTube' => 'nullable|url',
            'settings.Email' => 'email',
        ];
    }
}
