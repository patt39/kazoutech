<?php
namespace App\Http\Requests\User\Annonce;

use App\Http\Requests\Request;
use App\Rules\PhoneCmrRule;


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
                'title' => 'required|string|min:2|max:100',
                'city_id' => 'required',
                'occupation_id' => 'required',
                'phone' => ['required',new PhoneCmrRule],
                'body' => 'required',
                'address' => 'required|string|min:2|max:100',
                'categoryoccupation_id' => 'required',
            ];
        }elseif ($group === 'annoncesupdate'){
            $rules = [
                'title' => 'required|string|min:2|max:100',
                'city_id' => 'required',
                'occupation_id' => 'required',
                'phone' => ['required',new PhoneCmrRule],
                'body' => 'required',
                'address' => 'required|string|min:2|max:100',
                'categoryoccupation_id' => 'required',
            ];
        }elseif ($group === 'assignedtaskstore'){
            $rules = [
                'title' => 'required|string|min:2|max:100',
                'user_id' => 'required',
            ];
            
        } elseif ($group === 'assignedtaskupdate'){
            $rules = [
                'title' => 'required|string|min:2|max:100',
            ];
            
        }else { // 'edit'
            $rules = [
                'title' => 'required|string|min:2|max:100',
                'city_id' => 'required',
                'occupation_id' => 'required',
                'phone' => ['required',new PhoneCmrRule],
                'body' => 'required',
                'address' => 'required|string|min:2|max:100',
                'categoryoccupation_id' => 'required',
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
            'user_id' => 'charbonneur obligatoire',
            'occupation_id' => 'occupation obligatoire',
            'categoryoccupation_id' => 'category obligatoire',
        ];
    }

    // --------------------------------------------------------------------------

    // --------------------------------------------------------------------------

} // class
