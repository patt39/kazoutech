<?php

namespace App\Http\Controllers\Admin\Partial;

use App\Http\Resources\Partial\CityResource;
use App\Http\Resources\User\Partial\CityByStatusResource;
use App\Model\admin\city;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

class CityController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','apibystatus','apibyvip','apiactives']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
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
        return response()->json($cities,200);
    }

    public function apibyvip()
    {
        $cities = CityByStatusResource::collection(city::with('user')
            ->where('city_vip',1)
            ->orderBy('name','desc')
            ->get());
        return response()->json($cities,200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws ValidationException
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
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function status(city $city)
    {
        $city = city::findOrFail($city->id);
        $city->update(['status' => !$city->status]);

        return response('Update',Response::HTTP_CREATED);
    }

    /**
     * @param city $city
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function city_vip(city $city)
    {
        $city = city::findOrFail($city->id);
        $city->update(['city_vip' => !$city->city_vip]);

        return response('Update',Response::HTTP_CREATED);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
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
     * @param Request $request
     * @param int $id
     * @return array
     * @throws ValidationException
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=> "required|string|min:2|max:25|unique:cities,name,{$id}",
        ]);

        $city = city::findOrFail($id);


        $currentPhoto = $city->photo;

        if ($request->photo != $currentPhoto){
            $namefile = sha1(date('YmdHis') . str_random(30));
            $name =   $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];
            $dir = 'assets/img/cities/';
            if(!file_exists($dir)){mkdir($dir, 0775, true);}
            Image::make($request->photo)->fit(1000,900)->save(public_path('assets/img/cities/').$name);
            $request->merge(['photo' =>  "/assets/img/cities/{$name}"]);
            $oldFilename = $currentPhoto;
            File::delete(public_path($oldFilename));
        }
        $city->slug = null;

        $city->update($request->all());

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
