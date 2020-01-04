<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Technicians\StoreRequest;
use App\Http\Resources\User\Partial\TecnicianByStatusResource;
use App\Http\Resources\User\TechnicianResource;
use App\Http\Resources\UserResource;
use App\Model\admin\city;
use App\Model\admin\occupation;
use App\Model\admin\partial\diploma;
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
        $this->middleware('auth',['except' => ['api','profile','view','viewcity','viewoccupation','viewdiploma','viewoccupationcity']]);
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

    public function charboneur()
    {
        return view('user.page.technician.technicianBecome');
    }



    public function api()
    {
        $technicians = TechnicianResource::collection(technician::with('user','member','city','occupation','diploma')
            ->latest()->get());
        return $technicians;
    }

    /**
     * Ici on recupere tous les articles dans le orders/beautes
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function viewcity($city)
    {
        $citytechnicians = TechnicianResource::collection(city::whereSlug($city)->firstOrFail()->technicians()
            ->with('user','member','city','occupation','diploma')
            ->latest()->get());
        return $citytechnicians;
    }

    public function bycity($occupation)
    {
        $citytechnicians = city::whereSlug($occupation)->firstOrFail()->technicians()
            ->with('user','member','city','occupation','diploma')
            ->latest()->get();
        return view('admin.technician.bytechnician', compact('citytechnicians'));
    }


    /**
     * Ici je recupere les technicians par occupation
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function viewoccupation($occupation)
    {
        $technicians = TechnicianResource::collection(occupation::whereSlug($occupation)->firstOrFail()->technicians()
            ->with('user','member','city','occupation','diploma')
            ->latest()->get());
        return $technicians;
    }

    public function byoccupation($occupation)
    {
        $occupationtechnicians = occupation::whereSlug($occupation)->firstOrFail()->technicians()
            ->with('user','member','city','occupation','diploma')
            ->latest()->get();
        return view('admin.technician.bytechnician', compact('occupationtechnicians'));
    }

    /**
     * Ici je recupere les technicians par occupation
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function viewdiploma($slug)
    {
        $technicians = TechnicianResource::collection(diploma::whereSlug($slug)->firstOrFail()->technicians()
            ->with('user','member','city','occupation','diploma')
            ->latest()->get());
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
    public function store(StoreRequest $request)
    {
        Technician::create($request->all());

        return response('Created',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return TecnicianByStatusResource|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $technician = new TecnicianByStatusResource(technician::where('id', $id)->findOrFail($id));
        return $technician;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return TecnicianByStatusResource|\Illuminate\Http\Response
     */
    //Ici nous recuperon tous les infirmation de l'utilisateur a traver l'API
    public function view($technician)
    {
        $technician = new TecnicianByStatusResource(technician::whereSlug($technician)->firstOrFail());

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

    public function viewoccupationcity($occupation, $city)
    {
        $getcity = city::whereSlug($city);
        $getoccupation = occupation::whereSlug($occupation);
        $technicians = TechnicianResource::collection($getoccupation->first()->technicians()
            ->with('user','member','city','occupation','diploma')
            ->latest()->get());
        return $technicians;
    }

    /**
     * Get slug technician
     * @param technician $technician
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile(technician $technician)
    {
        return view("user.page.technician.technicianIndex",[
            'technician' => $technician,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(technician $technician)
    {
        $this->authorize('update',$technician);

        if(auth()->user()->id === $technician->user_id) {
            return view("user.page.technician.technicianEdit",[
                'technician' => $technician,
            ]);
        }else{
            return back()
                ->with('error',"Unauthorized edit this article contact Author.");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $technician = technician::findOrFail($id);

        $this->authorize('update',$technician);

        if(auth()->user()->id === $technician->user_id) {
            $technician->update($request->all());
            return ['message' => 'technician has been updated'];
        }else{
            return back()
                ->with('error',"Unauthorized edit this article contact Author.");
        }
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
