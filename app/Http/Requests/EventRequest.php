<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            //
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'starts_at' => 'required|date_format:H:i',
            'ends_at' => 'required|date_format:H:i'
            //'start_date' => 'required|date_format:Y-m-d',
            //'end_date' => 'required|date_format:Y-m-d',
        ];
    }
}
