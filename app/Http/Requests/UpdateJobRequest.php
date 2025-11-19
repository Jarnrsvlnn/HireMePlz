<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
            'job_title' => 'sometimes|string|max:255',
            'salary' => 'sometimes|string',
            'description' => 'sometimes|string|max:100',
            'job_tier' => 'sometimes|nullable|string|in:Godlike,Legendary,Epic,Kinda mid,Uncommon,Common'
        ];
    }
}
