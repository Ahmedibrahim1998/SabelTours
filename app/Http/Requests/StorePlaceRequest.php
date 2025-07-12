<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlaceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];

        foreach (['ar','es','en','fr','it','de'] as $locale) {
            $rules["name_$locale"] = 'required|string|max:255';
            $rules["short_description_$locale"] = 'required|string|max:1000';
        }

        $rules['governorate_id'] = 'required|exists:governorates,id';
        $rules['location'] = 'nullable|string|max:255';
        $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048';
        $rules['image_url'] = 'nullable|url';

        return $rules;
    }

    public function messages(): array
    {
        $messages = [];

        foreach (['ar','es','en','fr','it','de'] as $locale) {
            $messages["name_$locale.required"] = "The name in ($locale) is required.";
            $messages["short_description_$locale.required"] = "The short description in ($locale) is required.";
        }

        $messages['governorate_id.required'] = "Governorate is required.";
        $messages['governorate_id.exists'] = "Selected governorate does not exist.";
        $messages['image.image'] = "Uploaded file must be an image.";
        $messages['image_url.url'] = "Image URL must be a valid URL.";

        return $messages;
    }
}
