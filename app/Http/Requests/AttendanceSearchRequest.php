<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceSearchRequest extends FormRequest
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
            'student_id' =>'required',
            'from'=> 'required',
            'to'=> 'required|after_or_equal:from'
        ];
    }
    public function messages(): array
    {
        return [
            'from.required' => 'start date required',
            'to.required' => 'end date required',
            "to.after_or_equal" => 'end date must be equal start date or later',
        ];
    }

}
