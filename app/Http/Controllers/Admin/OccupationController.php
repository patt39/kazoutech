<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\OccupationResource;
use App\Model\admin\occupation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class OccupationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','apibystatus']]);
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

    public function apibystatus()
    {
        $occupations =   OccupationResource::collection(occupation::with('user')
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|unique:occupations',
        ]);

        $occupation = new occupation;
        $occupation->name = $request->name;

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

        return $category;
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
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=> "required|string|min:2|max:25|unique:occupations,name,{$id}",
        ]);

        $occupation = occupation::findOrFail($id);

        $occupation->name = $request->name;
        $occupation->slug = null;
        $occupation->save();

        return ['message' => 'color has ben updated'];
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
        $occupation->delete();

        return ['message' => 'color deleted '];
    }
}
