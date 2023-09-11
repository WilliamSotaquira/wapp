<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'type' => 'required|string',
            'duration' => 'required|integer',
            'priority' => 'required|string',
            'status' => 'required|string',
            'progress' => 'nullable|integer',
            'predecessor' => 'nullable|integer',
            'notes' => 'nullable|string',
            'start_at' => 'nullable|date',
            'end_at' => 'nullable|date',
            // 'project_id' => 'required|integer',
            // 'sprint_id' => 'nullable|integer',

        ];


    }
}
