<?php
namespace App\Http\Requests\CategoryOccupations;

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
                'name' => 'required|string|min:2|max:100|unique:categoryoccupations,name,',
                'occupation_id' => 'required',
            ];
        }
        elseif ($group === 'storecategoryoccupation'){
            $rules = [
                'name' => 'required|string|min:2|max:100|unique:categoryoccupations,name,' .$this->id,
                'photo' => 'required',
            ];
        } else { // 'edit'
            $rules = [
                'name' => 'required|string|min:2|max:100|unique:categoryoccupations,name,' .$this->id,
                'occupation_id' => 'required',
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
            'occupation_id' => 'occupation obligatoire',
        ];
    }

    // --------------------------------------------------------------------------

    // --------------------------------------------------------------------------

} // class
