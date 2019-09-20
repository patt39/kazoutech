<?php

namespace App\Http\Requests\Admin\Colors;

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
            'name'=>'required|string|unique:colors,name,'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            //'name.required' => 'Name color is required',
            //'name.unique' => 'Cette couleur est déjà utilisée.',
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
            //'email' => 'trim|lowercase',
            'name' => 'trim|capitalize|escape'
        ];
    }
}
