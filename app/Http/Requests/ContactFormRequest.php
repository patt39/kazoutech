<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'    => 'required|max:100',
            'last_name'    => 'required|max:100',
            'email'   => 'required|email',
            'subject' => 'required|min:2|max:210',
            'message'     => 'required|min:2|max:50000',
        ];
    }
}
