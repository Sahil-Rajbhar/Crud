<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
        // if ($this->isMethod('PUT')) {
        //      return[           
        //     'name' => 'required',
        //     'email' => 'required|email|unique:employees,email,'.$this->input('id'),           
        //     ];            
        // } else {
        return [
                'name' => 'required|string',
                'email' => 'required|email|unique:employees,email',    
            ];
            
            

        }
    
}