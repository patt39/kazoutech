<?php

namespace App\Http\Controllers\Admin\Page;

use Illuminate\Http\Request;
use App\Http\Resources\Page\HowtoregisterResource;
use App\Model\admin\page\howtoregister;
use App\Http\Controllers\Controller;

class HowregisterController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.page.howregister.index');
    }
    
    public function api()
    {
        return HowtoregisterResource::collection(howtoregister::with('user')->latest()->get());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.howregister.create');
    }

    public function vector(howtoregister $howtoregister)
    {
        return view('admin.partials.how_register.view', [
            'howtoregister' => $howtoregister,
        ]);
    }

    public function view($slug)
    {
        $howtoregister = new HowtoregisterResource(howtoregister::where('slug',$slug)->firstOrFail());
        return $howtoregister;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return HowregistrationResource|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request()->all());
        $this->validate($request,[
            'title'=>'required|string',
            'body'=>'required|string',
            'color_name'=>'required|string',
            'icon'=>'required|string',
            "icon_number" =>"required|string",
            'image' =>'required',
        ]);

        $howtoregister = new howtoregister;
        $howtoregister->body = $request->body;
        $howtoregister->icon = $request->icon;
        $howtoregister->slug = $request->slug;
        $howtoregister->title = $request->title;
        $howtoregister->color_name = $request->color_name;
        $howtoregister->icon_number = $request->icon_number;
        $howtoregister->status = '0';
        
        if ($request->image) {

            $namefile = sha1(date('YmdHis') . str_random(30));
            $name = $namefile.'.' . explode('/',explode(':',substr($request->image,0,strpos
                ($request->image,';')))[1])[1];

            $dir = 'assets/img/registration/';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            $destinationPath = public_path("assets/img/registration/{$name}");
            Image::make($request->image)->save($destinationPath);

            //Save Image to database
            $myfilename = "/assets/img/registration/{$name}";
            $howtoregister->image = $myfilename;
        }
        
        $howtoregister->save();

        return new HowtoregisterResource($howtoregister);
    }

    public function unactive_how_register($id)
    {
        DB::table('howtoregisters')
            ->where('id',$id)
            ->update([
                'status' => 0,
                'user_id' => auth()->user()->id,
            ]);
        return response('deactivated', Response::HTTP_ACCEPTED);
    }

    public function active_how_register($id)
    {
        DB::table('howtoregisters')
            ->where('id',$id)
            ->update([
                'status' => 1,
                'user_id' => auth()->user()->id,
            ]);
        
        return response('Activated', Response::HTTP_ACCEPTED);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return HowregistrationResource|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $howtoregister = new HowtoregisterResource(howtoregister::where('id', $id)->findOrFail($id));
        return $howtoregister;
    }

    public function edit($id)
    {
        $howtoregister = howtoregister::where('id', $id)->findOrFail($id);

        return view( 'admin.page.howregister.edit', compact( 'howtoregister'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\admin\howtoregister  $howtoregister
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|string',
            'body'=>'required|string',
            'icon'=>'required|string',
            'icon_number'=>"required|string",
            'image' =>'required',
        ]);

        $howtoregister = howtoregister::findOrFail($id);
        $howtoregister->body = $request->body;
        $howtoregister->icon = $request->icon;
        $howtoregister->slug = $request->slug;
        $howtoregister->title = $request->title;
        $howtoregister->color_name = $request->color_name;
        $howtoregister->icon_number = $request->icon_number;
        
        $currentPhoto = $howtoregister->image;

        if ($request->image != $currentPhoto){

            $namefile = sha1(date('YmdHis') . str_random(30));
            $name = $namefile.'.' . explode('/',explode(':',substr($request->image,0,strpos
                ($request->image,';')))[1])[1];

            $dir = 'assets/img/presentation/';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            Image::make($request->image)->save(public_path('assets/img/registration/').$name);

            $request->merge(['image' =>  "/assets/img/registration/{$name}"]);

            // Ici on suprimme l'image existant
            $oldFilename = $currentPhoto;
            File::delete(public_path($oldFilename));
        }
        $howtoregister->update($request->all());

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
        $howtoregister = howtoregister::findOrFail($id);
        $oldFilename = $howtoregister->image;
        File::delete(public_path($oldFilename));

        $howtoregister->delete();
        
        return ['message' => 'Registration deleted '];
    
    }
}
