<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // لو فيه صلاحيات اكتبها هنا
    }

    public function rules(): array
    {
        $rules = [];

        foreach (['ar','es', 'en', 'fr', 'it', 'de'] as $locale) {
            $rules["name_{$locale}"] = 'required|string|max:255';
            $rules["description_{$locale}"] = 'required|string';
        }

        $rules['date'] = 'required|date';
        $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png|max:2048';

        return $rules;
    }

    public function messages(): array
    {
        $messages = [];

        foreach (['ar','es', 'en', 'fr', 'it', 'de'] as $locale) {
            $messages["name_{$locale}.required"] = "Name ({$locale}) is required.";
            $messages["description_{$locale}.required"] = "Description ({$locale}) is required.";
        }

        return $messages;
    }
}
