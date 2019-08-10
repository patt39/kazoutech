<?php

namespace App\Http\Requests\User\Technicians;

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
            //'user_id'=> 'required|integer|unique:technicians,user_id'.$this->id,
            'occupation_id'=>'required',
            'city_id'=>'required',
            'diploma_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'occupation_id.required' => 'Votre occupation',
            'city_id.required' => 'Votre ville actuelle',
            'diploma_id.required' => 'Votre plus recent diplome',
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
            //'username' => 'trim|capitalize|escape'
        ];
    }
}
