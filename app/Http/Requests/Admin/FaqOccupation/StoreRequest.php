<?php

namespace App\Http\Requests\Admin\FaqOccupation;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->getRules('store');
    }
}
