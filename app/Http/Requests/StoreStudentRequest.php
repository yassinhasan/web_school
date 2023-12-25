<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Student;
class StoreStudentRequest extends FormRequest
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
        //     'title' => 'required|unique:posts|max:255',
    // 'author.name' => 'required',
    // 'author.description' => 'required',
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:students',
            'age' => 'required|numeric',
            'website' => 'nullable|url',
            'about' => 'nullable|string',
            'country' => 'required|string|min:3',
            'image' => 'file|mimes:jpg,jpeg,png,gif'
        ];
    }
}
