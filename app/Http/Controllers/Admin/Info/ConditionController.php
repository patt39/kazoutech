<?php

namespace App\Http\Controllers\Admin\Info;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Info\ConditionResource;
use App\Model\admin\info\condition;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

class ConditionController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.info.condition.index');
    }

    public function api()
    {
        return ConditionResource::collection(Condition::with('user')->latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.info.condition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ConditionResource|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string',
            'body'=>'required|string',
            'photo' =>'required',
        ]);

        $condition = new Condition;
        $condition->title = $request->title;
        $condition->slug = $request->slug;
        $condition->body = $request->body;
        $condition->photo = $request->photo;
        $condition->status = '0';

        if ($request->photo) {

            $namefile = sha1(date('YmdHis') . str_random(30));

            $name =   $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];

            $dir = 'assets/img/condition/';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            $destinationPath = public_path("assets/img/condition/{$name}");
            Image::make($request->photo)->save($destinationPath);

            //Save Image to database
            $myfilename = "/assets/img/condition/{$name}";
            $condition->photo = $myfilename;
        }

        $condition->save();

        return new ConditionResource($condition);
    }

    public function unactive_condition($id)
    {
        DB::table('conditions')
            ->where('id',$id)
            ->update([
                'status' => 0,
                'user_id' => auth()->user()->id,
                ]);
        
        return response('deactivated', Response::HTTP_ACCEPTED);
    }

    public function active_condition($id)
    {
        DB::table('conditions')
            ->where('id',$id)
            ->update([
                'status' => 1,
                'user_id' => auth()->user()->id,
                ]);
        
        return response('activated', Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ConditionResource|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $condition = new ConditionResource(condition::where('id', $id)->findOrFail($id));
        return $condition;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $condition = Condition::where('id', $id) ->first();
       return view('admin.info.condition.edit', compact('condition'));
    }

    public function view($slug)
    {
        $condition = new ConditionResource(condition::where('slug',$slug)->firstOrFail());
        return $condition;
    }



    public function vector(condition $condition)
    {
        return view('admin.info.condition.view', [
            'condition' => $condition,
        ]);
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
            'body'=>'required',
            'title'=>'required',
            'photo' =>'required',
        ]);

        $condition = Condition::find($id);

        $currentPhoto = $condition->photo;

        if ($request->photo != $currentPhoto){

            $namefile = sha1(date('YmdHis') . str_random(30));

            $name =   $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];

            $dir = 'assets/img/condition/';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            Image::make($request->photo)->save(public_path('assets/img/condition/').$name);


            $request->merge(['photo' =>  "/assets/img/condition/{$name}"]);

            // Ici on suprimme l'image existant
            $oldFilename = $currentPhoto;
            File::delete(public_path($oldFilename));
        }
        $condition->update($request->all());

        return ['message' => 'updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
       $condition = condition::findOrFail($id);
       $oldFilename = $condition->photo;
       File::delete(public_path($oldFilename));

       $condition -> delete();

       return ['message' => 'condition deleted'];
    }
}
