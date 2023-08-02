<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('employee');

        return [
            'firstName' => 'required|min:2|max:100',
            'lastName' => 'required|min:2|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('employees')->ignore($userId),
            ],
            'phone' => 'nullable|string',
            'department_id' => 'required|exists:departments,id'
        ];
    }
}
