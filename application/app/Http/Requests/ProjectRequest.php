<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'project_name' => 'required|max:255',
            'project_name.unique_custom' => 'El nombre ya existe para el proyecto especificado',
            'project_name.regex' => 'El nombre debe contener solo letras, números y espacios'
        ];
    }

    public function attributes()
    {
        return [
            'project_name' => 'nombre proyecto'
        ];
    }


}
