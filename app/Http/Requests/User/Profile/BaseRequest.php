<?php
namespace App\Http\Requests\User\Profile;

use App\Model\user\User;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;
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
        if ($group == 'devenir_charbonneur_update_register') {
            $rules = [
        
                'name' => ['required', 'string','min:2','max:255'],
                'username' => ['required', 'string','min:2','max:255','alpha_dash', Rule::unique((new User)->getTable())->ignore(auth()->id())],
                'email' => ['required', 'email', Rule::unique((new User)->getTable())->ignore(auth()->id())],
                'day' => 'required|numeric|digits:2|min:1|max:31',
                'month' => 'required|numeric|digits_between:1,2|min:1|max:12',
                'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')),
                'city_id' => 'required',
                "sex" => "required|in:Female,Male",
                'occupation_id' => 'required',
                'phone' => ['required',new PhoneCmrRule],
                'cni' => ['required', 'string', 'max:17', 'confirmed'],
            ];
        }else { // 'edit'
            $rules = [
             //
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
