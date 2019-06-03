<?php

namespace App\Http\Controllers\Admin\Partial;

use App\Model\user\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ChangePasswordController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // Middleware lock account
        //$this->middleware('auth.lock');
    }
    /**
     * Change password form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showChangePasswordForm()
    {
        $user = auth()->user();
        return view('admin.account.change_password', compact('user'));
    }

    public function showChangePasswordFormUser()
    {
        $user = auth()->user();
        return view('site.user.change_password', compact('user'));
    }
    /**
     * Change password.
     *
     * @param Request $request
     * @return ChangePasswordController|array|\Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|min:6',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['errors' => ['old_password'=> ['Current password does not match']]], 422);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return $user;
    }

}
