<?php
namespace App\Http\Requests\Admin\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
                'first_name'    => 'required|min:2|max:100',
                'last_name'    => 'required|max:100',
                'email'   => 'required|email|min:2|max:200',
                'subject' => 'required|min:2|max:210',
                'message'     => 'required|min:2|max:50000',
                //'recaptcha' => ['required', $recaptcha],
        ];
    }
}
