<?php
namespace App\Http\Requests\User\Annonce;

class AssignedtaskupdateRequeste extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->getRules('assignedtaskupdate');
    }

} // class
