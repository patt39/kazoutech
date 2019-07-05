<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\UserResource;
use App\Model\user\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api']]);
        // Middleware lock account
        //$this->middleware('auth.lock');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    public function api()
    {
        return UserResource::collection(User::with('my_country')
            ->where('my_status','0')
            ->latest()->get());
    }


    public function search(Request $request)
    {
        $users = User::where('name', $request->keywords)->get();

        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return UserResource|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = new UserResource(user::where('id', $id)->findOrFail($id));
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::where('id', $id)->findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }


    public function view(User $user)
    {
        return view("admin.user.view",compact('user','follows'));
    }

    public function userShow($username)
    {
        //$user = new UserResource(User::where('username', $username)->firstOrFail());
        //return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd(request()->all());
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . $id,
            "sex" => "required|in:Female,Male",
            //'role_user' => 'required',
        ]);

        $user = user::find($id);
        $user->name = $request->name;
        $user->my_status = $request->my_status;
        $user->email = $request->email;
        $user->sex = $request->sex;

        //$roles = $request->input('roles') ? $request->input('roles') : [];
        //$user->role_user = $request->role_user;

        $user->save();

        return ['message' => 'user has ben updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
