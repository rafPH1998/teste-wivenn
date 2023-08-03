<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:2|max:100|string',
            'description' => 'nullable|min:2|max:100|string',
            'employee_id' => 'required|exists:employees,id'
        ];
    }
}
