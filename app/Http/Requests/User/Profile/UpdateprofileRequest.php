<?php
namespace App\Http\Requests\User\Profile;

class UpdateprofileRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->getRules('devenir_charbonneur_update_register');
    }

} // class
