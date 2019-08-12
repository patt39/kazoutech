<?php

namespace App\Http\Controllers\Admin\Partial;

use App\Http\Resources\Partial\DiplomaResource;
use App\Http\Resources\User\Partial\DiplomaByStatusResource;
use App\Model\admin\partial\diploma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class DiplomaController extends Controller
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
        return view('admin.partial.diploma.index');
    }

    public function api()
    {
        $diploma = Cache::rememberForever('diplomas', function () {
            return DiplomaResource::collection(diploma::with('user')->latest()->get());
        });
        return $diploma;
    }

    /**Ici je fait un get des api mais avec peux de data en response
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function apibystatus()
    {
        $diploma = DiplomaByStatusResource::collection(diploma::with('user')
            ->where('status',1)
            ->latest()->get());

        return $diploma;
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
            'name'=>'required|string|unique:diplomas',
        ]);

        $diploma = new diploma;
        $diploma->name = $request->name;


        $diploma->save();


        return response('Created',Response::HTTP_CREATED);
    }

    public function disable(diploma $diploma, $id)
    {
        $diploma = diploma::where('id', $id)->findOrFail($id);
        $diploma->update([
            'status' => 0,
        ]);
        return response('Deactivated',Response::HTTP_ACCEPTED);
    }


    public function active(diploma $diploma, $id)
    {
        $diploma = diploma::where('id', $id)->findOrFail($id);
        $diploma->update([
            'status' => 1,
        ]);
        return response('Activated',Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diploma = diploma::findOrFail($id);

        return view('admin.partial.diploma.show', ['diploma' => $diploma]);
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
            'name'=> "required|string|min:2|max:25|unique:diplomas,name,{$id}",
        ]);

        $diploma = diploma::findOrFail($id);

        $diploma->name = $request->name;
        $diploma->slug = null;

        $diploma->save();

        return ['message' => 'diploma has been updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {
        $diploma = diploma::findOrFail($id);
        $diploma->delete();

        return ['message' => 'diploma deleted '];
    }
}
