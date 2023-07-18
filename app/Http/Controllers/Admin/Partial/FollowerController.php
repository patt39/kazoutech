<?php

namespace App\Http\Controllers\Admin\Partial;

use App\Http\Resources\UserResource;
use App\Model\user\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application of kazoutech.com.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $user = User::find($request->id);
        $response = auth()->user()->toggleFollow($user);
        return response()->json(['success' => $response], 200);

    }


    public function followers($username)
    {
        if ($username) {
            $user = User::where('username', $username)->firstOrFail();
        } else {
            $user = User::findOrFail(auth()->user()->id);
        }
        return view('admin.follow.follower', [
            'user' => $user,
            //'followers' => $user->followers,
        ]);
    }

    public function following($username)
    {
        if ($username) {
            $user = User::where('username', $username)->firstOrFail();
        } else {
            $user = User::findOrFail(auth()->user()->id);
        }
        return view('admin.follow.following', [
            'user' => $user,
            //'followings' => $user->followings,
        ]);
    }


    //Ici nous recuperon tous les infirmation de l'utilisateur a traver l'API
    public function GetFollowersByUser($username)
    {
        if ($username) {
            $user = User::where('username', $username)->firstOrFail();
        } else {
            $user = User::findOrFail(auth()->user()->id);
        }
        $followers = UserResource::collection($user->followers()->latest()->get());
        return $followers;

    }

    //Ici nous recuperon tous les infirmation de l'utilisateur a traver l'API
    public function GetFollowingsByUser($username)
    {
        if ($username) {
            $user = User::where('username', $username)->firstOrFail();
        } else {
            $user = User::findOrFail(auth()->user()->id);
        }
        $followings = UserResource::collection($user->followings()->latest()->get());
        return $followings;

    }
}
