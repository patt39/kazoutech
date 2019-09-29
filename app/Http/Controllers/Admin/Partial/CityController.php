<?php

namespace App\Http\Controllers\Admin\Partial;

use App\Http\Resources\Partial\CityResource;
use App\Http\Resources\User\Partial\CityByStatusResource;
use App\Model\admin\city;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','apibystatus','apiactives']]);
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
        return view('admin.partial.city.index');
    }

    public function actives()
    {
        return view('admin.partial.city.index');
    }

    public function api()
    {
        $cities = CityResource::collection(city::with('user')
            ->orderBy('name','asc')
            ->get());
        return $cities;
    }

    public function apiactives()
    {
        $cities = CityResource::collection(city::with('user')
            ->where('status',1)
            ->orderBy('name','asc')
            ->get());
        return $cities;
    }

    public function apibystatus()
    {
        $cities = CityByStatusResource::collection(city::with('user')
            ->where('status',1)
            ->orderBy('name','asc')
            ->get());
        return $cities;
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
        $this->validate($request,[
            'name'=>'required|string|unique:cities',
        ]);

        $city = new city;
        $city->name = $request->name;
        $city->save();


        return response('Created',Response::HTTP_CREATED);
    }


    /**
     * @param city $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(city $city)
    {
        $city->update(['status' => !$city->status]);

        return response('Update',Response::HTTP_CREATED);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = city::findOrFail($id);

        return view('admin.partial.city.show', ['city' => $city]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=> "required|string|min:2|max:25|unique:cities,name,{$id}",
        ]);

        $city = city::findOrFail($id);

        $city->name = $request->name;
        $city->slug = null;
        $city->save();

        return ['message' => 'city has ben updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {
        $city = city::findOrFail($id);
        $city->delete();

        return ['message' => 'city deleted '];
    }
}
