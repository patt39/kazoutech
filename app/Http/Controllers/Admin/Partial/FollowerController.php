<?php

namespace App\Http\Controllers\Admin\Partial;

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
        return response()->json(['success'=>$response]);

    }
}
