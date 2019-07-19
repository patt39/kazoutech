<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\User\TechnicianResource;
use App\Http\Resources\UserResource;
use App\Model\user\technician;
use App\Model\user\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class TechnicianController extends Controller
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
        //$trash = color::onlyTrashed()->get();
        return view('admin.technician.index');
    }


    public function api()
    {
        $technicians = Cache::rememberForever('technicians', function () {
            return TechnicianResource::collection(technician::with('user','member','city','occupation')
                ->latest()->get());
        });
        return $technicians;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technician.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id'=>'required|integer|unique:technicians',
            'city_id'=>'required',
            'occupation_id'=>'required',
        ]);

        Technician::create($request->all());

        return response('Created',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return TechnicianResource|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $technician = new TechnicianResource(technician::where('id', $id)->findOrFail($id));
        return $technician;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return TechnicianResource|\Illuminate\Http\Response
     */
    //Ici nous recuperon tous les infirmation de l'utilisateur a traver l'API
    public function view($slug)
    {
        $technician = new TechnicianResource(technician::where('slug',$slug)->firstOrFail());
        return $technician;
    }

    /**
     * Display the specified resource.
     *
     * @param  @param  \App\Model\user\technician  $technician
     * @return TechnicianResource|\Illuminate\Http\Response
     */
    public function technician(technician $technician)
    {
        return view('admin.technician.view', [
            'technician' => $technician,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $technician = technician::where('id', $id)->findOrFail($id);
        return view('admin.technician.edit', compact('technician'));
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
        $this->validate($request,[
            'user_id'=> "required|integer|unique:technicians,user_id,{$id}",
            'city_id'=>'required',
            'occupation_id'=>'required',
        ]);

        $technician = technician::findOrFail($id);
        $this->authorize('update', $technician);

        $technician->update($request->all());

        return ['message' => 'technician has been updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *  @param  \App\Model\user\User  $user
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(User $user,$id)
    {
        $this->authorize('update', $user->technician);

        $technician = technician::findOrFail($id);
        $technician->delete();

        return ['message' => 'technician deleted '];
    }
}
