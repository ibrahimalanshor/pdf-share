<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;

class CreateFileRequest extends FormRequest
{

    public function prepareForValidation()
    {
        $this->merge([
            'category' => explode(',', $this->category),
            'slug' => $this->name
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:files',
            'category' => 'required|array',
            'writer' => 'required|string',
            'description' => 'required|string|min:50',
            'cover' => 'required|image|max:5000',
            'file' => 'required|mimes:pdf|max:5000'
        ];
    }
}
