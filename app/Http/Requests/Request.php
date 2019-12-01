<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    /**
     * Determine if the site is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

}
