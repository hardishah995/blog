<?php

namespace App\Http\Requests\Backend\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-student');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
        ];
    }

    public function messages()
    {
        return [
                'first_name.required' => 'Blog Tag name is a required field.',
                'first_name.max'      => 'Blog Tag may not be greater than 191 characters.',
                'last_name.required'  => 'Blog Tag name is a required field.',
                'last_name.max'       => 'Blog Tag may not be greater than 191 characters.',
        ];
    }
}
