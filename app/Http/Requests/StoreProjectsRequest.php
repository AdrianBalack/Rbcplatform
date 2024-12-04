<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectsRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'slug' => 'required|string|max:255|unique:Project',
            'description' => 'nullable|string',
            'goal_amount' => 'required|numeric|min:1',
            'current_amount' => 'required|numeric|min:1',
            'start_date' => 'required|datetime',
            'end_date' => 'required|datetime',

        ];
    }
}
