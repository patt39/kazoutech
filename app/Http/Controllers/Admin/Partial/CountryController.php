<?php

namespace App\Http\Controllers\Admin\Partial;

use App\Http\Resources\Partial\CountryResource;
use App\Model\admin\country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CountryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api']]);
        // Middleware lock account
        //$this->middleware('auth.lock');
    }

    /**
     * Display a listing of Permission.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.country.index');
    }

    public function api()
    {
        return CountryResource::collection(country::orderBy('name')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CountryResource|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(\request()->all()); // pour tester les donner qui entre dans la base de donner
        $this->validate($request,[
            'name'=>'required|string|unique:countries',
            'code'=>'required|string|unique:countries',
        ]);

        $country = new country;
        $country->name = $request->name;
        $country->code = $request->code;

        if ($request->flag) {

            $name = time().'.' . explode('/',explode(':',substr($request->flag,0,strpos
                ($request->flag,';')))[1])[1];

            $dir = 'assets/img//flags-country/';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            $destinationPath = public_path("assets/img/flags-country/{$name}");
            Image::make($request->photo)->save($destinationPath);

            //Save Image to database
            $myfilename = "/assets/img/flags-country/{$name}";
            $country->flag = $myfilename;
        }

        $country->save();

        return new CountryResource($country);
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
            'name'=> "required|string|min:2|max:25|unique:countries,name,{$id}",
            'code'=> "required|string|min:2|max:25|unique:countries,code,{$id}",
        ]);

        $country = country::findOrFail($id);

        $currentPhoto = $country->flag;

        if ($request->flag != $currentPhoto) {

            $name = time().'.' . explode('/',explode(':',substr($request->flag,0,strpos
                ($request->flag,';')))[1])[1];

            $dir = 'assets/img/flags-country/';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            Image::make($request->flag)->save(public_path('assets/img/flags-country/').$name);

            $request->merge(['flag' =>  "/assets/img/flags-country/{$name}"]);

            // Ici on suprimme l'image existant
            $oldFilename = $currentPhoto;
            File::delete(public_path($oldFilename));
        }
        $country->update($request->all());

        return ['message' => 'updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $country = country::findOrFail($id);
        $oldFilename = $country->flag;
        File::delete(public_path($oldFilename));

        $country->delete();

        return ['message' => 'Deleted successfully'];
    }
}
