<?php
namespace App\Http\Requests\CategoryOccupations;

class StoreCategoryCoccupationRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->getRules('storecategoryoccupation');
    }

} // class
