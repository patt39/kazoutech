<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\User\TasktechnicianResource;
use App\Model\user\tasktechnician;
use App\Model\user\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class TasktechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['api']]);
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
        return view('admin.tasktechnician.index');
    }

    public function api()
    {
        $tasktechnicians = Cache::rememberForever('tasktechnicians', function () {
            return TasktechnicianResource::collection(tasktechnician::with('user', 'technician', 'city')->latest()->get());
        });
        return $tasktechnicians;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tasktechnician.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'city_id' => 'required',
            'user_id' => 'required',
            'technician_id' => 'required',
        ]);

        Tasktechnician::create($request->all());

        return response('Created', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return TasktechnicianResource|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasktechnician = new TasktechnicianResource(tasktechnician::where('id', $id)->findOrFail($id));
        return $tasktechnician;
    }


   //public function view(User $user)
   //{
   //    return view('admin.tasktechnician.view',[
   //        'user' => $user,
   //        'usertasks ' => $user->tasktechnicians()->latest()->get(),
   //        ]);
   //}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.tasktechnician.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
