<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Occupations\StoreRequest;
use App\Http\Requests\Occupations\UpdateRequest;
use App\Http\Resources\OccupationResource;
use App\Http\Resources\User\OccupationByStatusResource;
use App\Model\admin\occupation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;
use File;

class OccupationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','activestatus']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$trash = color::onlyTrashed()->get();
        return view('admin.occupation.index');
    }


    public function api()
    {
        $occupations = Cache::rememberForever('occupations', function () {
            return OccupationResource::collection(occupation::with('user')->latest()->get());
        });
        return $occupations;
    }


    public function activestatus()
    {
        $occupations = OccupationByStatusResource::collection(occupation::where('status',1)->latest()->get());

        return response()->json($occupations,200);
    }

    public function apibystatus()
    {
        $occupations =   OccupationByStatusResource::collection(occupation::with('user')
            ->where('status',1)->latest()->get());
        return $occupations;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.occupation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        $occupation = new occupation;
        $occupation->name = $request->name;

        if ($request->photo) {
            $namefile = sha1(date('YmdHis') . str_random(30));
            $name =   $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];
            $dir = 'assets/img/occupations/';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            $destinationPath = public_path("assets/img/occupations/{$name}");
            Image::make($request->photo)->save($destinationPath);
            //Save Image to database
            $myfilename = "/assets/img/occupations/{$name}";
            $occupation->photo = $myfilename;
        }

        $occupation->save();

        return response('Created',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return OccupationResource|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = new OccupationResource(occupation::where('id', $id)->findOrFail($id));

        return response()->json($category,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $occupation = occupation::where('id', $id)->findOrFail($id);
        return view('admin.occupation.edit', compact('occupation'));
    }

    public function disable(occupation $occupation, $id)
    {
        $occupation = occupation::where('id', $id)->findOrFail($id);
        $occupation->update([
            'status' => 0,
            ]);
        return response('Deactivated',Response::HTTP_ACCEPTED);
    }


    public function active(occupation $occupation, $id)
    {
        $occupation = occupation::where('id', $id)->findOrFail($id);
        $occupation->update([
            'status' => 1,
            ]);
        return response('Activated',Response::HTTP_ACCEPTED);
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

        $occupation = occupation::findOrFail($id);

        $currentPhoto = $occupation->photo;

        if ($request->photo != $currentPhoto){
            $namefile = sha1(date('YmdHis') . str_random(30));
            $name =   $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];
            $dir = 'assets/img/occupations/';
            if(!file_exists($dir)){mkdir($dir, 0775, true);}
            Image::make($request->photo)->save(public_path('assets/img/occupations/').$name);
            $request->merge(['photo' =>  "/assets/img/occupations/{$name}"]);
            $oldFilename = $currentPhoto;
            File::delete(public_path($oldFilename));
        }
        $occupation->update($request->all());

        return ['message' => 'Occupation has ben updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $occupation = occupation::findOrFail($id);
        $oldFilename = $occupation->photo;
        File::delete(public_path($oldFilename));
        $occupation->delete();

        return ['message' => 'color deleted '];
    }
}
