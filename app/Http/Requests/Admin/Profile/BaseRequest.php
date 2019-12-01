<?php
namespace App\Http\Requests\Profile;

use App\Http\Requests\Request;


class BaseRequest extends Request
{
    // --------------------------------------------------------------------------

    /**
     * Return the array of validation rules for the given group.
     *
     * @param string $group The group name: 'store' or 'update'.
     * @param object $partner The partner object or null if the group is 'store'.
     * @return array
     */
    protected function getRules($group)
    {
        if ($group == 'store') {
            $rules = [
                'username' => 'required|unique:users,username,',
                'email' => 'required|email|unique:users,email,',
                //"sex" => "required|in:Female,Male",
                'country_id' => 'required',
                //'roles' => 'required',
            ];
        }
        else { // 'edit'
            $rules = [
                'username' => 'required|unique:users,username,' .$this->id,
                'email' => 'required|email|unique:users,email,' .$this->id,
                'country_id' => 'required',
                //'roles' => 'required',
            ];
        }

        return $rules;
    }

    public function filters()
    {
        return [
            'email' => 'trim|lowercase',
            'username' => 'trim|capitalize|escape'
        ];
    }
    // --------------------------------------------------------------------------

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
            'country_id' => 'pays obligatoire',
        ];
    }

    // --------------------------------------------------------------------------

    // --------------------------------------------------------------------------

} // class
