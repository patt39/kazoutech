<?php

namespace App\Http\Requests\Admin\Colors;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BaseRequest extends Request
{
    // --------------------------------------------------------------------------

    /**
     * Return the array of validation rules for the given group.
     *
     * @param string $group The group name: 'store' or 'update'.
     * @param object $ruolo The ruolo object or null if the group is 'store'.
     * @return array
     */
    protected function getRules($group, $id = null)
    {
        $rules = [
            //
        ];

        if ($group == 'store') {
            $rules['name'] = 'required|string|min:2|max:50|unique:colors';
        }
        else { // 'edit'
            $rules['name'] = "required|string|min:2|max:25|unique:colors,name,{$id}";
        }

        return $rules;
    }

    // --------------------------------------------------------------------------

    /**
     * the attributes method replaces the :attribute placeholder on the validation messages
     * with given attribute names
     *
     * @return array
     */

    public function attributes()
    {
        return [
            'name' => 'nome ruolo',
        ];
    }


}
