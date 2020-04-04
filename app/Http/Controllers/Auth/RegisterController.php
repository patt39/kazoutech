<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\User\CharbonneurRegister\StoreRequest;
use App\Model\user\User;
use App\Http\Controllers\Controller;
use App\Rules\PhoneCmrRule;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function devenir_charbonneur()
    {
        return view('auth.devenir_charbonneur');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function devenir_charbonneur_validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string','min:2','max:255'],
            'username' => ['required', 'string','min:2','max:255','alpha_dash','unique:users'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'day' => 'required|numeric|digits:2|min:1|max:31',
            'month' => 'required|numeric|digits_between:1,2|min:1|max:12',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')),
            'city_id' => 'required',
            "sex" => "required|in:female,male",
            'occupation_id' => 'required',
            'phone' => ['required',new PhoneCmrRule],
            'password' => ['required', 'string', 'min:6', 'confirmed'],

        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function devenir_charbonneur_store_register(Request $request)
    {
        $this->devenir_charbonneur_validator($request->all())->validate();

        event(new Registered($user = $this->devenir_charbonneur_store($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }


    public function devenir_charbonneur_store(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'day' => $data['day'],
            'month' => $data['month'],
            'year' => $data['year'],
            'sex' => $data['sex'],
            'city_id' => $data['city_id'],
            'occupation_id' => $data['occupation_id'],
            'charbonneur' => $data['charbonneur'],
            'notifier_newletter' => $data['notifier_newletter'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required',new PhoneCmrRule],
            'username' => ['required', 'string', 'max:255','alpha_dash','unique:users'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'cni' => ['required', 'string', 'max:17', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Model\user\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'username' => $data['username'],
            'notifier_newletter' => $data['notifier_newletter'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function index()
    {
        return view('auth.register');
    }

    private function update_charbonneur_validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string','min:2','max:255'],
            'username' => ['required', 'string','min:2','max:255','alpha_dash','unique:users'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'day' => 'required|numeric|digits:2|min:1|max:31',
            'month' => 'required|numeric|digits_between:1,2|min:1|max:12',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')),
            'city_id' => 'required',
            "sex" => "required|in:Female,Male",
            'occupation_id' => 'required',
            'phone' => ['required',new PhoneCmrRule],
        ]);
    }
}
