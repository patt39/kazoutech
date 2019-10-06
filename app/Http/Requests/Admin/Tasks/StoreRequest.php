<?php

namespace App\Http\Requests\Admin\Tasks;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends BaseRequest
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
            'administrator_id'=>'required',
            'note_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'administrator_id.required' => 'Selectioner un administrateur',
            'note_id.required' => 'Selectioner une note',
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
