<?php

namespace App\Http\Controllers\Admin\info;

use App\Http\Resources\Info\DocumentationResource;
use App\Model\admin\info\documentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.info.documentation.index');
    }

    public function api()
    {

        $documentations = Cache::rememberForever('documentations', function () {
            return DocumentationResource::collection(documentation::with('user')->latest()->get());
        });
        return $documentations;
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
     * @return DocumentationResource|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string',
        ]);

        $documentation = new documentation;
        $documentation->name = $request->name;

        if ($request->name_doc) {

            $namefile = sha1(date('YmdHis') . str_random(30));

            $name =   $namefile.'.' . explode('/',explode(':',substr($request->name_doc,0,strpos
                ($request->name_doc,';')))[1])[1];

            $dir = 'assets/doc/documentation/';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            $destinationPath = public_path("assets/doc/documentation/{$name}");
            //Image::make($request->name_doc)->save($destinationPath);
            //$request->name_doc->save($destinationPath);

            //Save Image to database
            $myfilename = "/assets/doc/documentation/{$name}";
            $documentation->name_doc = $myfilename;
        }

        $documentation->save();

        return new DocumentationResource($documentation);
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
        //
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
