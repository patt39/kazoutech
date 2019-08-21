<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Administrators\StoreRequest;
use App\Http\Resources\UserResource;
use App\Model\user\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Administrators\UpdateRequest;

class AdministratorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.administrator.index');
    }

    public function api()
    {
        return UserResource::collection(User::with('my_country')
            ->where('my_status','active')
            ->orderBy('updated_at','DESC')->get());
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
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
        return view('admin.administrator.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {

        $user = user::find($id);
        $user->name = $request->name;
        $user->my_status = $request->my_status;
        $user->country_id = $request->country_id;
        $user->email = $request->email;

        $roles = $request->input('roles') ? $request->input('roles') : [];
        $permissions = $request->input('permissions') ? $request->input('permissions') : [];
        $user->syncRoles($permissions);
        $user->syncRoles($roles);

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
