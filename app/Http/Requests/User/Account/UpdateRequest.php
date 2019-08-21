<?php

namespace App\Http\Requests\User\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends BaseRequest
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
            'username' => "required|string|min:2|max:25|unique:users,username,{$this->id}",
            'email' => "required|email|max:255|unique:users,email,{$this->id}",
            'country_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'country_id.required' => 'Le pays est obligatoire',
        ];
    }
    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'email' => 'trim|lowercase',
            'username' => 'trim|capitalize|escape'
        ];
    }
}
