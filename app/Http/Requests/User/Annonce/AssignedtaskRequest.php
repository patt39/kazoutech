<?php
namespace App\Http\Requests\User\Annonce;

class AssignedtaskRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->getRules('assignedtaskstore');
    }

} // class
