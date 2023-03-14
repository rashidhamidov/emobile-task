<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCostumerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:150'],
            'surname' => ['required', 'max:150'],
            'birthday' => ['required', 'max:10'],
            'color' => ['required', 'max:150'],
            'year' => ['required', 'numeric', 'max:2023', 'min:2000'],
            'car_id' => ['required', 'exists:cars,id'],
        ];
    }
}
