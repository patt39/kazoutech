<?php
namespace App\Http\Requests\Contacts;

class ContactdevisRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->getRules('deviscontacts');
    }

} // class
