<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Administrators\StoreRequest;
use App\Http\Resources\UserResource;
use App\Model\user\User;
use Illuminate\View\View;
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
        $this->middleware('auth',['except' => ['api','apidatatables']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('admin.administrator.index');
    }

    public function api()
    {
        $users = UserResource::collection(User::with('my_country')
            ->where('my_status','active')
            ->orderBy('updated_at','DESC')->paginate(6));

        return response()->json($users,200);
    }

    public function apidatatables()
    {
        $users = UserResource::collection(User::with('my_country')
        ->where('my_status','active')
        ->orderBy('updated_at','DESC')->get());

        return response()->json($users,200);
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
        return view('admin.administrator.edit', ['user' => $user]);
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

        $user = User::find($id);
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

        return ['message' => 'User has been updated'];
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
