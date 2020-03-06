<?php
namespace App\Http\Requests\User\CharbonneurRegister;

use App\Http\Requests\Request;
use App\Model\user\User;
use App\Rules\PhoneCmrRule;
use Illuminate\Validation\Rule;


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
        if ($group == 'devenir_charbonneur_store') {
            $rules = [
                //
            ];
        } else { // 'edit'
            $rules = [
                'username' => "required|string|min:2|max:25|unique:users,username,{$this->id}",
                'email' => ['required', 'email', Rule::unique((new User)->getTable())->ignore(auth()->id())],
                'name' => 'required|string|min:2|max:100',
                'day' => 'required|numeric|digits_between:1,2',
                'month' => 'required|numeric|digits_between:1,2',
                '
                
                
                ' => 'required|numeric|digits_between:4,4',
                'city_id' => 'required',
                'sex' => 'required',
                'occupation_id' => 'required',
                'phone' => ['required',new PhoneCmrRule],
            ];
        }

        return $rules;
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
            'city_id' => 'ville obligatoire',
            'occupation_id' => 'occupation obligatoire',
        ];
    }

    // --------------------------------------------------------------------------

    // --------------------------------------------------------------------------

} // class
