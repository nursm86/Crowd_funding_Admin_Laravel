<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'username' => 'required | min : 5',
            'name' => 'required',
            'pass' => 'required | min: 4 | same:cpassword',
            'cpassword' => 'required | min:4 | same:pass',
            'phone' => 'required | min:11|max:14',
            'email' => 'required | email',
            'address' => 'required | min : 5',
            'sq' => 'required',
            'file' => 'required'
        ];
    }
}
