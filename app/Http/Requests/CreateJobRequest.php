<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateJobRequest extends FormRequest
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
            'job_title' => 'required|string|min:3|max:255',
            'salary' => 'required|string',
            'description' => 'required|string|min:3',
            'job_tier' => 'required|string|in:Godlike,Legendary,Epic,Kinda mid,Uncommon,Common',
            'category' => 'required|string|in:Technology,Design & Creative,Business Management,Sales & Marketing,Finance & Accounting,Human Resources,Customer Service,Healthcare,Education,Engineering,Construction & Trades,Legal,Media & Communication,Hospitality & Tourism,Logistics & Transportation,Retail & E-commerce,Government & Public Service,Science & Research','Agriculture,Maintenance & Services,Arts & Entertainment,Other'
        ];
    }
}
