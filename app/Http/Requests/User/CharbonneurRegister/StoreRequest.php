<?php
namespace App\Http\Requests\User\CharbonneurRegister;

class StoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->getRules('devenir_charbonneur_store');
    }

} // class
