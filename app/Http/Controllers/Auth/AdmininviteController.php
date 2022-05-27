<?php

namespace App\Http\Controllers\Auth;

use App\Mail\InviteAdministrator;
use App\Model\admin\invite;
use App\Model\user\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class AdmininviteController extends Controller
{

    public function process(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|string|email|max:255',
        ]);
        // validate the incoming request data

        do {
            //generate a random string using Laravel's str_random helper
            $token = str_random();
        } //check if the token already exists and if it does, try again
        while (Invite::where('token', $token)->first());

        //create a new invite record
        $invite = Invite::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'token' => $token
        ]);
        // dd($invite);

        // send the email
        Mail::to($request->get('email'))->send(new InviteAdministrator($invite));

        // redirect back where we came from
        return response('Invitation sent successfully', Response::HTTP_CREATED);
    }

    public function accept($token,User $user)
    {
        // Look up the invite
        if (!$invite = Invite::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }

        // update the user with the details from the invite
        $user->update([
            'name' => $invite->name,
            'email' => $invite->email
        ]);

        // delete the invite so it can't be used again
        $invite->delete();

        // here you would probably log the user in and show them the dashboard, but we'll just prove it worked

        return redirect(route('dashboard.index'))->with('success','Event update with success!');
    }
}
