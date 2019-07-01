<?php

namespace App\Http\Controllers\Admin\Partial;

use App\Http\Resources\Partial\ColorResource;
use App\Model\admin\color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ColorController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$trash = color::onlyTrashed()->get();
        return view('admin.partial.color.index');
    }

    public function api()
    {
        //$colors = new ColorCollection(Color::with('user')->latest()->get());
        $colors = Cache::rememberForever('colors', function () {
            return ColorResource::collection(Color::with('user')->latest()->get());
        });
        return $colors;
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
            'name'=>'required|string|unique:colors',
        ]);

        $color = new Color;
        $color->name = $request->name;
        $color->color_name = $request->color_name;


        $color->save();


        return response('Created',Response::HTTP_CREATED);
    }


    public function disable($id)
    {
        DB::table('colors')
            ->where('id',$id)
            ->update([
                'status' => 0,
                'user_id' => auth()->user()->id,
            ]);

        return response('deactivated',Response::HTTP_ACCEPTED);
    }

    public function active($id)
    {
        DB::table('colors')
            ->where('id',$id)
            ->update([
                'status' => 1,
                'user_id' => auth()->user()->id,
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
        $color = Color::findOrFail($id);

        return view('admin.partial.color.show', ['color' => $color]);
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
            'name'=> "required|string|min:2|max:25|unique:colors,name,{$id}",
        ]);

        $color = color::findOrFail($id);

        $color->name = $request->name;
        $color->color_name = $request->color_name;

        $color->save();

        return ['message' => 'color has ben updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {
        $color = color::findOrFail($id);
        $color->delete();

        return ['message' => 'color deleted '];
    }
}
